# -*- coding:utf-8 -*- 
from elasticsearch import Elasticsearch
import sys
import MySQLdb
import getopt
import re

ELK_CONFIG = [{'host':'localhost', 'port':9200}]
DB_CONFIG = {
	'host': 'localhost',
	'port': 3306,
	'user': 'zhuangtu',
	'passwd': 'Zhuangtu332015',
	'db': 'zhuangtu',
	'charset': 'utf8'
}

PID_NAME_MAP = {
	#'20000' : '品牌',
    #'100' : '工种'
	'20819' : '形状',
	'9228691' : '工艺',
	'137398693' : '质保年限',
	'13381633' : '纹理特征',
	'122276315' : '款式',
	'29112' : '安装方式',
	'20021' : '材质',
	'21299' : '产地',
	'3862454' : '饰面材料',
	'20551' : '面料分类',
}

def findProp(pid, nokey_prop):
	if not nokey_prop:
		return None
	pattern = re.compile(r'i:%s;s:\d+:"(\d+)";'%pid)
	match = pattern.search(nokey_prop)
	if match:
		return match.group(1)
	return None

def findAttr(attr):
	if not attr:
		return ""
	pattern = re.compile(r'i:\d+;s:\d+:"(\D+)";')
	match = pattern.search(attr)
	if match:
		return match.group(1)
	return ""

if __name__ == '__main__':
	try:
		options, args = getopt.getopt(sys.argv[1:], 'u:', ['update-time=',])
	except Exception, e:
		print str(e)
		sys.exit()
	update_time = 0
	for name, value in options:
		if name in ('-u', '--update-time'):
			try:
				update_time = int(value)
			except Exception, e:
				print '''Please give a right update time'''
				print str(e)
				sys.exit()

	get_sql = '''
	select   zp.id,
             zp.uid,
             zp.cid,
             zp.vid,
             zp.title,
             zp.sell_points,
             zp.key_prop,
             zp.nokey_prop,
             zp.sale_prop,
             zp.custom_prop,
             zp.shopcode,
             zp.attribute,
             zp.number,
             zp.pay_mode,
             zp.charge_unit,
             zp.purchase_addr,
             zp.picture,
             zp.headpic,
             -- zp.show,
             zp.video,
             zp.cate_inshop,
             zp.addtime,
             zp.updatetime,
             zp.status,
             zp.listorder,
             zp.weight,
             zp.is_member_discount,
             zp.stock_type,
             zp.is_showcase,
             zp.isdelete,
             zp.expiry_date,
             zp.starttime_type,
             zp.starttime,
             zp.deletetime,
             zp.auditstatus,
             zp.ill_reason,
             zp.audittime,
             zp.auditid,
             zp.shopid,
             zp.proptype,
             zp.price_json,
             zp.min_price,
             zp.max_price,
             zp.activity,
             zp.inventory,
             zp.service_promise,
             zp.delivery,
             zp.setup,
             zp.showway,
             zp.idea,
             zp.attr_style,
             zp.attr_area,
             zp.attr_huxing,
             zp.attr_jubu,
             zp.attr_kongjian,
             zp.attr_code,
             zp.designer_qualification,
             zp.is_personal,
             zp.designer_name,
             zp.type,
             zp.service_added,
             zp.service_assurance,
             zp.pictype_effect,
             zp.pictype_cad,
             zp.is_home,
             zp.designtype,
             zp.price,
             zp.is_library,
             zp.audit,
             zp.shopin_category,
             zp.workername,
             zp.crafttype,
             zp.workyears,
             zp.hometown,
             zp.phone,
             zp.selfevalu,
             zp.case,
             zp.agreement,
             zp.details,
             -- zp.showecplay,
             zp.count_sold,
             zp.count_collected,
             zp.count_comment,
             zp.min_price_ori,
             zp.max_price_ori,
             zp.certification,
             zp.goodworker,
             zp.case_price,
             zp.case_name,
             zp.design_company,
             zp.single_effect,
             zp.solution,
             zp.age,
             zp.experience,
             zp.price_sys,
             zp.rank,
             zp.limitnum,
	zppv.vid as '20000',
	zppv.name as 'brand_name',
	zs.rank as shop_rank,
	zs.name as shop_name,
	zs.status as shop_status,
	(case when zo.shop_order_num is null then 0 else zo.shop_order_num end) as shop_order_num,
	(case when zo.shop_order_amount is null then 0 else zo.shop_order_amount end) as shop_order_amount,
	zs.friendship as shop_friendship,
	zs.POS as shop_POS,
	zsc.pid as shop_catid,
	case when zp.cid in (103,104,105,106,107,108,112,113,1121,1122,1123,1124,1125,1126)	then zp.cid
    	else NULL
    end as '100'
  from zt_product zp
  left join zt_product_property_value zppv on zp.vid = zppv.vid and zp.cid = zppv.cid and zppv.pid = 20000
  join zt_shop zs on zs.id = zp.shopid and zs.id != 1798
  join zt_shop_category zsc on zs.catid = zsc.id
  left join (select shop_id, count(*) as shop_order_num, sum(order_amount) as shop_order_amount
            from zt_order where order_state > 10 group by shop_id
  ) zo on zo.shop_id = zs.id
	'''
	if update_time > 0:
		get_sql += ''' where zp.updatetime >= UNIX_TIMESTAMP(NOW() - INTERVAL %d MINUTE)''' % update_time
	
	es = Elasticsearch(ELK_CONFIG)
	conn = MySQLdb.connect(**DB_CONFIG)
	curs = conn.cursor(MySQLdb.cursors.DictCursor)
	curs.execute(get_sql)
	results = curs.fetchall()
	curs.close()
	conn.close()
	for row in results:
		try:
			# build doc
			for propid in PID_NAME_MAP.keys():
				row[propid] = findProp(propid, row['nokey_prop'])
			row['design_style'] = findAttr(row['attr_style'])
			es.index(index='es-zhuangtu', doc_type='product', id=row['id'], body=row)
		except Exception, e:
			print str(e)
			print '''The below id can't be inserted into elasticsearch %s''' % row['id']
