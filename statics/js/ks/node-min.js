/*
Copyright 2013, KISSY UI Library v1.32
MIT Licensed
build time: Aug 15 00:07
*/
KISSY.add("node/anim",function(a,f,g,e,j){function d(a,h,c){for(var b=[],i={},c=c||0;c<h;c++)b.push.apply(b,k[c]);for(c=0;c<b.length;c++)i[b[c]]=a;return i}var k=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]];a.augment(e,{animate:function(e){var h=a.makeArray(arguments);a.each(this,function(c){var b=a.clone(h),i=b[0];i.props?(i.el=c,g(i).run()):g.apply(j,[c].concat(b)).run()});return this},stop:function(e,
h,c){a.each(this,function(b){g.stop(b,e,h,c)});return this},pause:function(e,h){a.each(this,function(c){g.pause(c,h)});return this},resume:function(e,h){a.each(this,function(c){g.resume(c,h)});return this},isRunning:function(){for(var a=0;a<this.length;a++)if(g.isRunning(this[a]))return!0;return!1},isPaused:function(){for(var a=0;a<this.length;a++)if(g.isPaused(this[a]))return 1;return 0}});a.each({show:d("show",3),hide:d("hide",3),toggle:d("toggle",3),fadeIn:d("show",3,2),fadeOut:d("hide",3,2),fadeToggle:d("toggle",
3,2),slideDown:d("show",1),slideUp:d("hide",1),slideToggle:d("toggle",1)},function(d,h){e.prototype[h]=function(c,b,i){if(f[h]&&!c)f[h](this);else a.each(this,function(a){g(a,d,c,i||"easeOut",b).run()});return this}})},{requires:["dom","anim","./base"]});
KISSY.add("node/attach",function(a,f,g,e,j){function d(a,c,b){b.unshift(c);a=f[a].apply(f,b);return a===j?c:a}var k=e.prototype,l=a.makeArray;e.KeyCodes=g.KeyCodes;a.each("nodeName,equals,contains,index,scrollTop,scrollLeft,height,width,innerHeight,innerWidth,outerHeight,outerWidth,addStyleSheet,appendTo,prependTo,insertBefore,before,after,insertAfter,test,hasClass,addClass,removeClass,replaceClass,toggleClass,removeAttr,hasAttr,hasProp,scrollIntoView,remove,empty,removeData,hasData,unselectable,wrap,wrapAll,replaceWith,wrapInner,unwrap".split(","),function(a){k[a]=
function(){var c=l(arguments);return d(a,this,c)}});a.each("filter,first,last,parent,closest,next,prev,clone,siblings,contents,children".split(","),function(a){k[a]=function(){var c=l(arguments);c.unshift(this);c=f[a].apply(f,c);return c===j?this:c===null?null:new e(c)}});a.each({attr:1,text:0,css:1,style:1,val:0,prop:1,offset:0,html:0,outerHTML:0,data:1},function(e,c){k[c]=function(){var b;b=l(arguments);b[e]===j&&!a.isObject(b[0])?(b.unshift(this),b=f[c].apply(f,b)):b=d(c,this,b);return b}});a.each("on,detach,fire,fireHandler,delegate,undelegate".split(","),
function(a){k[a]=function(){var c=l(arguments);c.unshift(this);g[a].apply(g,c);return this}})},{requires:["dom","event/dom","./base"]});
KISSY.add("node/base",function(a,f,g){function e(b,i,d){if(!(this instanceof e))return new e(b,i,d);if(b)if("string"==typeof b){if(b=f.create(b,i,d),b.nodeType===k.DOCUMENT_FRAGMENT_NODE)return l.apply(this,h(b.childNodes)),this}else{if(a.isArray(b)||c(b))return l.apply(this,h(b)),this}else return this;this[0]=b;this.length=1;return this}var j=Array.prototype,d=j.slice,k=f.NodeType,l=j.push,h=a.makeArray,c=f._isNodeList;e.prototype={constructor:e,length:0,item:function(b){return a.isNumber(b)?b>=
this.length?null:new e(this[b]):new e(b)},add:function(b,c,d){a.isNumber(c)&&(d=c,c=g);b=e.all(b,c).getDOMNodes();c=new e(this);d===g?l.apply(c,b):(d=[d,0],d.push.apply(d,b),j.splice.apply(c,d));return c},slice:function(b,a){return new e(d.apply(this,arguments))},getDOMNodes:function(){return d.call(this)},each:function(b,c){var d=this;a.each(d,function(a,f){a=new e(a);return b.call(c||a,a,f,d)});return d},getDOMNode:function(){return this[0]},end:function(){return this.__parent||this},all:function(b){b=
0<this.length?e.all(b,this):new e;b.__parent=this;return b},one:function(b){b=this.all(b);if(b=b.length?b.slice(0,1):null)b.__parent=this;return b}};a.mix(e,{all:function(b,c){return"string"==typeof b&&(b=a.trim(b))&&3<=b.length&&a.startsWith(b,"<")&&a.endsWith(b,">")?(c&&(c.getDOMNode&&(c=c[0]),c=c.ownerDocument||c),new e(b,g,c)):new e(f.query(b,c))},one:function(b,a){var c=e.all(b,a);return c.length?c.slice(0,1):null}});e.NodeType=k;return e},{requires:["dom"]});
KISSY.add("node",function(a,f){a.mix(a,{Node:f,NodeList:f,one:f.one,all:f.all});return f},{requires:["node/base","node/attach","node/override","node/anim"]});
KISSY.add("node/override",function(a,f,g){var e=g.prototype;a.each(["append","prepend","before","after"],function(a){e[a]=function(d){"string"==typeof d&&(d=f.create(d));if(d)f[a](d,this);return this}});a.each(["wrap","wrapAll","replaceWith","wrapInner"],function(a){var d=e[a];e[a]=function(a){"string"==typeof a&&(a=g.all(a,this[0].ownerDocument));return d.call(this,a)}})},{requires:["dom","./base","./attach"]});
