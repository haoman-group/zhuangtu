<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 5/30/16
 * Time: 11:03
 */

namespace Libs\Util;

use Elasticsearch\ClientBuilder;

class ProductSearch {
    static $PidNameMap = [
        '20819' => ['name' => '形状', 'count' => 6, 'min' => 3],
        '9228691' => ['name' => '工艺', 'count' => 6, 'min' => 3],
        '137398693' => ['name' => '质保年限', 'count' => 6, 'min' => 3],
        '13381633' => ['name' => '纹理特征', 'count' => 6, 'min' => 3],
        '122276315' => ['name' => '款式', 'count' => 6, 'min' => 3],
        '29112' => ['name' => '安装方式', 'count' => 6, 'min' => 3],
        '20021' => ['name' => '材质', 'count' => 6, 'min' => 3],
        '21299' => ['name' => '产地', 'count' => 6, 'min' => 3],
        '3862454' => ['name' => '饰面材料', 'count' => 6, 'min' => 3],
        '20551' => ['name' => '面料分类', 'count' => 6, 'min' => 3],
        '20000' => ['name' => '品牌', 'count' => 12, 'min' => 3],
        '100' => ['name' => '工种', 'count' => 8, 'min' => 3],
        'design_style' => ['name'=> '设计风格', 'count' => 10, 'min' => 2],
        'workyears' => ['name'=> '工龄', 'count' => 6, 'min' => 2]
    ];

