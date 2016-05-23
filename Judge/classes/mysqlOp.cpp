#include "mysqlOp.h"
#include "trace.h"

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
    const char sql[] = {" SELECT solution_id, problem_id, language FROM test.solution WHERE result = 0 ORDER BY solution_id "};
    conn->SelectQuery(sql);
    while(char** r = conn->FetchRow())
    {
        int s_id = ConvertCharsToInt(r[0]);
        int p_id = ConvertCharsToInt(r[1]);
        int lang = ConvertCharsToInt(r[2]);
        if(s_id == ERROR|| p_id == ERROR || lang == ERROR)
        {
            return false;
        }
        Record re(s_id, p_id, lang);
        vec.push_back(re);
    }
    return true;
 }

bool CMysqlOp::QuerySourceCodeByID(std::string& code, int solution_id)
{
    code = "";
    char sql[SQL_BUF_SIZE] = {0};
    sprintf(sql, " SELECT source FROM test.source_code WHERE solution_id = %d", solution_id);
    conn->SelectQuery(sql);
    if(char** r = conn->FetchRow())
    {
        code = std::string(r[0]);
        return true;
    }
    return false;
}

bool CMysqlOp::QueryRuntimeLimit(int &time_limit, int &memory_limit, int problem_id, bool isJava)
{
    char sql[SQL_BUF_SIZE] = {0};
    if(isJava)
    {
        sprintf(sql, "SELECT java_time, java_mem FROM test.problems WHERE problem_id=%d", problem_id);
    }
    else
    {
        sprintf(sql, "SELECT other_time, other_mem FROM test.problems WHERE problem_id=%d", problem_id);
    }
    conn->SelectQuery(sql);
    if(char** r = conn->FetchRow())
    {
        int time_lim = ConvertCharsToInt(r[0]);
        int memory_lim = ConvertCharsToInt(r[1]);
        if(time_lim == ERROR || memory_lim == ERROR)
        {
            return false;
        }
        time_limit = time_lim;
        memory_limit = memory_lim;
        return true;
    }
    return false;
}

bool CMysqlOp::InsertCompileInfo(int solution_id, const char * info)
{
    char sql[SQL_BUF_SIZE];
    sprintf(sql, "INSERT INTO test.compile_info(solution_id, error) VALUE(%d, '%s')", 
        solution_id, info);
    if (conn->ModifyQuery(sql) < 0)
    {
        return false;
    }
    return true;
}

bool CMysqlOp::UpdateSolution(int result, int use_time, int use_mem, int solution_id)
{
    char sql[SQL_BUF_SIZE];
    sprintf(sql, "UPDATE test.solution SET time=%d, memory=%d, result=%d WHERE solution_id=%d", 
        use_time, use_mem, result, solution_id);
    if (conn->ModifyQuery(sql) < 0)
    {
        return false;
    }
    return true;
}

int CMysqlOp::ConvertCharsToInt(char* s)
{
    int ret = 0;
     try
     {
        sscanf(s, "%d", &ret);
     }
     catch(std::exception & ex)
     {
        return ERROR;
     }
     return ret;
}