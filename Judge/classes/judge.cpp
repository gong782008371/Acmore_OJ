#include "judge.h"

#include "judgeGPP.h"

int CJudge ::COUNT_JUDGE = 0;

CJudge::CJudge()
{
    char path[100] = {0};
    sprintf(path, "%s%d/", JUDGE_PATH, ++ CJudge::COUNT_JUDGE);
    judge_root = std::string(path);
}

int CJudge::RunJudge(const Record& record)
{
    int lang = record.language;
    //check object not null
    CheckJudge(lang);
    // initialize first
    if (ERROR == judges[lang]->Initialize(record))
    {
        return ERROR;
    }
    // begin compile
    if(!judges[lang]->Compile())
    {
        return RT_CE;
    }
    // begin run
    return !judges[lang]->Run();
}

void CJudge::CheckJudge(int language) {
    if(judges[language] != NULL) 
    {
        return ;
    }
    switch (language) {
    case LG_GPP:
        judges[LG_GPP] = new CJudgeGPP(judge_root);
        break;
    }
}