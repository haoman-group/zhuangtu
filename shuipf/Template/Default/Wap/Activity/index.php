<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>马可波罗瓷砖</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/activity.css" >
<style>
    .modal{width: 26.3rem;margin-left: -13.15rem;}
    .modal .modal-inner{padding: 2rem 2rem 1rem 2rem;}
    .modal-buttons{height: 3.2rem;}
    .modal-buttons .modal-button{height: 3.2rem;line-height: 3.2rem;font-size: 1.2rem;color: #000;}
</style>
</head>
<body>
<div class="content activity">
    <img src="{$config_siteurl}statics/wap/images/activity/logo.png" alt="马可波罗瓷砖" />
    <div class="list-block">
    <form action="" method="post">
    <input type="hidden" name="actname" value="马可波罗瓷砖">
        <ul>
          <li>
            <dl>
                <dt>姓　名</dt>
                <dd><input type="text" name="name" value=""></dd>
            </dl>
          </li>
          <li>
            <dl>
                <dt>电　话</dt>
                <dd><input type="text" name="mobile" value=""></dd>
            </dl>
          </li>
          <li>
            <dl>
                <dt>地　址</dt>
                <dd><input type="text" name="addr" value=""></dd>
            </dl>
          </li>
          <li>
            <input type="button" class="open-slider-modal" value="确认报名领取" >
          </li>
        </ul>
    </form>
    </div>
</div>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
</body>
</html>
<script>
    $(function(){
        $(document).on('click','.open-slider-modal', function () {
            var $form = $(this).closest("form");
            $.ajax({
                type : "GET",
                // url : '',
                async : false,
                dataType : "json",
                timeout : 5000,
                data : $form.serialize(),
                success : function(result) {
                    var mobile = result.mobile;
                    if(result.status == '1'){
                        var modal = $.modal({
                          title: '<h1 style="font-size:1.1rem;color:#ff3000;text-align:left;">恭喜您，领取成功!</h1>',
                          text: '<p style="text-align:left;font-size:1.1rem;color:#000;">请于9月12日--10月10日期间到店免费领取75片卧室木纹砖</p>',
                          afterText:  '<dl style="text-align:left;font-size:1.1rem;color:#000;"><dt style="float:left;">地址：</dt><dd style="margin-left:3.2rem;">太原市马可波罗各大旗舰店、专卖店、1295专卖店</dd></dl>'+
                                        '<p style="text-align:left;font-size:1.1rem;color:#000;">电话：15234050594</p>',
                          buttons: [
                            {
                              text: '确定',
                              onClick:function(){
                                window.location.href="/Wap/Activity/success?mobile="+mobile;
                              }
                            }
                          ]
                        });
                    }else if(result.status =='-2'){
                        var modal = $.modal({
                          title: '<h1 style="font-size:1.1rem;color:#ff3000;text-align:left;">'+result.msg+'</h1>',
                          buttons: [
                            {
                              text: '确定',
                              onClick:function(){
                                window.location.href="/Wap/Activity/success?mobile="+mobile;
                              }
                            }
                          ]
                        });
                        console.log(result.msg);
                    }else{
                        var modal = $.modal({
                          title: '<h1 style="font-size:1.1rem;color:#ff3000;text-align:left;">'+result.msg+'</h1>',
                          buttons: [
                            {
                              text: '确定'
                            }
                          ]
                        });
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {

                }
            });

        })

    })


</script>
