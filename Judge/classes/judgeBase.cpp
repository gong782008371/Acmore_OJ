#include "judgeBase.h"
#include "trace.h"

void CJudgeBase::ClearFiles()
{
    char buf[100] = {0};
    sprintf(buf, "rm -f %s/*", data_path.c_str());
    system(buf);
}

bool CJudgeBase::InitializeFields(const Record& record, bool isJava)
{
    solution_id = record.solution_id;
    if (mysqlOp == NULL)
    {
        mysqlOp = new CMysqlOp();
    }
    if(!mysqlOp->QueryRuntimeLimit(time_limit, memory_limit, record.problem_id, isJava))
    {
        TRACE_WARN("can not find runtime limit with problem_id(%d) and isJava(%d)", record.problem_id, isJava);
        return false;
    }
    return true;
}

bool CJudgeBase::InitializeDataPath(int problem_id)
{
    char buf[200] = {0};
    sprintf(buf, "%s/%d", DATA_PATH, problem_id);
    data_path = std::string(buf);
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
    int fd = open( (judge_path + file_name).c_str(), O_WRONLY | O_CREAT, 0664);
    if(write(fd, code.c_str(), code.length()) < 0)
    {
        TRACE_WARN("write to file(%s) failed.", (judge_path + file_name).c_str());
        return false;
    }
    close(fd);
    return true;
}

bool CJudgeBase::SetCompileEnvirement(bool isJava)
{
    // cd judge path
     chdir(judge_path.c_str());

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
    if(isJava)
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

    freopen(ce_out_path.c_str(), "w", stderr);
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
    int fd = open( (judge_path + file_name).c_str(), O_RDONLY, 0664);
    if(read(fd, buf, sizeof(buf)) < 0)
    {
        TRACE_WARN("read ce.out to file(%s) failed.", (judge_path + file_name).c_str());
        return false;
    }
    close(fd);

    // save to mysql
    if(mysqlOp == NULL) {
        mysqlOp = new CMysqlOp();
    }
    // set solution result
    if (!mysqlOp->UpdateSolution(RT_CE, 0, 0, solution_id))
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