# How to start elasticsearch service

```
sudo docker run -v /export/data/www/elasticsearch-data:/usr/share/elasticsearch/data -v /export/data/www/zhuangtu/scripts/elasticsearch/ik-config/:/usr/share/elasticsearch/config/ik/ -p 9200:9200 yfzhang/elasticsearch-ik
```

# build product index
```
sh init_elk.sh
python build_index.py
```

# update product index : add a crond job
```
*/30 * * * * /usr/bin/python /export/data/www/zhuangtu/scripts/elasticsearch/build_index.py
```

# update new shop names into customized elasticsearch dictionary (ik-config/custom/zhuangtu.dic)
```
python update_dic.py
```