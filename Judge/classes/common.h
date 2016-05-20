#pragma once
#ifndef COMMON_H_INCLUDE
#define COMMON_H_INCLUDE

#include <map>
#include <vector>
#include <string>
#include <iostream>

#include <time.h>
#include <ctype.h>
#include <stdio.h>
#include <unistd.h>
#include <assert.h>
#include <stdlib.h>
#include <string.h>
#include <dirent.h>
#include <unistd.h>
#include <stdarg.h>

#include <sys/wait.h>
#include <sys/stat.h>
#include <sys/user.h>
#include <sys/time.h>
#include <sys/types.h>
#include <sys/signal.h>
#include <sys/ptrace.h>
#include <mysql/mysql.h>
#include <sys/syscall.h>
#include <sys/resource.h>

#include "../config.h"

struct Record
{
    int solution_id;
    int problem_id;
    int language;
    Record(int s_id=0, int p_id=0, int lang=0):
        solution_id(s_id), problem_id(p_id), language(lang){}
};

#endif