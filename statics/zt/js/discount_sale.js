// $(function(){ 
//   var times = document.getElementsByClassName('times');
//   var aa = function(s){
//     var cha = 20*60*60;
//     function getCha(){
//       cha --; 
//       if(cha == 0){
//         return false;
//       }
//         var arr=[];     
//         var tmp = cha;
//         var hour=parseInt(tmp/(60*60));
//         arr.push(hour);
//         tmp%=(60*60);
//         var minute=parseInt(tmp/60);
//         arr.push(minute);
//         var second=parseInt(tmp%60);
//         arr.push(second);
//         return arr;
//       }    
//     var spans = times[s].getElementsByTagName('span'); 
//     var time = function(){
//        var timearr=getCha();
//        for(var i=0;i<timearr.length;i++){
//         spans[i].innerHTML=timearr[i];
//        }
//     }  
//     time();        
//     setInterval(function (){
//        time();
//     },1000);
//   }
//   for(var i=0;i<times.length;i++){
//     aa(i);
//   }
// })