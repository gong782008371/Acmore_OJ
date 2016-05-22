#include "judgeBase.h"
#include "trace.h"

void CJudgeBase::ClearFiles()
{
    char buf[100] = {0};
    sprintf(buf, "sudo rm -f %s/*", folder_judge.c_str());
    system(buf);
}

bool CJudgeBase::InitializeFields(const Record& record, bool isJava)
{
    is_java = isJava;
    solution_id = record.solution_id;
    if (mysqlOp == NULL)
    {
        mysqlOp = new CMysqlOp();
    }
    if(!mysqlOp->QueryRuntimeLimit(time_limit, memory_limit, record.problem_id, is_java))
    {
        TRACE_WARN("can not find runtime limit with problem_id(%d) and isJava(%d)", record.problem_id, is_java);
        return false;
    }
    return true;
}

bool CJudgeBase::InitializeDataPath(int problem_id)
{
    char buf[200] = {0};
    sprintf(buf, "%s/%d", FOLDER_DATA, problem_id);
    folder_data = std::string(buf);
    return true;
}

bool CJudgeBase::GenerateMain(std::string file_name)
{
    if(mysqlOp == NULL) {
        mysqlOp = new CMysqlOp();
    }
    std::string code = "";
    if(!mysqlOp->QuerySourceCodeByID(code, solution_id))
    {
        TRACE_WARN("can not find code with solution_id(%d)", solution_id);
        return false;
    }
    int fd = open( (folder_judge + file_name).c_str(), O_WRONLY | O_CREAT, 0664);
    if(write(fd, code.c_str(), code.length()) < 0)
    {
        TRACE_WARN("write to file(%s) failed.", (folder_judge + file_name).c_str());
        return false;
    }
    close(fd);
    return true;
}

bool CJudgeBase::SetCompileEnvirement()
{
    // cd judge path
     chdir(folder_judge.c_str());

    // set compile max time
    struct rlimit LIM;
    LIM.rlim_max = 60;
    LIM.rlim_cur = 60;
    setrlimit(RLIMIT_CPU, &LIM);

    // set 进程可建立的文件的最大长度
    LIM.rlim_max = 100 * STD_MB;
    LIM.rlim_cur = 100 * STD_MB;
    setrlimit(RLIMIT_FSIZE, &LIM);

    // set compile max memory
    if(is_java)
    {
       LIM.rlim_max = STD_MB << 11;
       LIM.rlim_cur = STD_MB << 11; 
    }
    else
    {
       LIM.rlim_max = STD_MB << 10;
       LIM.rlim_cur = STD_MB << 10;
    }
    setrlimit(RLIMIT_AS, &LIM);

    freopen(path_file_ce.c_str(), "w", stderr);
    return true;
}

bool CJudgeBase::SetRunTimeEnvirement()
{
    chdir(folder_judge.c_str());

    freopen(path_file_in.c_str(), "r", stdin);
    freopen(path_file_usr.c_str(), "w", stdout);
    freopen(path_file_error.c_str(), "a+", stderr);
    system("sudo chmod a+w *.out");

    //ptrace(PTRACE_TRACEME, 0, NULL, NULL);

    struct rlimit LIM;

    LIM.rlim_cur = time_limit / 1000 ;
    LIM.rlim_max = time_limit / 1000 ;
    setrlimit(RLIMIT_CPU, &LIM);

    LIM.rlim_max = STD_F_LIM + STD_MB;
    LIM.rlim_cur = STD_F_LIM;
    setrlimit(RLIMIT_FSIZE, &LIM);

    LIM.rlim_cur = LIM.rlim_max = 1;
    setrlimit(RLIMIT_NPROC, &LIM);

    LIM.rlim_cur = STD_MB << 6;
    LIM.rlim_max = STD_MB << 6;
    setrlimit(RLIMIT_STACK, &LIM);

    LIM.rlim_cur = STD_MB * memory_limit / 2 * 3;
    LIM.rlim_max = STD_MB * memory_limit * 2;
    if (!is_java) setrlimit(RLIMIT_AS, &LIM);
}

bool CJudgeBase::Compile(const char * CP[])
{
    printf("begin Compile (%d)\n", solution_id);
    int pid = fork();
    if(pid == 0)
    {
        SetCompileEnvirement();
        execvp(CP[0], (char * const *) CP);
        exit(0);
    }
    else
    {
        used_time = used_memory = result = 0;
        int status = 0;
        waitpid(pid, &status, 0);
        status = get_file_size(path_file_ce.c_str());
        if(status)
        {
            result = RT_CE;
            WhenCompileError();
        }
        printf("end compile (%d)\n", solution_id);
        return true;
    }
    return false;
}

