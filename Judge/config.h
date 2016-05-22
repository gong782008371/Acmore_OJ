#pragma once

#ifndef CONFIG_H_INCLUDE
#define CONFIG_H_INCLUDE

#define RT_PD 0
#define RT_AC 1
#define RT_PE 2
#define RT_CE 3
#define RT_WA 4
#define RT_RE 5
#define RT_TLE 6
#define RT_MLE 7
#define RT_OLE 8

#define LG_GPP  1
#define LG_JAVA 2

#define MYSQL_IP                 "localhost"
#define MYSQL_USERNAME  "root"
#define MYSQL_PASSWORD  "000000"
#define MYSQL_DATABASE  "test"

#define JUDGE_ROOT 	"/home/judge"
#define FOLDER_DATA 	"/home/judge/data"
#define FOLDER_JUDGE 	"/home/judge/run"

#define THREAD_NUM 1

const std::string warn_log_path = "/home/judge/log/warn/";
const std::string error_log_path = "/home/judge/log/error/";

#endif
