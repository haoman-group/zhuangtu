

!
function(e) {
  function o(i) {
    if (t[i]) return t[i].exports;
    var n = t[i] = {
      exports: {},
      id: i,
      loaded: !1
    };
    return e[i].call(n.exports, n, n.exports, o),
    n.loaded = !0,
    n.exports
  }
  var t = {};
  return o.m = e,
  o.c = t,
  o.p = "",
  o(0)
} ([function(e, o, t) {
  e.exports = t(1)
},
function(e, o, t) {
  t(2),
  t(3),
  $(function() {
    function e(e) {
      e.moveTo(0),
      d.addClass("nav-bar-fixed"),
      $pagination = $(".mi1scroll-pagination").removeClass("hide").fadeIn()
    }
    function o(e, o) {
      return u || -1 !== e || "up" !== o ? u && 1 === e && "down" === o ? (r.moveTo(0), $pagination.removeClass("hide").fadeIn(), u = !1, !1) : h || e !== f.length || "down" !== o ? h && e === f.length - 2 && "up" === o ? (r.moveTo(f.length - 1), $pagination.removeClass("hide").fadeIn(), h = !1, !1) : void 0 : (r.onScrolling = !0, $pagination.fadeOut(), l.animate({
        scrollTop: $(document).height()
      },
      v,
      function() {
        r.onScrolling = !1
      }), h = !0, !1) : (r.onScrolling = !0, $pagination.fadeOut(), l.animate({
        scrollTop: 0
      },
      v,
      function() {
        r.onScrolling = !1
      }), u = !0, !1)
    }
    function t(e) {
      c = 1,
      a(e)
    }
    function i(e) {
      {
        var o = $(document).scrollTop(); (o - e[0]) / (e[1] - e[0])
      }
      return c ? void(o < e[0] ? (d.removeClass("nav-bar-fixed"), u = !0) : o > e[e.length - 1] ? (d.removeClass("nav-bar-fixed"), h = !0) : (d.addClass("nav-bar-fixed"), $pagination.removeClass("hide").show(), u = !1, h = !1)) : !1
    }
    function n(e) {
      var o = $(window).height(),
      t = $(window).width(),
      i = e.img.width,
      n = e.img.height,
      a = n * t / i;
      if (a > o) r = t;
      else {
        var r = i * o / n;
        a = o
      }
      e.obj.css({
        width: r,
        height: a,
        "margin-left": -(r / 2),
        "margin-top": -(a / 2)
      }),
      e.obj.attr("src", e.img.src)
    }
    function a(e) {
      var o = $(".section").eq(e).attr("data-shrik"),
      t = $(".J_shrik").eq(o),
      i = t.attr("data-src");
      if (i) {
        var a = {
          imgsrc: i,
          obj: t
        };
        loadImg(a, n)
      }
      var r = $(".J_shrik").eq(e + 1);
      if (r) {
        var i = r.attr("data-src");
        if (i) {
          var a = {
            imgsrc: i,
            obj: r
          };
          loadImg(a, n)
        }
      }
    }
    var r, s = $(".J_miOneScroller"),
    l = $("body, html"),
    c = 0,
    d = $(".J_fixNarBar"),
    f = s.children(".section"),
    u = !1,
    h = !1,
    v = 600;
    r = s.miOneScroller({
      sectionSelector: ".section",
      mode: "vertical",
      updateURL: !1,
      duration: v,
      quietPeriod: 800,
      onLoad: e,
      beforeMove: o,
      afterMove: t,
      onScroll: i
    });
    var m = function() {
      var e = $(window).width(),
      o = $(window).height();
      $(".J_planeList").css({
        width: e,
        height: o
      });
      var t = e / 2 + 80,
      i = o / 3 + 80,
      n = -t / 2,
      a = -i / 2;
      $(".J_sidePlane").css({
        width: t,
        height: i,
        "margin-left": n,
        "margin-top": a
      })
    };
    m(),
    $(window).resize(function() {
      a(),
      m()
    }),
    $(".J_picGlass").on("mouseover", "li",
    function() {
      var e = $(this).index();
      $(this).siblings("li").removeClass("scale"),
      $(this).siblings("li").removeClass("move-left"),
      $(this).siblings("li").removeClass("move-right"),
      $(this).addClass("scale").addClass("show-text"),
      $(".J_picGlass").find("li").each(function(o) {
        e > o && $(this).addClass("move-left"),
        o > e && $(this).addClass("move-right")
      })
    }).on("mouseout", "li",
    function() {
      $(this).removeClass("scale").removeClass("show-text"),
      $(this).removeClass("move-left"),
      $(this).removeClass("move-right"),
      $(this).siblings("li").removeClass("scale"),
      $(this).siblings("li").removeClass("move-left"),
      $(this).siblings("li").removeClass("move-right")
    }),
    $(".J_circle").click(function() {
      var e = $(this).attr("data-cls"),
      o = $(this).parent().parent();
      o.removeClass("show-a").removeClass("show-b").removeClass("show-c"),
      o.addClass(e)
    })
  })
},
function(e, o) { !
  function(e, o, t) {
    var i = {
      sectionSelector: ".section",
      sectionOffsetFix: 100,
      easing: "linear",
      duration: 500,
      quietPeriod: 800,
      loop: !1,
      pagination: !0,
      keyboard: !0,
      updateURL: !1,
      viewport: e(o),
      onLoad: null,
      beforeMove: null,
      afterMove: null,
      onScroll: null
    };
    e.fn.swipeEvents = function() {
      return this.each(function() {
        function o(e) {
          var o = e.originalEvent.touches;
          o && o.length && (i = o[0].pageX, n = o[0].pageY, a.on("touchmove", t))
        }
        function t(e) {
          var o = e.originalEvent.touches;
          if (o && o.length) {
            var r = i - o[0].pageX,
            s = n - o[0].pageY;
            r >= 50 && a.trigger("swipeLeft"),
            -50 >= r && a.trigger("swipeRight"),
            s >= 50 && a.trigger("swipeUp"),
            -50 >= s && a.trigger("swipeDown"),
            (Math.abs(r) >= 50 || Math.abs(s) >= 50) && a.unbind("touchmove", t)
          }
        }
        var i, n, a = e(this);
        a.on("touchstart", o)
      })
    },
    e.fn.miOneScroller = function(t) {
      function n(e, t) {
        var i = 0,
        n = "";
        if ("get" === e) {
          if ("" !== o.location.hash) {
            n = o.location.hash.split("#")[1];
            for (var a = 0,
            r = C.length; r > a; a += 1) if (n === C[a]) {
              i = a;
              break
            }
          }
        } else {
          var s = "undefined" != typeof g.eq(t).data("anchor") ? g.eq(t).data("anchor") : "section" + (t + 1);
          history.replaceState ? history.pushState({},
          document.title, "#" + s) : location.hash = s
        }
        return i
      }
      function a(o, t) {
        h.onScrolling = !0,
        g.removeClass("section-active section-finish").eq(o).addClass("section-active"),
        m.stop().animate({
          scrollTop: String(d[o])
        },
        p.duration, p.easing).promise().done(function() {
          g.eq(o).addClass("section-finish section-done"),
          h.onScrolling = !1,
          "function" == typeof p.afterMove && p.afterMove(o, t)
        }),
        p.pagination && 0 !== t && e(".mi1scroll-pagination").children("li").removeClass("active").eq(o).addClass("active"),
        p.updateURL && 0 !== t && n("set", o)
      }
      function r() {
        var o = -1,
        t = e(document).scrollTop() - d[0],
        i = p.viewport.height();
        return e(f).each(function(e) {
          return t + i - f[e] > 0 ? void(o += 1) : !1
        }),
        0 > o ? !1 : void(h.index !== o && h.moveTo(o))
      }
      function s() {
        d = [],
        f = [],
        g.css({
          height: e(o).height()
        }),
        g.each(function() {
          var o = e(this).attr("data-offset-fix") ? parseInt(e(this).attr("data-offset-fix")) : p.sectionOffsetFix;
          d.push(e(this).offset().top),
          f.push(e(this).offset().top + o)
        })
      }
      function l() {
        s(),
        h.moveTo(h.index)
      }
      function c(e) {
        var o = (new Date).getTime();
        return o - w < p.quietPeriod + p.duration ? !1 : (0 > e ? h.moveDown() : h.moveUp(), void(w = o))
      }
      var d, f, u, h = this,
      v = e(this),
      m = e("body, html"),
      p = e.extend({},
      i, t),
      g = e(p.sectionSelector),
      w = 0,
      x = null,
      $ = null,
      b = "",
      C = [];
      return h.index = 0,
      h.onScrolling = !1,
      h.moveDown = function() {
        if (h.index < g.length - 1) {
          if ("function" == typeof p.beforeMove && p.beforeMove(h.index + 1, "down") === !1) return ! 1;
          h.index += 1,
          a(h.index, "down")
        } else if (p.loop) {
          if ("function" == typeof p.beforeMove && p.beforeMove(0, "down") === !1) return ! 1;
          h.index = 0,
          a(h.index, "down")
        } else if ("function" == typeof p.beforeMove && p.beforeMove(h.index + 1, "down") === !1) return ! 1;
        return h.index
      },
      h.moveUp = function() {
        if (h.index > 0) {
          if ("function" == typeof p.beforeMove && p.beforeMove(h.index - 1, "up") === !1) return ! 1;
          h.index -= 1,
          a(h.index, "up")
        } else if (p.loop) {
          if ("function" == typeof p.beforeMove && p.beforeMove(g.length - 1, "up") === !1) return ! 1;
          h.index = g.length - 1,
          a(h.index, "up")
        } else if ("function" == typeof p.beforeMove && p.beforeMove(h.index - 1, "up") === !1) return ! 1;
        return h.index
      },
      h.moveTo = function(e) {
        var o = h.index;
        return "function" == typeof p.beforeMove && p.beforeMove(h.index, e - h.index) === !1 ? !1 : (h.index = e > g.length - 1 || 0 > e ? 0 : e, a(h.index, e - o), h.index)
      },
      v.addClass("mi1scroller"),
      s(),
      g.each(function(o) {
        var t = o + 1,
        i = "undefined" != typeof e(this).attr("data-anchor") ? e(this).attr("data-anchor") : "section" + t;
        e(this).attr("data-index", t),
        C.push(i),
        b += "undefined" != typeof e(this).attr("data-title") ? '<li><a href="#' + i + '" data-index="' + t + '" data-title="' + e(this).attr("data-title") + '"><span class="dot">' + t + '</span><span class="title">' + e(this).attr("data-title") + "</span></a></li>": '<li><a href="#' + i + '" data-index="' + t + '"><span class="dot">' + t + "</span></a></li>"
      }),
      // p.pagination && g.length > 1 && (e('<ol class="mi1scroll-pagination"></ol>').html(b).appendTo(v), e(".mi1scroll-pagination").find("a").off(".mi1scroller").on("click.mi1scroller",
      // function(o) {
      //   o.preventDefault(),
      //   h.moveTo(e(this).data("index") - 1)
      // })),
      "function" == typeof p.onLoad && p.onLoad(h),
      u = n("get"),
      p.updateURL && u > 0 && u < g.length ? h.moveTo(u) : (g.eq(0).addClass("section-finish section-done"), p.pagination && g.length > 1 && e(".mi1scroll-pagination").children("li").first().addClass("active")),
      e(document).off(".scrollerMousewheel").on("mousewheel.scrollerMousewheel DOMMouseScroll.scrollerMousewheelMozMousePixelScroll.scrollerMousewheel",
      function(e) {
        var o = e.originalEvent.wheelDelta / 40 || -e.originalEvent.detail || e.deltaY;
        e.preventDefault(),
        Math.abs(o) > .2 && c(o)
      }),
      e(o).off(".scrollerScroll").on("scroll.scrollerScroll",
      function() {
        "function" == typeof p.onScroll && p.onScroll(d, f),
        $ && o.clearTimeout($),
        h.onScrolling || ($ = o.setTimeout(function() {
          r()
        },
        500))
      }),
      v.swipeEvents().on({
        swipeDown: function() {
          h.moveUp()
        },
        swipeUp: function() {
          h.moveDown()
        }
      }),
      e(o).off(".scrollerResize").on("resize.scrollerResize focus.scrollerResize",
      function() {
        x && o.clearTimeout(x),
        x = o.setTimeout(function() {
          l()
        },
        300)
      }),
      p.keyboard === !0 && e(document).off(".scrollerKeydown").on("keydown.scrollerKeydown",
      function(e) {
        var o = e.target.tagName.toLowerCase();
        if (h.onScrolling) return ! 1;
        switch (e.which) {
        case 38:
          "input" !== o && "textarea" !== o && (e.preventDefault(), h.moveUp());
          break;
        case 40:
          "input" !== o && "textarea" !== o && (e.preventDefault(), h.moveDown());
          break;
        case 32:
          "input" !== o && "textarea" !== o && (e.preventDefault(), h.moveDown());
          break;
        case 33:
          "input" !== o && "textarea" !== o && (e.preventDefault(), h.moveUp());
          break;
        case 34:
          "input" !== o && "textarea" !== o && (e.preventDefault(), h.moveDown());
          break;
        case 36:
          e.preventDefault(),
          h.moveTo(1);
          break;
        case 35:
          e.preventDefault(),
          h.moveTo(g.length);
          break;
        default:
          return
        }
      }),
      this
    }
  } (jQuery, window)
},
function(e, o) {
  function t(e, o) {
    var t = new Image;
    t.src = e.imgsrc,
    e.img = t,
    t.complete ? o(e) : (t.onload = function() {
      if ("naturalHeight" in this) {
        if (this.naturalHeight + this.naturalWidth === 0) return void this.onerror()
      } else if (this.width + this.height === 0) return void this.onerror();
      o(e),
      t.onload = null
    },
    t.onerror = function() {
      e.isError = !0,
      o(e)
    })
  }
  window.tarList = [];
  var i = window.tarList,
  n = function() {
    var e = $(window).scrollTop();
    for (var o in i) {
      var t = i[o],
      n = t.top;
      e > n ? t.callback(t, e) : t.reverse && t.reverse(t, e)
    }
  };
  $(window).on("scroll.mi5",
  function() {
    n()
  });
  var a = function() {
    return !! document.createElement("video").canPlayType
  } ();
  window.supportsVideo = a,
  window.loadImg = t,
  $(function() {
    $modalVideo = $("#J_modalVideo"),
    $(".J_videoBtn").click(function() {
      $modalVideo.find(".modal-hd .title").text($(this).attr("data-video-title")).end().find(".modal-bd").html('<iframe width="880" height="536" src="//hd.mi.com/f/zt/hd/misc/youku.html?vid=' + $(this).attr("data-video") + '" frameborder="0" allowfullscreen></iframe>'),
      $modalVideo.modal({
        show: !0,
        backdrop: "static"
      }),
      $modalVideo.on("hide",
      function() {
        $modalVideo.find(".modal-hd .title").empty(),
        $modalVideo.find(".modal-bd").empty()
      })
    });
    var e = function() {
      var e = $(".J_headNav").offset().top + $(".J_headNav").height(),
      o = e;
      i.push({
        top: o,
        callback: function(e, o) {
          $(".J_fixNarBar").addClass("nav-bar-fixed")
        },
        reverse: function() {
          $(".J_fixNarBar").removeClass("nav-bar-fixed")
        }
      })
    };
    e()
  })
}]);



