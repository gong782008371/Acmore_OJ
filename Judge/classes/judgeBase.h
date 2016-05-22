#pragma once
#ifndef JUDGE_BASE_H_INCLUDE
#define JUDGE_BASE_H_INCLUDE

#include "common.h"
#include "mysqlOp.h"

#define BUFFER_SIZE 512

#define STD_MB 1048576
#define STD_F_LIM (STD_MB << 5)

class CJudgeBase {
public:
    CJudgeBase(){}
    ~CJudgeBase(){}
    virtual bool Initialize(const Record& record) = 0;
    /*
    * return:
    *   RT_CE:  compile error
    *   0: pass compile
    *   -1: error
    */
    virtual int Compile() = 0;
    /*
    *return :
    *   RT_xxx: result
    *   -1: error
    */
    virtual int Run() = 0;
    
protected:
    void ClearFiles();
    bool InitializeFields(const Record& record, bool isJava);
    bool InitializeDataPath(int problem_id);
    long get_file_size(const char * filename) ;
    bool IsInFile(const char * filename);
    void Delnextline(char s[]);

    virtual bool Compile(const char * CP[]);
    virtual bool Run(const char * RUN[]);
    virtual bool RunCheck();
    virtual bool RunSolution(const char * RUN[]);
    virtual bool WacthSolution();
    virtual bool JudgeSolution();
    virtual bool GenerateMain(std::string file_name);
    virtual bool SetCompileEnvirement();
    virtual bool SetRunTimeEnvirement();
    virtual bool WhenCompileError();
    virtual int Compare(std::string out, std::string usr);

private:
    int get_proc_status(int pid, const char * mark) ;
    int get_page_fault_mem(struct rusage & ruse, pid_t & pidApp);
    void print_runtimeerror(char * err) ;
protected:
    bool is_java;

    int solution_id;
    int time_limit;
    int memory_limit;
    int result;
    int used_time;
    int used_memory;
    int single_time;

    std::string folder_data;
    std::string folder_judge;

    std::string path_file_ce;
    std::string path_file_in;
    std::string path_file_out;
    std::string path_file_usr;
    std::string path_file_error;

    int child_pid;

    DIR * dir_data;
    struct dirent* dirent_data_in;

    CMysqlOp* mysqlOp;
};

#endif