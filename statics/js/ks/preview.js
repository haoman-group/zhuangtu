var o = window.opener;
/*
KISSY.config({
    modules: {
        'sizzle':{
            alias: ['node']
        },
        'calendar':{
            alias: ['gallery/calendar-deprecated/1.0/']
        },
        'datalazyload':{
            alias: ['gallery/datalazyload/1.0/']
        },
        'switchable':{
            alias: ['gallery/switchable/1.3.1/']
        },
        'imagezoom':{
            alias: ['gallery/imagezoom/1.0/']
        },
        'waterfall':{
            alias: ['gallery/waterfall/1.0/']
        },
        'flash':{
            alias: ['gallery/flash/1.0/']
        }
    }
});
*/
KISSY.use("node,button, dd,switchable, resizable,ua,event,overlay,json,ajax,gallery/easycountdown/1.0/easycountdown,dom", function(S, Node,Button, DD,Switchable, Resizable,UA,Event,Overlay,JSON,Ajax,EasyCountdown) {
   var DDM = DD.DDM,DOM = S.DOM;
     S.ready(function(){
     		if(o){
				var s=o.document.getElementById('container');
				if(s){
					var _mbox = o.document.getElementById('modulebox');
					var mbox=document.getElementById('modulebox');
					if(mbox && s.style.width){
						mbox.style.width = s.style.width;
					}
					if(o.exportSource){
						try{
						source=o.exportSource(1);
						source=source.replace(/[\{|%7B]#(\d+).id[%7D|\}]/ig,'$1').replace(/http:\/\/www\.tmall\.com\/%7B#([^%]+)%7D/ig,'/images/p160x160.gif');
						}catch(e){alert(e);}
					}else{
						source=s.innerHTML;
					}
					S.all('#container').html(source);
				}
			} 
			S.all('.ks-popup').each(function(v,k){
				new Overlay.Popup({triggerType:'mouse',trigger: v.parent(),srcNode:v});
			});
			S.all('.J_TWidget').each(function(v,k){
				try{
				var t = v.attr('data-widget-type'),c=v.attr('data-widget-config'),cfg = c? S.JSON.parse(c.replace(/'/ig,'"')) :0;
				if(cfg){
					cfg.srcNode=v;
					if(t=='Slide')	new Switchable.Slide(v,cfg);
					else if(t=='Carousel')	new Switchable.Carousel(v,cfg);
					else if(t=='Popup') new Overlay.Popup(cfg);
					else if(t=='Tabs') new Switchable.Tabs(v,cfg);
					else if(t=='Accordion') new Switchable.Accordion(v,cfg);
					else if(t=='Countdown') new EasyCountdown(v,cfg.endTime,cfg);
				}
				}catch(ex){
					console && console.error(ex);
				}finally{
					
				}
			});
			S.all('.goods-tip').each(function(v,k){
				if(v.hasClass('J_TWidget')) return;
				new Overlay.Popup({triggerType:'mouse',trigger: v.parent(),srcNode:v});
				v.css('display','block').css('visibility','hidden');
			});
			S.all('img').each(function(v,k){
				var s1 = v.attr('src'),s2=v.attr('src2');
				if(s2 && s2!=s1){
					v.on('mouseenter',function(ev){v.src=s2+'?t='+new Date().getTime();});
					v.on('mouselevel',function(ev){v.src=s1+'?t='+new Date().getTime();});	
				}
			});
			S.each(S.all('.sns-widget'),function(v){
				SNS.active(v);
			});
			var c=S.one('#container');
			if(c[0].scrollWidth>c.width()){
				c.width(c[0].scrollWidth);
			}
			if(c[0].scrollHeight>c.height()){
				c.height(c[0].scrollHeight);
			}
			c.css('overflow','visible');
	});
});