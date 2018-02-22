
$(function(){

    if(!!$.fn.cookie("apptype") &&  ("android" === $.fn.cookie("apptype")) ){
        JSInterFace.getUserStatus();
    }

    $(document).on("click",".needlogin",function(e){
        if($.fn.cookie ){
            if (!!$.fn.cookie("gs1_spf_userid")){
                console.log('已登录');
                //return true;
            }
            else{
                e.stopImmediatePropagation();

                if(!!$.fn.cookie("apptype")){

                    if("android" === $.fn.cookie("apptype")){
                        JSInterFace.getToApp('login');
                    }
                    else{
                        window.location.href = "ios://getToApp/|/login/-/"+encodeURI(window.location.href);
                    }
                    return false;
                }
                else{
                    $.popup(".popuplogin");
                    return false;
                }
            }
        }
        else{
            console.log('cookie无效');
            return true;
        }
    });



    $(document).on("click",".chkappact",function(e){
        if(!!$.fn.cookie("apptype") ){
            e.stopImmediatePropagation();
            if("android" === $.fn.cookie("apptype")){
                JSInterFace.getToApp($(this).attr("data-apptag"));
            }
            else if("ios" === $.fn.cookie("apptype")){
                window.location.href = "ios://getToApp/|/"+$(this).attr("data-apptag")+"/-/"+encodeURI(window.location.href);
            }
            return false;
        }
    })

    $(document).on("click",".openpop",function(e){
        $.popup($(this).attr("data-popup"));
    });

    $(document).on("click",".newlog_con .btnlogin",function(){

        var $loginform = $(this).closest("form");
        $.ajax({
            type : "POST",
            url : '/Api/Member/login',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : $loginform.serialize(),
            success : function(result) {
                if(result.status === 1){
                    $.toast("登录成功!");
                    $.closeModal(".popuplogin");
                    if( $(".page-current").attr("id")=== "pageorderqr" ){
                        window.location.reload();
                    }
                }
                else{
                    $(".error").show();
                    console.log(result.msg);
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });

        return false;
    })

    $(document).on("beforePageSwitch",".page",function(e,id,page){
        //$("[data-popbelong='"+id+"']").remove();
    })






    $(document).on("pageInit",".page",function(e,id,page){

        sharecon = {"title":"装途网","link":window.location.href ,"imgUrl":"/statics/wap/images/shareicon.png","desc":"装家就上装途网"};
        globaltimer = null;
        clearTimeout(globaltimer);
        //console.log("commoninit");
        $.closeModal();
        $(".popup-overlay").removeClass("modal-overlay-visible");
        //console.log("i:"+id);

        if(!!$.fn.cookie("apptype") &&  ("ios" === $.fn.cookie("apptype"))  ){

            if(!$.fn.cookie("gs1_spf_userid") || 1===1) {
                window.location.href = "ios://getUserStatus";
            }

        }

    })


    $(document).on("pageInit","#indexios",function(e,id,page){
        $.fn.cookie("apptype","ios",{ expires: 1,path:"/" });
        window.location = "ios://getAppType";
    })

    $(document).on("pageInit","#index",function(e,id,page){

        var $dompage = $(page).clone();

        $.ajax({
            type: "POST",
            url: "/app/indexer/lunbo",
            dataType: "json",
            data: {},
            timeout: 5000,
            success: function (data, status) {
                if (data.status === 1) {

                    var data = data["data"];
                    //轮播图
                    var dataswiper = data[178];
                    var $tempswiper = $("<div></div>");
                    var $swiperdom = $(".swiper-wrapper .swiper-slide").clone();
                    $.each(dataswiper, function (i, v) {
                        $swiperdom.find("img").attr("src",v["wap_picture"]);
                        $swiperdom.find("a").attr("href",dourl(v));
                        $tempswiper.append($swiperdom.prop("outerHTML"));
                    });
                    $dompage.find(".swiper-wrapper").html($tempswiper.html());

                    //橱窗位advert
                    $dompage.find(".home_cross_ad").eq(0).find("a").attr("href", dourl(data[177][1])).find("img").attr("src","http://www.zhuangtu.net" + (data[177][1]["wap_picture"]));
                    $dompage.find(".home_cross_ad").eq(1).find("a").attr("href", dourl(data[209][1])).find("img").attr("src","http://www.zhuangtu.net" + (data[209][1]["wap_picture"]));

                    //设计
                    var $domdesign = $(".des_modular li").eq(0).clone();
                    var resselling = data[18];
                    $dompage.find(".des_modular").html("");
                    $.each(resselling,function(i,v){
                        if(i>1){
                            $domdesign.find("img").attr("src",v["wap_picture"]);
                            $domdesign.find("strong").html(v["title"]);
                            $domdesign.find("p").html(v["description"]);
                            $domdesign.find("a").attr("href",dourl(v));
                            $dompage.find(".des_modular").append($domdesign.prop("outerHTML"));
                        }
                    });

                    //工人
                    var $domworker = $(".des_workers li").eq(0).clone();
                    var resworker = data[19];
                    $dompage.find(".des_workers").html("");
                    $.each(resworker,function(i,v){
                        if(i>1){
                            $domworker.find("img").attr("src",v["wap_picture"]);
                            $domworker.find("strong").html(v["title"]);
                            $domworker.find("p").html(v["description"]);
                            $domworker.find("a").attr("href",dourl(v));
                            $dompage.find(".des_workers").append($domworker.prop("outerHTML"));
                        }
                    });

                    //辅材
//                        var $domauxiliary = $(".auxrow li").eq(0).clone();
//                        var resauxiliary = data[20];
//                        $dompage.find(".auxrow").html("");
//                        $.each(resauxiliary,function(i,v){
//                            if(i>1){
//                                $domauxiliary.find("img").attr("src",v["wap_picture"]);
//                                $domauxiliary.find("a").attr("href",dourl(v));
//                                $dompage.find(".auxrow").append($domauxiliary.prop("outerHTML"));
//                            }
//                        });

                    //主材
                    var $dommaterial = $(".matrow li").eq(0).clone();
                    var resmaterial = data[21];
                    $dompage.find(".matrow").html("");
                    $.each(resmaterial,function(i,v){
                        if(i>1){
                            $dommaterial.find("img").attr("src",v["wap_picture"]);
                            $dommaterial.find("p").html(v['data']['title']);
                            $dommaterial.find("span").html(v['data']['min_price']);
                            $dommaterial.find("a").attr("href",dourl(v));
                            $dompage.find(".matrow").append($dommaterial.prop("outerHTML"));
                        }
                    });

                    //家具
                    $dompage.find(".onecol_1").find("a").attr("href",dourl(data[22][2])).find("img").attr("src","http://www.zhuangtu.net/"+data[22][2]["wap_picture"]);
                    $dompage.find(".furprice").find("strong").html(data[22][2]['data']['min_price']);
                    var $domfurone = $(".onecol_2 li").eq(0).clone();
                    var resfurpone = data[22];
                    $dompage.find(".onecol_2").html("");
                    $.each(resfurpone,function(i,v){
                        if(i>2 && i<5){
                            $domfurone.find("img").attr("src","http://www.zhuangtu.net/"+v["wap_picture"]);
                            $domfurone.find("p").html(v['title']);
                            $domfurone.find("strong").html(v['data']['min_price']);
                            $domfurone.find("a").attr("href",dourl(v));
                            $dompage.find(".onecol_2").append($domfurone.prop("outerHTML"));
                        }
                    });

                    var $domfurni = $(".furrow2 li").eq(0).clone();
                    var resfurni = data[22];
                    $dompage.find(".furrow2").html("");
                    $.each(resfurni,function(i,v){
                        if(i>4){
                            $domfurni.find("img").attr("src",v["wap_picture"]);
                            $domfurni.find("p").html(v['data']['title']);
                            $domfurni.find("strong").html(v['data']['min_price']);

                            $domfurni.find("a").attr("href",dourl(v));
                            $dompage.find(".furrow2").append($domfurni.prop("outerHTML"));
                        }
                    });

                    //家电
                    var $domlianrow = $(".lianrow li").eq(0).clone();
                    var reslianrow = data[23];
                    $dompage.find(".lianrow").html("");
                    $.each(reslianrow,function(i,v){
                        if(i>1){
                            $domlianrow.find("img").attr("src",v["wap_picture"]);
                            $domlianrow.find("p").html(v['data']['title']);
                            $domlianrow.find("span").html(v['data']['min_price']);

                            $domlianrow.find("a").attr("href",dourl(v));
                            $dompage.find(".lianrow").append($domlianrow.prop("outerHTML"));
                        }
                    });


                    

                    if(!!$.fn.cookie("apptype") ){


                        $dompage.find(".opcheader .icon-left").removeClass("back");
                        if("android" === $.fn.cookie("apptype")){
                            $dompage.find(".opcheader .icon-left").attr("href","javascript:JSInterFace.getToApp('home')");
                        }
                        else if("ios" === $.fn.cookie("apptype")){
                            $dompage.find(".opcheader .icon-left").attr("href","ios://getToApp/|/home/-/"+encodeURI(window.location.href));
                        }
                    }
                    else if(window.history.length === 1){
                        $dompage.find(".opcheader").addClass("syheader");
                    }

                    $(page).html($dompage.html());

                    $(".swiper-container").swiper({autoplay: 3000, speed: 500,});
                }
                else {
                    console.log("失败" + data.msg);
                }
            }
            , error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }
        });


    });

    $(document).on("pageInit","#indexbak",function(e,id,page) {
        var arcontr =[{"title":"网购设计","adid":18},{"title":"网购轻工","adid":19},{"title":"网购辅材","adid":20}
            ,{"title":"网购主材","adid":21},{"title":"网购家具","adid":22},{"title":"网购家电","adid":23}];

        $.ajax({
            type: "POST",
            url: "/app/indexer/lunbo",
            dataType: "json",
            data: {},
            timeout: 5000,
            success: function (data, status) {
                // console.log(data);
                if (data.status === 1) {
                    var data = data["data"];
                    $domindex = $("#index .content").clone();
                    //轮播图
                    var dataswiper = data[178];
                    var $tempswiper = $("<div></div>");
                    var $swiperdom = $(".swiper-wrapper .swiper-slide").clone();
                    $.each(dataswiper, function (i, v) {
                        // console.log(v);
                        $swiperdom.find("img").attr("src", v["picture"][0]);
                        $swiperdom.find("a").attr("href", dourl(v));
                        $tempswiper.append($swiperdom.prop("outerHTML"));
                    });
                    $domindex.find(".swiper-wrapper").html($tempswiper.html());

                    //橱窗位advert
                    $domindex.find(".home_cross_ad").eq(0).find("a").attr("href", dourl(data[177][1])).find("img").attr("src", data[177][1]["picture"][0]);
                    $domindex.find(".home_cross_ad").eq(1).find("a").attr("href", dourl(data[209][1])).find("img").attr("src", data[209][1]["picture"][0]);

                    var $tempdl = $domindex.find(".rowindexlist").eq(0).clone();
                    var $tempdt = $tempdl.find("dt").eq(0).clone();
                    var $tempdd = $tempdl.find("dd").eq(0).clone();
                    $.each(arcontr, function (ji, jv) {
                        var jsondl = data[jv["adid"]];
                        $tempdl.html("");
                        $.each(jsondl, function (i, v) {
                            if (i === "1") {
                                $tempdt.find("a").attr("href", v["url"]).find(".pic").attr("src", v["picture"][0]);
                                $tempdl.append($tempdt.prop("outerHTML"));
                            }
                            else if (parseInt(i) < 7) {
                                $tempdd.find("a").attr("href", (v["data"]["id"] ? getprourl(v["data"]["id"]) : v["url"]  )).find(".pic").attr("src", v["picture"][0]);
                                $tempdd.find(".name").html(v["title"]);
                                $tempdd.find(".price").html(v["data"]["min_price"] ? "￥" + v["data"]["min_price"] : "");
                                $tempdl.append($tempdd.prop("outerHTML"));
                            }
                        });
                        if (ji === 0) {
                            $domindex.find(".indexlist").html("");
                        }
                        $domindex.find(".indexlist").append($tempdl.prop("outerHTML"));
                    })

                    $("#index .content").html($domindex.html());
                    $(".swiper-container").swiper({autoplay: 3000, speed: 500,});
                }
                else {
                    console.log("失败" + data.msg);
                }
            }
            , error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }
        });

    });

    //网购设计首页
    $(document).on("pageInit","#designindex",function(e,id,page){
        var $dompage = $(page).clone();
        var $domlogos =  $(".desrow a").eq(0).clone();
        var $domlogostwo =  $(".desrow2 a").eq(0).clone();
        var $domdesproduct =$(".desproduct li").eq(0).clone();
        var $dominspiration =$(".inspiration li").eq(0).clone();
        var $dommore_colimg =$(".more_colimg li").eq(0).clone();
        var $domgaoduandes1 =$(".gaoduandes1 a").eq(0).clone();
        var $domgaoduandes2 =$(".gaoduandes2 a").eq(0).clone();
        var $selistyle =$(".desgin_wrapper .design_slide").eq(0).clone();
        var $domdesginli=$(".desginlist li").eq(0).clone();

        $.ajax({
            type:"POST",
            url:"/App/Design/design",
            dataType:"json",
            data:{},
            timeout:5000,
            success:function(data,status){
                if(data.status === 1){
                    var res=data["data"];
                    var reslogos = res['3'];
                    var resdespro = res['5'];
                    var resinspiration =res['235'];
                    var resgaoduandes =res['234'];
                    var resstlistyle =res['styledata'][1];
                    var resstylename= res["style"];
                    var  stylemodel={
                        "东南亚":'Southeast Asia style',
                        "中式":"Chinese style",
                        "公装":"Frock style",
                        "地中海":"Mediterranean Sea style",
                        '文艺复古':'Literature and art style',
                        '新中式':'Neo-Chinese style',
                        '欧式':'European style',
                        '法式':'French style',
                        '混搭':'Mix style',
                        '现代':'Modern style',
                        '田园':'Countryside style',
                        '美式':'American style',
                        '工装':'Frock style'
                    };
                    $dompage.find(".desgin_wrapper").html("");
                    $.each(resstylename,function(i,v) {
                        $selistyle.find(".desginlist").html("");
                        $selistyle.find(".sundrystyle_z").html(v+["风格"]);
                        $selistyle.find(".sundrystyle_e").html(stylemodel[v]);
                        $selistyle.find(".styleli a").attr("href","/wap/Design/more_afflatus/fengge/"+v+"风格");

                        var resstyleul = resstlistyle[i];
                        if(resstyleul !== null){
                            $.each(resstyleul,function(ii,vv){
                                if(ii<6){
                                    $domdesginli.attr("href",getprourl(vv["id"])).find("img").attr("src",vv["picture"]);
                                    $domdesginli.find("p").html(vv["title"]);
                                    $domdesginli.find(".appcol a").attr("href", dourl(vv));
                                    $selistyle.find(".desginlist").append($domdesginli.prop("outerHTML"));
                                }
                            });
                        }
                        $dompage.find(".desgin_wrapper").append($selistyle.prop("outerHTML"));
                    });

                    $dompage.find(".desproduct").html("");
                    $.each(resdespro,function(i,v){
                        if(i<7){
                            $domdesproduct.find("img").attr("src",v["wap_picture"]);
                            $domdesproduct.find("strong").html(v["title"]);
                            $domdesproduct.find(".metre").html(v["data"]["min_price"]);
                            $domdesproduct.find(".del").html(v["data"]["max_price"]);
                            $domdesproduct.find("a").attr("href", dourl(v));
                            $dompage.find(".desproduct").append($domdesproduct.prop("outerHTML"));
                        }
                    });
                    $dompage.find(".desrow").html("");
                    $.each(reslogos,function(i,v){
                        if(i<7){
                            $domlogos.find("img").attr("src",v["wap_picture"]);
                            $domlogos.find("img").parent().attr("href", dourl(v));
                            $dompage.find(".desrow").append($domlogos.prop("outerHTML"));
                        }
                    });
                    $dompage.find(".desrow2").html("");
                    $.each(reslogos,function(i,v){
                        if(i>9){
                            $domlogostwo.find("img").attr("src",v["wap_picture"]);
                            $domlogostwo.find("img").parent().attr("href", dourl(v));
                            $dompage.find(".desrow2").append($domlogostwo.prop("outerHTML"));
                        }
                    });
                    $dompage.find(".inspiration").html("");
                    $.each(resinspiration,function(i,v){
                        if(i<7){
                            $dominspiration.find("img").attr("src",v["data"]["headpic"]);
                            $dominspiration.find("p").html(v["title"]);
                            $dominspiration.find(".moneys").html(v['data']['min_price']);
                            $dominspiration.find("a").attr("href", dourl(v));
                            $dompage.find(".inspiration").append($dominspiration.prop("outerHTML"));
                        }
                    });
                    $.each(resinspiration,function(i,v){
                        $dommore_colimg.find("img").attr("src",v["data"]["headpic"]);
                        $dommore_colimg.find("p").html(v["title"]);
                        $dommore_colimg.find(".moneys").html(v['data']['min_price']);
                        $dommore_colimg.find("a").attr("href", dourl(v));
                        $dompage.find(".more_colimg").append($dommore_colimg.prop("outerHTML"));
                    });

                    $dompage.find(".gaoduandes1").html("");
                    $.each(resgaoduandes,function(i,v){
                        if(i<3){
                            $domgaoduandes1.find(".img_1").attr("src",v["picture"][0]);
                            $domgaoduandes1.find(".img_2").attr("src",v["picture"][1]);
                            $domgaoduandes1.find(".name").html(v["title"]);
                            $domgaoduandes1.find(".description").html(v["description"]);
                            $domgaoduandes1.attr("href", dourl(v));
                            $dompage.find(".gaoduandes1").append($domgaoduandes1.prop("outerHTML"));
                        }
                    });
                    $dompage.find(".gaoduandes2").html("");
                    $.each(resgaoduandes,function(i,v){
                        if(i>2){
                            $domgaoduandes2.find(".img_1").attr("src",v["picture"][0]);
                            $domgaoduandes2.find(".img_2").attr("src",v["picture"][1]);
                            $domgaoduandes2.find(".name").html(v["title"]);
                            $domgaoduandes2.find(".description").html(v["description"]);
                            $domgaoduandes2.attr("href", dourl(v));
                            $dompage.find(".gaoduandes2").append($domgaoduandes2.prop("outerHTML"));
                        }
                    });
                    $(page).html($dompage.html());

                    $(".desswiper").swiper({
                        pagination: '.desswiper .desgintion',
                        slidesPerView:1,
                        paginationClickable: true,
                        nextButton: '.desswiper .desnext',
                        prevButton: '.desswiper .desprev',
                        spaceBetween: 30
                    });

                    $(".di_container1").swiper({
                        pagination: '.di_container1 .swiper-pagination',
                        slidesPerView: 1,
                        paginationClickable: true,
                        nextButton: '.di_container1 .button-next1',
                        prevButton: '.di_container1 .button-prev1',
                        spaceBetween: 30
                    });
                    $(".di_container2").swiper({
                        pagination: '.di_container2 .swiper-pagination',
                        slidesPerView: 1,
                        paginationClickable: true,
                        nextButton: '.di_container2 .button-next2',
                        prevButton: '.di_container2 .button-prev2',
                        spaceBetween: 30
                    });
                    $(".swiper-container12").swiper({
                        autoplay:5000,
                        speed:500,
                        loop: true,
                        slidesPerView: 1,
                        pagination: '.swiper-container12 .swiper-pagination',
                        paginationClickable: true,
                        nextButton: '.swiper-container12 .esign_comlogoul_next',

                        spaceBetween: 30


                    });

                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    });

    //网购工人首页
    $(document).on("pageInit","#worindex",function(e,id,page){
        var $dompage = $(page).clone();
        var $domworse =$(".worse li").eq(1).clone();
        var $domgoldmedal =$(".personnel li").eq(0).clone();
        var $domgoldmedal2 =$(".personnel li").eq(3).clone();
        var $domhandyman = $(".handyman li").eq(0).clone();
        var $domcommend = $(".worresrecommend li").eq(0).clone();
        $.ajax({
            type:"POST",
            url:"/App/Worker/worker",
            dataType:"json",
            data:{},
            timeout:5000,
            success:function(data,status){
                if(data.status === 1){
                    var res= data["data"];
                    var resworse = res['124'];
                    var resgomedal = res['125'];
                    var reshandyman = res['126'];
                    var resrecommend = res['127'];


                    $dompage.find(".worse .coltwo").remove();
                    $.each(resworse,function(i,v){
                        if(i<4){
                            var resprcpng =v["picture"][1];
                            $domworse.find(".worddimg").attr("src",resprcpng);
                            $domworse.find(".names").html(v["data"]["workername"]);
                            $domworse.find(".price").html(v["data"]["min_price"]);
                            $domworse.find(".worlife span").html(v["data"]["workyears"]);
                            $domworse.find(".allhref").attr("href",dourl(v));
                            var star =v["data"]["star"];
                            $domworse.find(".star").attr("style","width:"+star*20+"%");
                            $dompage.find(".worse").append($domworse.prop("outerHTML"));
                        }
                    });

                    $dompage.find(".personnel").html("");
                    $.each(resgomedal,function(i,v) {
                        if(i<4){
                            $domgoldmedal.find("img").attr("src",v["data"]["headpic"]);
                            $domgoldmedal.find("strong").html(v["data"]["workername"]);
                            $domgoldmedal.find(".year").html(v["data"]["workyears"]);
                            $domgoldmedal.find(".imgspan").html(v["title"]);
                            $domgoldmedal.find(".pred span").html(v["data"]["min_price"]);
                            $domgoldmedal.find(".allhref").attr("href",dourl(v));
                            $domgoldmedal.find(".bespoke").attr("href",dourl(v));
                            $dompage.find(".personnel").append($domgoldmedal.prop("outerHTML"));
                        }
                        else{
                            $domgoldmedal2.find("img").attr("src",v["data"]["headpic"]);
                            $domgoldmedal2.find("strong").html(v["data"]["workername"]);
                            $domgoldmedal2.find(".year").html(v["data"]["workyears"]);
                            $domgoldmedal2.find(".imgspan").html(v["title"]);
                            $domgoldmedal2.find(".pred span").html(v["data"]["min_price"]);
                            $domgoldmedal2.find(".region").html(v["data"]["hometown"]);
                            $domgoldmedal2.find(".allhref").attr("href",dourl(v));
                            $domgoldmedal2.find(".bespoke").attr("href",dourl(v));
                            $dompage.find(".personnel").append($domgoldmedal2.prop("outerHTML"));
                        }
                    });

                    $dompage.find(".handyman").html("");
                    $.each(reshandyman,function(i,v){
                        $domhandyman.find("img").attr("src",v["wap_picture"]);
                        $domhandyman.find("strong").html(v["data"]["workername"]);
                        $domhandyman.find(".year").html(v["data"]["workyears"]);
                        $domhandyman.find(".region").html(v["data"]["hometown"]);
                        $domhandyman.find(".pred span").html(v["data"]["min_price"]);
                        $domhandyman.find(".imgspan").html(v["data"]["title"]);
                        $domhandyman.find(".allhref").attr("href",dourl(v));
                        $domhandyman.find(".bespoke").attr("href",dourl(v));
                        $dompage.find(".handyman").append($domhandyman.prop("outerHTML"));
                    });

                    $dompage.find(".worresrecommend").html("");
                    $.each(resrecommend,function(i,v){
                        console.log(resrecommend);
                        $domcommend.find("img").attr("src",v["wap_picture"]);
                        $domcommend.find("strong").html(v["data"]["workername"]);
                        $domcommend.find(".year").html(v["data"]["workyears"]);
                        $domcommend.find(".region").html(v["data"]["hometown"]);
                        $domcommend.find(".pred span").html(v["data"]["min_price"]);
                        $domcommend.find(".imgspan").html(v["data"]["title"]);
                        $domcommend.find(".allhref").attr("href",dourl(v));
                        $domcommend.find(".bespoke").attr("href",dourl(v));
                        $dompage.find(".worresrecommend").append($domcommend.prop("outerHTML"));
                    });

                    $(page).html($dompage.html());
                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    });


    $(document).on("pageInit","#materials",function(e,id,page){
        var $dompage = $(page).clone();
        var $domtuijianli = $(".tuijian li").eq(0).clone();
        var $domcarousel = $(".carousel li").eq(0).clone();
        var $dommatekeycon = $(".matekeycon li ").eq(0).clone();
        var $domselling = $(".selling li ").eq(0).clone();
        var $domsellia = $domselling.find("a").eq(0).clone();
        $domselling.html("");
        var arcat= [238,239,240,241,242,243];

        $.ajax({
            type:"POST",
            url: "/App/Principal/principal",
            dataType:"json",
            data: {},
            timeout:5000,
            success: function(data,status){
                if(data.status === 1){
                    var res=data["data"];
                    var rescarousel = res['166'];
                    var resselling =res['29'];
                    var resmatekeycon =res['40'];


                    $dompage.find(".carousel").html("");
                    $.each(rescarousel,function(i,v){
                        $domcarousel.find(".lbimg").attr("src",v["wap_picture"]);
                        $domcarousel.find(".lbimg").parent().attr("href",dourl(v));
                        $dompage.find(".carousel").append($domcarousel.prop("outerHTML"));
                    });

                    $dompage.find(".matekeycon").html("");
                    $.each(resmatekeycon,function(i,v){
                        $dommatekeycon.find("img").attr("src",v["wap_picture"]);
                        $dommatekeycon.find("a").attr("href",dourl(v));
                        $dompage.find(".matekeycon").append($dommatekeycon.prop("outerHTML"));
                    });

                    var $domsellout = $dompage.find(".selling");
                    $domsellout.html("");
                    $.each(resselling,function(i,v){
                        if(i%2 === 1){
                            $domsellout.find("a").attr("href",dourl(v));
                            $domsellout.append($domselling.prop("outerHTML"));
                        }
                        $domsellia.find(".funimg").attr("src",v["wap_picture"]);
                        $domsellia.find(".pictimg img").attr("src",v["picture"][1]);
                        $domsellia.find(".ptitle").html(v["title"]);
                        $domsellout.find("li").last().append($domsellia.prop("outerHTML"));
                    });

                    $.each(arcat,function(ii,vv){
                        var resnowtj = res[vv];
                        console.log(resnowtj);
                        var $domnowtj = $dompage.find(".tuijian").eq(ii);
                        $domnowtj.html("");
                        $.each(resnowtj,function(i,v){
                            if(i>1 && i<6){
                                $domtuijianli.find("img").attr("src",v["wap_picture"]);
                                $domtuijianli.find(".introduce").html(v["title"]);
                                $domtuijianli.find(".pricefur span").html(v["data"]["min_price"]);
                                $domtuijianli.find(".toprod").attr("href",dourl(v));
                                $domnowtj.append($domtuijianli.prop("outerHTML"));
                            }
                        });
                    });

                    $(page).html($dompage.html());

                    $(".swiperztcom").swiper({
                        autoplay: 3000,
                        speed: 500
                    });
                    $(".swiper-container-keyprods").swiper({

                        pagination: '.swiper-container-keyprods .swiper-pagination',
                        paginationClickable: true,
                        nextButton: '.swiper-container-keyprods .swiper-button-next',
                        prevButton: '.swiper-container-keyprods .swiper-button-prev',
                        spaceBetween: 30
                    });
                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });


    });

    $(document).on("pageInit","#prodshow",function(e,id,page){
        //$(".appraise .num").html(0);
        //$(".allevaluation").html("");

        var proid = $(page).attr("data-proid");
        $(".dlprot").attr("data-id",proid);


        $.ajax({
            type:"POST",
            url: "/app/product/productinfo/id/"+proid,
            dataType:"json",
            data: {},
            timeout:5000,
            success: function(data,status){
                if(data.status === 1){
                    var data = data["data"];
                    var shopid = data["shopid"];
                    $domprodshow = $(".proshowcontent").clone();
                    // 轮播图
                    // $(".swiper-wrapper .swiper-slide").find("img").attr("src",data.headpic);
                    var dataswiper = data["picture"];
                    var dataswiperArr = dataswiper.split(",");
                    var $tempswiper = $("<div></div>");
                    var $swiperdom = $(".swiper-wrapper .swiper-slide").clone();
                    $.each(dataswiperArr, function(i,v){
                        $swiperdom.find("img").attr("src", v);
                        $swiperdom.find("a").attr("href", dourl(v));
                        $tempswiper.append($swiperdom.prop("outerHTML"));
                    });
                    $domprodshow.find(".swiper-wrapper").html($tempswiper.html());
                    var picfirst = dataswiperArr.length>0 ? dataswiperArr[0] : "";
                    var rehttp =  /http/gi;
                    if(!rehttp.test(picfirst)){ picfirst = ("http://"+window.location.host) + picfirst; }

                    sharecon.title = data["title"];
                    sharecon.imgUrl = picfirst.length>0 ? picfirst : sharecon.imgUrl;
                    sharecon.desc = data["sell_points"];
                    reshare();

                    // 轮播图片描述
                    var $prodtitle = $(".prod_title").clone();
                    // var $titletext = $prodtitle.find(".title_text").clone();
                    $prodtitle.find(".title_text h4").html(data.title);

                    //=---------------
                    //$prodtitle.find(".title_text p").html(data.sell_points);
                    //console.log(data.sell_points);
                    // var $jiage = $prodtitle.find(".jiage").clone();
                    var price_block = (data.max_price == data.min_price) ? '' : '-' + data.max_price;
                    $prodtitle.find(".jiage .zt_price strong").html('<i>￥</i>' + data.min_price + price_block );
                    $prodtitle.find(".zt_price .tip").html(data.pay_mode);
                    var price_block_ori = (data.max_price_ori == data.min_price_ori) ? '' : '-' + data.max_price_ori;
                    $prodtitle.find(".storeprice del").html(data.min_price_ori + price_block_ori);
                    // var $pingjia = $prodtitle.find(".pingjia")
                    $prodtitle.find(".pingjia li").eq(0).find("span").html(data.comments);
                    $prodtitle.find(".pingjia li").eq(1).find("span").html(data.count_sold);
                    $prodtitle.find(".pingjia li").eq(2).find("span").html(data.count_comment);
                    $domprodshow.find(".prod_title").html($prodtitle.html());


                    // 新版店铺详细信息
                    var $shopinshow = $(".shopinshow").clone();

                    $shopinshow.find(".shoplogo img").attr("src",data.headpic);
                    $shopinshow.find(".name").html(data.shopname);
                    $shopinshow.find(".shopageem").html(data.years);
                    $shopinshow.find(".final span").eq(0).html(data.shopaddr);
                    $shopinshow.find(".final span").eq(1).html("电话：" + data.shopphone);
                    $shopinshow.find(".name").attr("data-shopid",data.shopid);
                    $domprodshow.find(".shopinshow").html($shopinshow.html());

                    // 旧版店铺详细信息
                    //var $shoppart = $(".shop_part").clone();
                    //$shoppart.find(".shop_name dt img").attr("src",data.shoplogo);
                    //$shoppart.find(".shop_name dd p").html(data.shopname);
                    //$shoppart.find(".shop_name dd .renzheng").html('<img src="/statics/wap/images/show/identificationicon.png"' + data.certification);
                    //$shoppart.find(".shop_name dd .shopage").html("<i>"+data.years+"</i>线下"+data.years+"年店");
                    //$shoppart.find(".final span").eq(0).html(data.shopaddr);
                    //$shoppart.find(".final span").eq(1).html("电话：" + data.shopphone);
                    //$domprodshow.find(".shop_part").html($shoppart.html());

                    $domprodshow.find(".toshop").attr("href","/wap/shop/index/domain/"+data.shopdomain);
                    $(".concern-cart").find(".toshop").attr("href","/wap/shop/index/domain/"+data.shopdomain);

                    $domprodshow.find(".prodescbox ").html(data["show"]);
                    if($domprodshow.find(".prodescbox .zfh").length >0){
                        var rateio = parseFloat($("body").width()/790).toFixed(2);
                        var zfhheight =  parseInt(parseFloat($domprodshow.find(".prodescbox .zfh").css("height").replace('px','')).toFixed(0)) ;
                        $zfh = $domprodshow.find(".prodescbox .zfh");
                        $zfh[0].style.transform = "scale("+rateio+")";
                        $zfh[0].style.webkitTransform = "scale("+rateio+")";
                        $domprodshow.find(".prodescbox").css("height",zfhheight*rateio+100 +"px");
                    }

                    // 产品详情
                    var $pop_proparamsel = $(".pop-proparamsel").clone();
                    var price_json= JSON.parse(data.price_json);
                    $pop_proparamsel.find(".summary .img").find("img").attr("src",data.headpic);
                    $pop_proparamsel.find(".summary .main").find(".priceContainer .price").html("￥" + data.min_price);
                    $pop_proparamsel.find(".summary .main").find(".stock-control .stock").html("<label class='label'>库存：</label>" + data.number);
                    $(".pop-proparamsel").find(".summary").html($pop_proparamsel.find(".summary").html());


                    jsonprice={};
                    var arprotyname=[];
                    var arproty=[];
                    var $dl = $("<dl></dl>");
                    $.each(price_json,function(i,v){

                        var thisprice= {};
                        thisprice[v.hidden_value] = {"price":v.price,"price_act":v.price_act,"quantity":v.quantity,"tsc":v.tsc,"barcode":v.barcode};
                        var k=0;
                        var strkey="";
                        $.each(v,function(ii,vv){
                            if(typeof(vv)==="object"  ){
                                if(!arprotyname[k] ){
                                    arprotyname.push(ii);
                                    var objtemp={};
                                    objtemp[vv["vid"]]= vv;
                                    arproty.push(objtemp);
                                }
                                else{
                                    arproty[k][vv["vid"]]=vv;
                                }
                                strkey+= vv.txt+ vv.idx;
                            }
                            k++;
                        });

                        jsonprice[strkey]= v;
                    });

                    $.each(arprotyname,function(i,v){
                        $dl.append("<dt>"+arprotyname[i]+"</dt>");
                        var $dd=$("<dd></dd>");
                        $.each(arproty[i],function(ii,vv){
                            var ishaspic = !!vv["pictures"] && !!vv["pictures"]["0"];
                            $dd.append("<a href=\"javascript:void(0)\" data-idx=\""+vv["idx"]+"\" data-txt=\""+vv["txt"]+"\" data-vid=\""+vv["vid"]+"\"  class=\""+ ( ishaspic? "haspic":"" )+"\" >"+ (ishaspic ? "<img alt=\""+vv.txt+"\" src=\""+vv["pictures"]["0"]+"\">" :"") +"<span>"+vv.txt+"</span></a>")
                        });
                        $dl.append($dd);
                        $dl.append("<s></s>");
                    });

                    $(".dlprot").html($dl.html());




                    // 产品参数
                    var $popproparms = $(".pop-proparams").clone();
                    $popproparms.find("ul").html("");
                    function proshowstr(jsonproval){
                        var str="";
                        $.each(jsonproval,function(i,v){str+="<li><span>"+i+"</span><p>"+v+"</p></li>"});
                        return str;
                    }
                    $popproparms.find(".parameterscon ul").append(proshowstr(data.key_prop) + proshowstr(data.nokey_prop));
                    $(".pop-proparams ul").html($popproparms.find("ul").html());

                    $(".proshowcontent").html($domprodshow.html());

                    $.ajax({
                        type:"POST",
                        url: "/api/Collection/checkcollection",
                        dataType:"json",
                        data: {"type":2,"itemid":shopid},
                        timeout:5000,
                        success: function(data) {
                            if (data.status === "1") {
                                $(".bookmark").html("已收藏店铺").addClass("on_collect");
                            }
                            else {
                                //console.log("失败111"+data.msg);
                            }
                        }
                    });
                    //产品收藏
                    $.ajax({
                        type:"POST",
                        url: "/api/Collection/checkcollection",
                        dataType:"json",
                        data: {"type":1,"itemid":shopid},
                        timeout:5000,
                        success: function(data) {
                            if (data.status === "1") {
                                $(".textcoll").html("已收藏").addClass("procollect_on");

                            }
                            else {
                                //console.log("失败"+data.msg);

                            }
                        }
                    });

                    $(".swiper-container").swiper({autoplay:3000,speed:500,pagination: '.swiper-pagination',paginationType: 'fraction'});

                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }

        });
    });


    $(document).on("click", ".favshop", function () {
        var isdel = $(this).hasClass("on_collect");
        if(isdel){
            $.confirm("确认取消关注！",function(){
                shopfav(isdel);
            });
        }
        else{
            shopfav(isdel);
        }
    });
    function shopfav(isdel){
        var shopid= $(".name").attr("data-shopid");
        $.ajax({
            type: "POST",
            url: "/Api/Collection/addcollection",
            dataType: "json",
            data: {"type":2,"itemid":shopid,"isdelete":(isdel?1:0)},
            timeout: 5000,
            success: function (data) {
                console.log(isdel);
                if (data.status === 1) {
                    if(isdel){
                        $(".bookmark").html("收藏店铺").removeClass("on_collect");
                    }
                    else{
                        $(".bookmark").html("已收藏店铺").addClass("on_collect");
                    }
                }
                else {
                    console.log("失败"+data.msg);
                }
            },
            error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }

        });
    }


    $(document).on("click", ".textcoll", function () {
        var isdels = $(this).hasClass("procollect_on");
        console.log(isdels);
        if(isdels){
            $.confirm("确认取消关注！",function(){
                shopcoll(isdels);
            });
        }
        else{
            shopcoll(isdels);
        }
    });
    function shopcoll(isdels){
        var shopid= $(".name").attr("data-shopid");
        console.log(shopid);
        $.ajax({
            type: "POST",
            url: "/Api/Collection/addcollection",
            dataType: "json",
            data: {"type":1,"itemid":shopid,"isdelete":(isdels?1:0)},
            timeout: 5000,
            success: function (data) {

                if (data.status === 1) {
                    if(isdels){
                        $(".textcoll").html("收藏").removeClass("procollect_on");
                    }
                    else{
                        $(".textcoll").html("已收藏").addClass("procollect_on");
                    }
                }
                else {
                    console.log("失败"+data.msg);
                }
            },
            error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }
        });
    }



    $(document).on("pageInit","#liancecon",function(e,id,page){
        var $dompage = $(page).clone();
        var $domcarousel = $(".carousel li").eq(0).clone();
        var $domdiscount = $(".discountli li").eq(0).clone();
        var $domresbrand= $(".allbrand li").eq(0).clone();
        var $domtuijianli = $(".tuijian li").eq(0).clone();
        var arcat = [67,68,69,70,71,72,73];
        $.ajax({
            type:"POST",
            url:"/App/Electrical/electrinfo",
            dataType:"json",
            data: {},
            timeout:5000,
            success: function(data,status){
                if(data.status === 1){
                    var res= data["data"];
                    var rescarousel = res['168'];
                    var resdiscount = res['89'];
                    var resbrand =res['88'];

                    $dompage.find(".carousel").html("");
                    $.each(rescarousel,function(i,v){
                        $domcarousel.find(".alimg").attr("src",v["wap_picture"]);
                        $domcarousel.find(".alimg").parent().attr("href",dourl(v));
                        $dompage.find(".carousel").append($domcarousel.prop("outerHTML"));
                    });

                    $dompage.find(".liangroom").eq(0).find(".imsg").attr("src",res["128"]["1"]["wap_picture"]);
                    $dompage.find(".liangroom").eq(0).find("a").attr("href",dourl(res["128"]["1"]));
                    $dompage.find(".liangroom").eq(1).find(".imsg").attr("src",res["129"]["1"]["wap_picture"]);
                    $dompage.find(".liangroom").eq(1).find("a").attr("href",dourl(res["129"]["1"]));

                    $dompage.find(".discountli").html("");
                    $.each(resdiscount,function(i,v){
                        if(i<4){
                            $domdiscount.find("img").attr("src",v["wap_picture"]);
                            $domdiscount.find("img").parent().attr("href",dourl(v));
                            $dompage.find(".discountli").append($domdiscount.prop("outerHTML"));
                        }
                    });

                    $dompage.find(".allbrand").html("");
                    $.each(resbrand,function(i,v){
                        if(i>1 && i<11) {
                            $domresbrand.find("img").attr("src",v["wap_picture"]);
                            $domresbrand.find("img").parent().attr("href",dourl(v));

                            $dompage.find(".allbrand").append($domresbrand.prop("outerHTML"));
                        }
                    });

                    $.each(arcat,function(ii,vv){
                        var resnowtj = res[vv];
                        var $domnowtj = $dompage.find(".tuijian").eq(ii);
                        $domnowtj.html("");
                        $.each(resnowtj,function(i,v){
                            if(i>1 && i<8){
                                $domtuijianli.find("img").attr("src",v["picture"][0]);
                                $domtuijianli.find(".introduce strong").html(v["shopname"]);
                                $domtuijianli.find(".introduce span").html(v["title"]);
                                $domtuijianli.find(".maxprice").html(v["data"]["max_price"]);
                                $domtuijianli.find(".minprice").html(v["data"]["min_price"]);
                                $domtuijianli.find(".allhref").attr("href",dourl(v));
                                $domnowtj.append($domtuijianli.prop("outerHTML"));
                            }
                        });
                    });
                    $(page).html($dompage.html());
                    $(".swiperztcom").swiper({
                        autoplay: 3000,
                        speed: 500
                    });
                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });


    });

    $(document).on("pageInit","#furnindex",function(e,id,page){
        var $dompage = $(page).clone();
        var $domtuijianli = $(".tuijian li").eq(0).clone();
        var $domcarousel = $(".carousel li").eq(0).clone();
        var $domselling = $(".selling li ").eq(0).clone();
        var $domsellia = $domselling.find("a").eq(0).clone();
        $domselling.html("");
        var arcat= [244,245,246,247,248,249];
        $.ajax({
            type:"POST",
            url: "/App/Furniture/furniture",
            dataType:"json",
            data: {},
            timeout:5000,
            success: function(data,status){
                if(data.status === 1){
                    var res=data["data"];
                    var rescarousel = res['169'];
                    var resselling =res['90'];

                    $dompage.find(".carousel").html("");
                    $.each(rescarousel,function(i,v){
                        $domcarousel.find(".lbimg").attr("src",v["wap_picture"]);
                        $domcarousel.find(".lbimg").parent().attr("href",dourl(v));
                        $dompage.find(".carousel").append($domcarousel.prop("outerHTML"));

                    });

                    var $domsellout = $dompage.find(".selling");
                    $domsellout.html("");
                    $.each(resselling,function(i,v){
                        if(i%2 === 1){
                            $domsellout.append($domselling.prop("outerHTML"));
                        }
                        $domsellia.find("img").attr("src",v["wap_picture"]);
                        $domsellia.find("img").parent().attr("href",dourl(v));
                        $domsellout.find("li").last().append($domsellia.prop("outerHTML"));
                    });

                    $.each(arcat,function(ii,vv){
                        var resnowtj = res[vv];
                        var $domnowtj = $dompage.find(".tuijian").eq(ii);
                        $domnowtj.html("");
                        $.each(resnowtj,function(i,v){
                            if(i<5){
                                $domtuijianli.find("img").attr("src",v["wap_picture"]);
                                $domtuijianli.find(".introduce").html(v["title"]);
                                $domtuijianli.find(".pricefur span").html(v["data"]["min_price"]);
                                $domtuijianli.find(".toprod").attr("href",dourl(v));
                                $domnowtj.append($domtuijianli.prop("outerHTML"));
                            }
                        });
                    });


                    if(window.history.length === 1){
                        $dompage.find(".opcheader").addClass("syheader");
                    }

                    $(page).html($dompage.html());

                    $(".swiperztcom").swiper({
                        autoplay: 3000,
                        speed: 500
                    });
                    $(".swiper-container-keyprods").swiper({
                        pagination: '.swiper-container-keyprods .swiper-pagination',
                        paginationClickable: true,
                        nextButton: '.swiper-container-keyprods .swiper-button-next',
                        prevButton: '.swiper-container-keyprods .swiper-button-prev',
                        spaceBetween: 30
                    });
                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    });

    $(document).on('infinite', '.proshowcontent',function() {
        if($("#tab_pro .prodescbox").length === 0){
            $(".prodescbox").clone().appendTo("#tab_pro");
        }
    });

    $(document).on("click",".tablinkcomment",function(){
        var proid = $("#prodshow").attr("data-proid");
        $domappraiseli = $(".allevaltmp li").clone();
        $tempdiv = $("<div></div>");

        $.ajax({
            type:"POST",
            url: "/Api/Comment/lists/productid/"+proid,
            dataType:"json",
            data: {},
            timeout:5000,
            success: function(data,status){
                if(data.status === 1){
                    var res=data["data"];
                    $("ul.appraise").find(".numall").html(res.length);
                    $("ul.appraise").find(".numadd").html(0);
                    $.each(res,function(i,v){
                        $domappraiseli.find(".username").html(v["username"]);
                        $domappraiseli.find(".pics img").attr("src",v["image"]);
                        $domappraiseli.find(".evalcon").html(v["content"]);
                        $domappraiseli.find(".times").html(v["addtime"]);
                        var star =v["star"];
                        star=2.5;
                        $domappraiseli.find(".star").attr("style","width:"+star*20+"%");

                        $tempdiv.append($domappraiseli.prop("outerHTML"));
                    });
                    console.log($tempdiv.html());

                    $(".allevaluation").html($tempdiv.html());


                }
                else{
                    console.log("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    });


    $(document).on("click",".dlprot dd a",function(){

        if(!$(this).hasClass("on")){
            $(this).addClass("on").siblings().removeClass("on");
            var isneedch = true;
            var indexstr= "";
            var indexvidstr="";
            var indextxtstr="";
            var temptxtstr="";
            $(".dlprot dd").each(function(i,v){
                isneedch= isneedch && $(this).find(".on").length;
                temptxtstr += ($(this).find(".on").length ? $(this).find(".on").attr("data-txt") : "");
                if(isneedch){
                    indexstr+= $(this).find(".on").attr("data-txt") + $(this).find(".on").attr("data-idx");
                    indexvidstr+= $(this).find(".on").attr("data-vid")+"|";
                    indextxtstr+= $(this).prev("dt").html()+"^"+$(this).find(".on").attr("data-txt")+"|";
                }
            });
            $(".summary .seledtxt").html(temptxtstr);
            if(isneedch){
                $(".dlprot").hasClass("dlproton") && $(".dlprot").removeClass("dlproton");
                var objpricenow= jsonprice[indexstr];
                $(".summary .price").html(  (typeof(objpricenow.price_act)!=="undefined" && !isNaN(objpricenow.price_act))? "￥"+objpricenow.price_act : "暂无"  );
                //$(".zt_oriprice s").html( (!!objpricenow.price)? "￥"+objpricenow.price : "暂无"  );
                $(".summary .stock").html( (!!objpricenow.quantity)? objpricenow.quantity : "0"  );
                $(".dlprot").attr("data-price",(  (!!objpricenow.price_act)? objpricenow.price_act : "暂无"  ))
                $(".dlprot").attr("data-index",(!!objpricenow.hidden_value) ? objpricenow.hidden_value : indexstr).attr("data-vidindex",indexvidstr).attr("data-txtindex",indextxtstr);
            }
        }
    });


    $(document).on("click",".cart-concern-btm-fixed .btnbuy",function(){
        $.popup(".pop-proparamsel");
    });

    $(document).on("click",".btnopbuynum [type='button']",function(){
        var $inpbuynum = $(this).siblings("input[type='number']");
        console.log($inpbuynum);
        var buynum = $inpbuynum.val();
        if(isNaN(buynum)) return false;
        buynum = parseInt(buynum);
        $(this).hasClass("add") ? buynum++ : buynum--;
        if(buynum<1) buynum=1;
        $inpbuynum.val(buynum) ;
        return false;
    });

    $(document).on("click",".pop-proparamsel .option button",function(){

        if($(this).hasClass("btnbuynow")){
            var fn =function(){

                if(!!$.fn.cookie("apptype")){

                    if("android" === $.fn.cookie("apptype")){
                        JSInterFace.getToApp('cart');
                    }
                    else if("ios" === $.fn.cookie("apptype") ){
                        window.location.href = "ios://getToApp/|/cart/-/"+encodeURI(window.location.href);
                    }
                }
                else{
                    $.router.load("/wap/cart/index");
                }
            };
            showprotocart(fn);
        }
        else{
            showprotocart();
        }

    });






    $(document).on("pageInit", "#reg", function(e, id, page) {
        nowvercount=60;

    });

    $(document).on("pageInit","#pageorderqr",function(e,id,page){
        if (!!$.fn.cookie("gs1_spf_userid")){
            //window.location.reload();
        }
    });

    $(document).on("click",".btnsellerregfrom_verify",function(){
        var $btngetcode=$(this);
        $btngetcode.attr("disabled","disabled");
        var mobile=$("[name='mobile']").val().replace(/\s+/g,"");
        sendsms(mobile,$btngetcode);
    });

    $(document).on('click','.alert-text-title', function () {
        $.alert('400-003-3030', '装途客服电话');
    });

    $(document).on('click','.regbtnon',function(){
        $("[name='username']").val($("[name='mobile']").val());
        $.ajax({
            type : "POST",
            url : '/app/Member/register',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : $("form").serialize(),
            success : function(result) {
                console.log(result);
                if(result.status === 1){
                    $.toast("注册成功");
                    setTimeout(function(){$.router.back()},500);
                }
                else{
                    $.toast(result.msg);
                    console.log(result.msg);
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });
        return false;
    });




    $(document).on("pageInit","#cartlist",function(e,id,page){

        if(!!$.fn.cookie("cartproid")){
            var strcartproid = $.fn.cookie("cartproid");
            arcartpro = strcartproid.split(",");
            $.each(arcartpro,function(i,v){
                var $eminp= $("[data-emcid='"+v+"']");
                $eminp.addClass("on").siblings("input").prop("checked",true);
            })
        }


        $(".ulcartlist .inptem").each(function(){
            $(this).prop("checked",$(this).siblings(".eminp").hasClass("on"));
        });

        freshcartall();

        $(page).on("click","[type='submit']",function(){
            if($("#cartlist .ulcartlist :checked").length === 0 ){
                $.toast("请选择产品");
                return false;
            }
        })

    });




    $(document).on("change",".ulcartlist .inpnum",function(){
        var id = $(this).closest("table").attr("data-id");
        var nowval = $(this).val();
        if(!/^(\d)+$/.test(nowval)  || parseInt(nowval)<1 ){$(this).val($(this).attr("data-orival"));return false;}
        nowval = parseInt(nowval);

        freshcartone(id);
        freshcartall();
    });



    $(document).on("click",".btnopbuynum",function(e){
        console.log(e);
        e.stopPropagation();

        var id = $(this).closest("table").attr("data-id");
        var $inpbuynum = $(this).siblings("input[type='text']");
        var buynum = $inpbuynum.val();
        if(isNaN(buynum)) return false;
        buynum = parseInt(buynum);
        var addnum = $(this).hasClass("add")? 1 : -1;
        buynum += addnum;
        if(buynum<1) {buynum=1;addnum=0;}
        if(addnum === 0){return false;}
        $inpbuynum.val(buynum);

        $.ajax({
            type:"POST",
            url: "/Buyer/Cart/api",
            dataType:"json",
            data: {"act":"num","num":buynum,"id":id},
            timeout:5000,
            success: function(result){
                if(result.status==1){
                    freshcartone(id);
                    freshcartall();
                }
                else{
                    alert("失败"+result.msg);
                }
            }
            ,error:function(xXHR, xtextStatus, xerrorThrown){
                console.log(xtextStatus+"\n"+xerrorThrown);
            }
        });


        return false;
    });



    $(document).on("click",".ulcartlist .btndel",function(){
        $btndel = $(this);
        $product = $(this).closest("li");
        $uls = $product.find("table");

        $.confirm("是否从购物车删除?",

            function(){

                $uls.each(function(i,v){
                    var $ul =$(v);
                    $.ajax({
                        type:"POST",
                        url: "/Buyer/Cart/api",
                        dataType:"json",
                        data: {"act":"del","id":$ul.attr("data-id")},
                        timeout:5000,
                        success: function(result){
                            if(result.status==1){
                                if( $product.find("table").length === 1 ){
                                    $product.remove();
                                }
                                else {
                                    $ul.remove();
                                }
                                freshcartall();
                                freshpubcart();
                            }
                            else{
                                $.toast.msg("删除失败!");
                            }
                        }
                        ,error:function(xXHR, xtextStatus, xerrorThrown){
                            $.toast.msg("删除失败!");
                            console.log(xtextStatus+"\n"+xerrorThrown);
                        }
                    });
                })


            },
            function(){

            }
        )
    });

    $(document).on("click",".ulcartlist table em",function(){
        $eminp =$(this);
        $eminp.toggleClass("on");
        $eminp.siblings("input").prop("checked",$eminp.hasClass("on"));
        freshcartall();
        return false;
    });


    $(document).on("click",".btncartlistinfo",function(){
        $.alert($(this).attr("data-txt"));
    });


    $(document).on('click','.confirm-ok', function () {
        if($(".page-current").attr("id") === "pageorderconfirm"){
            $.confirm('确定放弃付款', function () {
                $.closeModal(".popup-payway");
                $.router.load("/wap/order/index/from/"+($(".btntoface").hasClass("on")?"qrcode":""));
            });
        }
        else{
            $.closeModal(".popup-payway");
        }
    });


    $(document).on("pageInit","#pageorderconfirm",function(e,id,page){
        //$.popup(".popup-payway");

        if($.device.isWeixin) {
            $(".btntoalipay").hide().siblings().css("display","block");
        }
        else{
            $(".btntowxpay").hide().siblings().css("display","block");
        }

        if($(page).attr("data-from") === "qrcode"){
            $(".btntoface").trigger("click");
        }
        else{
            if($.device.isWeixin) {
                $(".btntowxpay").trigger("click");
            }
            else{
                $(".btntoalipay").trigger("click");
            }
        }
    })

    $(document).on("pageInit","#pageaddrlist",function(e,id,page){


        if($("#pageaddrlist .content-address .wap-address").length  === 0){

            // 打开页面初始化数据库中的list
            $.ajax({
                type : "POST",
                url : '/Api/Buyeraddr/lists',
                async : false,
                dataType : "json",
                timeout : 5000,
                success : function(result) {
                    // console.log(result.data);
                    var data = result.data;
                    var html = '';
                    if(result.status === 1){
                        if(result.data !== null){
                            $.each(data,function(i,v){
                                // console.log(i);
                                html += '<label  class="wap-address label-checkbox item-content">'+
                                    '<div class="card card-address select-address" data-addrid="'+v.id+'" >'+
                                    '<div class="card-header address-header">'+
                                    '<span class="address-name">'+v.name+'</span><span class="address-phone">'+v.phone+'</span>'+
                                    '</div>'+
                                    '<div class="card-content select-content">'+
                                    '<div class="card-content-inner address select-addres">'+'山西省 太原市 '+v.area+v.address+'</div>'+
                                    '<label class="select">'+
                                    '<input type="radio" name="my-radio">'+
                                    '<div class="item-media"><i class="icon icon-form-checkbox icon-color"></i></div>'+
                                    '</label>'+
                                    '</div>'+
                                    '</div>'+
                                    '</label>';

                            })

                            $("#pageaddrlist .content-address").append(html);

                        }
                    }

                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {

                }
            });


            // 获取所在区域
            $.ajax({
                type : "POST",
                url : '/Api/Buyeraddr/getArea?id=300',
                async : false,
                dataType : "json",
                timeout : 5000,
                success : function(result) {
                    // console.log(result['2474']['name']);
                    var area_html;
                    $.each(result,function(i,v){
                        // console.log(v.name);
                        area_html += '<option value="'+v.name+'">'+v.name+'</option>';
                    })

                    $("#area").append(area_html);

                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {

                }
            });
        }

    });

    $(document).on("click","#pageaddrlist .card-address",function(){
        $("#pageorderconfirm .card-address").attr("data-addrid", $(this).attr("data-addrid"));
        $("#pageorderconfirm .card-address").html($(this).html());
        $.router.back();
    })


    $(document).on('click','.btnsaveaddr',function(){
        var $tempdom = $("<div></div>");

        var html = '<div class="wap-address">'+
            '<div class="card card-address select-address">'+
            '<div class="card-header address-header">'+
            '<span class="address-name">'+$("#name").val()+'</span><span class="address-phone">'+$("#phone").val()+'</span>'+
            '</div>'+
            '<div class="card-content select-content">'+
            '<div class="card-content-inner address select-addres">'+'山西省 太原市 '+$("#area").val()+$("#address").val()+'</div>'+
            '<label class="label-checkbox item-content select">'+
            '<input type="radio" name="my-radio">'+
            '<div class="item-media"><i class="icon icon-form-checkbox icon-color"></i></div>'+
            '</label>'+
            '</div>'+
            '</div>'+
            '</div>';
        // $(".content-address").append(html);
        // console.log($(".content-address").children(".wap-address").length);
        $tempdom.html(html);

        $.ajax({
            type : "GET",
            url : '/Api/Buyeraddr/add',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : $("form").serialize(),
            success : function(result) {
                // console.log(result);
                if(result.status === 1){
                    $.toast('操作成功', 1000, 'success top');
                    $tempdom.find(".card-address").attr("data-addrid",result.data);
                    if($("#pageaddrlist .content-address").children(".wap-address").length !== 0){
                        $("#pageaddrlist .content-address .wap-address").eq(0).after($tempdom.html());
                    }else{
                        $("#pageaddrlist .content-address").append($tempdom.html());
                    }

                    $.closeModal(".popup-addressadd");
                }
                else{
                    $.toast("操作失败,请填写完整信息");
                    // $(".close-address").removeClass("close-popup");
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });

    })

    $(document).on("click",".popup-payway .fangshi a",function(){
        if(!$(this).hasClass("on")){
            $(this).addClass("on").siblings().removeClass("on");
        }
    })

    $(document).on("click",".btnconfirmpay",function(){
        var $nowway = $(".popup-payway .fangshi .on");
        if($nowway.length>0 && $nowway.attr("data-href")){
            $.router.load($nowway.attr("data-href"));
        }
    })

    $(document).on("click",".create-dingdan",function(){
        var armsg = [];
        var arcartid = [];
        $("#listorderconfirm .words input").each(function(i,v){
            armsg.push($(v).val());
        })
        $("#listorderconfirm dd").each(function(i,v){
            arcartid.push($(v).attr("data-cartid"));
        })

        $.ajax({
            type : "POST",
            url : '/Api/Order/add',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : {"msg":armsg,"cartid":arcartid,addrid:$(".confirmaddr .card-address").attr("data-addrid"),reciver_type : ($(".delivsel .on").hasClass("isziti")? 1 : 0) },
            success : function(result) {
                // console.log(result);
                if(result.status === 1){
                    $.toast('操作成功', 1000, 'success top');
                    var data= result["data"];
                    $(".btntowxpay").attr("data-href","/Buyer/Cart/pay/?pay_sn="+data["pay_sn"]+"&payment_code=WX_JSAPI");
                    $(".btntoalipay").attr("data-href","/Buyer/Cart/pay/?pay_sn="+data["pay_sn"]+"&payment_code=ALI_WAP");
                    $(".btntoyinlian").attr("data-href","/Buyer/Cart/pay/?pay_sn="+data["pay_sn"]+"&payment_code=UN_WEB");
                    $.popup(".popup-payway");

                }
                else{
                    $.toast("操作失败:"+result.msg);
                    // $(".close-address").removeClass("close-popup");
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });
    })
    $(document).on("click",".create-dingdanQR",function(){
        var armsg = $("#listorderconfirm .words input").val();
        var proid = $('.dingdana #proid').val();
        var num   = $('.dingdana #num').val();
        var proindex = $('.dingdana #proindex').val();
        $.ajax({
            type : "POST",
            url : '/Api/Order/addQR',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : {"msg":armsg,"proid":proid,"proindex":proindex,"num":num,addrid:$(".confirmaddr .card-address").attr("data-addrid")},
            success : function(result) {
                if(result.status === 1){
                    $.toast('下单成功,请刷卡付款', 1000, 'success top');
                    // var data= result["data"];

                }
                else{
                    $.toast("操作失败:"+result.msg);
                    // $(".close-address").removeClass("close-popup");
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });
    })

// 全部订单
    $(document).on("pageInit","#orderlist",function(e,id,page){

        if($.device.isWeixin) {
            $(".btntoalipay").hide().siblings().css("display","block");
        }
        else{
            $(".btntowxpay").hide().siblings().css("display","block");
        }


        if($.device.isWeixin) {
            $(".btntowxpay").trigger("click");
        }
        else{
            $(".btntoalipay").trigger("click");
        }


        freshorderlist();
    })


    function freshorderlist(){
        $.ajax({
            type : "GET",
            url : '/Api/BuyerOrder/lists',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : $("form").serialize(),
            success : function(result) {

                if(result.status === 1){
                    var data = result["data"];

                    if($("#orderlist").attr("loaded") !== "1"){

                        var $ul = $('<ul></ul>');
                        $.each(data,function(i,v){

                            $li = $('<li data-sn = "'+v.order_sn+'" data-orderamount="'+ v.order_amount +'" data-ostatus="'+ v.order_state+'" data-paysn="'+ v.pay_sn +'" data-userid = "'+v.buyer_id+'"></li>');
                            $li.append('<h4><strong>'+v.shop_name+'</strong><span>'+v.order_state_txt+'</span></h4>');
                            var $table = $('<a class="protable" href="/wap/order/orderdetail/orderid/'+ v.order_sn +'"></a>');
                            $.each(v.goods,function(index,val){
                                $table.append('<table><tr><td><a href=""><img src="'+val.goods_image+'" /></a></td><td><p>'+val.goods_name+'</p><p>'+ fomartprostr(val.provalue) +'</p><p>时间 : '+new Date(parseInt(v.addtime) * 1000).Format("MM-dd hh:mm")+'</p></td><td><span class="price">￥<strong>'+val.goods_price+'</strong></span><span class="amount">x<strong>'+val.goods_num+'</strong></span></td></tr></table>');
                                // html += <'a href="#pageorderdetail"><table></table></a><div class="total"><span>共'+v.goods.length+'件商品</span><span>合计 : <i>￥</i><strong>'+v.order_amount+'</strong><i></i></span></div><div class="btn">' + statusbtn(v.order_state) + '</div>';
                            });
                            $li.append($table);
                            $li.append('<div class="total"><span>共'+v.goods.length+'件商品</span><span>合计 : <i>￥</i><strong>'+v.order_amount+'</strong><i></i></span></div>');
                            $li.append('<div class="btn">' + statusbtn(v.order_state) + '</div>');
                            $ul.append($li);
                        })
                        console.log($ul);
                        $("#orderlist .list").html($ul.html());
                        $("#orderlist").attr("loaded","1");
                    }
                    else{
                        $.each(data,function(i,v){
                            if(i<6){
                                var $orderli = $("[data-sn='"+v["order_sn"]+"']");
                                if($orderli.attr("data-orderamount") !== v["order_amount"] ){
                                    $orderli.attr("data-orderamount", v["order_amount"]).find(".total strong").html(v["order_amount"]);
                                }
                                if($orderli.attr("data-ostatus") !== v["order_state"]){
                                    $orderli.attr("data-ostatus", v.order_state);
                                    $orderli.find("h4 span").html(v.order_state_txt);
                                    $orderli.find(".btn").html(statusbtn(v.order_state));
                                }
                            }

                        });
                    }

                }
                else{

                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });

        globaltimer = setTimeout(freshorderlist , 3000);
    }

    $(document).on("click",".wap-order .cancel-order",function(){
        $btncancel = $(this);
        $product = $(this).closest("li");
        $.confirm("是否取消订单?",
            function(){
                var order_sn = $product.attr("data-sn");
                var userid = $product.attr("data-userid");
                $.ajax({
                    type:"POST",
                    url: "/App/BuyerOrder/cancel",
                    dataType:"json",
                    data: {"order_sn":order_sn,"userid":userid},
                    timeout:5000,
                    success: function(result){
                        if(result.status==1){
                            $product.find(".btn").html("<a href='javascript:void(0)' class='delete'><span>已取消</span></a>");
                            freshcartall();
                            freshpubcart();
                        }
                        else{
                            $.toast.msg("取消失败!");
                        }
                    }
                    ,error:function(xXHR, xtextStatus, xerrorThrown){
                        $.toast.msg("取消失败!");
                        console.log(xtextStatus+"\n"+xerrorThrown);
                    }
                });
            },
            function(){

            }
        )
    });

    // 订单详情页
    $(document).on("pageInit","#orderdetail",function(e,id,page){

        if($.device.isWeixin) {
            $(".btntoalipay").hide().siblings().css("display","block");
        }
        else{
            $(".btntowxpay").hide().siblings().css("display","block");
        }


        if($.device.isWeixin) {
            $(".btntowxpay").trigger("click");
        }
        else{
            $(".btntoalipay").trigger("click");
        }

        freshorderdetail();

    });


    function freshorderdetail(){
        var userid = $(".page").attr("data-userid");
        var order_sn = $(".page").attr("data-orderid");
        $.ajax({
            type:"GET",
            url:"/App/BuyerOrder/detail?order_sn=" + order_sn +"&userid=" + userid,
            async : false,
            dataType : "json",
            timeout : 5000,
            data : {},
            success:function(result){
                if(result.status == 1){
                    var data = result.data;

                    if($("#orderdetail").attr("loaded") === "1"){
                        if($("#orderdetail .order-amount").html() !== data["order_amount"]){
                            $("#orderdetail .order-amount").html(data["order_amount"]);
                            $(".popup-payway .tariff span").html("￥"+data["order_amount"]);
                        }
                        if(parseInt(data["order_state"])>10){
                            $("#orderdetail  .botbtnout").hide();
                        }
                    }
                    else{
                        var $orderdetail_prod = $("<dl></dl>");
                        $orderdetail_prod.append("<dt><img src='/statics/wap/images/heart.png'/><span>"+data.shop_name+"</span></dt>");
                        $.each(data.extend_order_goods,function(i,v){
                            $orderdetail_prod.append("<dd><a><div class='ltbox'><div class='square'><img src='"+v.goods_image+"'></div></div><div class='rtbox'><div class='price'>￥"+v.goods_price+"</div><div class='num'>x"+v.goods_num+"</div></div><div class='cenbox'><div class='tit'>"+v.goods_name+"</div><div class='proty'>"+data.addtime+"</div><div class='promise'><span>七天退换</span></div></div></a></dd>");
                        });
                        $(".orderdetail_prod").html($orderdetail_prod.html());
                        $(".pageorderdetail .item-amountto").find(".aleft").html("共"+data['extend_order_goods']['0']['goods_num']+"件商品，合计：￥"+data['order_amount']);
                        $(".pageorderdetail .item-amountto").find(".aright").html("实付款：￥<em class='order-amount'>"+data['order_amount']+"</em>");
                        $(".pageorderdetail .orderdetail_method").find(".words").html("买家留言："+data['extend_order_common']['order_message']);
                        $(".btntowxpay").attr("data-href","/Buyer/Cart/pay/?pay_sn="+data['pay_sn']+"&payment_code=WX_JSAPI");
                        $(".btntoalipay").attr("data-href","/Buyer/Cart/pay/?pay_sn="+data['pay_sn']+"&payment_code=ALI_WAP");
                        $(".btntoyinlian").attr("data-href","/Buyer/Cart/pay/?pay_sn="+data["pay_sn"]+"&payment_code=UN_WEB");
                        $(".popup-payway .tariff span").html("￥"+data['order_amount'] );

                        if(data['extend_order_common']['reciver_type'] == 0){
                            var $selectaddress = $(".pageorderdetail .select-address").clone();
                            $selectaddress.find(".address-name").html(data['extend_order_common']['reciver_info']['name']);
                            $selectaddress.find(".address-phone").html(data['extend_order_common']['reciver_info']['phone']);
                            $selectaddress.find(".select-addres").html(data['extend_order_common']['reciver_info']['zone'] + data['extend_order_common']['reciver_info']['address']);
                            $(".pageorderdetail .select-address").html($selectaddress.html());
                        }else{
                            $(".pageorderdetail .wap-address").hide();
                            $(".pageorderdetail .hide").show();
                        }
                        $("#orderdetail").attr("loaded","1");
                        if(parseInt(data["order_state"])>10){
                            $("#orderdetail  .botbtnout").hide();
                        }
                    }

                }
            },
            error:function(){

            }
        });

        globaltimer = setTimeout(freshorderdetail,3000);
    }

    $(document).on("pageInit","#shopindex",function(e,id,page){
        var domain = $(page).attr("data-domain");
        var $domshopindex = $(page).clone();

        $.ajax({
            type:"POST",
            url: "/app/shop/shopinfo",
            dataType:"json",
            data: {"domain":domain},
            timeout:5000,
            success: function(data,status){
                if(data.status === 1){
                    var res=data["data"];
                    $domshopindex.find("h3").html(res["name"]);
                    $domshopindex.find(".shoplogo").attr("src",res["product"][1]["headpic"]);
                    $domshopindex.find(".mingpai dd a").html(res["years"]+"年金牌老店");
                    $domshopindex.find(".dizhi dt").html(res["phone"]).siblings("dd").html(res["addr"]);
                    var arprod = res["product"];
                    var $ultopprod = $domshopindex.find(".topli").clone();
                    var $dompro = $domshopindex.find(".topli li").eq(0).clone();

                    $ultopprod.html("");
                    if(arprod!==null){
                        $.each(arprod,function(i,v){
                            $dompro.find(".pic").attr("src",v["picture"].split(",")[0]);
                            $dompro.find(".name").html(v["title"]);
                            $dompro.find("a").attr("href",getprourl(v["id"]));
                            $ultopprod.append($dompro.prop("outerHTML"));
                        });
                    }
                    var shopid = res["id"];
                    console.log(shopid);
                    $(page).attr("data-shopid",shopid);

                    $.ajax({
                        type:"POST",
                        url: "/api/Collection/checkcollection",
                        dataType:"json",
                        data: {"type":2,"itemid":shopid},
                        timeout:5000,
                        success: function(data) {
                            if (data.status === "1") {
                                $(".shoucang").html("已收藏").addClass("on_collect");
                            }
                            else {
                                console.log("失败"+data.msg);

                            }
                        }
                    });

                    $domshopindex.find(".topli").html($ultopprod.html());
                    $(page).html($domshopindex.html());

                }
                else{
                    console.log("失败"+data.msg);
                }

            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    });

    $(document).on("click", ".shoucang", function () {
        var isdely = $(this).hasClass("on_collect");
        if(isdely){
            $.confirm("确认取消关注！",function(){
                shopfavy(isdely);
            });
        }
        else{
            shopfavy(isdely);
        }
    });
    function shopfavy(isdely){
        //var shopid= $(".name").attr("data-shopid");
        var shopid= $("#shopindex").attr("data-shopid");
        $.ajax({
            type: "POST",
            url: "/Api/Collection/addcollection",
            dataType: "json",
            data: {"type":2,"itemid":shopid,"isdelete":(isdely?1:0)},
            timeout: 5000,
            success: function (data) {
                console.log(isdely);
                if (data.status === 1) {
                    if(isdely){
                        $(".shoucang").html("收藏").removeClass("on_collect");
                    }
                    else{
                        $(".shoucang").html("已收藏").addClass("on_collect");
                    }
                }
                else {
                    console.log("失败"+data.msg);
                }
            },
            error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }

        });
    }

    $(document).on("pageInit", "#pagesearch", function(e, id, page) {
        var stpage;
        if($(page).attr("data-page")){
            stpage= $(page).attr("data-page");
        }
        else{
            stpage =1;
            $(page).attr("data-page",1);
        }

        params= {"page": stpage };
        curpagenum = stpage;
        loading = false;
        addsearchItems(curpagenum);
    });

    //无限滚动
    $(document).on("infinite", "#pagesearch", function(e,id,page) {

        // 如果正在加载，则退出
        if (loading) return;

        // 设置flag
        loading = true;

        // 模拟1s的加载过程
        setTimeout(function() {
            // 重置加载flag
            loading = false;

            // if (lastIndex >= maxItems) {
            //     // 加载完毕，则注销无限加载事件，以防不必要的加载
            //     $.detachInfiniteScroll($('.infinite-scroll'));
            //     // 删除加载提示符
            //     $('.infinite-scroll-preloader').remove();
            //     return;
            // }

            // 添加新条目
            addsearchItems(++curpagenum);
            // 更新最后加载的序号
            $("#pagesearch").attr("data-page",curpagenum);

            // console.log("curpagenum:"+curpagenum);

            //容器发生改变,如果是js滚动，需要刷新滚动
            $.refreshScroller();
        }, 1000);

    });


    $(document).on("click",".tmall-app",function(){
        $.alert("开发中,敬请期待!");
    })

    $(document).on("click",".btnsear",function(){
        $.router.load("/wap/search/search/searchkey/"+$(".inpsear").val());
    });

    $(document).on("click",".btnservice",function(){
        $.alert("客服电话:400-003-3030");
    })

    $(document).on("click",".delivsel a",function(){
        $(this).addClass("on").siblings().removeClass("on");
        $(this).hasClass("isziti") ? $(".atoseladdr").hide().find(".select-address").attr("data-addrid","0") : $(".atoseladdr").show();

    })

    $(document).on("click",".btnodetailpay",function(){
        $.popup(".popup-payway");
    })

    $(".keycontent").scroll(function(){
        var scrollt = $(".keycontent").scrollTop();
        if( scrollt >200 ){
            $(".totop").show();
        }else{
            $(".totop").hide();
        }
    });
    $(document).on("click",".totop",function(){
        $(".keycontent").scrollTop(0);
    });


    $(document).on("click",".wap-order li .paying",function(){
        var paysn = $(this).closest("li").attr("data-paysn");
        var orderamount = $(this).closest("li").attr("data-orderamount");
        $(".btntowxpay").attr("data-href","/Buyer/Cart/pay/?pay_sn="+paysn+"&payment_code=WX_JSAPI");
        $(".btntoalipay").attr("data-href","/Buyer/Cart/pay/?pay_sn="+paysn+"&payment_code=ALI_WAP");
        $(".btntoyinlian").attr("data-href","/Buyer/Cart/pay/?pay_sn="+paysn+"&payment_code=UN_WEB");
        $(".popup-payway .tariff span").html("￥"+orderamount );
        $.popup(".popup-payway");
    });


    $(document).on("click",".awxloginout",function(){
        $(this).attr("href",$(this).attr("href")+"?ref="+encodeURIComponent(window.location.href));
        //return false;
    })


    $.init();
})




function setUserStatus(uid,strtoken){
    if(!!uid && uid!=="(null)"){
        $.ajax({
            type : "POST",
            url: "/Api/Member/loginForH5",
            dataType : "json",
            data : {"userid":uid,"token":strtoken},
            success : function(data){
                if(data.status === 1){
                    //$.toast("dengluchenggong")
                }
                else{
                    $.toast("登录失败");
                }
            }
        })
    }
    else{
        if (!!$.fn.cookie("gs1_spf_userid")) {
            $.ajax({
                type: "POST",
                url: "/Api/Member/loginoutH5",
                dataType: "json",
                data: {},
                success: function (data) {
                    if (data.status === 1) {
                        //$.toast("tuichuchenggong")
                    }
                    else {
                        //$.toast("tuichushibai");
                    }
                }
            })
        }
    }

}

function setAppType(apptype){
    if("ios" === apptype){
        window.alert = function(str){
            window.location.href = "ios://appAlert/|/"+str;
        }

        $.router.load("/wap/index");
    }
}

function setWebBack(){

    if("android" === $.fn.cookie("apptype")){
        if("index" === $(".page-current").attr("id")){
            JSInterFace.getToApp('home');
        }
        else{
            $.router.back();
        }
    }


}


function addsearchItems(curpagenum){
    $.ajax({
        type : "GET",
        url : '/Api/Search/search?shop_catid='+$("#pagesearch").attr("data-catid")+'&searchkey='+$("#inpsearchall").val()+'&page='+curpagenum,
        async : false,
        dataType : "json",
        timeout : 5000,
        //data : $("form").serialize(),
        success : function(result) {
            if(result.status === 1){

                if( result.data.count.toString() === "0"){
                    $(".infinite-scroll-preloader").remove();
                    $(".list-container").html("<center>暂无数据!</center>");
                }
                else{
                    var data= result["data"]["list"];
                    var html ="";
                    $.each(data, function(i,v){
                        html += '<div class="col-50"><div class="col-li"><a href="'+getprourl(v.id)+'"> <div class="square"><img src="' + v.headpic + '" alt="' + v.title + '" /></div><p class="description">' + v.title + '</p><p class="price">￥<strong>' + v.min_price + '</strong></p><p class="address clearfix"><span>' + v.shopname + '</span><span>好评<i>100%</i></span></p></a></div></div>';
                    });
                    $("#pagesearch .infinite-scroll .list-container").append(html);
                }
            }
            else{
                $(".infinite-scroll-preloader").remove();
                $(".list-container").html("<center>暂无数据!</center>");
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {

        }
    });
}




function showprotocart(fnback){

    if(typeof(voidrepeat)=== "undefined" || voidrepeat=== 0 ){
        voidrepeat =1;
        var nownum= $(".buynum").val().replace(/\s+/g,"");
        if(nownum.length==0||isNaN(nownum)){alert("数量错误");voidrepeat=0;return false;}

        var $proparas=$(".dlprot");
        var proid=$proparas.attr("data-id");
        var proname=$(".prod_title h4").html();
        var price=$proparas.attr("data-price");
        if(price === "暂无"){alert("购买失败");voidrepeat=0;return false;}
        var proindex= $proparas.attr("data-index");
        if(!proindex){
            $(".dlprot").addClass("dlproton");
            voidrepeat=0;

            return false;
        }
        var protxtindex = $proparas.attr("data-txtindex");
        var providindex = $proparas.attr("data-vidindex");
        var pic=$(".detail .mainimg").attr("src");
        var nowpro=[{"id":proid,"name":proname,"price":price,"num":nownum,"img":pic,"proindex":proindex,"protxtindex":protxtindex,"providindex":providindex}];

        addcart(nowpro,fnback);
    }

}


function addcart(objpro,fnback){
    $.ajax({
        type:"POST",
        url: "/Buyer/Cart/api",
        dataType:"json",
        data: {"act":"add","objpro":objpro},
        timeout:5000,
        success: function(data,status){
            if(data.status==1){
                if(!!$.fn.cookie("cartproid")){
                    $.fn.cookie("cartproid",$.fn.cookie("cartproid") + ","+objpro[0].id,{ expires: 6 });
                }
                else{
                    $.fn.cookie("cartproid",objpro[0].id,{ expires: 6 });
                }
                if(fnback){

                    fnback();
                }
                else{
                    $.toast("添加成功!");
                    $.closeModal(".pop-proparamsel");

                }
            }
            else{
                console.log(data.msg);
                alert("失败"+data.msg);
            }
            voidrepeat=0;
        }
        ,error:function(XHR, textStatus, errorThrown){
            voidrepeat=0;
            console.log(textStatus+"\n"+errorThrown);
        }
    });
}


function sendsms(mobile,btn){
    $.ajax({
        type:"GET",
        url: "/api/user/send_reg_sms?mobile="+mobile,
        dataType:"json",
        timeout:5000,
        success: function(data,status){
            if(data!=null){
                var ostatus=data["status"];
                var msg=data["msg"];
                if(ostatus==1){
                    vercodetime(btn);
                }
                else{
                    alert(msg);
                    btn.removeAttr("disabled");
                }

            }
        }
        ,error:function(XHR, textStatus, errorThrown){
            console.log(textStatus+"\n"+errorThrown);
            $btngetcode.removeAttr("disabled");
        }
    })

}

function vercodetime(btn){
    if(typeof(nowvercount)!="undefined" && nowvercount==1){
        btn.removeAttr("disabled").val("获取验证码").removeClass("btndis");
        nowvercount=60;
        //nowvercount=6;
        return;
    }

    if(btn.val()=="获取验证码"){
        btn.attr("disabled","disabled").addClass("btndis");
        nowvercount=60;
        //nowvercount=6;
    }
    else{
        nowvercount--;
    }

    btn.val(nowvercount+"秒后可重新发送");
    setTimeout(_vercodetime(btn),1000);

}

function _vercodetime(btn){
    return function(){
        vercodetime(btn);
    }
}



function freshcartone(id){
    $ul= $("table[data-id='"+id+"']");
    $perprice = $ul.find(".price");
    $pertot = $ul.find(".total");
    $pernum = $ul.find(".inpnum");

    $pernum.attr("data-orival", $pernum.val() );
    $pertot.html( ( parseFloat($perprice.attr("data-price")) * parseInt($pernum.val()) ).toFixed(2) );

}


function freshcartall(){
    var totnum = 0;
    var totprice =0;
    var $ems = $(".ulcartlist em.on");

    $ems.each(function(i,v){
        $v = $(v);
        $ul = $v.closest("table");
        //totnum += parseInt($ul.find("inpnum").val());
        totnum += 1;
        totprice +=   parseFloat( $ul.find(".total").html());
    })

    $(".totnum").html(totnum);
    $(".zongjia").html( totprice.toFixed(2) );
}


function fomartprostr(jsonproval){
    var str="";
    $.each(jsonproval,function(i,v){str+=(i+":"+v+";")});
    return str;
}

function statusbtn(sta){
    var strbtn = "";
    sta = parseInt(sta);
    switch(sta){
        case -1:strbtn = '<a href="" class="delete"><span>已取消</span></a>';
            break;
        case 10:strbtn = '<a href="" class="cancel-order"> <span>取消订单</span></a><a href="" class="paying"> <span>付款</span></a>';
            break;
        case 20:strbtn = '<a href="" class="delete"><span>无操作</span></a>';
            break;
        case 30:strbtn = '<a href="" class="delete"><span>无操作</span></a>';
            break;
        case 35:strbtn = '<a href="" class="cancel-order"> <span>取消订单</span></a><a href="" class="sure-shop"> <span>确认收货</span></a>';
            break;
        case 40:strbtn = '<a href="" class="after-sale"> <span>申请售后</span></a><a href="" class="again"> <span>再来一单</span></a><a href="" class="delete"> <span>删除</span></a>';
            break;

    }
    return strbtn;


}


function getprourl(proid){return "/wap/product/show/id/"+proid}

function dourl(jsonres){
    var url = jsonres["url"];
    if(!url){url =""}
    url=url.toString().toLowerCase();

    if(jsonres["dataid"] && jsonres["dataid"] !== "0"){
        return  "/wap/product/show/id/" + jsonres["dataid"];
    }
    else if(/^\S+zhuangtu\.net\/s\/(\S+)$/.test(url)){
        return "/wap/shop/index/domain/"+(/^\S+zhuangtu\.net\/s\/(\S+)$/.exec(url))[1];
    }
    else{
        return jsonres["url"]
    }
}
function dourlbyid(jsonres) {
    return jsonres["id"] ? "/wap/product/show/id/"+jsonres["id"] : jsonres["url"];
}


(function(a){a.extend(a.fn,{cookie:function(b,c,d){var e,f,g,h;if(arguments.length>1&&String(c)!=="[object Object]"){d=a.extend({},d);if(c===null||c===undefined)d.expires=-1;return typeof d.expires=="number"&&(e=d.expires*24*60*60*1e3,f=d.expires=new Date,f.setTime(f.getTime()+e)),c=String(c),document.cookie=[encodeURIComponent(b),"=",d.raw?c:encodeURIComponent(c),d.expires?"; expires="+d.expires.toUTCString():"",d.path?"; path="+d.path:"",d.domain?"; domain="+d.domain:"",d.secure?"; secure":""].join("")}return d=c||{},h=d.raw?function(a){return a}:decodeURIComponent,(g=(new RegExp("(?:^|; )"+encodeURIComponent(b)+"=([^;]*)")).exec(document.cookie))?h(g[1]):null}})})(Zepto);



// 对Date的扩展，将 Date 转化为指定格式的String
// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
// 例子：
// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423
// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18
Date.prototype.Format = function (fmt) { //author: meizz
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};
