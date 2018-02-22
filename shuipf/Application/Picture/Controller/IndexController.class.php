<?php

namespace Picture\Controller;

class IndexController extends PicturebaseController {
    protected $model = NULL;
    protected $categoryModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D("Picture/Picture");
        $this->categoryModel = D('PictureCategory');
    }
    public function index(){
        $pid = I('pid',0);
    //     $order = I('order','');
    //     $result = $this->categoryModel->field('id,pid as parentid,name')->where(array('userid'=>$this->userid))->order("id desc")->select();
    //     $tree = new \Tree();
    //     $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
    //     $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
    //     // foreach ($result as $r) {
    //     //     $r['str_manage'] = '<a href="' . U("Menu/add", array("parentid" => $r['id'])) . '">添加子菜单</a> | <a href="' . U("Menu/edit", array("id" => $r['id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("Menu/delete", array("id" => $r['id'])) . '">删除</a> ';
    //     //     $r['status'] = $r['status'] ? "显示" : "不显示";
    //     //     $array[] = $r;
    //     // }
    //     $tree->init($result);
    //     $str = "<tr>
    // <td align='center'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input'></td>
    // <td align='center'>\$id</td>
    // <td >\$spacer\$name</td>
    //                 <td align='center'>\$status</td>
    // <td align='center'>\$str_manage</td>
    // </tr>";
    //     $str = "";

    //     $category = $tree->get_tree_array(0);
        
    //     $tree = $this->categoryModel->field('id,pid,name')->where(array('userid'=>$this->userid))->order("id desc")->select();
    //     foreach($tree as $k=>$v){
    //         $tree[$k]['parent'] = $v['pid']?$v['pid']:'#';
    //         $tree[$k]['text'] = $v['name'];
    //     }
    //     $this->assign('category',$category);
        $this->assign('pid',$pid);
    //     $this->assign('order',$order);
    //     $this->assign('tree',json_encode($tree));
        $this->display();
    }
    function tree(&$list,$pid=0,$level=0,$html='--'){
        static $tree = array();
        foreach($list as $v){
            if($v['pid'] == $pid){
                $v['sort'] = $level;
                $v['html'] = str_repeat($html,$level);
                $tree[] = $v;
                tree($list,$v['id'],$level+1);
            } 
        }
        return $tree;
    }

}
