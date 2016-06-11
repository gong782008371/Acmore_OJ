#pragma once
#ifndef MYSQLOP_H_INCLUDE
#define MYSQLOP_H_INCLUDE

#include <vector>
#include "common.h"
#include "mysqlConn.h"

#define SQL_BUF_SIZE 3000

class CMysqlOp
{
public:
    CMysqlOp();
    ~CMysqlOp();

    bool QueryUnjudgedSolutions(std::vector<Record>& vec);
    bool QuerySourceCodeByID(std::string& code, int solution_id);
    bool QueryRuntimeLimit(int &time_limit, int &memory_limit, int problem_id, bool isJava);

    bool InsertCompileInfo(int solution_id, const char * info);

    bool UpdateSolution(int result, int use_time, int use_mem, int solution_id);
    bool UpdateSolutionCodeLength(int code_length, int solution_id);

private:
    int ConvertCharsToInt(char* s);
private:
    CEncapMysql* conn;
};

#endif