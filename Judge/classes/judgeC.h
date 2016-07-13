#pragma once
#ifndef JUDGEC_H_INCLUDE
#define JUDGEC_H_INCLUDE

#include "judgeBase.h"
#include "mysqlOp.h"

class CJudgeC : public CJudgeBase
{
public:
    CJudgeC(std::string judge_root);
    ~CJudgeC();
    virtual bool Initialize(const Record& record);
    virtual int Compile() ;
    virtual int Run() ;
};

#endif
