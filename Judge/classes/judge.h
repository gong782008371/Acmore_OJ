#pragma once
#ifndef JUDGE_H_INCLUDED
#define JUDGE_H_INCLUDED

#include "common.h"
#include "JudgeBase.h"

class CJudge {
public:
    CJudge();
    ~CJudge();
    int RunJudge(const Record& record);
private:
    void CheckJudge(int language);
public:
    static int COUNT_JUDGE;
private:
    int run_id;
    std::map<int, CJudgeBase*> judges;
};

#endif // JUDGE_H_INCLUDED
