#include "JudgeCPP.h"


void CJudgeCPP::Initialize(const Record& record)
{
	solution_id = record.solution_id;
	problem_id = record.problem_id;
	language = record.language;
}

bool CJudgeCPP::Compile() 
{
	return true;
}

int CJudgeCPP::Run() 
{
	return RT_AC;
}