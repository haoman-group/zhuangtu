#!/usr/bin/python
# -*- coding: utf-8 -*-

import argparse
import sys
import datetime
import os
import re
import urllib2
import MySQLdb
import subprocess

from config import DB_CONFIG


def removeDataFromDB(dbconfig, log_name):
    try:
        conn = MySQLdb.connect(**dbconfig)
        cur = conn.cursor(MySQLdb.cursors.SSCursor)
        sql = "delete from zt_searchkeys where log_file = \"%s\"" % log_name
        cur.execute(sql)
        conn.commit()
    except Exception, e:
        print e
    finally:
        cur.close()
        conn.close()


def loadDataIntoDB(dbconfig, result_path):
    try:
        conn = MySQLdb.connect(**dbconfig)
        cur = conn.cursor(MySQLdb.cursors.SSCursor)
        sql = 'load data local infile "%s" into table zt_searchkeys CHARACTER set "utf8" fields terminated by "," optionally enclosed by \'"\' lines terminated by \'\n\';' % result_path
        cur.execute(sql)
        conn.commit()
    except Exception, e:
        print e
    finally:
        cur.close()
        conn.close()


def extractSearchKey(log_path, log_name, result_path):
    tmp_folder = "/tmp/accesslog/"
    if not os.path.exists(tmp_folder):
        os.mkdir(tmp_folder)
    tmp_log_path = os.path.join(tmp_folder, log_name)
    subprocess.call(["cp", log_path, tmp_log_path])
    if log_name.endswith(".gz"):
        subprocess.call(["gunzip", tmp_log_path])
        tmp_log_path = tmp_log_path.strip(".gz")

    log_handler = open(tmp_log_path, 'rU')
    result_handler = open(result_path, 'w')
    line = log_handler.readline()
    # flush_count = 0
    while line:
        # if flush_count == 1000:
        #     result_handler.flush()
        #     flush_count = 0
        # else:
        #     flush_count += 1

        try:
            search = re.search(r'^(.*) - (.*?) \[(.*)\] "(.*?)" (\d+) (\d+) "(.*?)" "(.*?)" "(.*?)"', line)
            if search:
                remote_addr, remote_user, event_time, request, status, body_bytes_sent, http_referer, http_user_agent, http_x_forwarded_for = search.groups()

                d = datetime.datetime.strptime(event_time, "%d/%b/%Y:%H:%M:%S +0800")
                event_time = d.strftime("%Y-%m-%d %H:%M:%S")

                if request.count("searchkey") > 0:
                    sk = re.search(r'.*?searchkey[/|=](.*?)[\s|/|\.html]', request)
                    if sk:
                        search_keys_in_request = urllib2.unquote(sk.group(1))
                        while search_keys_in_request != urllib2.unquote(search_keys_in_request):
                            search_keys_in_request = urllib2.unquote(search_keys_in_request)
                        search_keys_in_request = search_keys_in_request.replace("+", " ")
                        search_keys_in_request = search_keys_in_request.strip("")
                        search_keys = search_keys_in_request.split()
                        for key in search_keys:
                            if key:
                                line = event_time + "," + str(key).decode('string_escape') + "," + log_name + "\n"
                                result_handler.write(line)
            else:
                if line.count("searchkey") > 0:
                    print line
        except Exception, e:
            print e
        line = log_handler.readline()
    result_handler.close()
    log_handler.close()
    os.remove(tmp_log_path)


def main():
    parser = argparse.ArgumentParser(description="Extract search key from access log")
    parser.add_argument("-f", "--file", help="file to be extracted")
    parser.add_argument("-d", "--db", choices=["remove", "reload"], help="remove the data or reload the data")
    args = parser.parse_args()

    log_path = args.file
    log_name = os.path.basename(log_path)
    result_path = os.path.join(os.path.dirname(os.path.abspath(__file__)), "results", "result_" + log_name[11:19:] + ".csv")

    if not os.path.exists("./results"):
        os.mkdir("./results")

    dbconfig = DB_CONFIG

    if args.db == "remove":
        removeDataFromDB(dbconfig, log_name)
    elif args.db == "reload":
        removeDataFromDB(dbconfig, log_name)
        loadDataIntoDB(dbconfig, result_path)
    else:
        extractSearchKey(log_path, log_name, result_path)
        loadDataIntoDB(dbconfig, result_path)


if __name__ == "__main__":
    main()