bool CJudgeBase::Run(const char * RUN[])
{
    printf("begin run (%d)\n", solution_id);
    dir_data = opendir(folder_data.c_str());
    if(dir_data == NULL)
    {
        TRACE_WARN("data path(%s) is not exist", folder_data.c_str());
        return false;
    }

    result = RT_AC;
    for (; result == RT_AC && (dirent_data_in = readdir(dir_data)) != NULL; )  
    if( IsInFile(dirent_data_in->d_name) )
    {
        RunCheck();
        child_pid = fork();
        if(child_pid == 0)
        {
            RunSolution(RUN);
            exit(0);
        }
        else
        {
            WacthSolution();
            JudgeSolution();
        }
    }
    mysqlOp->UpdateSolution(result, used_time, used_memory, solution_id);
    printf("end run (%d)\n", solution_id);
    return true;
}

long CJudgeBase::get_file_size(const char * filename) 
{
    struct stat f_stat;
    if (stat(filename, &f_stat) == -1) 
    {
        return 0;
    }
    return (long) f_stat.st_size;
}

bool CJudgeBase::WhenCompileError()
{
    // read compile error info
    char buf[2001];
    std::string file_name = "ce.out";
    int fd = open( (folder_judge + file_name).c_str(), O_RDONLY, 0664);
    if(read(fd, buf, sizeof(buf)) < 0)
    {
        TRACE_WARN("read ce.out to file(%s) failed.", (folder_judge + file_name).c_str());
        return false;
    }
    close(fd);

    // save to mysql
    if(mysqlOp == NULL) {
        mysqlOp = new CMysqlOp();
    }
    // set solution result
    if (!mysqlOp->UpdateSolution(RT_CE, used_time, used_memory, solution_id))
    {
        TRACE_WARN("update compile error result error.");
        return false;
    }
    // set compile_error info
    if (!mysqlOp->InsertCompileInfo(solution_id, buf))
    {
        TRACE_WARN("insert compile error info error.");
        return false;
    }
    return true;
}

bool CJudgeBase::IsInFile(const char * filename)
{
    int len = strlen(filename);
    return strstr(filename, ".in") == (&filename[len - 3]);
}

