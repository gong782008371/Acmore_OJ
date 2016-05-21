#pragma once
#ifndef JUDGECPP_H_INCLUDE
#define JUDGECPP_H_INCLUDE

#include "judgeBase.h"
#include "mysqlOp.h"

class CJudgeGPP : public CJudgeBase
{
public:
    CJudgeGPP(std::string judge_root);
    ~CJudgeGPP();
    virtual bool Initialize(const Record& record);
    virtual bool Compile() ;
    virtual int Run() ;
};

#endif