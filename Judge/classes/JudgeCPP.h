#pragma once
#ifndef JUDGECPP_H_INCLUDE
#define JUDGECPP_H_INCLUDE

#include "JudgeBase.h"

class CJudgeCPP : public CJudgeBase
{
public:
    virtual void Initialize(const Record& record);
    virtual bool Compile() ;
    virtual int Run() ;
};

#endif