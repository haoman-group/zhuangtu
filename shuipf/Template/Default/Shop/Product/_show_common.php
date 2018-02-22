    <script type="text/javascript">

    setTimeout(function(){
      $.get("{:U('Shop/Index/ajax_flowstat_record',array('key'=>json_encode(array('sid'=>$data[shopid],'pid'=>$data[id],'vt'=>time(),'lt'=>time(),'fu'=>'','tu'=>'','scid'=>$shopInfo['catid']))))}");
    },2000);

    </script>


