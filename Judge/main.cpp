#include "classes/judge.h"
#include "classes/mysqlOp.h"
using namespace std;

CJudge* judge;
CMysqlOp* mysqlOp;
std::vector<Record> vec;

void Initialize()
{
    judge = new CJudge();
    mysqlOp = new CMysqlOp();
}

int main()
{
    Initialize();
    while(1)
    {
        if(!mysqlOp->QueryUnjudgedSolutions(vec))
        {
            cout << "query failed." << endl;
            sleep(5);
            continue;
        }
        for (int i = 0; i < vec.size(); i ++)
        {
            judge->RunJudge(vec[i]);
        }
        sleep(1);
    }
    return 0;
}
