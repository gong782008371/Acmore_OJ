#include "statistic.h"
#include "trace.h"

CStatistic::CStatistic() {
    this->mysqlOp = new CMysqlOp();
}

CStatistic::~CStatistic() 
{
}

void CStatistic::Run()
{
    this->UpdateUser();
    this->UpdateProblem();
}

void CStatistic::UpdateUser()
{
    std::vector<std::string> usernames;
    mysqlOp->QueryAllUser(usernames);

    for (int i = 0; i < usernames.size(); i ++) 
    {
        UpdateUser(usernames[i]);
    }
}

void CStatistic::UpdateUser(std::string username)
{
    int solved = 0, submit = 0;
    mysqlOp->QuerySolvedAndSubmitOfUser(solved, submit, username);
    mysqlOp->UpdateSolvedAndSubmitOfUser(solved, submit, username);
}

void CStatistic::UpdateProblem()
{
    std::vector<int> problems;
    mysqlOp->QueryAllProblem(problems);

    for (int i = 0; i < problems.size(); i ++) 
    {
        UpdateProblem(problems[i]);
    }
}

void CStatistic::UpdateProblem(int pid)
{
    int total_submit = 0, accept_submit = 0;
    mysqlOp->QueryAcceptAndSubmitOfProblem(accept_submit, total_submit, pid);
    mysqlOp->UpdateAcceptAndSubmitOfProblem(accept_submit, total_submit, pid);
}