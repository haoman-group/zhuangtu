<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 信息编辑时，如果审核通过，那么同时标识会员投稿的member_content里的数据为审核通过
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Behavior;

class ContentEditEndBehavior {

    public function run(&$params) {
        //参数是审核文章的数据
        if (!empty($params) && isset($params['sysadd']) && $params['sysadd'] == 0 && (int) $params['sysadd'] == 99) {
            //标识审核状态
            M('MemberContent')->where(array('catid' => $params['catid'], 'content_id' => $params['id']))->save(array('status' => 1));
        }
    }

}
