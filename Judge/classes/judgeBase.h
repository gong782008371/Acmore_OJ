#pragma once
#ifndef JUDGE_BASE_H_INCLUDE
#define JUDGE_BASE_H_INCLUDE

#include "common.h"
#include "mysqlOp.h"

#define STD_MB 1048576

class CJudgeBase {
public:
    CJudgeBase(){}
    ~CJudgeBase(){}
    virtual bool Initialize(const Record& record) = 0;
    virtual bool Compile() = 0;
    virtual int Run() = 0;
    
protected:
    void ClearFiles();
    bool InitializeFields(const Record& record, bool isJava);
    bool InitializeDataPath(int problem_id);
    long get_file_size(const char * filename) ;

    virtual bool GenerateMain(std::string file_name);
    virtual bool SetCompileEnvirement(bool isJava);
    virtual bool WhenCompileError();

protected:
    int solution_id;
    int time_limit;
    int memory_limit;
    std::string data_path;
    std::string judge_path;
    CMysqlOp* mysqlOp;

    std::string ce_out_path;
};

#endif