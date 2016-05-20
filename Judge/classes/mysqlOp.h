#pragma once
#ifndef MYSQLOP_H_INCLUDE
#define MYSQLOP_H_INCLUDE

#include <vector>

#include "common.h"
#include "mysqlConn.h"

class CMysqlOp
{
public:
    CMysqlOp();
    ~CMysqlOp();

    bool QueryUnjudgedSolutions(std::vector<Record>& vec);

private:
    CEncapMysql* conn;
};

#endif