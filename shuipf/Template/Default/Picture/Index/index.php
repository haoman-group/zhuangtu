<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>图片空间</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/imgspace.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/zt/js/imgShow.js"></script>
    <link rel="stylesheet" href="{$config_siteurl}statics/js/jstree/themes/default/style.min.css" />
    <script src="{$config_siteurl}statics/js/jstree/jstree.js"></script>
    <script src="{$config_siteurl}statics/js/zClip/jquery.zeroclipboard.min.js"></script>
    <!--控制图片上传：-->
    <template file="common/_global_js.php"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <script src="{$config_siteurl}statics/js/wind.js"></script>
    <script src="{$config_siteurl}statics/js/common.js"></script>
    <!--分页代码-->
    <script src="{$config_siteurl}statics/js/pageGroup/jquery.page.js"></script>
    <link rel="stylesheet" href="{$config_siteurl}statics/js/pageGroup/page.css" type="text/css"/>
    <!--弹框-->
    <script src="{$config_siteurl}statics/js/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{$config_siteurl}statics/js/sweetalert/sweetalert.css" type="text/css"/>
</head>
<body>
  <div class="imgspacenav">
    <a href="{:U('Picture/Index/index')}"><img src="{$config_siteurl}statics/zt/images/imgspace/imgspacelogo.png" class="title"> </a>
  </div>

  <div class="position">
    <!--图片目录-->
    <div class="img-uploading-catalog left">
      <h2>图片目录</h2>
      <div class="inptbox">
        <input type="text" class="img-catalog-input" placeholder="按文件夹名称实时搜索" />
        <input type="button"></div>

        <div id="folder_tree"></div>
    </div>
    <!--右部-->
    <div class="img-uploading-right">
      <div class="operate">
        <a href="javascript:upfile('pictures')">
          <span></span>
          上传图片
          <!--<input type="file">-->
          </a>
        <a href="#" id="btnaddfile"><ul class="img" id="pictures"></ul>
          <span></span>
          新建文件夹
        </a>
        <a href="#" id="btnrecycle">
          <span></span>
          回收站
        </a>
        <div class="inptbox">
          <input type="text" class="img-catalog-input" placeholder="按文件夹名称实时搜索" />
          <input type="button"></div>
      </div>
      <div class="sort">
        <input id="totle" type="checkbox">
        <label for="totle">共<span class="foldernum"></span>个文件夹和<span class="filenum"></span>张图片</label>
        <div class="right">

          <input id="onlyimg" type="checkbox">
          <label for="onlyimg">只显示图片</label>
          <div class="list">
            <a>
              图片类型:
              <span class="chose">
                全部
                <i></i>
                <ul>
                  <li>全部</li>
                  <li>手机端</li>
                  <li>PC</li>
                </ul>
              </span>
            </a>
            <a>
              排序:
              <span class="down">
                时间
                <i></i>
              </span>
              <ul>
                <li class="down">
                  时间
                  <i></i>
                </li>
                <li class="up">
                  时间
                  <i></i>
                </li>
                <li class="down">
                  大小
                  <i></i>
                </li>
                <li class="up">
                  大小
                  <i></i>
                </li>
                <li class="down">
                  名称
                  <i></i>
                </li>
                <li class="up">
                  名称
                  <i></i>
                </li>
              </ul>
            </a>
          </div>
          <!--<div class="list">
          <a class="small">
            <i></i>
          </a>
          <a class="big">
            <i></i>
          </a>
        </div>
        -->
      </div>
    </div>
    <ul class="product"></ul>
    <!--<div class="end"></div>-->
    <div class="tcdPageCode"></div>
  </div>

</div>
<div class="filemodel">
  <li>
    <div class="img">
      <img src="{$config_siteurl}statics/zt/images/imgspace/file.png"></div>
    <label>qqq</label>
    <input type="text" value="qqq" maxlength="100">
    <span class="tool">
      <i title="复制链接" class="copy"></i>
      <i title="删除图片" class="close"></i>
    </span>
  </li>
</div>

