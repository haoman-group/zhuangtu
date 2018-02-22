# -*- coding:utf-8 -*- 

import os
import sys
import getopt
import xlrd
import types

if __name__ == "__main__":
	try:
		options, args = getopt.getopt(sys.argv[1:], 'f:', ['file=',])
	except Exception, e:
		print str(e)
		sys.exit()
	excel_file = ''
	for name, value in options:
		if name in ('-f', '--file'):
			excel_file = value

	if not os.path.isfile(excel_file):
		print '''Please provide a valid file name'''
		sys.exit()
	
	accessory_type = {}
	accessory_type_id = 0
	accessory_norm = {}
	accessory_norm_id = 0
	accessory_brand = {}
	accessory_brand_id = 0
	accessory = {}
	accessory_id = 0
	workbook = xlrd.open_workbook(excel_file)
	change_type = lambda item: (type(item) is types.UnicodeType) and item.encode(encoding='utf8').replace('"', '\\"') or str(item).replace('"', '\\"')

	for sheet_name in workbook.sheet_names():
		sheet = workbook.sheet_by_name(sheet_name)
		for row_idx in range(1, sheet.nrows):
			items = sheet.row_values(row_idx)
			category = change_type(items[0])
			picture = os.path.join('/d/file/accessory/', change_type(items[1]).replace('\\', '/'))
			accessory_type_name = change_type(items[2])
			accessory_name = change_type(items[3])
			accessory_type_brand = change_type(items[4])
			accessory_type_norm = change_type(items[5])
			unit_name = change_type(items[6])
			unit_price = change_type(items[7])
			
			# 设置accessory type
			accessory_type.setdefault(category, {})
			accessory_type[category].setdefault(accessory_type_name, 0)
			if accessory_type[category][accessory_type_name] == 0:
				accessory_type_id += 1
				accessory_type[category][accessory_type_name] = accessory_type_id
			
			current_type_id = accessory_type[category][accessory_type_name]
			# 设置accessory type brand
			accessory_brand.setdefault(current_type_id, {})
			accessory_brand[current_type_id].setdefault(accessory_type_brand, 0)
			if accessory_brand[current_type_id][accessory_type_brand] == 0:
				accessory_brand_id += 1
				accessory_brand[current_type_id][accessory_type_brand] = accessory_brand_id

			# 设置accessory type norm 
			accessory_norm.setdefault(current_type_id, {})
			accessory_norm[current_type_id].setdefault(accessory_type_norm, 0)
			if accessory_norm[current_type_id][accessory_type_norm] == 0:
				accessory_norm_id += 1
				accessory_norm[current_type_id][accessory_type_norm] = accessory_norm_id


			# 设置 accessory
			current_brand_id = accessory_brand[current_type_id][accessory_type_brand]
			current_norm_id = accessory_norm[current_type_id][accessory_type_norm]
			accessory.setdefault(current_type_id, {})
			accessory[current_type_id].setdefault(accessory_name, {})
			accessory[current_type_id][accessory_name].setdefault(current_brand_id, {})
			accessory[current_type_id][accessory_name][current_brand_id].setdefault(current_norm_id, {'id':0})
			if accessory[current_type_id][accessory_name][current_brand_id][current_norm_id]['id'] == 0:
				accessory_id += 1
				accessory[current_type_id][accessory_name][current_brand_id][current_norm_id]['id'] = accessory_id
				accessory[current_type_id][accessory_name][current_brand_id][current_norm_id]['unit_name'] = unit_name 
				accessory[current_type_id][accessory_name][current_brand_id][current_norm_id]['unit_price'] = unit_price 
				accessory[current_type_id][accessory_name][current_brand_id][current_norm_id]['picture'] = picture 


	# 输出insert sql语句
	fh = open('insert.sql', 'w')
	# zt_accessory_type
	insert_terms = []
	for o_category in accessory_type.keys():
		for o_accessory_type in accessory_type[o_category].keys():
			insert_terms.append('(%s, "%s", "%s")' % (accessory_type[o_category][o_accessory_type], o_accessory_type, o_category))

	fh.write(''' insert into zt_accessory_type (id, `name`, category) values \n''')
	fh.write(',\n'.join(insert_terms))
	fh.write(';\n\n')

	# zt_accessory_brand
	insert_terms = []
	for o_type in accessory_brand.keys():
		for o_brand in accessory_brand[o_type].keys():
			insert_terms.append('(%d, "%s", %d)' % (accessory_brand[o_type][o_brand], o_brand, o_type))
	
	fh.write(''' insert into zt_accessory_brand (id, `name`, accessory_type) values \n''')
	fh.write(',\n'.join(insert_terms))
	fh.write(';\n\n')

	# zt_accessory_norm
	insert_terms = []
	for o_type in accessory_norm.keys():
		for o_norm in accessory_norm[o_type].keys():
			insert_terms.append('(%d, "%s", %d)' % (accessory_norm[o_type][o_norm], o_norm, o_type))
	
	fh.write(''' insert into zt_accessory_norm (id, `name`, accessory_type) values \n''')
	fh.write(',\n'.join(insert_terms))
	fh.write(';\n\n')
		
	
	# zt_accessory
	insert_terms = []
	for o_type in accessory.keys():
		for o_name in accessory[o_type].keys():
			for o_brand in accessory[o_type][o_name].keys():
				for o_norm in accessory[o_type][o_name][o_brand].keys():
					o_accessory = accessory[o_type][o_name][o_brand][o_norm]
					insert_terms.append('(%d, "%s", %d, %d, %d, "%s", %s, "%s")' % (o_accessory['id'], o_name, o_brand, o_norm, o_type, o_accessory['unit_name'], o_accessory['unit_price'], o_accessory['picture']))

	fh.write(''' insert into zt_accessory (id, `name`, brand_id, norm_id, accessory_type, unit_name, unit_price, picture) values \n''')
	fh.write(',\n'.join(insert_terms))
	fh.write(';\n\n')

	fh.close()
