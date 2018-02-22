KISSY.config({
	modules : {
		'sizzle' : {
			alias : ['node']
		},
		'calendar' : {
			alias : ['gallery/calendar-deprecated/1.0/']
		},
		'datalazyload' : {
			alias : ['gallery/datalazyload/1.0/']
		},
		'switchable' : {
			alias : ['gallery/switchable/1.3.1/']
		},
		'imagezoom' : {
			alias : ['gallery/imagezoom/1.0/']
		},
		'waterfall' : {
			alias : ['gallery/waterfall/1.0/']
		},
		'flash' : {
			alias : ['gallery/flash/1.0/']
		}
	}
});
KISSY.use("node,button, dd,switchable, resizable,ua,event,overlay,json,ajax,gallery/easycountdown/1.0/easycountdown,dom", function(S, Node, Button, DD, Switchable, Resizable, UA, Event, Overlay, Ajax, EasyCountdown) {
	var DDM = DD.DDM, DOM = S.DOM;
	window.ModReadyWidget = function(mo) {
		mo.all('.ks-popup').each(function(v, k) {
			new Overlay.Popup({
				triggerType : 'mouse',
				trigger : v.parent(),
				srcNode : v
			});
		});
		mo.all('.J_TWidget').each(function(v, k) {
			var t = v.attr('data-widget-type'), c = v.attr('data-widget-config'), cfg = c ? S.JSON.parse(c.replace(/'/ig, '"')) : 0;
			if (cfg) {
				cfg.srcNode = v;
				if (t == 'Slide')
					new Switchable.Slide(v, cfg);
				else if (t == 'Carousel')
					new Switchable.Carousel(v, cfg);
				else if (t == 'Popup')
					new Overlay.Popup(cfg);
				else if (t == 'Tabs')
					new Switchable.Tabs(v, cfg);
				else if (t == 'Accordion')
					new Switchable.Accordion(v, cfg);
				else if (t == 'Countdown')
					new EasyCountdown(v, cfg.endTime, cfg);
			}
		});
		mo.all('.goods-tip').each(function(v, k) {
			if (v.hasClass('J_TWidget'))
				return;
			new Overlay.Popup({
				triggerType : 'mouse',
				trigger : v.parent(),
				srcNode : v
			});
			v.css('display', 'block').css('visibility', 'hidden');
		});
		mo.all('img').each(function(v, k) {
			var s1 = v.attr('src'), s2 = v.attr('src2');
			if (s2 && s2 != s1) {
				v.on('mouseenter', function(ev) {
					v.src = s2 + '?t=' + new Date().getTime();
				});
				v.on('mouselevel', function(ev) {
					v.src = s1 + '?t=' + new Date().getTime();
				});
			}
		});
		S.each(mo.all('.sns-widget'), function(v) {
			SNS.active(v);
		});
	};
	S.ready(function() {
		ModReadyWidget(S);
	});
});