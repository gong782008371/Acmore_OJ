#pragma once
#ifndef JUDGE_BASE_H_INCLUDE
#define JUDGE_BASE_H_INCLUDE

#include "common.h"

class CJudgeBase {
public:
    virtual void Initialize(const Record& record) = 0;
    virtual bool Compile() = 0;
    virtual int Run() = 0;
protected:
    int solution_id;
    int problem_id;
    int language;
};

#endif