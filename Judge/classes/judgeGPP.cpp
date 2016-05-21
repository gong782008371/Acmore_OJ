#include "judgeGPP.h"
#include "trace.h"

CJudgeGPP::CJudgeGPP(std::string judge_root)
{
    judge_path = judge_root;
    ce_out_path = judge_path + "ce.out";
}
CJudgeGPP::~CJudgeGPP()
{
    ClearFiles();
}

bool CJudgeGPP::Initialize(const Record& record)
{
    // initial required fields
    if (!InitializeFields(record, false))
    {
        TRACE_WARN("initial fields failed!\n");
        return false;
    }
    // initial data path
    if (!InitializeDataPath(record.problem_id))
    {
        TRACE_WARN("initial data path failed!\n");
        return false;
    }
    // clear all file in judge path
    if (!GenerateMain("Main.cpp"))
    {
        TRACE_WARN("Generate Main.cpp failed!\n");
        return false;
    }
    return true;
}

bool CJudgeGPP::Compile() 
{
    //g++ Main.cpp -o Main -fno-asm -Wall -lm --static -std=c++0x -DONLINE_JUDGE
    const char * CP[] = { "g++", "Main.cpp", "-o", "Main", "-fno-asm", "-Wall",
            "-lm", "--static", "-std=c++0x", "-DONLINE_JUDGE", NULL };
    int pid = fork();
    if(pid == 0)
    {
        SetCompileEnvirement(false);
        execvp(CP[0], (char * const *) CP);
        exit(0);
    }
    else
    {
        int status = 0;
        waitpid(pid, &status, 0);
        status = get_file_size(ce_out_path.c_str());
        if(status)
        {
            //console_msg("compile error with solution_id(%d)", solution_id);
            WhenCompileError();
        }
        return status == 0;
    }
    return true;
}

int CJudgeGPP::Run() 
{
    return RT_AC;
}

