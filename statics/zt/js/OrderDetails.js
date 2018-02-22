var i;
var main_con21;
$(document).ready(function(){
	$(".main_con21").mouseenter(function(){
		main_con21=$(this).index(".main_con21");
		$(".main_con21").find(".main_con22").hide();
		$(".main_con21").find(".main_con211").css("background-color","transparent");
		$(".main_con21:eq(0)").find(".main_con211").css("background-color","#008d46");

		if(main_con21>0){
			for(i=1;i<main_con21+1;i++){
		$(".main_con21:eq("+i+")").find(".main_con22").show();
		$(".main_con21:eq("+i+")").find(".main_con211").css("background-color","#008d46");}}
		})

// 改价弹框
 $(".changePrice").click(function() {
        var recid= $(this).attr("data-recid");
        var order_sn = $(this).attr("data-ordersn");
        layer.open({
            type:2,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area: ['705px','330px'],
            shadeClose: true,
            content: "/Seller/Order/changePrice?recid="+recid+"&order_sn="+order_sn,

        });
        return false;
    });
// 分期付款弹框
$(".seller_installment").click(function() {
      var recid= $(this).attr("data-recid");
      var order_sn = $(this).attr("data-ordersn");
      layer.open({
          type:2,
          title: false,
          closeBtn: 0,
          scrollbar: false,
          area: ['970px','420px'],
          shadeClose: true,
          content: "/Seller/Order/installment?recid="+recid+"&order_sn="+order_sn,

      });
      return false;
  });

$(".send").click(function() {
  /* Act on the event */
  var orderSn = $(this).attr('data-orderSn');
  layer.confirm('是否确定', {
    btn: ['确定', '否'] //按钮
  }, function() {
    $.ajax({
      url:'/Api/SellerOrder/send',
      type:'GET',
      data: {"order_sn": orderSn},
      success: function(data) {if(data.status == 1){
            layer.msg('修改状态成功！', {icon: 1});
            location.reload();
        }else{
            layer.msg(data.msg, {icon: 2});
        }
      },
      error: function() { layer.msg('修改状态失败！', {icon: 2});}
    })
  });
});
$(".setup").click(function() {
  /* Act on the event */
  var orderSn = $(this).attr('data-orderSn');
  layer.confirm('是否确定', {
    btn: ['确定', '否'] //按钮
  }, function() {
    $.ajax({
      url:'/Api/SellerOrder/setup',
      type:'GET',
      data: {"order_sn": orderSn},
      success: function(data) {
        if(data.status == 1){
            layer.msg('修改状态成功！', {icon: 1});
            location.reload();
        }else{
            layer.msg(data.msg, {icon: 2});
        }
      },
      error: function() { layer.msg('修改状态失败！', {icon: 2});}
    })
  });
});
$(".cancelOrder").click(function() {
  /* Act on the event */
  var orderSn = $(this).attr('data-orderSn');
  layer.confirm('是否确定取消订单', {
    btn: ['确定', '否'] //按钮
  }, function() {
    $.ajax({
      url:'/Api/SellerOrder/cancel',
      type:'GET',
      data: {"order_sn": orderSn},
      success: function(data) { layer.msg('已删除', {icon: 1}); location.reload();},
      error: function() { layer.msg('删除失败', {icon: 2});}
    })
  });
});

	});
