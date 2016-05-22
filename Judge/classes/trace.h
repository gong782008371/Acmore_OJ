#pragma once

#ifndef __COMMON_TRACE_H__
#define __COMMON_TRACE_H__

#include "common.h"

#ifdef DEBUG
#define console_msg(fmt, ...) do{printf(fmt, ##__VA_ARGS__);printf("\n");}while(0)
#else
#define console_msg(fmt, ...) do{}while(0)
#endif

#ifdef DEBUG
#define TRACE_WARN console_msg
#define TRACE_ERROR console_msg
#else
#define TRACE_WARN(fmt, ...) Warn_Log(fmt, ##__VA_ARGS__)
#define TRACE_ERROR(fmt, ...) Error_Log(fmt, ##__VA_ARGS__)
#endif

#define Warn_Log(fmt, args...) PrintWarnLog(__FILE__, __LINE__, __FUNCTION__, fmt, ##args)
#define Error_Log(fmt, args...) PrintErrorLog(__FILE__, __LINE__, __FUNCTION__, fmt, ##args)

#define PrintWarnLog(file_name, line_no, func, fmt, args...)                \
        do {                                                                \
            int fd = OpenLogFile(&warn_log_path);             \
            if (fd < 0)                                                     \
            {                                                               \
                err_quit("PrintWarnLog Error...Maybe sudo?");               \
                break;                                                      \
            }                                                               \
            PrintLog(fd, file_name, line_no, func, fmt, ##args);     \
        } while(0)
#define PrintErrorLog(file_name, line_no, func, fmt, args...)               \
        do {                                                                \
            int fd = OpenLogFile(&error_log_path);            \
            if (fd < 0)                                                     \
            {                                                               \
                err_quit("PrintErrorLog Error...Maybe sudo?");              \
                break;                                                      \
            }                                                               \
            PrintLog(fd, file_name, line_no, func, fmt, ##args);     \
        } while(0)

#define PATH_MAX_LENGTH 100
#define LOG_BUF_MAX 200

std::string* GetFileName(const struct tm* tm = NULL);
int OpenLogFile(const std::string* path, const std::string* filename = NULL);
void PrintLog(int fd, const char* file_name, int line_no, const char* func, const char* fmt, ...);

#endif // !__COMMON_TRACE_H__