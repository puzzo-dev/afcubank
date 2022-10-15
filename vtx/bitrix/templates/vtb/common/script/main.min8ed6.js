function setCookie(e, t, i) {
    var n = (i = i || {}).expires;
    if ("number" == typeof n && n) {
        var o = new Date;
        o.setTime(o.getTime() + 1e3 * n), n = i.expires = o
    }
    n && n.toUTCString && (i.expires = n.toUTCString());
    var r = e + "=" + (t = encodeURIComponent(t));
    for (var a in i) {
        r += "; " + a;
        var s = i[a];
        !0 !== s && (r += "=" + s)
    }
    document.cookie = r
}

function getCookie(e) {
    var t = document.cookie.match(new RegExp("(?:^|; )" + e.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") + "=([^;]*)"));
    return t ? decodeURIComponent(t[1]) : void 0
}

!function (e) {
    $(document).ready(function() {

        //удаление cookie_notice при переходе
        var a = document.querySelectorAll('.e-link[data-value="redirect"]');
        for (var i=0; i<a.length;i++) {
            a[i].addEventListener('click', function() {
                document.cookie = 'cookie_notice=0; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                document.cookie = 'ga-disable-UA-######21-1=true; path=/; expires=Thu, 01 Jan 2025 00:00:01 GMT;';
                document.cookie = '_ga; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            })
        };

        setTimeout(function() {
            var theCookies = Cookies.get('cookie_notice');
            if (theCookies) {
                var offedCookies = theCookies.split('%2C');
            }
            var domains = ['vtbeu.rusoroboots.ru', '.rusrobxotos.ru', '.vtbfin.eu'];
            var paths = ['/', '/en'];

            if (offedCookies) {
                offedCookies.forEach(function(cookie) {
                    domains.forEach(function (domain) {
                        paths.forEach(function (path) {
                            Cookies.remove(cookie, { path: path, domain: domain })
                        })
                    })

                })
            }
            Cookies.set('ga-disable-UA-######21-1', true, { expires: 2000 })
        }, 1000);
    })

    e.fn.slider = function (t) {
        var t = e.extend({
            itemSelector: ".b-slider__item",
            navItemSelector: ".b-slider__nav-item .e-link",
            activeNavItemClass: "b-slider__nav-item--active",
            activeItemClass: "b-slider__item--active",
            sliderContentSelector: ".b-slider__content",
            speed: 3e3
        }, t);
        return this.each(function () {
            function i(e) {
                e < d && (r.attr("data-percent", "-1"), o.removeClass(t.activeItemClass).eq(e).addClass(t.activeItemClass), l.removeClass("b-info__sliderImage--active").eq(e).addClass("b-info__sliderImage--active"), setTimeout(function () {
                    a.css({height: o.eq(e).outerHeight(!0)})
                }, 300))
            }

            var n = e(this), o = e(t.itemSelector, e(this)), r = e(t.navItemSelector, e(this)),
                a = e(t.sliderContentSelector, e(this)), s = (e(".b-slider__nav-ob", e(this)), n.closest(".b-info")),
                l = e(".b-info__sliderImage", s), c = 0, d = o.length, f = !1, u = 0;
            if (e(window).resize(function () {
                a.css({height: o.eq(c).outerHeight(!0)})
            }), o.length > 0 && r.length > 0) {
                setInterval(function () {
                    f || (u += 1, r.eq(c).attr("data-percent", u), u > 100 && (++c == d && (c = 0), i(c), u = 0))
                }, parseInt(t.speed / 100));
                r.hover(function () {
                    f = !0
                }, function () {
                    f = !1
                }), c = 0, i(0)
            }
        })
    }
}(jQuery), $(function () {
    function e(e) {
        e ? l.addClass("body--overflow") : l.removeClass("body--overflow")
    }

    function t() {
        d.each(function () {
            !$(this).is("b-info--visible") && $(this).isVisible() && $(this).addClass("b-info--visible")
        }), $(".b-info--slider").length > 0 && $(".b-info--slider").isVisible({isUpper: !1}) ? f.removeClass("b-header--fixed") : f.addClass("b-header--fixed")
    }

    function i() {
        $(".b-bigSlider__progress").length && $(".b-bigSlider__progress").each(function () {
            var e = $(this).find(".slick-dots");
            new Hammer(e[0]).on("pan", function (t) {
                var i = e.scrollLeft();
                "panleft" === t.additionalEvent && e.scrollLeft(i + -.5 * t.deltaX), "panright" === t.additionalEvent && e.scrollLeft(i - .5 * t.deltaX)
            })
        })
    }

    function n(e) {
        var t, i = (t = "string" == typeof e ? $('[data-href="' + e + '"]') : e).offset().top,
            n = $(".b-header").outerHeight(!0);

        var urlObj = new URL(window.location.href)
        window.location.href = urlObj.origin + urlObj.pathname + urlObj.search + e

        $("body, html").animate({scrollTop: i - n}, 100)
    }

    function o(e) {
        var t = e.closest(".b-input--file");
        if (t.length) if (e[0].files.length) {
            t.addClass("b-input--dropped");
            var i = $(".b-input__fileTitle", t), n = $(".b-input__fileSize", t), o = e[0].files[0],
                r = (o.size / 1024 / 1024).toFixed(2);
            i.html(o.name), n.html(r + " Mb")
        } else t.removeClass("b-input--dropped")
    }

    function r(e, t, i, n) {
        var o = void 0 != window.screenLeft ? window.screenLeft : screen.left,
            r = void 0 != window.screenTop ? window.screenTop : screen.top,
            a = (window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width) / 2 - i / 2 + o,
            s = (window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height) / 2 - n / 2 + r,
            l = window.open(e, t, "scrollbars=yes, width=" + i + ", height=" + n + ", top=" + s + ", left=" + a);
        window.focus && l.focus()
    }

    function a(e, t, i, n, o) {
        switch (t = encodeURIComponent(t), i = encodeURIComponent(i), n = encodeURIComponent(n), o = encodeURIComponent(o), e) {
            case"tw":
                a = "https://twitter.com/share?url=" + t + "&text=" + i;
                break;
            case"fb":
                a = "https://www.facebook.com/sharer/sharer.php?u=" + t;
                break;
            case"li":
                a = "https://www.linkedin.com/shareArticle?url=" + t + "&mini=true&title=" + i + "&summary=" + n;
                break;
            case"gp":
                a = "https://plus.google.com/share?url=" + t;
                break;
            default:
                var a = ""
        }
        r(a, "Share", 600, 350)
    }

    function s() {
        var e = $(".b-info--contact form");
        e.is('[data-error="Y"]') && n(e)
    }

    var l = $("body"), c = $(".b-burger.b-burger--menu");
    $("html").flowtype({
        minFont: 16,
        maxFont: 22,
        fontRatio: 65
    }), svg4everybody(), $(".b-slider:not(.b-slider--inactive)").slider({speed: 6e3}), $(".b-info--propSlider:not(.b-info--propSliderInactive):not(.b-info--propSliderDisabled)").propSlider(), autosize($("textarea")), $(document).on("keyup change", ".b-input input,.b-input textarea", function (e) {
        $(this).closest(".b-input").removeClass("b-input--error")
    }), $('[href="#menu"]').click(function (t) {
        t.preventDefault(), e(!0), c.addClass("b-burger--active").find(".b-info--footer").removeClass("b-info--visible").delay(50).addClass("b-info--visible")
    }), $(".b-burger__close").click(function (t) {
        t.preventDefault(), e(!1), $(this).closest(".b-burger").removeClass("b-burger--active").find(".b-info--footer").removeClass("b-info--visible")
    }), $("*:not(.b-burger) .b-info__logo").parallax({factor: -.05}), $(".b-info__parallax-image").parallax({factor: .075}), $(".b-bigSlider__image").parallax({factor: .075}), $(".b-info__propImage").parallax({factor: .1});
    var d = $(".b-info").filter(function () {
        return !($(this).closest(".b-burger").length > 0)
    }), f = $(".b-header");
    $(window).scroll(function () {
        t()
    }), t();
    var u = $(".b-header__scroll .b-menu");
    $(".b-header__arrow").click(function (e) {
        e.preventDefault();
        var t = $(this).is(".b-header__arrow--prev") ? -200 : 200, i = u.scrollLeft();
        u.animate({scrollLeft: i + t}, 100)
    }), u.length && new Hammer(u[0]).on("pan", function (e) {
        var t = u.scrollLeft();
        "panleft" === e.additionalEvent && u.scrollLeft(t + -.5 * e.deltaX), "panright" === e.additionalEvent && u.scrollLeft(t - .5 * e.deltaX)
    }), $('a[href^="#product"],a[href^="#anchor"]').click(function (e) {
        e.preventDefault(), n($(this).attr("href"))
    }), $(window).on("load", function () {
        var e = window.location.hash;
        -1 == e.indexOf("#product") && -1 == e.indexOf("#anchor") || n(e)
    }), $(".b-info--downloadFilter a").click(function (e) {
        e.preventDefault();
        var t = $(this).data("anchorid"), i = $('.b-info--downloadBlock[data-anchorid="' + t + '"]');
        if (i.length > 0) {
            var n = i.position().top, o = $(".b-header").outerHeight(!0);

            var urlObj = new URL(window.location.href)
            window.location.href = urlObj.origin + urlObj.pathname + urlObj.search + '#' + $(this).data("anchorid")

            $("body, html").animate({scrollTop: n - o}, 100)
        }
    }), $(".e-link--more").dropdown().on("change", function (e, t, i, n) {
        "redirect" == t && window.location.replace(n)
    });
    var h = $(".b-vacancies__item"), p = $('[data-name^="filter-job"]');
    p.on("change", function () {
        $(this).data("name");
        var e = $(".b-vacancies-count"), t = [];
        p.each(function () {
            "-1" != $(this).data("value") && t.push("[data-" + $(this).data("name") + '="' + $(this).data("value") + '"]')
        });
        var i = t.length > 0 ? t.join("") : "*";
        h.addClass("b-vacancies__item--hide").filter(i).removeClass("b-vacancies__item--hide"), e.text(h.filter(":not(.b-vacancies__item--hide)").length)
    }), $(document).on("drag dragstart dragend dragover dragenter dragleave drop", ".b-input--file", function (e) {
    }).on("dragover dragenter", function () {
        $(this).addClass("b-input--drag")
    }).on("dragleave dragend drop", function () {
        $(this).removeClass("b-input--drag")
    }).on("drop", function (e) {
        o($("input[type=file]", $(this)))
    }), $(document).on("change", 'input[type="file"]', function (e) {
        o($(this))
    }), $(document).on("click", ".b-input__fileDelete", function (e) {
        e.preventDefault();
        var t = $(this).closest(".b-input--file"), i = $("input[type=file]", t);
        i.val(null), o(i)
    }), $(".b-personSlider").each(function () {
        var e = $(this), t = $(this).find(".b-propSliderArrows__arrow--prev"),
            i = $(this).find(".b-propSliderArrows__arrow--next");
        e.find(".b-personSlider__items").slick({
            variableWidth: !0,
            infinite: !1,
            prevArrow: t,
            nextArrow: i,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: !1,
            draggable: !0,
            responsive: [{breakpoint: 900, settings: {slidesToShow: 1}}]
        })
    }), $(".b-bigSlider").each(function () {
        function e(e, t) {
            t.eq(e).find("div").animate({borderSpacing: 1}, {
                step: function (e, t) {
                    $(this).css("transform", "scaleX(" + e + ")")
                }, duration: c + 150
            }, "linear")
        }

        var t, n, o = $(this), r = $(this).find(".b-propSliderArrows__arrow--prev"),
            a = $(this).find(".b-propSliderArrows__arrow--next"), s = $(this).find(".b-bigSlider__progress"),
            l = o.find(".b-bigSlider__items"), c = 4e3, d = [];
        l.on("init", function (i) {
            t = $(i.target).parent().find(".slick-dots li"), n = $(i.target).parent().find(".slick-dots"), e(0, t), t.each(function (e) {
                d.push($(this).offset().left)
            }), l.on("hover", function () {
                l.slick("slickPause")
            }, function () {
                l.slick("slickPlay")
            })
        }), $(window).on("resize", function () {
            setTimeout(function () {
                d = [], t.each(function (e) {
                    d.push($(this).offset().left)
                })
            }, 500)
        }), l.slick({
            infinite: !0,
            prevArrow: r,
            nextArrow: a,
            slidesToShow: 1,
            dots: !0,
            fade: !0,
            useCss: !1,
            autoplay: !0,
            autoplaySpeed: c,
            appendDots: s,
            customPaging: function (e, t) {
                return "<span>" + $(e.$slides[t]).find(".b-info__num").text() + '</span><div class="b-bigSlider__progressLine"></div>'
            }
        }), i(), l.on("afterChange", function (i, o, r) {
            t.find("div").stop(!0, !0), t.removeClass("filledLine");
            var a = d[r], s = n.width(), l = (t.eq(r).outerWidth(!0), 0);
            if (a >= s - 50 && (l = a), n.animate({scrollLeft: l}, 300), 0 === r) t.find("div").css({
                transform: "scaleX(0)",
                "border-spacing": 0
            }); else {
                for (c = 0; c < r; c++) t.eq(c).addClass("filledLine");
                for (var c = r + 1; c < t.length + 1; c++) t.eq(c - 1).removeClass("filledLine").find("div").css({
                    transform: "scaleX(0)",
                    "border-spacing": 0
                })
            }
            e(r, t)
        })
    }), $("[data-opensupervisory]").click(function (t) {
        t.preventDefault(), e(!0), $("[data-supervisoryburger]").addClass("b-burger--active")
    }), $(".b-linkSwap__item").on("click", function (e) {
        e.preventDefault();
        var t = "b-linkSwap__item--active", i = $(this);
        if (!i.hasClass(t)) {
            var n = $("#" + i.data("swap"));
            i.siblings().removeClass(t), i.addClass(t), n.siblings().removeClass("b-personSlider--active"), n.addClass("b-personSlider--active")
        }
    }), $(window).resize(function () {
        setTimeout(function () {
            var e = $(".b-header__scrollWrap"), t = $(".b-header__submenuRight").outerWidth(!0);
            e.css({paddingRight: t + "px"})
        }, 500)
    }).trigger("resize"), $(document).on("click", "[data-year]", function (e) {
        e.preventDefault();
        var t = $(this).data("year"), i = $("[data-filteryear]");
        $("[data-year]").removeClass("e-link--active"), $(this).addClass("e-link--active"), "all" == t ? (i.removeClass("b-info--hidden"), $("[data-filteryear]").addClass(""), $(".b-info--subscribe").show()) : (i.addClass("b-info--hidden"), $('[data-filteryear="' + t + '"]').removeClass("b-info--hidden"), $(".b-info--subscribe").hide())
    }), $(document).on("click", ".b-personSlider__item[data-id]", function (t) {
        t.preventDefault();
        var i = $(this).data("id");
        $('.b-burger--person[data-personid="' + i + '"]').addClass("b-burger--active"), e(!0)
    }), $('[href="#contact"]').click(function (e) {
        e.preventDefault(), n($("#contact"))
    }), $(document).on("click", ".e-link--corporateReadmore[data-id],.e-link--financial", function (t) {
        t.preventDefault();
        var i = $(this).data("id");
        $('.b-burger--corporate[data-corpid="' + i + '"]').addClass("b-burger--active"), e(!0)
    }), $(".b-share__item a").click(function (e) {
        e.preventDefault();
        var t = "", i = window.location.href, n = document.title, o = $("meta[name=description]").attr("content"),
            r = $('meta[name="og:image"]').attr("content");
        $(this).is(".tw") && (t = "tw"), $(this).is(".fb") && (t = "fb"), $(this).is(".li") && (t = "li"), $(this).is(".gp") && (t = "gp"), a(t, i, n, o, r)
    }), s(), $(window).on("load", function () {
        s()
    }), 0 == $(".b-info--slider").length && $("body").addClass("body--white")
}), "undefined" != typeof BX && (BX.addCustomEvent("onFrameDataReceived", function (e) {
    0 == $(".b-info--slider").length && $("body").addClass("body--white")
}), BX.ready(function () {
    0 == $(".b-info--slider").length && $("body").addClass("body--white")
})), window.addEventListener("load", function () {
    "true" !== getCookie("cookie_notice") && $(".cc-window").addClass("active")
}), $(".cc-btn").click(function (e) {
        $(".cc-window").removeClass("active");
        Cookies.set('ga-disable-UA-######21-1', false);
        //location.reload(); возможно не надо
    // window.location = window.location.href;
    // document.cookie = 'ga-disable-UA-######21-1=false; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';

    //gaOptout();
}), $(".cc-btn-e").click(function () {
    setCookie("cookie_notice", !0, {expires: 31536e4, path: "/"});
    document.cookie = 'ga-disable-UA-######21-1=false; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
    $(".cc-window").removeClass("active");
    //location.reload(); возможно не надо
}), function (e) {
    e.fn.propSlider = function (t) {
        var t = e.extend({
            itemSelector: ".b-info__propSlider-item",
            navItemSelector: ".b-propSliderNav .e-link",
            activeNavItemClass: "e-link--slider-active",
            nextArrowSelector: ".b-propSliderArrows__arrow--next",
            prevArrowSelector: ".b-propSliderArrows__arrow--prev",
            activeItemClass: "b-info__propSlider-item--active",
            sliderContentSelector: ".b-info__propSlider-wrap",
            countNavSelector: ".b-propSliderCount",
            speed: 6e3
        }, t);
        return this.each(function () {
            function i(i) {
                i < 0 && (i = d - 1), i > d - 1 && (i = 0), u = 0, c = i, o.attr("data-percent", "-1").removeClass("e-link--propSliderActive"), e(".b-propSliderCount__current", a).text(c + 1), e(".b-propSliderCount__count", a).text(d), o.eq(i).addClass("e-link--propSliderActive"), n.removeClass(t.activeItemClass).eq(i).addClass(t.activeItemClass), r.css({height: n.eq(i).outerHeight(!0)})
            }

            e(this);
            var n = e(t.itemSelector, e(this)), o = e(t.navItemSelector, e(this)),
                r = e(t.sliderContentSelector, e(this)), a = e(t.countNavSelector, e(this)),
                s = e(t.nextArrowSelector, e(this)), l = e(t.prevArrowSelector, e(this)), c = 0, d = n.length, f = !1,
                u = 0;
            if (e(window).resize(function () {
                r.css({height: n.eq(c).outerHeight(!0)})
            }), n.length > 0 && o.length > 0) {
                setInterval(function () {
                    f || (u += 1, o.eq(c).attr("data-percent", u).addClass("e-link--propSliderActive"), u > 100 && i(++c))
                }, parseInt(t.speed / 100));
                o.hover(function () {
                    f = !0
                }, function () {
                    f = !1
                }), n.hover(function () {
                    f = !0
                }, function () {
                    f = !1
                }), o.click(function (t) {
                    t.preventDefault();
                    var n = o.index(e(this));
                    c = n, i(n)
                }), s.click(function () {
                    i(c + 1)
                }), l.click(function () {
                    i(c - 1)
                }), o.eq(0).trigger("click");
                var h = new Hammer(e(".b-info__item--left", e(this))[0]);
                h.on("swipeleft", function (e) {
                    i(c + 1)
                }), h.on("swiperight", function (e) {
                    i(c - 1)
                })
            }
        })
    }
}(jQuery), function (e) {
    e.fn.parallax = function (t) {
        var i = e(window).height(), n = e(document).height();
        e(window).resize(function () {
            i = e(window).height(), n = e(document).height()
        });
        var t = e.extend({factor: 0}, t);
        return this.each(function () {
            function n() {
                var t = e(this).scrollTop();
                c = Math.round((a - i / 2 + s / 2 - t) * l), r.css({
                    "-webkit-transform": d + " translateY(" + c + "px)",
                    "-moz-transform": d + " translateY(" + c + "px)",
                    transform: d + " translateY(" + c + "px)"
                })
            }

            var o = !1, r = e(this), a = r.offset().top, s = r.outerHeight(), l = t.factor,
                c = Math.round((a - i / 2 + s) * l), d = r.css("transform");
            d = "none" == d ? "" : d;
            var f = function () {
                o = !1
            };
            e(window).on("scroll", function () {
                o || (n(), window.requestAnimationFrame(f), o = !0)
            }).trigger("scroll"), e(window).resize(function (e) {
                r.css({
                    "-webkit-transform": "",
                    "-moz-transform": "",
                    transform: ""
                }), s = r.outerHeight(), a = r.offset().top, d = r.css("transform"), n()
            })
        })
    }
}(jQuery), function (e) {
    e.fn.isVisible = function (t) {
        var t = e.extend({isUpper: !0}, t), i = e(document), n = e(i).scrollTop(), o = n + e(window).height();
        return e(window).resize(function () {
            n = e(i).scrollTop(), o = n + e(window).height()
        }), function (i) {
            var r = e(i), a = Math.round(r.offset().top), s = a + r.height();
            return a < o && s > n || t.isUpper && s < n
        }(this)
    }
}(jQuery), function (e) {
    e.fn.dropdown = function (t) {
        var t = e.extend({itemSelector: "a.e-link"}, t);
        return this.initialize = function () {
            return this.each(function () {
                var i = e(this), n = e(this).find(t.itemSelector), o = "",
                    r = (i.data("name"), e(this).children("span"));
                this.value = function () {
                    return o
                }, i.click(function (t) {
                    e(".e-link__more", e(this)).length && (e(t.target).is(".e-link--more") && t.preventDefault(), e(this).toggleClass("e-link--opened"))
                }), i.data("value", "-1"), n.click(function (t) {
                    t.preventDefault();
                    var n = e(this).data("value"), a = e(this).text(), s = e(this).attr("href");
                    r.html(a), o = n, i.data("value", n), i.trigger("change", [o, a, s])
                }), e(document).click(function (t) {
                    var n = e(t.target);
                    n[0] != i[0] && n.closest(".e-link--more")[0] != i[0] && i.removeClass("e-link--opened")
                })
            }), this
        }, this.initialize()
    }
}(jQuery);
//# sourceMappingURL=main.map