<!--弹框-->
<ul class="fixbg">
  <li class="addfile">
    <h3>
      新建文件夹
      <a href="#" class="close right closefixbg">X</a>
    </h3>
    <p>请输入文件夹名称</p>
    <div class="inptbox">
      <input type="" placeholder="新建文件夹"></div>
    <div class="btn">
      <a class="sure" href="#">确定</a>
      <a class="closefixbg" href="#">取消</a>
    </div>
  </li>
</ul>
<script type="text/javascript">
var gvar={
  pid:"<?php echo $pid; ?>",
  order:"<?php echo $order; ?>"
}
 <?php 
        $alowexts = "jpg|jpeg|gif|bmp|png";
        $thumb_ext = ",";
        $watermark_setting = 0;
        $module = "Picture";
        $catid = "0";
        $max = 10;
        $authkey = upload_key("$max,$alowexts,1,$thumb_ext,$watermark_setting");
      ?>
    function upfile(id){
      flashupload(id+'_images', '图片上传',id,submit_pic,'{$max},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
    function submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
     
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      var pics = new Array();
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          var pic = {path:n,
            name:filename
          };
          pics.push(pic);
      });
      pictureAdd(pics,returnid);
    }

$(function(){
  getfilelist(gvar.pid,gvar.order,0,1);
  <!--文件夹操作-->
  $(".img-catalog-ul1 li").each(function(){
    var $this=$(this);
    iaddclass($this);
    var ul=$this.is(':has(ul)');
    if(ul){
      $this.addClass("close");
    }
  })

  $(".img-catalog-ul1 li").on("click","i:eq(0)",function(){
    var $li=$(this).parent();
    if($li.is(".open")){
      $li.removeClass("open").addClass("close");
    }
    else{
      if($li.is(".close")){
        $li.removeClass("close").addClass("open");
      }
    }
    iaddclass($li);
  })
  


  $(".closefixbg").click(function(){
    closefile();  
    return false;
  });
  //双击进入目录
  $(".product").on("dblclick","li",function(){
    gvar.pid = $(this).children('input').attr("data-id");
    if($(this).data("type") == "file"){
     getfilelist(gvar.pid,gvar.order,0,1);
    var node = $("#folder_tree").jstree().get_node(gvar.pid);
    $("#folder_tree").jstree().open_node(node);
    }
  });
  $("#folder_tree").on("click","a",function(){
     gvar.pid = $(this).parent().attr("id");
     getfilelist(gvar.pid,gvar.order,0,1);
     var node = $("#folder_tree").jstree().get_node(gvar.pid);
     $("#folder_tree").jstree().open_node(node);
  });
  $(".product").on("click","label",function(){
    var html=$(this).html();
    $(this).siblings("input").show().focus().val(html);
    return;
  });
  
  $(".product").on("dblclick","input",function(){
    return false;
  })

  $(".product").on("blur","input",function(){ 
    $(this).hide();   
  });
  $(".product").on("change","input",function(){
    var id= $(this).attr("data-id");
    var v= $(this).val();
    var $label= $(this).siblings("label");
    if(v.length===0){
      v=$label.html();
      $(this).val(v); 
    }
    else{
      $.ajax({
        type:"GET",
        url:"/Picture/Api/folderRename?id="+id+"&name="+v,
        dataType:"json",
        timeout:5000,
        success: function(res,status){
          if(res.status != 1){
            alert("修改名发生错误！错误信息:["+res.msg+"]");
          }
          var node = $("#folder_tree").jstree().get_node(id);
          $("#folder_tree").jstree().rename_node(node,v);
        },
        error: function(XHR, textStatus, errorThrown){
          console.log(textStatus+"\n"+errorThrown);
        }
                  
      }); 
    }
    //判断合法性
    $label.html(v);
    
    
  });
  //新建文件夹按钮点击事件
  $("#btnaddfile").click(function(){
    openaddfile(0);
  })
  //回收站按钮点击事件
  $("#btnrecycle").click(function(){
    getfilelist(0,gvar.order,1,1);
  })
  //绑定目录删除事件
  $(".product").on("click",".delfolder", function(){
    if(confirm("确认删除文件夹?")){
      var dirId = $(this).parent().siblings("input").data("id");
      $(this).click(folderDelete(dirId,this,0));
    }
    return false;
  })
  //绑定目录彻底删除事件
  $(".product").on("click",".shiftdelfolder", function(){
    if(confirm("确认彻底删除文件夹?")){
      var dirId = $(this).parent().siblings("input").data("id");
      $(this).click(folderDelete(dirId,this,1));
    }
    return false;
  })
   //绑定文件删除事件
  $(".product").on("click",".delfile", function(){
    if(confirm("确认删除文件?")){
      var dirId = $(this).parent().siblings("label").data("id");
      $(this).click(fileDelete(dirId,this,0));
    }
    return false;
  })
  //绑定文件彻底删除事件
  $(".product").on("click",".shiftdelfile", function(){
    if(confirm("确认彻底删除图片?")){
      var dirId = $(this).parent().siblings("label").data("id");
      $(this).click(fileDelete(dirId,this,1));
    }
    return false;
  })
  //图片还原事件
  $(".product").on("click",".restorefile", function(){
    if(confirm("确认还原已删除的图片?")){
      var dirId = $(this).parent().siblings("label").data("id");
      $(this).click(fileRestore(dirId,this));
    }
    return false;
  })
  //绑定链接复制事件
  $(".product").on("copy",".copy",function(e){
    var url = $(this).parent().siblings('.img').children("img").attr("src");
    e.clipboardData.clearData();
    e.clipboardData.setData("text/plain",  "http://"+window.location.host + url);
    e.preventDefault();
  });
  //复制提示框
  $(".product").on("aftercopy", ".copy", function(e) {
    swal({
      title: "复制成功!",
      timer: 500,
      showConfirmButton: false
    });
  });
  $(".right").on("change","#onlyimg",function(){
     if($(this).is(':checked')){
       $(".product li").each(function(){
         $(this).data('type') == "file" &&  $(this).hide();
       });
     }else{
       $(".product li").each(function(){
         $(this).data('type') == "file" &&  $(this).show();
       });
     }
  });
  $(".product").on("click","li[data-type='pic'] img",function(){  
    var src = $(this).attr("src");
    fnCreate(src);
  });
});



