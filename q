[1mdiff --git a/shuipf/Application/Seller/Controller/MaterialController.class.php b/shuipf/Application/Seller/Controller/MaterialController.class.php[m
[1mindex 7386b18..54c67eb 100644[m
[1m--- a/shuipf/Application/Seller/Controller/MaterialController.class.php[m
[1m+++ b/shuipf/Application/Seller/Controller/MaterialController.class.php[m
[36m@@ -235,6 +235,7 @@[m [mclass MaterialController extends SellerbaseController {[m
         if(!empty($data['cid'])){[m
           $data['proptype'] = D('Admin/ProductCategory')->getRootCate($data['cid']);[m
         }[m
[32m+[m[32m        $data['case_price']=0.00;[m
         return $data;[m
     }[m
     protected function _special($data){[m
[1mdiff --git a/shuipf/Application/Shop/Controller/ProductController.class.php b/shuipf/Application/Shop/Controller/ProductController.class.php[m
[1mindex cefd2cd..c0bf820 100644[m
[1m--- a/shuipf/Application/Shop/Controller/ProductController.class.php[m
[1m+++ b/shuipf/Application/Shop/Controller/ProductController.class.php[m
[36m@@ -133,7 +133,8 @@[m [mclass ProductController extends Base {[m
       //获取店铺信息[m
       $shopInfo = $this->shopModel->getInfoByProductID($id);[m
 [m
[31m-      $number = ($result["number"] - $result['count_sold'] >0)?($result["number"] - $result['count_sold']):0;[m
[32m+[m[32m      //$number = ($result["number"] - $result['count_sold'] >0)?($result["number"] - $result['count_sold']):0;[m
[32m+[m[32m      $number = $result['number'];[m
       $years=$this->getYears($id);[m
 [m
       // 获取 店内宝贝列表[m
[1mdiff --git a/shuipf/Template/Default/Seller/Product/addMaterial.php b/shuipf/Template/Default/Seller/Product/addMaterial.php[m
[1mindex 25f4cc6..4ac29f5 100644[m
[1m--- a/shuipf/Template/Default/Seller/Product/addMaterial.php[m
[1m+++ b/shuipf/Template/Default/Seller/Product/addMaterial.php[m
[36m@@ -266,7 +266,8 @@[m
                 <!--<input type="button" class="btn" onclick="TableToJson()" value="测试"></input>-->[m
         </dd>[m
         <dt><!-- <i>*</i> -->价格活动：</dt>[m
[31m-        <dd><Form function="select" parameter="option('activity'),$data['activity'],class='' name='activity',无"/></dd>[m
[32m+[m[32m        <?php $activity= empty($data['activity'])?'装途专享':$data['activity'];?>[m
[32m+[m[32m        <dd><Form function="select" parameter="option('activity'),$activity,class='' name='activity',"/></dd>[m
         <dt><!-- <i>*</i> -->库存状态：</dt>[m
         <dd>[m
           <!--<input name="inventory" value="{$data.inventory}"></input>-->[m
[36m@@ -281,19 +282,14 @@[m
         <dd><input name="number" value="{$data.number}"></dd>[m
         <dt>是否限量:</dt>[m
 [m
[31m-        <dd><input type="radio" name="checklimit" class="checklimit" value="-1" <if condition="$data.limitnum eq -1">checked</if>>不限量<input type="radio" name="checklimit" value="0" class="checklimit" <if condition="$data.limitnum neq -1">checked </if>>限量</dd>[m
[31m-        <dt class="limitnum" style="display:none">限购数量:</dt>[m
[31m-        <dd class="limitnum" style="display:none"><input type="text" name="limitnum" <if condition="$data.limitnum neq -1">value="{$data.limitnum}"<else/>value=""</if>></dd>[m
[31m-        <!-- <dd><input type="radio" name="checklimit" class="checklimit" value="-1" <if condition="($data.limitnum eq -1) ||($data.limitnum eq '') ">checked</if>>不限量<input type="radio" name="checklimit" class="checklimit" type="0" <if condition="($data.limitnum neq -1) && ($data.limitnum neq 0) " >checked </if>>限量</dd>[m
[31m-        <if condition="($data.limitnum eq -1) ||($data.limitnum eq '')  ">[m
[31m-        <dt class="limitnum" style="display:none" disabled>限购数量:</dt>[m
[31m-        <dd class="limitnum" style="display:none" disabled><input type="text" name="limitnum" value="{$data.limitnum}"></dd><else/>[m
[31m-        <dt class="limitnum" >限购数量:</dt>[m
[31m-<<<<<<< HEAD[m
[31m-        <dd class="limitnum"  ><input type="text" name="limitnum" value=""></dd></if> -->[m
[31m-[m
[31m-        <!--<dd class="limitnum"  ><input type="text" name="limitnum" value="{$data.limitnum}"></dd></if>-->[m
[31m-[m
[32m+[m[32m        <dd>[m
[32m+[m[32m        <input type="radio" name="checklimit" class="checklimit" value="-1" <if condition="($data.limitnum eq -1) OR (empty($data))">checked</if>>不限量[m
[32m+[m[32m        <input type="radio" name="checklimit" class="checklimit" value="0"  <if condition="($data.limitnum neq -1) AND (!empty($data))">checked </if>>限量[m
[32m+[m[32m        </dd>[m
[32m+[m[32m        <div  class="limitnum" <if condition="($data.limitnum neq -1) AND (!empty($data))">style="display:block"<else/>style="display:none"</if>>[m
[32m+[m[32m        <dt>限购数量:</dt>[m
[32m+[m[32m        <dd><input type="text" name="limitnum" <if condition="$data.limitnum neq -1">value="{$data.limitnum}"<else/>value=""</if>></dd>[m
[32m+[m[32m        </div>[m
         <dt><i>*</i>计价单位</dt><dd><input type="hidden" name="charge_unit" value="元/㎡">元</dd>[m
         <dt>付款模式：</dt><dd><input type="hidden" name="pay_mode" value="一口价">一口价</dd>[m
         <dt>采购地：</dt>[m
[36m@@ -945,7 +941,7 @@[m [m$(function(){[m
        }else{[m
          $(".limitnum").hide();[m
        }[m
[31m-    }).eq(1).trigger("click");;[m
[32m+[m[32m    });[m
    })[m
   </script>[m
 [m
