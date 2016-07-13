#include "judgeC.h"
#include "trace.h"

CJudgeC::CJudgeC(std::string judge_root)
{
    folder_judge = judge_root;
    path_file_ce = folder_judge + "ce.out";
}
CJudgeC::~CJudgeC()
{
    ClearFiles();
}

bool CJudgeC::Initialize(const Record& record)
{
    ClearFiles();
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
    if (!GenerateMain("Main.c"))
    {
        TRACE_WARN("Generate Main.cpp failed!\n");
        return false;
    }
    return true;
}

int CJudgeC::Compile() 
{
    //g++ Main.cpp -o Main -fno-asm -Wall -lm --static -std=c++0x -DONLINE_JUDGE
    const char * CP[] = { "gcc", "Main.c", "-o", "Main", "-fno-asm",
			"-lm", "--static", "-std=c99", "-DONLINE_JUDGE", NULL };
    if (!CJudgeBase::Compile(CP))
    {
        TRACE_WARN("an error when compile.");
        return -1;
    }
    return result;
}

int CJudgeC::Run()
{
    const char * RUN[] = {"./Main", "./Main", NULL};
    if(!CJudgeBase::Run(RUN))
    {
        return -1;
    }
    return result;
}

