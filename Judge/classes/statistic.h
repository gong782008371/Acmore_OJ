#pragma once
#ifndef STATISTIC_H_INCLUDE
#define STATISTIC_H_INCLUDE

#include "common.h"
#include "mysqlOp.h"

class CStatistic {
public:
    CStatistic();
    ~CStatistic();
    void Run();
private:
    void UpdateUser();
    void UpdateUser(std::string username);
    void UpdateProblem();
    void UpdateProblem(int pid);
private:
    CMysqlOp* mysqlOp;
};

#endif