function openaddfile(){
  $(".fixbg").show();
  $(".addfile").show();
  var $li=$(".addfile");
  fixposition($li);
}
function closefile(){
  $(".fixbg").hide();
  $(".addfile").hide();
  $(".addfile input").val("");
}
function fixposition($li){
  var width=-$li.width()/2;
  var height=-$li.height()/2;
  $li.css({"margin-left":width,"margin-top":height});
}
<!--左侧图标判断-->
function iaddclass($this){
  var $ismg=$this.find("i").eq(0);
  var ul=$this.is(':has(ul)');
  var li=$this.next("li").length;
  var open=$this.is(".open");
  if(open){
    if(ul){
      if(li){
        $ismg.attr("class","img-catalog-iopentwo");
      }
      else{
        $ismg.attr("class","img-catalog-iopen");
      }
    }
    else{
      if(li){
        $ismg.attr("class","img-catalog-line");
      }
      else{
        $ismg.attr("class","img-catalog-linetwo");
      }
    }
  }
  else{
    if(ul){
      if(li){
        $ismg.attr("class","img-catalog-iclosetwo");
      }
      else{
        $ismg.attr("class","img-catalog-iclose");
      }
    }
    else{
      if(li){
        $ismg.attr("class","img-catalog-line");
      }
      else{
        $ismg.attr("class","img-catalog-linetwo");
      }
    }
  }
}
//获取初始化数据,包括目录和图片
function getfilelist(pid,order,isdelete,pageNo){
  $.ajax({
    type:"GET",
    url:"/Picture/Api/getContent?pid="+pid+"&order="+order+"&isdelete="+isdelete+"&page="+pageNo,
    dataType:"json",
    timeout:5000,
    success: function(res,status){
      if(res.status===1){
        var data=res.data;
        var str="";
        if(isdelete == 0){
        if(data.folder){
          $.each(data.folder,function(i,v){
            str+="<li data-type=\"file\"><div class=\"img\"><img src=\"{$config_siteurl}statics/zt/images/imgspace/file.png\"></div><label>"+v.name+"</label><input type=\"text\" value=\""+v.name+"\" data-id=\""+v.id+"\" maxlength=\"100\"><span class=\"tool\"><i title=\"删除目录\" class=\"close delfolder\"></i></span></li>";
          });
        }
        if(data.picture){
          $.each(data.picture,function(i,v){
            str+="<li data-type=\"pic\"><div class=\"img\"><img src=\""+v.filepath+"\"></div><label data-id=\""+v.id+"\" >"+v.filename+"</label><span class=\"tool\"><i title=\"复制链接\" class=\"copy\"></i><i title=\"删除图片\" class=\"close delfile\" ></i></span></li>";
          });
        }
      }else{
         if(data.folder){
          $.each(data.folder,function(i,v){
            str+="<li data-type=\"delfile\"><div class=\"img\"><img src=\"{$config_siteurl}statics/zt/images/imgspace/file.png\"></div><label>"+v.name+"</label><input type=\"hidden\" value=\""+v.name+"\" data-id=\""+v.id+"\" maxlength=\"100\"><span class=\"tool\"><i title=\"彻底删除\" class=\"close shiftdelfolder\"></i></span></li>";
          });
        }
        if(data.picture){
          $.each(data.picture,function(i,v){
            str+="<li data-type=\"delpic\"><div class=\"img\"><img src=\""+v.filepath+"\"></div><label data-id=\""+v.id+"\" >"+v.filename+"</label><span class=\"tool\"><i title=\"还原图像\" class=\"restorefile\"></i><i title=\"彻底删除\" class=\"close shiftdelfile\" ></i></span></li>";
          });
        }
      }
        $(".product").html(str);
        $(".end").html(data.page);
        updateNum(res.data.folderNum,res.data.picNum);
        updateFolderTree(res.data.tree);
        setPage(res.data.page.count,res.data.page.current,pid,order,isdelete);
      }
      else{
        console.log(res.msg);
      }
    },
    error: function(XHR, textStatus, errorThrown){
      console.log(textStatus+"\n"+errorThrown);
    }
              
  }); 
}
//新建目录
  $(".addfile .sure").click(function(){
    var val="新建文件夹";
    // var $li=$(".filemodel li").addClass("file");
    // $(".filemodel li").attr("data-type","file");
    var inptval=$(this).parent().siblings(".inptbox").find("input").val();
    console.log(inptval);
    if(inptval.length){
      val=inptval;
    }
    var pid=gvar.pid;
    $.ajax({
      type:"GET",
      url:"/Picture/Api/folderAdd?pid="+pid+"&name="+val,
      dataType:"json",
      timeout:5000,
      success: function(res,status){
        if(res.status ===1){
           var li = "<li data-type=\"file\"><div class=\"img\"><img src=\"{$config_siteurl}statics/zt/images/imgspace/file.png\"></div><label>"+inptval+"</label><input type=\"text\" value=\""+inptval+"\" data-id=\""+res.msg+"\" maxlength=\"100\"><span class=\"tool\"><i title=\"删除目录\" class=\"close delfolder\"></i></span></li>";
          // $li.find("label").html(val).siblings("input").attr("data-id",res.msg);
          // var li=$li.clone();
          $(".product").prepend(li);
          // updateNum(res.data.folderNum);
          $(".foldernum").html(parseInt($(".foldernum").html()) + 1);
          closefile();
          var par = $("#folder_tree").jstree().get_node(pid);
          $("#folder_tree").jstree().create_node(par,{"text":val,"id":res.msg});
        }else{
          alert("添加文件夹错误！错误信息:["+res.msg+"]");
        }
      },
      error: function(XHR, textStatus, errorThrown){
        console.log(textStatus+"\n"+errorThrown);
      }
    });
    return false;
  })
