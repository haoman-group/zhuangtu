curl -XPUT http://localhost:9200/es-zhuangtu
curl -XPOST http://localhost:9200/es-zhuangtu/product/_mapping -d'
{
    "product": {
            "_all": {
            "index_analyzer": "ik",
            "search_analyzer": "ik_smart",
            "term_vector": "no",
            "store": "false"
        },
        "properties": {
            "title": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "shop_name": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "design_style": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            }
        }
    }
}'
