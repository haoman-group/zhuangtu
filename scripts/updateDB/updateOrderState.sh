#!/bin/bash
#----------------------------------------------------
#    author : libing
#    crontab text : 
#----------------------------------------------------
DB_SOURCE_HOST=127.0.0.1
DB_USER='root'
DB_PASSWORD='123456'
DB_DATABASE='zhuangtu'
mysql -h$DB_SOURCE_HOST -u$DB_USER -p$DB_PASSWORD $DB_DATABASE -e"update zt_order set order_state=-1 where (unix_timestamp() > (addtime + 172800)) and order_state=10;"