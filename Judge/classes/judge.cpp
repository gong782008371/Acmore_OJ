#include "judge.h"

#include "JudgeCPP.h"

int CJudge ::COUNT_JUDGE = 0;

CJudge::CJudge()
{
    run_id = ++ CJudge::COUNT_JUDGE;
}

int CJudge::RunJudge(const Record& record)
{
    int lang = record.language;
    //check object not null
    CheckJudge(lang);
    // initialize first
    judges[lang]->Initialize(record);
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
    case LG_CPP:
        judges[LG_CPP] = new CJudgeCPP();
        break;
    }
}