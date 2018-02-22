# -*- coding:utf-8 -*-
import sys
import MySQLdb
import argparse
import re

DB_CONFIG = {
	'host': 'localhost',
	'port': 3306,
	'user': 'zhuangtu',
	'passwd': 'Zhuangtu332015',
	'db': 'zhuangtu',
	'charset': 'utf8'
}
EXTENSIONS = [u"装途店", u"工长", u"沙发", u"木业", u"卫浴", u"窗帘", u"地板", u"定制", u"安装", u"拆除",
			u"装途专营店", u"家居", u"家具", u"家俱", u"门窗", u"设计工作室", u"灯饰", u"浴房",
			u"陶瓷", u"瓷砖", u"装饰", u"门业", u"照明", u"厨电", u"家私", u"木工",
			u"油工", u"水电", u"水工", u"电工", u"设计", u"设计工作室", u"工作室", u"设计事务所"]
ZHUANGTU_DIC = "./ik-config/custom/zhuangtu.dic"


def update_shopname(newshopnames):
	shopnames = []
	with open(ZHUANGTU_DIC, 'rU') as fh:
		for name in fh.readlines():
			shopnames.append(name.strip().decode("utf-8"))
	for name in newshopnames:
		tmp = []
		tmp.append(name.strip())
		for extension in EXTENSIONS:
			tmp.append(remove_extension(name, extension))
		shopnames += list(set(tmp))
	# remove duplicated names and write them back to zhuangtu.dic
	print len(shopnames)
	shopnames = list(set(shopnames))
	print len(shopnames)
	shopnames = sorted(shopnames)
	with open(ZHUANGTU_DIC, 'w') as fh:
		for name in shopnames:
			fh.write(name)
			fh.write("\n")


def remove_extension(name, extension):
	if name.endswith(extension):
		return name.replace(extension, "").strip().decode("utf-8")
	else:
		return name.strip().decode("utf-8")


def get_shops():
	shops = []
	sql = '''
		select username, name from zt_shop
		where status = 1 and isdelete = 0
	'''
	try:
		conn = MySQLdb.connect(**DB_CONFIG)
	except Exception, e:
		print "Connection to db failed"
		return ""
	cur = conn.cursor(MySQLdb.cursors.DictCursor)
	cur.execute(sql)
	results = cur.fetchall()
	for result in results:
		# if username is phone number, use the "name"
		if re.match("^\d*$", result["username"]):
			if result["name"]:
				tmp = result["name"]
			else:
				continue
		else:
			tmp = result["username"]
		shops.append(tmp)
	return shops


def main():
	reload(sys)
	sys.setdefaultencoding('utf-8')
	parser = argparse.ArgumentParser(description="Update latest shop names into zhuangtu.dic")
	args = parser.parse_args()
	shops = get_shops()
	update_shopname([shop for shop in shops])


if __name__ == '__main__':
	main()
