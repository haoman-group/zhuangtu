#searchkey extract

1. copy log to /tmp/accesslog/
2. gunzip the log
3. extract key into results/result_xxx
4. load into database

## cron job
0 8 * * * cd /export/data/www/zhuangtu/scripts/searchkey_extract && find /var/log/nginx -name "access.log*.gz" -ctime 0 | xargs python searchkey_extract.py -f >> log 2>&1

