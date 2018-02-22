KISSY.use("node,button,ua,event,overlay", function(S, Node,Button,UA,Event,Overlay) {
   var DOM = S.DOM;
   S.ready(function(){
   new Button({
	   	render:'#toolbar',
	   	elCls:'tbar-btn',
	   	content:'关于醉语言'
	   }).on('click',function(ev){
	   			window.focus();	
	   	var o = window.aboutOverlay,cont;
			if(!o){
				 o = new Overlay.Dialog({
			 			elStyle:{
            			position: UA.ie == 6 ? "absolute" : "fixed",
            			width:500,height:400
        				},
        				elCls:'about_dialog',
        				closeAction:'destory',
        				align: {
				            points: ['cc', 'cc']
				      },
				      focusable:true,
				      mask: true,
				      headerContent:'关于醉语言---醉悠枫装修'
        			});
			 		window.aboutOverlay = o; 
					o.render();
			}
	   	 cont ='<marquee height="400" width="440" direction="up" scrollamount=2 behavior="scroll"><h3>《美工的噩梦,老板的福音》</h3><p align="left"> 我一直在思考...... <br/>如果有一天模板可以变得像块画布,<br/>想要蓝天白云,还是碧海金沙,<br/>只要有想法,万千变化任意挥洒.<br/>'
			   +'再不用去为一个模块的抄袭去较真.<br/>我一直认为 ......<br/>模板就应该是个工具,可以方便快捷的将想法付诸实际.<br/>而不是像个字帖只能临摹.<br/>模板是用来“变” 的, 不是用来 “套” 的<br/>'
			   +'社会在进步,一切都在发展,社会主义都已经小康了,<br/>难道模板还只能简单的解决温饱问题,固定一个样子去换换图吗？<br/>店铺的需求日新月异,一次活动就要全店改版,<br/>怎样才能快速把设计转化为装修？<br/>但通常店主们大都不懂得代码<br/>没时间/没必要去学习专业设计师的知识,<br/>如何在无需编程,无需学习的前提下,进行千变万化的装修? '
			   +'<br/>一切继续在发展,也许有一天,我们会进入共产主义,实现按需分配.<br/>'
			   +'但店主们现在就可以更进一步,<br/>跨越障碍,按自己的设计来装修.<br/>因为....... <br/>......... 醉语言来了<br/></p><p align="right">谨以此献给:<br/>苦B的程序员们<br/>终于可以歇歇了.</p></marquee>';
			o.set('bodyContent',cont);
			o.center();
			o.show();
	   }).render();   
	});
});