$(function(){
	$('.buy-imgs').hover(function(){
		$(this).addClass('on');
	},function(){
		$(this).removeClass('on');
	})





   	$(document).scroll(function(){
   		// console.log($(document).scrollTop());
   		if($(document).scrollTop() == $(".section-grade").offset().top){
   			// console.log($('.translate'))
   			$('.translate').addClass('on');
			$('.position').addClass('flash');
   		}else{
   			$('.translate').removeClass('on');
			$('.position').removeClass('flash');
   		}
   		if($(document).scrollTop() == $(".section-feel").offset().top){
   			$('.section-feel .fadein').fadeIn(2000);
			$('.section-feel .flash').addClass('on');
   		}else{
   			$('.section-feel .fadein').fadeOut('slow');
			$('.section-feel .flash').removeClass('on');
   		}
   		if($(document).scrollTop() == $(".section-camera").offset().top){
   			$('.section-camera .fade').addClass('on');
			// $('.position').addClass('flash');
   		}else{
   			$('.section-camera .fade').removeClass('on');
			// $('.position').removeClass('flash');
   		}
   		if($(document).scrollTop() == $(".section-highlight").offset().top){
   			$('.assurefadein').addClass('big');
			$('.bigcircle').addClass('on');
   		}else{
   			$('.assurefadein').removeClass('big');
			$('.bigcircle').removeClass('on');
   		}
   		if($(document).scrollTop() == $(".section-miui").offset().top){
   			$('.freeright img').addClass('on');
			// $('.position').addClass('flash');
   		}else{
   			$('.freeright img').removeClass('on');
			// $('.position').removeClass('flash');
   		}
   	})
	


})

$(function() {
　　if($.browser.msie) {
　　    $(".section-start .english").css({"word-spacing":"0","letter-spacing":"1px"})
        
　　} else if($.browser.safari) {
　　    $(".section-start .english").css({"word-spacing":"0","letter-spacing":"1px"})
        
　　} else if($.browser.mozilla) {
　　    $(".section-start .english").css({"word-spacing":"0","letter-spacing":"1px"})
        
　　} else if($.browser.opera) {
　　    
　　} else {
　　    
　　}
})