#include "trace.h"

std::string* GetFileName(const struct tm* curr_tm)
{
    time_t t = time(NULL);
    curr_tm = localtime(&t);
    if (curr_tm == NULL)
    {
        console_msg("GetFileName Error");
        return NULL;
    }
    char buf[PATH_MAX_LENGTH] = { 0 };
    snprintf(buf, PATH_MAX_LENGTH, "%04d-%02d-%02d.log", 
        curr_tm->tm_year + 1900, curr_tm->tm_mon + 1, curr_tm->tm_mday);
    return new std::string(buf);
}

int OpenLogFile(const std::string* path, const std::string* filename)
{
    if (filename == NULL)
    {
        filename = GetFileName();
        if (filename == NULL)
        {
            console_msg("OpenLogFile Error.");
            return -1;
        }
    }
    char buf[PATH_MAX_LENGTH] = {0};
    snprintf(buf, PATH_MAX_LENGTH, "%s%s", path->c_str(), filename->c_str());

    mode_t pre_mask = umask(0);
    int fd = open(buf, O_WRONLY | O_APPEND | O_CREAT, 0664);
    umask(pre_mask);
    return fd;
}

void PrintLog(int fd, const char* file_name, int line_no, const char* func, const char* fmt, ...)
{
    time_t t = time(NULL);
    struct tm * curr_tm = localtime(&t);

    size_t wlen = 0;
    char* log_buf = new char[LOG_BUF_MAX];

    wlen += snprintf(log_buf + wlen, LOG_BUF_MAX - wlen,
        "%04d-%02d-%02d %02d:%02d:%02d|%s|%d|%s|",
        curr_tm->tm_year + 1900, curr_tm->tm_mon, curr_tm->tm_mday,
        curr_tm->tm_hour, curr_tm->tm_min, curr_tm->tm_sec,
        file_name, line_no, func);

    va_list ap;
    va_start(ap, fmt);
    wlen += vsnprintf(log_buf + wlen, LOG_BUF_MAX - wlen, fmt, ap);
    va_end(ap);

    wlen = std::min((int)wlen, LOG_BUF_MAX - 1);
    log_buf[wlen++] = '\n';

    int ret = -1;
    if ( (ret = write(fd, log_buf, wlen)) < 0)
    {
        console_msg("%s", log_buf);
    }

    delete log_buf;
    close(fd);
}
