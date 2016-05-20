#include "mysqlOp.h"

CMysqlOp::CMysqlOp()
{
    conn = new CEncapMysql();
    conn->Connect(MYSQL_IP, MYSQL_USERNAME, MYSQL_PASSWORD);
}
CMysqlOp::~CMysqlOp()
{
    conn->CloseConnect();
}

 bool CMysqlOp::QueryUnjudgedSolutions(std::vector<Record>& vec)
 {
    vec.clear();
    return true;
 }