<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 4/18/16
 * Time: 15:12
 */
    @include('shuipf/Libs/Util/ResizeImage.class.php');
    try{

        $new_img = new ResizeImage($_GET['f'],$_GET['w'],$_GET['h'],$_GET['c']);
        $new_img->dump_img();
    }catch(Exception $e){
     //   var_dump($e);
    }