//删除目录
//id 待删除目录ID
//shift 是否彻底删除： 0- 否  1-是
function folderDelete(id,obj,shift){
  $.ajax({
    type:"GET",
    url:"/Picture/Api/folderDelete?id="+id+"&shift="+shift,
    //timeout:5000,
    success:function(res,status){
      if(res.status ===1){
        $(obj).parent().parent().remove();
        $(".foldernum").html(parseInt($(".foldernum").html()) - 1);
        updateFolderTree(res.data);
        var node = $("#folder_tree").jstree().get_node(id,obj);
        $("#folder_tree").jstree().delete_node(node);
        return true;
      }else if(res.status ===0){
        alert(res.msg);
        return false;
      }else{
        alert("删除文件夹失败！错误信息:["+res.msg+"]");
        return false;
      }
    },
    error:function(XHR, textStatus, errorThrown){
      alert("删除文件夹失败！");
      console.log(textStatus+"\n"+errorThrown);
      return false;
    }
  });
}

//获取结构树
function updateFolderTree(tree){
  // $.jstree.destroy();
  $('#folder_tree').jstree({ 
        'core' : {
          'data' :tree,
          'check_callback'	: true
        },
        root :"#"
    }).bind("ready.jstree",function(e, data){
        var root = $('#folder_tree').jstree().get_node("0");
        $('#folder_tree').jstree().open_node(root);
    })
}
//更新统计数据
function updateNum(folderNum,picNum){
    if(folderNum >0){$(".foldernum").html(folderNum); }else{$(".foldernum").html(0)}
    if(picNum >0){$(".filenum").html(picNum); }else{$(".filenum").html(0)}
}