bool CJudgeBase::RunCheck()
{
    // initial var
    result = RT_AC;
    single_time = used_memory = 0;

    // init *.in file path
    char buf[100] = {0};
    sprintf(buf, "%s/%s", folder_data.c_str(), dirent_data_in->d_name);
    path_file_in = std::string(buf);

    // init *.out file path 
    path_file_out = path_file_in.substr(0, path_file_in.length() - 3) + ".out";

    // init usr.out file path(in judge folder)
    path_file_usr = folder_judge + "usr.out";

    // runtime error.out
    path_file_error = folder_judge + "error.out";
    return true;
}
bool CJudgeBase::RunSolution(const char * RUN[])
{
    SetRunTimeEnvirement();
    execvp(RUN[0], (char * const * ) RUN);
    return true;
}
bool CJudgeBase::WacthSolution()
{
    int tempmemory;
    int status, sig, exitcode;
    struct user_regs_struct reg;
    struct rusage ruse;
    if(used_memory==0) 
    {
        used_memory= get_proc_status(child_pid, "VmRSS:") << 10;
    }
    while (1) 
    {
        wait4(child_pid, &status, 0, &ruse);
        if(is_java)
        {
            tempmemory = get_page_fault_mem(ruse, child_pid);
        }
        else
        {
            tempmemory = get_proc_status(child_pid, "VmPeak:") << 10;
        }
        if (tempmemory > used_memory)
        {
            used_memory = tempmemory;
        }
        if (used_memory > memory_limit * STD_MB) 
        {
            if (result == RT_AC)
                result = RT_MLE;
            ptrace(PTRACE_KILL, child_pid, NULL, NULL);
            break;
        }
        if (WIFEXITED(status))
            break;
        if (get_file_size(path_file_error.c_str())) 
        {
            result = RT_RE;
            ptrace(PTRACE_KILL, child_pid, NULL, NULL);
            break;
        }
        if (get_file_size(path_file_usr.c_str()) > get_file_size(path_file_out.c_str()) * 2 + 1024) {
            result = RT_OLE;
            ptrace(PTRACE_KILL, child_pid, NULL, NULL);
            break;
        }
        exitcode = WEXITSTATUS(status);
        if ((is_java && exitcode == 17) || exitcode == 0x05 || exitcode == 0)
            ;
        else
        {
            if (result == RT_AC) 
            {
                switch (exitcode) {
                case SIGCHLD:
                case SIGALRM:
                    alarm(0);
                case SIGKILL:
                case SIGXCPU:
                    result = RT_TLE;
                    break;
                case SIGXFSZ:
                    result = RT_OLE;
                    break;
                default:
                    result = RT_RE;
                }
                print_runtimeerror(strsignal(exitcode));
            }
            ptrace(PTRACE_KILL, child_pid, NULL, NULL);
            break;
        }
        if (WIFSIGNALED(status)) 
        {
            /*  WIFSIGNALED: if the process is terminated by signal
             *
             *  psignal(int sig, char *s)，like perror(char *s)，print out s, with error msg from system of sig  
             * sig = 5 means Trace/breakpoint trap
             * sig = 11 means Segmentation fault
             * sig = 25 means File size limit exceeded
             */
            sig = WTERMSIG(status);

            if (result == RT_AC) 
            {
                switch (sig) {
                case SIGCHLD:
                case SIGALRM:
                    alarm(0);
                case SIGKILL:
                case SIGXCPU:
                    result = RT_TLE;
                    break;
                case SIGXFSZ:
                    result = RT_OLE;
                    break;
                default:
                    result = RT_RE;
                }
                print_runtimeerror(strsignal(sig));
            }
            break;
        }
        ptrace(PTRACE_SYSCALL, child_pid, NULL, NULL);
    }
    single_time += (ruse.ru_utime.tv_sec * 1000 + ruse.ru_utime.tv_usec / 1000);
    single_time += (ruse.ru_stime.tv_sec * 1000 + ruse.ru_stime.tv_usec / 1000);
    used_time = std::max(used_time, single_time);
    return true;
}
void CJudgeBase::Delnextline(char s[]) 
{
    int L;
    L = strlen(s);
    while (L > 0 && (s[L - 1] == '\n' || s[L - 1] == '\r'))
        s[--L] = 0;
}
int CJudgeBase::Compare(std::string out, std::string usr)
{
    const char * file1 = out.c_str();
    const char * file2 = usr.c_str();
    FILE *f1,*f2;
    char *s1,*s2,*p1,*p2;
    s1=new char[STD_F_LIM+512];
    s2=new char[STD_F_LIM+512];
    if (!(f1=fopen(file1,"re")))
    return RT_AC;
    for (p1=s1;EOF!=fscanf(f1,"%s",p1);)
    while (*p1) p1++;
    fclose(f1);
    if (!(f2=fopen(file2,"re")))
    return RT_RE;
    for (p2=s2;EOF!=fscanf(f2,"%s",p2);)
    while (*p2) p2++;
    fclose(f2);
    if (strcmp(s1,s2)!=0) {
        delete[] s1;
        delete[] s2;
        return RT_WA;
    } 
    f1=fopen(file1,"re");
    f2=fopen(file2,"re");
    int PEflg=0;
    while (PEflg==0 && fgets(s1,STD_F_LIM,f1) && fgets(s2,STD_F_LIM,f2)) {
        Delnextline(s1);
        Delnextline(s2);
        if (strcmp(s1,s2)==0) continue;
        else PEflg=1;
    }
    delete [] s1;
    delete [] s2;
    fclose(f1);fclose(f2);
    if (PEflg) return RT_PE;
    return RT_AC;
}
bool CJudgeBase::JudgeSolution()
{
    if (result == RT_AC && used_time > time_limit * 1000)
        result = RT_TLE;
    if (used_memory > memory_limit * STD_MB)
        result = RT_MLE; 
    if (result == RT_AC) {
            result = Compare(path_file_out, path_file_usr);
    }
    // //jvm popup messages, if don't consider them will get miss-WrongAnswer
    // if (is_java) 
    // {
    //     comp_res = fix_java_mis_judge(folder_judge, ACflg, topmemory, mem_lmt);
    // }
    return true;
}
int CJudgeBase::get_proc_status(int pid, const char * mark) 
{
    FILE * pf;
    char fn[BUFFER_SIZE], buf[BUFFER_SIZE];
    int ret = 0;
    sprintf(fn, "/proc/%d/status", pid);
    pf = fopen(fn, "re");
    int m = strlen(mark);
    while (pf && fgets(buf, BUFFER_SIZE - 1, pf)) 
    {
        buf[strlen(buf) - 1] = 0;
        if (strncmp(buf, mark, m) == 0) 
        {
            sscanf(buf + m + 1, "%d", &ret);
        }
    }
    if (pf) fclose(pf);
    return ret;
}
int CJudgeBase::get_page_fault_mem(struct rusage & ruse, pid_t & pidApp) 
{
    //java use pagefault
    int m_vmpeak, m_vmdata, m_minflt;
    m_minflt = ruse.ru_minflt * getpagesize();
    return m_minflt;
}
void CJudgeBase::print_runtimeerror(char * err) 
{
    FILE *ferr = fopen(path_file_error.c_str(), "a+");
    fprintf(ferr, "Runtime Error:%s\n", err);
    fclose(ferr);
}