    /*
     * 以下这段代码需要优化，由于电视柜的分词包含电视，因此搜索电视时电视柜有时score会比较靠前，特此硬编码做处理
     */
    private function changeSearchParams($search_key, &$search_params) {
        if ($search_key == "电视"){
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'must' => [
                        'term' => ['title' => $search_key]
                    ],
                    'must_not' => [
                        ['term' => ['title' => '电视墙']],
                        ['term' => ['title' => '电视柜']],
                        ['term' => ['title' => '组合柜']],
                        ['term' => ['title' => '插座']],
                        ['term' => ['title' => '背景墙']],
                        ['term' => ['title' => '墙纸']],
                        ['term' => ['title' => '家具']],
                        ['term' => ['title' => '音响']],
                    ],
                ]
            ];
        } else if($search_key == "工人") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => $search_key]],
                        ['term' => ['title' => '水电']],
                        ['term' => ['title' => '电工']],
                        ['term' => ['title' => '瓦工']],
                        ['term' => ['title' => '木工']],
                        ['term' => ['title' => '油工']],
                        ['term' => ['title' => '工长']],
                        ['term' => ['title' => '装修队']],
                    ],
                    'must_not' => [
                        ['term' => ['title' => '插座']],
                        ['term' => ['title' => '木工板']],
                    ]
                ]
            ];
        } else if ($search_key == "门") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => '门']],
                    ],
                    'must_not' => [
                        ['term' => ['title' => '门锁']],
                        ['term' => ['title' => '柜']],
                        ['term' => ['title' => '冰箱']],
                        ['term' => ['title' => '衣帽钩']],
                        ['term' => ['title' => '临门']],
                        ['term' => ['title' => '连接件']],
                        ['term' => ['title' => '合页']],
                        ['term' => ['title' => '海尔']],
                        ['term' => ['title' => '上门']],
                    ]
                ]
            ];
        } else if ($search_key == "卫浴"
//            || $search_key == "地砖"
//            || $search_key == "衣柜" || $search_key == "开关"
//            || $search_key == "窗帘" || $search_key == "茶几" || $search_key == "餐桌"
//            || $search_key == "餐椅" || $search_key == "床垫" ||$search_key =="儿童床"
//            || $search_key == "书柜"
//            || $search_key == "学习桌"
            ) {
            $search_params['body']['sort'][0]['_score']['order'] = 'asc';
        } else if ($search_key == "设计师") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        'term' => ['title' => $search_key]
                    ],
                    'must_not' => [
                        ['term' => ['title' => '沙发']],
                        ['term' => ['title' => '壁纸']],
                    ]
                ]
            ];
        } else if ($search_key == "装修队") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        'term' => ['title' => '工长'],
                    ],
                    'must' => [
                        ['term' => ['title' => '装修']],
                        ['term' => ['title' => '队']],
                    ]
                ]
            ];
        } else if ($search_key == "壁纸") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => $search_key]],
                        ['term' => ['title' => "墙纸"]],
                        ['term' => ['shop_name' => $search_key]],
                        ['term' => ['shop_name' => "墙纸"]]
                    ]
                ]
            ];
        } else if ($search_key == "床") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => $search_key]]
                    ],
                    'must_not' => [
                        ['term' => ['title' => "灯"]]
                    ]
                ]
            ];
        } else if ($search_key == "瓷砖") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => $search_key]],
                        ['term' => ['title' => "磁砖"]],
                        ['term' => ['shop_name' => $search_key]],
                        ['term' => ['shop_name' => "磁砖"]],
                    ]
                ]
            ];
        } else if ($search_key == "电磁炉") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        'term' => ['title' => $search_key]
                    ],
                    'must_not' => [
                        ['term' => ['title' => '锅']],
                        ['term' => ['title' => '水壶']],
                    ]
                ]
            ];
        } else if ($search_key == "水龙头") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        'term' => ['title' => $search_key]
                    ],
                    'must_not' => [
                        ['term' => ['title' => '过滤']],
                        ['term' => ['title' => '滤水']],
                        ['term' => ['title' => '纯水机']],
                        ['term' => ['title' => '净水机']],
                        ['term' => ['title' => '直饮机']],
                    ]
                ]
            ];
        } else if (strpos($search_key, "过滤器") or strpos($search_key, "软水机") or strpos($search_key, "净水机")) {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => "过滤器"]],
                        ['term' => ['title' => "净水机"]],
                        ['term' => ['title' => "软水机"]],
                    ]
                ]
            ];
        } else if ($search_key == "鞋柜把手") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'must' => [
                        ['term' => ['title' => "鞋柜"]],
                        ['term' => ['title' => "把手"]],
                    ],
                    'must_not' => [
                        ['term' => ['title' => "水龙头"]],
                    ]
                ]
            ];
        } else if ($search_key == "被套") {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => $search_key]],
                        ['term' => ['shop_name' => $search_key]],
                    ],
                    'must_not' => [
                        ['term' => ['title' => "洗衣机"]],
                        ['term' => ['shop_name' => "洗衣机"]],
                    ]
                ]
            ];
        } else if (strpos($search_key, "工人") !== false or strpos($search_key, "木工") !== false) {
            $search_params['body']['query']['function_score']['query']['filtered']['query'] = [
                'bool' => [
                    'should' => [
                        ['term' => ['title' => $search_key]],
                        ['term' => ['shop_name' => $search_key]],
                    ],
                    'must_not' => [
                        ['term' => ['title' => "门"]],
                        ['term' => ['shop_name' => "门"]],
                        ['term' => ['title' => "酒柜"]],
                        ['term' => ['title' => "工业"]],
                        ['term' => ['title' => "床头"]],
                    ]
                ]
            ];
        }
    }
    /*
     * 结束hardcode
     */

    public function search($search_key, $search_filter, $page_num, $page_size) {
        $search_key = trim($search_key);
        $search_result = array();
        $search_result['recommends'] = array();
        $search_result['count'] = -1;
        try{
            $es_client = ClientBuilder::create()
                ->setHosts(C('ELK_HOSTS'))
                ->build();
            $from = ($page_num - 1) * $page_size;
            $search_params = [
                'index' => C('ELK_INDEX'),
                'type' => 'product',
                'body' => [
                    'from' => $from,
                    'size' => $page_size,
                    'sort' => [
                        ['rank' => ['order' => 'desc']],
                        ['_score' => ['order' => 'desc']],
                        ['shop_rank' => ['order' => 'desc']],
                        ['count_sold' => ['order' => 'desc']]
                    ],
                    'highlight' => [
                        'post_tags' => ["</span>"],
                        'pre_tags' => ["<span>"],
                        'fields' => [
                            'title' => ["type" => "plain"]
                        ]
                    ],
                    'query' => [
                        'function_score' => [
                            'query' => [
                                'filtered' => [
                                    'query' => [
                                        'bool' => [
                                            'should' => [
                                                ['match' => [
                                                    'title' => $search_key,
                                                ]],
                                                ['match' => [
                                                    'shop_name' => $search_key
                                                ]]
                                            ]
                                        ]
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => ['isdelete' => 0]],
                                                ['term' => [ 'status' => 10 ]],
                                                ['term'] => ['min_price' => ['from' => 0.1]],
                                                ['term' => [ 'shop_status' => 1]]
                                            ],
                                            'must_not' => [
                                                ['term' => [ 'cid' => 124886054]],
                                                ['term' => [ 'cid' => 124886055]],
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'script_score' => [
                                'params' => [
                                    'param_score' => 0.2,
                                    'param_rank' => 0.1,
                                    'param_sold_count' => 0.2,
                                    'param_friendship' => 0.2,
                                    'param_POS' => 0.1,
                                    'param_statement' => 0.2,
                                ],
                                'script' => "param_score * _score + 
                                            param_rank * log(1 + doc['shop_rank'].value) +
                                            param_sold_count * log(1 + doc['count_sold'].value) +
                                            param_statement * log(1 + log(1 + doc['shop_order_amount'].value)) +
                                            param_friendship * log(1 + doc['shop_friendship'].value) +
                                            param_POS * log(1 + doc['shop_POS'].value)
                                            "
                            ],
                            'boost_mode' => 'replace'
                        ]
                    ],
                    '_source' => [
                        'include' => ['shopid', 'id', 'title', 'count_comment', 'count_sold', 'min_price', 'headpic', 'isdelete']
                    ],
                ]
            ];

            /*
             * 添加推荐信息, column名使用zt_product_property_value的pid, 结果为该表中的vid
             */
            foreach (array_keys(self::$PidNameMap) as $recommend_pid) {
                if (!array_key_exists('aggs', $search_params['body'])) {
                    $search_params['body']['aggs'] = array();
                }
                $search_params['body']['aggs'][strval($recommend_pid)] = array(
                    'terms' => ['field' => strval($recommend_pid)]
                );
            }
            /*
             * 添加推荐信息结束
             */

            $this->changeSearchParams($search_key, $search_params);

            /*
             * 添加过滤信息
             */
            if ($search_filter['pid'] != '' && $search_filter['vid'] != '') {
                $search_params['body']['query']['function_score']['query']['filtered']['filter']['bool']['must'][]
                    = array('term' => array(strval($search_filter['pid']) => strval($search_filter['vid'])));
            }
            if ($search_filter['min_price'] != '' && $search_filter['max_price'] != '') {
                $search_params['body']['query']['function_score']['query']['filtered']['filter']['bool']['must'][]
                    = array('range' => array('min_price' => array('from' => $search_filter['min_price'], 'to' => $search_filter['max_price'])));
            } elseif ($search_filter['min_price'] != '') {
                $search_params['body']['query']['function_score']['query']['filtered']['filter']['bool']['must'][]
                    = array('range' => array('min_price' => array('from' => $search_filter['min_price'])));
            } elseif ($search_filter['max_price'] != '') {
                $search_params['body']['query']['function_score']['query']['filtered']['filter']['bool']['must'][]
                    = array('range' => array('min_price' => array('from' => 0, 'to' => $search_filter['max_price'])));
            }
            /*
             * 添加过滤信息结束
             */

            /*
             * 添加排序信息
             */

            if (!empty($search_filter['orderby'])) {
                $asc = 'asc';
                if (substr($search_filter['orderby'], 0, 1) == '_') {
                    $search_filter['orderby'] = substr($search_filter['orderby'], 1, strlen($search_filter['orderby']) - 1);
                    $asc = 'desc';
                }
                $order_key = '';
                switch($search_filter['orderby']) {
                    case 'sell':
                        $order_key = 'count_sold';
                        break;
                    case 'new':
                        $order_key = 'starttime';
                        break;
                    case 'price':
                        $order_key = 'min_price';
                        break;
                    case 'collect':
                        $order_key = 'count_collected';
                        break;
                    default:
                        break;
                }
                if ($order_key) {
                    $search_result['order'] = $search_result['orderby'];
                    array_unshift($search_params['body']['sort'], array($order_key => array('order' => $asc)));
                }
            }
            /*
             * 添加排序信息结束
             */

            /*
             * 添加店铺分类信息
             */
            if (!empty($search_filter['catid'])) {
                $search_params['body']['query']['function_score']['query']['filtered']['filter']['bool']['must'][] =
                    array('term' => array('shop_catid' => $search_filter['catid']));
            }
            /*
             * 添加店铺分类信息结束
             */
            $result = $es_client->search($search_params);
            $search_result['count'] = $result['hits']['total'];
            $page = new \Libs\Util\Page($search_result['count'], $page_size, $page_num);
            $list = array();
            foreach ($result['hits']['hits'] as $item) {
                $item['_source']['hl_title'] = array_key_exists('highlight', $item) ? $item['highlight']['title'][0] : $item['_source']['title'];
                $list[] = $item['_source'];
            }
            /*
             * 获取推荐结果
             */

            if ($search_result['count'] > 0) {
                foreach (array_keys(self::$PidNameMap) as $recommend_pid) {
                    $pid_result = $result['aggregations'][$recommend_pid]['buckets'];
                    $pid_count = count($pid_result) > self::$PidNameMap[$recommend_pid]['count'] ? self::$PidNameMap[$recommend_pid]['count'] : count($pid_result);
                    if ($pid_count < self::$PidNameMap[$recommend_pid]['min']){
                        continue;
                    }
                    for ($pid_idx = 0; $pid_idx < $pid_count; $pid_idx ++ ) {
                        if ($recommend_pid == "design_style" || $recommend_pid == 'workyears') {
                            $search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']] = $pid_result[$pid_idx]['key'];
                        } elseif ($recommend_pid == "100") {
                            $search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']]
                                = D('Admin/ProductCategory')->where(array('cid' => $pid_result[$pid_idx]['key']))->getField('name');
                        } else {
                            $search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']]
                                = M('ProductPropertyValue')->where(array('vid' => $pid_result[$pid_idx]['key']))->getField('name');
                        }
                    }
                    $others = array();
                    $not_others = array();
                    for ($pid_idx = 0; $pid_idx < $pid_count; $pid_idx ++ ) {
                        if (strstr($search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']], "其他") or strstr($search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']], "其它")) {
                            $others[$pid_result[$pid_idx]['key']] = $search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']];
                        } else {
                            $not_others[$pid_result[$pid_idx]['key']] = $search_result['recommends'][$recommend_pid][$pid_result[$pid_idx]['key']];
                        }
                    }
                    $search_result['recommends'][$recommend_pid] = $not_others + $others;
                }
            }
            /*
             * 获取推荐结果结束
             */

        } catch (\Elasticsearch\Common\Exceptions\ElasticsearchException $e) {
            $search_reuslt['count'] = -1;
        }
        if ($search_result['count'] < 0) {
            $where = array('isdelete' => 0, 'status' => 10);
            $search_items = preg_split("/\s+/", trim($search_key));
            $where['title'] = array('like', '%' . implode('%', $search_items) . '%');
            $search_result['count'] = intval(D('Product')->where($where)->count());
            $page = new \Libs\Util\Page($search_result['count'], $page_size, $page_num);
            $list = D('Product')->where($where)->page($page_num . ',' . $page_size)->select();
        }
        //获取店铺相关信息
        foreach ($list as $key => $li) {
            $result = M('Shop')->where(array('id'=>$li['shopid']))->getField('id,name,addr,domain');
            if (!array_key_exists('hl_title', $list[$key])) {
                $list[$key]['hl_title'] = $list[$key]['title'];
            }
            $list[$key]['shopname'] = $result[$li['shopid']]['name'];
            $list[$key]['shopdomain'] = $result[$li['shopid']]['domain'];
            $list[$key]['shopaddr'] = $result[$li['shopid']]['addr'];
        }
        $search_result['page'] = $page;
        $search_result['recommendPidMap'] = self::$PidNameMap;
        $search_result['list'] = $list;
        return $search_result;
    }
}