//新增图像
function pictureAdd(pics,returnid){
    $.ajax({
    type : "POST",
    datatype:"json",
    url:"/Picture/Api/pictureAdd?pid="+gvar.pid,
    data:{
      "pics":pics,
    },
    success:function(res,status){
      if(res.status == 1){
        var str = $('#' + returnid).html();
        for(var pic in res.data){
          if(res.data[pic].status == 1){
            str += "<li data-type=\"pic\"><div class=\"img\"><img src=\""+res.data[pic].path+"\"></div><label data-id=\""+res.data[pic].id+"\">"+res.data[pic].name+"</label><span class=\"tool\"><i title=\"复制链接\" class=\"copy\"></i><i title=\"删除图片\" class=\"close delfile\"></i></span></li>";
            $(".filenum").html(parseInt($(".filenum").html()) + 1);
          }else{
            console.log("插入图像失败!失败信息:"+res.data[pic]);
          }
        }
        $('.product').append(str);
      }else{
        console.log(res);
        alert("上传图像数据失败！");
      }
    },
    error:function(XHR, textStatus, errorThrown){
      alert("上传图像数据失败！");
      console.log(textStatus+"\n"+errorThrown);
    }
  });
}
//删除图像
//id 待删除目录ID
//shift 是否彻底删除： 0- 否  1-是
function fileDelete(id,obj,shift){
  $.ajax({
    type:"GET",
    url:"/Picture/Api/pictureDelete?id="+id+"&shift="+shift,
    //timeout:5000,
    success:function(res,status){
      if(res.status ===1){
        $(obj).parent().parent().remove();
        $(".filenum").html(parseInt($(".filenum").html()) - 1);
      }else if(res.status ===0){
        alert("删除图片失败！错误信息:["+res.msg+"]");
      }else{
        alert("删除图片失败！错误信息:["+res.msg+"]");
      }
    },
    error:function(XHR, textStatus, errorThrown){
      alert("删除图片失败！");
      console.log(textStatus+"\n"+errorThrown);
    }
  });
}
//还原
//id 待还原目录ID
function fileRestore(id,obj){
  $.ajax({
    type:"GET",
    url:"/Picture/Api/picturRestore?id="+id,
    //timeout:5000,
    success:function(res,status){
      if(res.status ===1){
        $(obj).parent().parent().remove();
        $(".filenum").html(parseInt($(".filenum").html()) - 1);
      }else if(res.status ===0){
        alert("还原图片失败！错误信息:["+res.msg+"]");
      }else{
        alert("还原图片失败！错误信息:["+res.msg+"]");
      }
    },
    error:function(XHR, textStatus, errorThrown){
      alert("还原图片失败！");
      console.log(textStatus+"\n"+errorThrown);
    }
  });
}
//分页数据
function setPage(count,current,pid,order,isdelete){
    $(".tcdPageCode").off();
    $(".tcdPageCode").createPage({
        pageCount:count,
        current:current,
        backFn:function(p){
          getfilelist(pid,order,isdelete,p);
        } 
    });
}
</script>
</body>
</html>
