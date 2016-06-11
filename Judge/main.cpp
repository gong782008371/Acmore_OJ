#include "classes/trace.h"
#include "classes/judge.h"
#include "classes/mysqlOp.h"
#include "classes/statistic.h"
using namespace std;

CMysqlOp* mysqlOp;
std::queue<Record> queue_judge;
std::map<int, bool> judge_map;
pthread_mutex_t queue_lock;
pthread_t threads[THREAD_NUM], statisticThread;

void Initialize()
{
    mysqlOp = new CMysqlOp();
    judge_map.clear();
    pthread_mutex_init(&queue_lock, NULL);
}

void* JudgeThread(void *)
{
    CJudge* judge = new CJudge();
    while(1)
    {
        // lock queue before use
        pthread_mutex_lock(&queue_lock);
        if(!queue_judge.empty())
        {
            Record record = queue_judge.front();
            queue_judge.pop();
            // unlock queue before Judge
            pthread_mutex_unlock(&queue_lock);
            // begin judge
            judge->RunJudge(record);
        }
        else 
        {
            // do not forget unlock
            pthread_mutex_unlock(&queue_lock);
        }
        // let other thread judge
        sleep(1);
    }
}

void* StatisticThread(void *)
{
    CStatistic* cs = new CStatistic();
    while(1)
    {
        fflush(stdout);
        cs->Run();
        sleep(1);
    }
}

int main()
{
    // initialize var
    Initialize();

    // start judge threads
    for (int i = 0; i < THREAD_NUM; i ++)
    {
        pthread_create(&threads[i], NULL, JudgeThread, NULL);
    }

    pthread_create(&statisticThread, NULL, StatisticThread, NULL);

    std::vector<Record> vec;
    while(1)
    {
        // query solution need judge from mysql
        if(!mysqlOp->QueryUnjudgedSolutions(vec))
        {
            TRACE_WARN("query unjudged solutions failed.");
            sleep(5);
            continue;
        }
        // add into judge queue
        for (int i = 0; i < vec.size(); i ++)
        {
            pthread_mutex_lock(&queue_lock);
            if(!judge_map[vec[i].solution_id])
            {
                queue_judge.push(vec[i]);
                judge_map[vec[i].solution_id] = true;
            }
            pthread_mutex_unlock(&queue_lock);
        }
        sleep(1);
    }
    return 0;
}
