

//============= Mobile Button  ============

$(".accordion-wrapper .mobile-open").on('click', function () {
    $(".accordion").toggleClass("active");
    $(".hamburger").toggleClass("is-active");
    // $(".hamburger--spin").toggleClass("is-active");
});

$(".accordion .closeme").on('click',function () {
    $(this).parents('.accordion').removeClass("active");
    $(".class-1").toggleClass("is-active");
    $(".class-2").removeClass("is-active");
    // $(this).parents('.hamburger--spin').removeClass("is-active");
});

$(document).mouseup(function(e) {
    var $target = $(e.target);
    var hamburgers = document.querySelectorAll(".hamburger");
    if ($target.closest(".accordion").length == 0) {
        $(".accordion").removeClass("active");
        $(".hamburger").removeClass("is-active");
        e.style.transition = "all 1s ease-in-out";
    }
});

//
// // Switcher Input
//
// function switcher() {
//     a = $("#z").val();b = $("#k").val();$("#z").val(b);$("#k").val(a);
// }
//
// // Text slide
//
// var timerlen = 5;
// var slideAniLen = 250;
//
// var timerID = new Array();
// var startTime = new Array();
// var obj = new Array();
// var endHeight = new Array();
// var moving = new Array();
// var dir = new Array();

// function slidedown(objname) {
//     if (moving[objname])
//         return;
//
//     if (document.getElementById(objname).style.display != "none")
//         return; // cannot slide down something that is already visible
//
//     moving[objname] = true;
//     dir[objname] = "down";
//     startslide(objname);
// }
//
// function slideup(objname) {
//     if (moving[objname])
//         return;
//
//     if (document.getElementById(objname).style.display == "none")
//         return; // cannot slide up something that is already hidden
//
//     moving[objname] = true;
//     dir[objname] = "up";
//     startslide(objname);
// }
//
// if (window.innerWidth < 468) {
//     function startslide(objname) {
//         obj[objname] = document.getElementById(objname);
//
//         endHeight[objname] = parseInt(obj[objname].style.height);
//         startTime[objname] = (new Date()).getTime();
//
//         if (dir[objname] == "down") {
//             obj[objname].style.height = "1px";
//         }
//
//         obj[objname].style.display = "block";
//
//         timerID[objname] = setInterval('slidetick(\'' + objname + '\');', timerlen);
//     }
//
//     function slidetick(objname) {
//         var elapsed = (new Date()).getTime() - startTime[objname];
//
//         if (elapsed > slideAniLen)
//             endSlide(objname)
//         else {
//             var d = Math.round(elapsed / slideAniLen * endHeight[objname]);
//             if (dir[objname] == "up")
//                 d = endHeight[objname] - d;
//
//             obj[objname].style.height = d + "px";
//         }
//
//         return;
//     }
//
//     function endSlide(objname) {
//         clearInterval(timerID[objname]);
//
//         if (dir[objname] == "up")
//             obj[objname].style.display = "none";
//
//         obj[objname].style.height = endHeight[objname] + "px";
//
//         delete(moving[objname]);
//         delete(timerID[objname]);
//         delete(startTime[objname]);
//         delete(endHeight[objname]);
//         delete(obj[objname]);
//         delete(dir[objname]);
//
//         return;
//     }
// }

// Hamburgers menu

var forEach = function (t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t)) for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t); else for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
    forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);

    });
}
/**
 * Global variables
 */
"use strict";

var userAgent = navigator.userAgent.toLowerCase(),
    initialDate = new Date(),

    $document = $(document),
    $window = $(window),
    $html = $("html"),

    isDesktop = $html.hasClass("desktop"),
    isIE = userAgent.indexOf("msie") != -1 ? parseInt(userAgent.split("msie")[1]) : userAgent.indexOf("trident") != -1 ? 11 : userAgent.indexOf("edge") != -1 ? 12 : false,
    isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
    isTouch = "ontouchstart" in window,

    plugins = {
        pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
        smoothScroll: $html.hasClass("use--smoothscroll") ? "js/smoothscroll.min.js" : false,
        bootstrapTooltip: $("[data-toggle='tooltip']"),
        bootstrapTabs: $(".tabs"),
        materialParallax: $(".material-parallax"),
        responsiveTabs: $(".responsive-tabs"),
        rdGoogleMaps: $(".rd-google-map"),
        rdNavbar: $(".rd-navbar"),
        owl: $(".owl-carousel"),
        swiper: $(".swiper-slider"),
        counter: $(".counter"),
        mfp: $('[data-lightbox]').not('[data-lightbox="gallery"] [data-lightbox]'),
        mfpGallery: $('[data-lightbox^="gallery"]'),
        flickrfeed: $(".flickr"),
        lightGallery: $("[data-lightgallery='group']"),
        lightGalleryItem: $("[data-lightgallery='item']"),
        lightDynamicGalleryItem: $("[data-lightgallery='dynamic']"),
        progressBar: $(".progress-bar-js"),
        isotope: $(".isotope"),
        countDown: $(".countdown"),
        calendar: $(".rd-calendar"),
        materialTabs: $('.rd-material-tabs'),
        popover: $('[data-toggle="popover"]'),
        dateCountdown: $('.DateCountdown'),
        campaignMonitor: $('.campaign-mailform'),
        slick: $('.slick-slider'),
        scroller: $(".scroll-wrap"),
        selectFilter: $("select"),
        bootstrapDateTimePicker: $("[data-time-picker]"),
        customWaypoints: $('[data-custom-scroll-to]'),
        photoSwipeGallery: $("[data-photo-swipe-item]"),
        circleProgress: $(".progress-bar-circle"),
        stepper: $("input[type='number']"),
        customToggle: $("[data-custom-toggle]"),
        rdMailForm: $(".rd-mailform"),
        rdInputLabel: $(".form-label"),
        maps: $(".google-map-container"),
        regula: $("[data-constraints]"),
        radio: $("input[type='radio']"),
        checkbox: $("input[type='checkbox']"),
        captcha: $('.recaptcha'),
        mailchimp: $('.mailchimp-mailform'),
        search: $(".rd-search"),
        searchResults: $('.rd-search-results')
    };

/**
 * Initialize All Scripts
 */
$document.ready(function () {
    var isNoviBuilder = window.xMode;

    /**
     * @desc Calculate the height of swiper slider basing on data attr
     * @param {object} object - slider jQuery object
     * @param {string} attr - attribute name
     * @return {number} slider height
     */
    function getSwiperHeight(object, attr) {
        var val = object.attr("data-" + attr),
            dim;

        if (!val) {
            return undefined;
        }

        dim = val.match(/(px)|(%)|(vh)|(vw)$/i);

        if (dim.length) {
            switch (dim[0]) {
                case "px":
                    return parseFloat(val);
                case "vh":
                    return $window.height() * (parseFloat(val) / 100);
                case "vw":
                    return $window.width() * (parseFloat(val) / 100);
                case "%":
                    return object.width() * (parseFloat(val) / 100);
            }
        } else {
            return undefined;
        }
    }

    /**
     * @desc Toggle swiper videos on active slides
     * @param {object} swiper - swiper slider
     */
    function toggleSwiperInnerVideos(swiper) {
        var prevSlide = $(swiper.slides[swiper.previousIndex]),
            nextSlide = $(swiper.slides[swiper.activeIndex]),
            videos,
            videoItems = prevSlide.find("video");

        for (var i = 0; i < videoItems.length; i++) {
            videoItems[i].pause();
        }

        videos = nextSlide.find("video");
        if (videos.length) {
            videos.get(0).play();
        }
    }

    /**
     * @desc Toggle swiper animations on active slides
     * @param {object} swiper - swiper slider
     */
    function toggleSwiperCaptionAnimation(swiper) {
        var prevSlide = $(swiper.container).find("[data-caption-animate]"),
            nextSlide = $(swiper.slides[swiper.activeIndex]).find("[data-caption-animate]"),
            delay,
            duration,
            nextSlideItem,
            prevSlideItem;

        for (var i = 0; i < prevSlide.length; i++) {
            prevSlideItem = $(prevSlide[i]);

            prevSlideItem.removeClass("animated")
                .removeClass(prevSlideItem.attr("data-caption-animate"))
                .addClass("not-animated");
        }


        var tempFunction = function (nextSlideItem, duration) {
            return function () {
                nextSlideItem
                    .removeClass("not-animated")
                    .addClass(nextSlideItem.attr("data-caption-animate"))
                    .addClass("animated");
                if (duration) {
                    nextSlideItem.css('animation-duration', duration + 'ms');
                }
            };
        };

        for (var i = 0; i < nextSlide.length; i++) {
            nextSlideItem = $(nextSlide[i]);
            delay = nextSlideItem.attr("data-caption-delay");
            duration = nextSlideItem.attr('data-caption-duration');
            if (!isNoviBuilder) {
                if (delay) {
                    setTimeout(tempFunction(nextSlideItem, duration), parseInt(delay, 10));
                } else {
                    tempFunction(nextSlideItem, duration);
                }

            } else {
                nextSlideItem.removeClass("not-animated")
            }
        }
    }

    /**
     * @desc Initialize owl carousel plugin
     * @param {object} c - carousel jQuery object
     */
    function initOwlCarousel(c) {
        var aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
            values = [0, 576, 768, 992, 1200, 1600],
            responsive = {};

        for (var j = 0; j < values.length; j++) {
            responsive[values[j]] = {};
            for (var k = j; k >= -1; k--) {
                if (!responsive[values[j]]["items"] && c.attr("data" + aliaces[k] + "items")) {
                    responsive[values[j]]["items"] = k < 0 ? 1 : parseInt(c.attr("data" + aliaces[k] + "items"), 10);
                }
                if (!responsive[values[j]]["stagePadding"] && responsive[values[j]]["stagePadding"] !== 0 && c.attr("data" + aliaces[k] + "stage-padding")) {
                    responsive[values[j]]["stagePadding"] = k < 0 ? 0 : parseInt(c.attr("data" + aliaces[k] + "stage-padding"), 10);
                }
                if (!responsive[values[j]]["margin"] && responsive[values[j]]["margin"] !== 0 && c.attr("data" + aliaces[k] + "margin")) {
                    responsive[values[j]]["margin"] = k < 0 ? 30 : parseInt(c.attr("data" + aliaces[k] + "margin"), 10);
                }
            }
        }

        // Enable custom pagination
        if (c.attr('data-dots-custom')) {
            c.on("initialized.owl.carousel", function (event) {
                var carousel = $(event.currentTarget),
                    customPag = $(carousel.attr("data-dots-custom")),
                    active = 0;

                if (carousel.attr('data-active')) {
                    active = parseInt(carousel.attr('data-active'), 10);
                }

                carousel.trigger('to.owl.carousel', [active, 300, true]);
                customPag.find("[data-owl-item='" + active + "']").addClass("active");

                customPag.find("[data-owl-item]").on('click', function (e) {
                    e.preventDefault();
                    carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item"), 10), 300, true]);
                });

                carousel.on("translate.owl.carousel", function (event) {
                    customPag.find(".active").removeClass("active");
                    customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
                });
            });
        }

        c.on("initialized.owl.carousel", function () {
            initLightGalleryItem(c.find('[data-lightgallery="item"]'), 'lightGallery-in-carousel');
        });

        c.owlCarousel({
            autoplay: isNoviBuilder ? false : c.attr("data-autoplay") === "true",
            loop: isNoviBuilder ? false : c.attr("data-loop") !== "false",
            items: 1,
            center: c.attr("data-center") === "true",
            dotsContainer: c.attr("data-pagination-class") || false,
            navContainer: c.attr("data-navigation-class") || false,
            mouseDrag: isNoviBuilder ? false : c.attr("data-mouse-drag") !== "false",
            nav: c.attr("data-nav") === "true",
            dots: c.attr("data-dots") === "true",
            dotsEach: c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each"), 10) : false,
            animateIn: c.attr('data-animation-in') ? c.attr('data-animation-in') : false,
            animateOut: c.attr('data-animation-out') ? c.attr('data-animation-out') : false,
            responsive: responsive,
            navText: c.attr("data-nav-text") ? $.parseJSON(c.attr("data-nav-text")) : [],
            navClass: c.attr("data-nav-class") ? $.parseJSON(c.attr("data-nav-class")) : ['owl-prev', 'owl-next']
        });
    }

    /**
     * @desc Initialize the gallery with set of images
     * @param {object} itemsToInit - jQuery object
     * @param {string} addClass - additional gallery class
     */
    function initLightGallery(itemsToInit, addClass) {
        if (!isNoviBuilder) {
            $(itemsToInit).lightGallery({
                thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
                selector: "[data-lightgallery='item']",
                autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
                pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
                addClass: addClass,
                mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
                loop: $(itemsToInit).attr("data-lg-loop") !== "false"
            });
        }
    }

    /**
     * @desc Initialize the gallery with dynamic addition of images
     * @param {object} itemsToInit - jQuery object
     * @param {string} addClass - additional gallery class
     */
    function initDynamicLightGallery(itemsToInit, addClass) {
        if (!isNoviBuilder) {
            $(itemsToInit).on("click", function () {
                $(itemsToInit).lightGallery({
                    thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
                    selector: "[data-lightgallery='item']",
                    autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
                    pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
                    addClass: addClass,
                    mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
                    loop: $(itemsToInit).attr("data-lg-loop") !== "false",
                    dynamic: true,
                    dynamicEl: JSON.parse($(itemsToInit).attr("data-lg-dynamic-elements")) || []
                });
            });
        }
    }

    /**
     * @desc Initialize the gallery with one image
     * @param {object} itemToInit - jQuery object
     * @param {string} addClass - additional gallery class
     */
    function initLightGalleryItem(itemToInit, addClass) {
        if (!isNoviBuilder) {
            $(itemToInit).lightGallery({
                selector: "this",
                addClass: addClass,
                counter: false,
                youtubePlayerParams: {
                    modestbranding: 1,
                    showinfo: 0,
                    rel: 0,
                    controls: 0
                },
                vimeoPlayerParams: {
                    byline: 0,
                    portrait: 0
                }
            });
        }
    }

    /**
     * Google map function for getting latitude and longitude
     */
    function getLatLngObject(str, marker, map, callback) {
        var coordinates = {};
        try {
            coordinates = JSON.parse(str);
            callback(new google.maps.LatLng(
                coordinates.lat,
                coordinates.lng
            ), marker, map)
        } catch (e) {
            map.geocoder.geocode({'address': str}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    callback(new google.maps.LatLng(
                        parseFloat(latitude),
                        parseFloat(longitude)
                    ), marker, map)
                }
            })
        }
    }

    /**
     * makeParallax
     * @description  create swiper parallax scrolling effect
     */
    function makeParallax(el, speed, wrapper, prevScroll) {
        var scrollY = window.scrollY || window.pageYOffset;

        if (prevScroll != scrollY) {
            prevScroll = scrollY;
            el.addClass('no-transition');
            el[0].style['transform'] = 'translate3d(0,' + -scrollY * (1 - speed) + 'px,0)';
            el.height();
            el.removeClass('no-transition');

            if (el.attr('data-fade') === 'true') {
                var bound = el[0].getBoundingClientRect(),
                    offsetTop = bound.top * 2 + scrollY,
                    sceneHeight = wrapper.outerHeight(),
                    sceneDevider = wrapper.offset().top + sceneHeight / 2.0,
                    layerDevider = offsetTop + el.outerHeight() / 2.0,
                    pos = sceneHeight / 6.0,
                    opacity;
                if (sceneDevider + pos > layerDevider && sceneDevider - pos < layerDevider) {
                    el[0].style["opacity"] = 1;
                } else {
                    if (sceneDevider - pos < layerDevider) {
                        opacity = 1 + ((sceneDevider + pos - layerDevider) / sceneHeight / 3.0 * 5);
                    } else {
                        opacity = 1 - ((sceneDevider - pos - layerDevider) / sceneHeight / 3.0 * 5);
                    }
                    el[0].style["opacity"] = opacity < 0 ? 0 : opacity > 1 ? 1 : opacity.toFixed(2);
                }
            }
        }

        requestAnimationFrame(function () {
            makeParallax(el, speed, wrapper, prevScroll);
        });
    }

    /**
     * isScrolledIntoView
     * @description  check the element whas been scrolled into the view
     */
    function isScrolledIntoView(elem) {
        var $window = $(window);
        return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
    }

    /**
     * initOnView
     * @description  calls a function when element has been scrolled into the view
     */
    function lazyInit(element, func) {
        var $win = jQuery(window);
        $win.on('load scroll', function () {
            if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
                func.call();
                element.addClass('lazy-loaded');
            }
        });
    }

    /**
     * Live Search
     * @description  create live search results
     */
    function liveSearch(options) {
        $('#' + options.live).removeClass('cleared').html();
        options.current++;
        options.spin.addClass('loading');
        $.get(handler, {
            s: decodeURI(options.term),
            liveSearch: options.live,
            dataType: "html",
            liveCount: options.liveCount,
            filter: options.filter,
            template: options.template
        }, function (data) {
            options.processed++;
            var live = $('#' + options.live);
            if (options.processed == options.current && !live.hasClass('cleared')) {
                live.find('> #search-results').removeClass('active');
                live.removeClass('active');
                live.html(data);
                setTimeout(function () {
                    live.find('> #search-results').addClass('active');
                    live.addClass('active');
                }, 50);
            }
            options.spin.parents('.rd-search').find('.input-group-addon').removeClass('loading');
        })
    }

    /**
     * attachFormValidator
     * @description  attach form validation to elements
     */
    function attachFormValidator(elements) {
        for (var i = 0; i < elements.length; i++) {
            var o = $(elements[i]), v;
            o.addClass("form-control-has-validation").after("<span class='form-validation'></span>");
            v = o.parent().find(".form-validation");
            if (v.is(":last-child")) {
                o.addClass("form-control-last-child");
            }
        }

        elements
            .on('input change propertychange blur', function (e) {
                var $this = $(this), results;

                if (e.type !== "blur") {
                    if (!$this.parent().hasClass("has-error")) {
                        return;
                    }
                }

                if ($this.parents('.rd-mailform').hasClass('success')) {
                    return;
                }

                if ((results = $this.regula('validate')).length) {
                    for (i = 0; i < results.length; i++) {
                        $this.siblings(".form-validation").text(results[i].message).parent().addClass("has-error")
                    }
                } else {
                    $this.siblings(".form-validation").text("").parent().removeClass("has-error")
                }
            })
            .regula('bind');

        var regularConstraintsMessages = [
            {
                type: regula.Constraint.Required,
                newMessage: "The text field is required."
            },
            {
                type: regula.Constraint.Email,
                newMessage: "The email is not a valid email."
            },
            {
                type: regula.Constraint.Numeric,
                newMessage: "Only numbers are required"
            },
            {
                type: regula.Constraint.Selected,
                newMessage: "Please choose an option."
            }
        ];


        for (var i = 0; i < regularConstraintsMessages.length; i++) {
            var regularConstraint = regularConstraintsMessages[i];

            regula.override({
                constraintType: regularConstraint.type,
                defaultMessage: regularConstraint.newMessage
            });
        }
    }

    /**
     * isValidated
     * @description  check if all elemnts pass validation
     */
    function isValidated(elements, captcha) {
        var results, errors = 0;

        if (elements.length) {
            for (j = 0; j < elements.length; j++) {

                var $input = $(elements[j]);
                if ((results = $input.regula('validate')).length) {
                    for (k = 0; k < results.length; k++) {
                        errors++;
                        $input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
                    }
                } else {
                    $input.siblings(".form-validation").text("").parent().removeClass("has-error")
                }
            }

            if (captcha) {
                if (captcha.length) {
                    return validateReCaptcha(captcha) && errors === 0
                }
            }

            return errors === 0;
        }
        return true;
    }

    /**
     * validateReCaptcha
     * @description  validate google reCaptcha
     */
    function validateReCaptcha(captcha) {
        var captchaToken = captcha.find('.g-recaptcha-response').val();

        if (captchaToken.length === 0) {
            captcha
                .siblings('.form-validation')
                .html('Please, prove that you are not robot.')
                .addClass('active');
            captcha
                .closest('.form-group')
                .addClass('has-error');

            captcha.on('propertychange', function () {
                var $this = $(this),
                    captchaToken = $this.find('.g-recaptcha-response').val();

                if (captchaToken.length > 0) {
                    $this
                        .closest('.form-group')
                        .removeClass('has-error');
                    $this
                        .siblings('.form-validation')
                        .removeClass('active')
                        .html('');
                    $this.off('propertychange');
                }
            });

            return false;
        }

        return true;
    }

    /**
     * onloadCaptchaCallback
     * @description  init google reCaptcha
     */
    window.onloadCaptchaCallback = function () {
        for (i = 0; i < plugins.captcha.length; i++) {
            var $capthcaItem = $(plugins.captcha[i]);

            grecaptcha.render(
                $capthcaItem.attr('id'),
                {
                    sitekey: $capthcaItem.attr('data-sitekey'),
                    size: $capthcaItem.attr('data-size') ? $capthcaItem.attr('data-size') : 'normal',
                    theme: $capthcaItem.attr('data-theme') ? $capthcaItem.attr('data-theme') : 'light',
                    callback: function (e) {
                        $('.recaptcha').trigger('propertychange');
                    }
                }
            );
            $capthcaItem.after("<span class='form-validation'></span>");
        }
    };

    /**
     * Init Bootstrap tooltip
     * @description  calls a function when need to init bootstrap tooltips
     */
    function initBootstrapTooltip(tooltipPlacement) {
        if (window.innerWidth < 599) {
            plugins.bootstrapTooltip.tooltip('destroy');
            plugins.bootstrapTooltip.tooltip({
                placement: 'bottom'
            });
        } else {
            plugins.bootstrapTooltip.tooltip('destroy');
            plugins.bootstrapTooltip.tooltipPlacement;
            plugins.bootstrapTooltip.tooltip();
        }
    }

    /**
     * Copyright Year
     * @description  Evaluates correct copyright year
     */
    var o = $("#copyright-year");
    if (o.length) {
        o.text(initialDate.getFullYear());
    }

    /**
     * IE Polyfills
     * @description  Adds some loosing functionality to IE browsers
     */
    if (isIE) {
        if (isIE < 10) {
            $html.addClass("lt-ie-10");
        }

        if (isIE < 11) {
            if (plugins.pointerEvents) {
                $.getScript(plugins.pointerEvents)
                    .done(function () {
                        $html.addClass("ie-10");
                        PointerEventsPolyfill.initialize({});
                    });
            }
        }

        if (isIE === 11) {
            $("html").addClass("ie-11");
        }

        if (isIE === 12) {
            $("html").addClass("ie-edge");
        }
    }

    /**
     * Bootstrap Tooltips
     * @description Activate Bootstrap Tooltips
     */
    if (plugins.bootstrapTooltip.length) {
        var tooltipPlacement = plugins.bootstrapTooltip.attr('data-placement');
        initBootstrapTooltip(tooltipPlacement);
        $(window).on('resize orientationchange', function () {
            initBootstrapTooltip(tooltipPlacement);
        })
    }

    /**
     * Smooth scrolling
     * @description  Enables a smooth scrolling for Google Chrome (Windows)
     */
    if (plugins.smoothScroll) {
        $.getScript(plugins.smoothScroll);
    }

    /**
     * @module       Magnific Popup
     * @author       Dmitry Semenov
     * @see          http://dimsemenov.com/plugins/magnific-popup/
     * @version      v1.0.0
     */
    if (plugins.mfp.length > 0 || plugins.mfpGallery.length > 0) {
        if (plugins.mfp.length) {
            for (i = 0; i < plugins.mfp.length; i++) {
                var mfpItem = plugins.mfp[i];

                $(mfpItem).magnificPopup({
                    type: mfpItem.getAttribute("data-lightbox")
                });
            }
        }
        if (plugins.mfpGallery.length) {
            for (i = 0; i < plugins.mfpGallery.length; i++) {
                var mfpGalleryItem = $(plugins.mfpGallery[i]).find('[data-lightbox]');

                for (var c = 0; c < mfpGalleryItem.length; c++) {
                    $(mfpGalleryItem).addClass("mfp-" + $(mfpGalleryItem).attr("data-lightbox"));
                }

                mfpGalleryItem.end()
                    .magnificPopup({
                        delegate: '[data-lightbox]',
                        type: "image",
                        gallery: {
                            enabled: true
                        }
                    });
            }
        }
    }

    // /**
    //  * RD Google Maps
    //  * @description Enables RD Google Maps plugin
    //  */
    // if (plugins.rdGoogleMaps.length) {
    //   var i;
    //
    //   $.getScript("//maps.google.com/maps/api/js?key=AIzaSyAFeB0kVA6ouyJ_gEvFbMaefLy3cBCyRwo&sensor=false&libraries=geometry,places&v=3.7", function () {
    //     var head = document.getElementsByTagName('head')[0],
    //         insertBefore = head.insertBefore;
    //
    //     head.insertBefore = function (newElement, referenceElement) {
    //       if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') != -1 || newElement.innerHTML.indexOf('gm-style') != -1) {
    //         return;
    //       }
    //       insertBefore.call(head, newElement, referenceElement);
    //     };
    //
    //     for (i = 0; i < plugins.rdGoogleMaps.length; i++) {
    //
    //       var $googleMapItem = $(plugins.rdGoogleMaps[i]);
    //
    //       lazyInit($googleMapItem, $.proxy(function () {
    //         var $this = $(this),
    //             styles = $this.attr("data-styles");
    //
    //         $this.googleMap({
    //           styles: styles ? JSON.parse(styles) : [],
    //           onInit: function (map) {
    //             var inputAddress = $('#rd-google-map-address');
    //
    //             if (inputAddress.length) {
    //               var input = inputAddress;
    //               var geocoder = new google.maps.Geocoder();
    //               var marker = new google.maps.Marker(
    //                   {
    //                     map: map,
    //                     icon: "images/gmap_marker.png",
    //                   }
    //               );
    //               var autocomplete = new google.maps.places.Autocomplete(inputAddress[0]);
    //               autocomplete.bindTo('bounds', map);
    //               inputAddress.attr('placeholder', '');
    //               inputAddress.on('change', function () {
    //                 $("#rd-google-map-address-submit").trigger('click');
    //               });
    //               inputAddress.on('keydown', function (e) {
    //                 if (e.keyCode == 13) {
    //                   $("#rd-google-map-address-submit").trigger('click');
    //                 }
    //               });
    //
    //
    //               $("#rd-google-map-address-submit").on('click', function (e) {
    //                 e.preventDefault();
    //                 var address = input.val();
    //                 geocoder.geocode({'address': address}, function (results, status) {
    //                   if (status == google.maps.GeocoderStatus.OK) {
    //                     var latitude = results[0].geometry.location.lat();
    //                     var longitude = results[0].geometry.location.lng();
    //
    //                     map.setCenter(new google.maps.LatLng(
    //                         parseFloat(latitude),
    //                         parseFloat(longitude)
    //                     ));
    //                     marker.setPosition(new google.maps.LatLng(
    //                         parseFloat(latitude),
    //                         parseFloat(longitude)
    //                     ))
    //                   }
    //                 });
    //               });
    //             }
    //           }
    //         });
    //       }, $googleMapItem));
    //     }
    //   });
    // }

    // Google maps
    if (plugins.maps.length) {
        $.getScript("//maps.google.com/maps/api/js?key=AIzaSyAwH60q5rWrS8bXwpkZwZwhw9Bw0pqKTZM&sensor=false&libraries=geometry,places&v=3.7", function () {
            var head = document.getElementsByTagName('head')[0],
                insertBefore = head.insertBefore;

            head.insertBefore = function (newElement, referenceElement) {
                if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') !== -1 || newElement.innerHTML.indexOf('gm-style') !== -1) {
                    return;
                }
                insertBefore.call(head, newElement, referenceElement);
            };
            var geocoder = new google.maps.Geocoder;
            for (var i = 0; i < plugins.maps.length; i++) {
                var zoom = parseInt(plugins.maps[i].getAttribute("data-zoom"), 10) || 11;
                var styles = plugins.maps[i].hasAttribute('data-styles') ? JSON.parse(plugins.maps[i].getAttribute("data-styles")) : [];
                var center = plugins.maps[i].getAttribute("data-center") || "New York";

                // Initialize map
                var map = new google.maps.Map(plugins.maps[i].querySelectorAll(".google-map")[0], {
                    zoom: zoom,
                    styles: styles,
                    scrollwheel: false,
                    center: {lat: 0, lng: 0}
                });
                // Add map object to map node
                plugins.maps[i].map = map;
                plugins.maps[i].geocoder = geocoder;
                plugins.maps[i].google = google;

                // Get Center coordinates from attribute
                getLatLngObject(center, null, plugins.maps[i], function (location, markerElement, mapElement) {
                    mapElement.map.setCenter(location);
                })

                // Add markers from google-map-markers array
                var markerItems = plugins.maps[i].querySelectorAll(".google-map-markers li");

                if (markerItems.length) {
                    var markers = [];
                    for (var j = 0; j < markerItems.length; j++) {
                        var markerElement = markerItems[j];
                        getLatLngObject(markerElement.getAttribute("data-location"), markerElement, plugins.maps[i], function (location, markerElement, mapElement) {
                            var icon = markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon");
                            var activeIcon = markerElement.getAttribute("data-icon-active") || mapElement.getAttribute("data-icon-active");
                            var info = markerElement.getAttribute("data-description") || "";
                            var infoWindow = new google.maps.InfoWindow({
                                content: info
                            });
                            markerElement.infoWindow = infoWindow;
                            var markerData = {
                                position: location,
                                map: mapElement.map
                            }
                            if (icon) {
                                markerData.icon = icon;
                            }
                            var marker = new google.maps.Marker(markerData);
                            markerElement.gmarker = marker;
                            markers.push({markerElement: markerElement, infoWindow: infoWindow});
                            marker.isActive = false;
                            // Handle infoWindow close click
                            google.maps.event.addListener(infoWindow, 'closeclick', (function (markerElement, mapElement) {
                                var markerIcon = null;
                                markerElement.gmarker.isActive = false;
                                markerIcon = markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon");
                                markerElement.gmarker.setIcon(markerIcon);
                            }).bind(this, markerElement, mapElement));


                            // Set marker active on Click and open infoWindow
                            google.maps.event.addListener(marker, 'click', (function (markerElement, mapElement) {
                                if (markerElement.infoWindow.getContent().length === 0) return;
                                var gMarker, currentMarker = markerElement.gmarker, currentInfoWindow;
                                for (var k = 0; k < markers.length; k++) {
                                    var markerIcon;
                                    if (markers[k].markerElement === markerElement) {
                                        currentInfoWindow = markers[k].infoWindow;
                                    }
                                    gMarker = markers[k].markerElement.gmarker;
                                    if (gMarker.isActive && markers[k].markerElement !== markerElement) {
                                        gMarker.isActive = false;
                                        markerIcon = markers[k].markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon")
                                        gMarker.setIcon(markerIcon);
                                        markers[k].infoWindow.close();
                                    }
                                }

                                currentMarker.isActive = !currentMarker.isActive;
                                if (currentMarker.isActive) {
                                    if (markerIcon = markerElement.getAttribute("data-icon-active") || mapElement.getAttribute("data-icon-active")) {
                                        currentMarker.setIcon(markerIcon);
                                    }

                                    currentInfoWindow.open(map, marker);
                                } else {
                                    if (markerIcon = markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon")) {
                                        currentMarker.setIcon(markerIcon);
                                    }
                                    currentInfoWindow.close();
                                }
                            }).bind(this, markerElement, mapElement))
                        })
                    }
                }
            }
        });
    }


    /**
     * Bootstrap Date time picker
     */
    if (plugins.bootstrapDateTimePicker.length) {
        var i;
        for (i = 0; i < plugins.bootstrapDateTimePicker.length; i++) {
            var $dateTimePicker = $(plugins.bootstrapDateTimePicker[i]);
            var options = {};

            options['format'] = 'dddd DD MMMM YYYY - HH:mm';
            if ($dateTimePicker.attr("data-time-picker") == "date") {
                options['format'] = 'dddd DD MMMM YYYY';
                options['minDate'] = new Date();
            } else if ($dateTimePicker.attr("data-time-picker") == "time") {
                options['format'] = 'HH:mm';
            }

            options["time"] = ($dateTimePicker.attr("data-time-picker") != "date");
            options["date"] = ($dateTimePicker.attr("data-time-picker") != "time");
            options["shortTime"] = true;

            $dateTimePicker.bootstrapMaterialDatePicker(options);
        }
    }

    /**
     * Responsive Tabs
     * @description Enables Responsive Tabs plugin
     */
    if (plugins.responsiveTabs.length > 0) {
        for (var i = 0; i < plugins.responsiveTabs.length; i++) {
            var responsiveTabsItem = $(plugins.responsiveTabs[i]);
            var setCustomHash = responsiveTabsItem.attr('data-custom-hash') == 'true';

            var currentHash = window.location.hash;

            if (currentHash) {
                currentHash = currentHash.split('|')[0];
            }

            if (setCustomHash && currentHash) {
                setTimeout(function () {
                    responsiveTabsItem.find("a[href$='" + currentHash + "']").first().click();
                    window.location.hash = currentHash;
                }, 100);
            }

            responsiveTabsItem.easyResponsiveTabs({
                type: responsiveTabsItem.attr("data-type") === "accordion" ? "accordion" : "default"
            });
        }

        $('.tabs-nav a').click(function () {
            responsiveTabsItem.find("a[href$='" + $(this).attr('href').split('#').pop() + "']").first().click();
        });
    }

    /**
     * RD MaterialTabs
     * @description Enables RD MaterialTabs plugin
     */
    if (plugins.materialTabs.length) {
        var i;
        for (i = 0; i < plugins.materialTabs.length; i++) {
            var materialTabsItem = plugins.materialTabs[i];
            $(materialTabsItem).RDMaterialTabs({});
        }
    }

    /**
     * RD Flickr Feed
     * @description Enables RD Flickr Feed plugin
     */
    if (plugins.flickrfeed.length > 0) {
        var i;
        for (i = 0; i < plugins.flickrfeed.length; i++) {
            var flickrfeedItem = $(plugins.flickrfeed[i]);
            flickrfeedItem.RDFlickr({
                callback: function () {
                    var items = flickrfeedItem.find("[data-photo-swipe-item]");

                    if (items.length) {
                        for (var j = 0; j < items.length; j++) {
                            var image = new Image();
                            image.setAttribute('data-index', j);
                            image.onload = function () {
                                items[this.getAttribute('data-index')].setAttribute('data-size', this.naturalWidth + 'x' + this.naturalHeight);
                            };
                            image.src = items[j].getAttribute('href');
                        }
                    }
                }
            });
        }
    }

    /**
     * Select2
     * @description Enables select2 plugin
     */
    if (plugins.selectFilter.length) {
        var i;
        for (i = 0; i < plugins.selectFilter.length; i++) {
            var select = $(plugins.selectFilter[i]);

            select.select2({
                theme: "bootstrap"
            }).next().addClass(select.attr("class").match(/(input-sm)|(input-lg)|($)/i).toString().replace(new RegExp(",", 'g'), " "));
        }
    }

    /**
     * Stepper
     * @description Enables Stepper Plugin
     */
    if (plugins.stepper.length) {
        plugins.stepper.stepper({
            labels: {
                up: "",
                down: ""
            }
        });
    }

    /**
     * Radio
     * @description Add custom styling options for input[type="radio"]
     */
    if (plugins.radio.length) {
        var i;
        for (i = 0; i < plugins.radio.length; i++) {
            var $this = $(plugins.radio[i]);
            $this.addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
        }
    }

    /**
     * Checkbox
     * @description Add custom styling options for input[type="checkbox"]
     */
    if (plugins.checkbox.length) {
        var i;
        for (i = 0; i < plugins.checkbox.length; i++) {
            var $this = $(plugins.checkbox[i]);
            $this.addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
        }
    }

    /**
     * Popovers
     * @description Enables Popovers plugin
     */
    if (plugins.popover.length) {
        if (window.innerWidth < 767) {
            plugins.popover.attr('data-placement', 'bottom');
            plugins.popover.popover();
        }
        else {
            plugins.popover.popover();
        }
    }

    /**
     * jQuery Countdown
     * @description  Enable countdown plugin
     */
    if (plugins.countDown.length) {
        var i;
        for (i = 0; i < plugins.countDown.length; i++) {
            var countDownItem = plugins.countDown[i],
                d = new Date(),
                type = countDownItem.getAttribute('data-type'),
                time = countDownItem.getAttribute('data-time'),
                format = countDownItem.getAttribute('data-format'),
                settings = [];

            d.setTime(Date.parse(time)).toLocaleString();
            settings[type] = d;
            settings['format'] = format;
            $(countDownItem).countdown(settings);
        }
    }

    /**
     * @module TimeCircles
     * @author Wim Barelds
     * @version 1.5.3
     * @see http://www.wimbarelds.nl/
     * @license MIT License
     */
    if (plugins.dateCountdown.length) {
        for (i = 0; i < plugins.dateCountdown.length; i++) {
            var dateCountdownItem = $(plugins.dateCountdown[i]),
                time = {
                    "Days": {
                        "text": "Days",
                        "color": "#42a4ff",
                        "show": true
                    },
                    "Hours": {
                        "text": "Hours",
                        "color": "#42a4ff",
                        "show": true
                    },
                    "Minutes": {
                        "text": "Minutes",
                        "color": "#42a4ff",
                        "show": true
                    },
                    "Seconds": {
                        "text": "Seconds",
                        "color": "#42a4ff",
                        "show": true
                    }
                };
            dateCountdownItem.TimeCircles({
                "animation": "smooth",
                "bg_width": 1,
                "fg_width": 0.04,
                "circle_bg_color": dateCountdownItem.attr('data-bg') ? dateCountdownItem.attr('data-bg') : "rgba(255,255,255,.39)",
                "time": time
            });

            $(window).on('load resize orientationchange', (function ($dateCountdownItem, time) {
                return function () {
                    if (window.innerWidth < 479) {
                        $dateCountdownItem.TimeCircles({
                            time: {
                                Minutes: {show: true},
                                Seconds: {show: false}
                            }
                        }).rebuild();
                    } else if (window.innerWidth < 767) {
                        $dateCountdownItem.TimeCircles({
                            time: {
                                Seconds: {show: false}
                            }
                        }).rebuild();
                    } else {
                        $dateCountdownItem.TimeCircles({time: time}).rebuild();
                    }
                }

            })($(dateCountdownItem), time));
        }
    }

    /**
     * RD Calendar
     * @description Enables RD Calendar plugin
     */
    if (plugins.calendar.length) {
        var i;
        for (i = 0; i < plugins.calendar.length; i++) {
            var calendarItem = $(plugins.calendar[i]);

            calendarItem.rdCalendar({
                days: calendarItem.attr("data-days") ? calendarItem.attr("data-days").split(/\s?,\s?/i) : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                month: calendarItem.attr("data-months") ? calendarItem.attr("data-months").split(/\s?,\s?/i) : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            });
        }
    }

    /**
     * Circle Progress
     * @description Enable Circle Progress plugin
     */
    if (plugins.circleProgress.length) {
        var i;
        for (i = 0; i < plugins.circleProgress.length; i++) {
            var circleProgressItem = $(plugins.circleProgress[i]);
            $document.on("scroll", function () {
                if (!circleProgressItem.hasClass('animated')) {

                    var arrayGradients = circleProgressItem.attr('data-gradient') ? circleProgressItem.attr('data-gradient').split(",") : null;

                    circleProgressItem.circleProgress({
                        value: circleProgressItem.attr('data-value'),
                        size: circleProgressItem.attr('data-size') ? circleProgressItem.attr('data-size') : 175,
                        fill: {gradient: arrayGradients, gradientAngle: Math.PI / 4},
                        thickness: 7,
                        startAngle: -Math.PI / 4 * 2,
                        emptyFill: $(this).attr('data-empty-fill') ? $(this).attr('data-empty-fill') : "rgb(245,245,245)"

                    }).on('circle-animation-progress', function (event, progress, stepValue) {
                        $(this).find('span').text(String(stepValue.toFixed(2)).replace('0.', '').replace('1.', '1'));
                    });
                    circleProgressItem.addClass('animated');
                }
            })
                .trigger("scroll");
        }
    }

    /**
     * Progress bar
     * @description Enable progress bar
     */
    if (plugins.progressBar.length) {
        var i,
            bar,
            type;
        for (i = 0; i < plugins.progressBar.length; i++) {
            var progressItem = plugins.progressBar[i];
            bar = null;
            if (progressItem.className.indexOf("progress-bar-horizontal") > -1) {
                type = 'Line';
            }

            if (progressItem.className.indexOf("progress-bar-radial") > -1) {
                type = 'Circle';
            }

            if (progressItem.getAttribute("data-stroke") && progressItem.getAttribute("data-value") && type) {
                bar = new ProgressBar[type](progressItem, {
                    strokeWidth: Math.round(parseFloat(progressItem.getAttribute("data-stroke")) / progressItem.offsetWidth * 100)
                    ,
                    trailWidth: progressItem.getAttribute("data-trail") ? Math.round(parseFloat(progressItem.getAttribute("data-trail")) / progressItem.offsetWidth * 100) : 0
                    ,
                    text: {
                        value: progressItem.getAttribute("data-counter") === "true" ? '0' : null
                        , className: 'progress-bar__body'
                        , style: null
                    }
                });
                bar.svg.setAttribute('preserveAspectRatio', "none meet");
                if (type === 'Line') {
                    bar.svg.setAttributeNS(null, "height", progressItem.getAttribute("data-stroke"));
                }

                bar.path.removeAttribute("stroke");
                bar.path.className.baseVal = "progress-bar__stroke";
                if (bar.trail) {
                    bar.trail.removeAttribute("stroke");
                    bar.trail.className.baseVal = "progress-bar__trail";
                }

                if (progressItem.getAttribute("data-easing") && !isIE) {
                    $(document)
                        .on("scroll", {"barItem": bar}, $.proxy(function (event) {
                            var bar = event.data.barItem;
                            if (isScrolledIntoView($(this)) && this.className.indexOf("progress-bar--animated") === -1) {
                                this.className += " progress-bar--animated";
                                bar.animate(parseInt(this.getAttribute("data-value")) / 100.0, {
                                    easing: this.getAttribute("data-easing")
                                    ,
                                    duration: this.getAttribute("data-duration") ? parseInt(this.getAttribute("data-duration")) : 800
                                    ,
                                    step: function (state, b) {
                                        if (b._container.className.indexOf("progress-bar-horizontal") > -1 ||
                                            b._container.className.indexOf("progress-bar-vertical") > -1) {
                                            b.text.style.width = Math.abs(b.value() * 100).toFixed(0) + "%"
                                        }
                                        b.setText(Math.abs(b.value() * 100).toFixed(0));
                                    }
                                });
                            }
                        }, progressItem))
                        .trigger("scroll");
                } else {
                    bar.set(parseInt($(progressItem).attr("data-value")) / 100.0);
                    bar.setText($(progressItem).attr("data-value"));
                    if (type === 'Line') {
                        bar.text.style.width = parseInt($(progressItem).attr("data-value")) + "%";
                    }
                }
            } else {
                console.error(progressItem.className + ": progress bar type is not defined");
            }
        }
    }

    /**
     * UI To Top
     * @description Enables ToTop Button
     */
    if (isDesktop) {
        $().UItoTop({
            easingType: 'easeOutQuart',
            containerClass: 'ui-to-top fa fa-chevron-up'
        });
    }

    /**
     * RD Navbar
     * @description Enables RD Navbar plugin
     */
    if (plugins.rdNavbar.length) {
        for (i = 0; i < plugins.rdNavbar.length; i++) {
            var $currentNavbar = $(plugins.rdNavbar[i]);
            $currentNavbar.RDNavbar({
                stickUpClone: ($currentNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? $currentNavbar.attr("data-stick-up-clone") === 'true' : false,
                responsive: {
                    0: {
                        stickUp: (!isNoviBuilder) ? $currentNavbar.attr("data-stick-up") === 'true' : false
                    },
                    768: {
                        stickUp: (!isNoviBuilder) ? $currentNavbar.attr("data-sm-stick-up") === 'true' : false
                    },
                    992: {
                        stickUp: (!isNoviBuilder) ? $currentNavbar.attr("data-md-stick-up") === 'true' : false
                    },
                    1200: {
                        stickUp: (!isNoviBuilder) ? $currentNavbar.attr("data-lg-stick-up") === 'true' : false
                    }
                },
                callbacks: {
                    onStuck: function () {
                        var navbarSearch = this.$element.find('.rd-search input');

                        if (navbarSearch) {
                            navbarSearch.val('').trigger('propertychange');
                        }
                    },
                    onUnstuck: function () {
                        if (this.$clone === null)
                            return;

                        var navbarSearch = this.$clone.find('.rd-search input');

                        if (navbarSearch) {
                            navbarSearch.val('').trigger('propertychange');
                            navbarSearch.blur();
                        }
                    },
                    onDropdownOver: function () {
                        return !isNoviBuilder;
                    }
                }
            });
            if (plugins.rdNavbar.attr("data-body-class")) {
                document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
            }
        }
    }
    //
    // /**
    //  * Swiper 3.1.7
    //  * @description  Enable Swiper Slider
    //  */
    // if (plugins.swiper.length) {
    //     var i;
    //     for (i = 0; i < plugins.swiper.length; i++) {
    //         var s = $(plugins.swiper[i]);
    //         var pag = s.find(".swiper-pagination"),
    //             next = s.find(".swiper-button-next"),
    //             prev = s.find(".swiper-button-prev"),
    //             bar = s.find(".swiper-scrollbar"),
    //             parallax = s.parents('.rd-parallax').length,
    //             swiperSlide = s.find(".swiper-slide");
    //
    //         for (j = 0; j < swiperSlide.length; j++) {
    //             var $this = $(swiperSlide[j]),
    //                 url;
    //
    //             if (url = $this.attr("data-slide-bg")) {
    //                 $this.css({
    //                     "background-image": "url(" + url + ")",
    //                     "background-size": "cover"
    //                 })
    //             }
    //         }
    //
    //         swiperSlide.end()
    //             .find("[data-caption-animate]")
    //             .addClass("not-animated")
    //             .end()
    //             .swiper({
    //                 autoplay: s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
    //                 direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
    //                 effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
    //                 speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
    //                 keyboardControl: s.attr('data-keyboard') === "true",
    //                 mousewheelControl: s.attr('data-mousewheel') === "true",
    //                 mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
    //                 nextButton: next.length ? next.get(0) : null,
    //                 prevButton: prev.length ? prev.get(0) : null,
    //                 pagination: pag.length ? pag.get(0) : null,
    //                 paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
    //                 paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function (index, className) {
    //                     return '<span class="' + className + '">' + (index + 1) + '</span>';
    //                 } : null : null,
    //                 scrollbar: bar.length ? bar.get(0) : null,
    //                 scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
    //                 scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
    //                 loop: s.attr('data-loop') !== "false",
    //                 onTransitionStart: function (swiper) {
    //                     toggleSwiperInnerVideos(swiper);
    //                 },
    //                 onTransitionEnd: function (swiper) {
    //                     toggleSwiperCaptionAnimation(swiper);
    //                 },
    //                 onInit: function (swiper) {
    //                     toggleSwiperInnerVideos(swiper);
    //                     toggleSwiperCaptionAnimation(swiper);
    //                     var swiperParalax = s.find(".swiper-parallax");
    //
    //                     for (var k = 0; k < swiperParalax.length; k++) {
    //                         var $this = $(swiperParalax[k]),
    //                             speed;
    //
    //                         if (parallax && !isIEBrows && !isMobile) {
    //                             if (speed = $this.attr("data-speed")) {
    //                                 makeParallax($this, speed, s, false);
    //                             }
    //                         }
    //                     }
    //                     $(window).on('resize', function () {
    //                         swiper.update(true);
    //                     })
    //                 }
    //             });
    //
    //         $(window)
    //             .on("resize", function () {
    //                 var mh = getSwiperHeight(s, "min-height"),
    //                     h = getSwiperHeight(s, "height");
    //                 if (h) {
    //                     s.css("height", mh ? mh > h ? mh : h : h);
    //                 }
    //             })
    //             .trigger("resize");
    //     }
    // }

    /**
     * RD Search
     * @description Enables search
     */
    if (plugins.search.length || plugins.searchResults) {
        var handler = "bat/rd-search.php";
        var defaultTemplate = '<h6 class="search_title"><a target="_top" href="#{href}" class="search_link">#{title}</a></h6>' +
            '<p>...#{token}...</p>' +
            '<p class="match">';
        var defaultFilter = '*.html';

        if (plugins.search.length) {

            for (i = 0; i < plugins.search.length; i++) {
                var searchItem = $(plugins.search[i]),
                    options = {
                        element: searchItem,
                        filter: (searchItem.attr('data-search-filter')) ? searchItem.attr('data-search-filter') : defaultFilter,
                        template: (searchItem.attr('data-search-template')) ? searchItem.attr('data-search-template') : defaultTemplate,
                        live: (searchItem.attr('data-search-live')) ? searchItem.attr('data-search-live') : false,
                        liveCount: (searchItem.attr('data-search-live-count')) ? parseInt(searchItem.attr('data-search-live')) : 4,
                        current: 0, processed: 0, timer: {}
                    };

                if ($('.rd-navbar-search-toggle').length) {
                    var toggle = $('.rd-navbar-search-toggle');
                    toggle.on('click', function () {
                        if (!($(this).hasClass('active'))) {
                            searchItem.find('input').val('').trigger('propertychange');
                        }
                    });
                }

                if (options.live) {
                    var clearHandler = false;

                    searchItem.find('input').on("keyup input propertychange", $.proxy(function () {
                        this.term = this.element.find('input').val().trim();
                        this.spin = this.element.find('.input-group-addon');

                        clearTimeout(this.timer);

                        if (this.term.length > 2) {
                            this.timer = setTimeout(liveSearch(this), 200);

                            if (clearHandler == false) {
                                clearHandler = true;

                                $("body").on("click", function (e) {
                                    if ($(e.toElement).parents('.rd-search').length == 0) {
                                        $('#rd-search-results-live').addClass('cleared').html('');
                                        $('#rd-search-results-live-1').addClass('cleared').html('');
                                    }
                                })
                            }

                        } else if (this.term.length == 0) {
                            $('#' + this.live).addClass('cleared').html('');
                        }
                    }, options, this));
                }

                searchItem.submit($.proxy(function () {
                    $('<input />').attr('type', 'hidden')
                        .attr('name', "filter")
                        .attr('value', this.filter)
                        .appendTo(this.element);
                    return true;
                }, options, this))
            }
        }

        if (plugins.searchResults.length) {
            var regExp = /\?.*s=([^&]+)\&filter=([^&]+)/g;
            var match = regExp.exec(location.search);

            if (match != null) {
                $.get(handler, {
                    s: decodeURI(match[1]),
                    dataType: "html",
                    filter: match[2],
                    template: defaultTemplate,
                    live: ''
                }, function (data) {
                    plugins.searchResults.html(data);
                })
            }
        }
    }




    /**
     * Slick carousel
     * @description  Enable Slick carousel plugin
     */
    if (plugins.slick.length) {
        var i;
        for (i = 0; i < plugins.slick.length; i++) {
            var $slickItem = $(plugins.slick[i]);
            console.log($slickItem);
            $slickItem.slick({
                slidesToScroll: parseInt($slickItem.attr('data-slide-to-scroll')) || 1,
                asNavFor: $slickItem.attr('data-for') || false,
                dots: $slickItem.attr("data-dots") == "true",
                infinite: true,
                focusOnSelect: false,
                arrows: $slickItem.attr("data-arrows") == "true",
                swipe: $slickItem.attr("data-swipe") == "true",
                autoplay: $slickItem.attr("data-autoplay") == "true",
                vertical: $slickItem.attr("data-vertical") == "true",
                centerMode: $slickItem.attr("data-center-mode") == "true",
                centerPadding: $slickItem.attr("data-center-padding") ? $slickItem.attr("data-center-padding") : '0.5',
                mobileFirst: true,
                responsive: [
                    {
                        breakpoint: 0,
                        settings: {
                            centerMode: $slickItem.attr("data-mobile-center-mode") == "true",
                            slidesToShow: parseInt($slickItem.attr('data-items')) || 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: parseInt($slickItem.attr('data-xs-items')) || 1
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            centerMode: $slickItem.attr("data-sm-center-mode") == "true",
                            centerPadding: $slickItem.attr("data-sm-center-padding") ? $slickItem.attr("data-sm-center-padding") : '0',
                            slidesToShow: parseInt($slickItem.attr('data-sm-items')) || 1
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            centerPadding: 0,
                            centerMode: $slickItem.attr("data-sm-center-mode") == "true",
                            slidesToShow: parseInt($slickItem.attr('data-md-items')) || 1
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            centerPadding: 0,
                            centerMode: $slickItem.attr("data-sm-center-mode") == "true",
                            slidesToShow: parseInt($slickItem.attr('data-lg-items')) || 1
                        }
                    },
                    {
                        breakpoint: 1800,
                        settings: {
                            centerPadding: 0,
                            centerMode: $slickItem.attr("data-sm-center-mode") == "true",
                            slidesToShow: parseInt($slickItem.attr('data-xl-items')) || 1
                        }
                    }
                ]
            })
                .on('afterChange', function (event, slick, currentSlide, nextSlide) {
                    var $this = $(this),
                        childCarousel = $this.attr('data-child');

                    if (childCarousel) {
                        $(childCarousel + ' .slick-slide').removeClass('slick-current');
                        $(childCarousel + ' .slick-slide').eq(currentSlide).addClass('slick-current');
                    }
                });
        }
    }

    // Owl carousel
    if (plugins.owl.length) {
        for (var i = 0; i < plugins.owl.length; i++) {
            var c = $(plugins.owl[i]);
            plugins.owl[i].owl = c;

            initOwlCarousel(c);
        }
    }

    /**
     * jQuery Count To
     * @description Enables Count To plugin
     */
    if (plugins.counter.length) {
        var i;

        for (i = 0; i < plugins.counter.length; i++) {
            var $counterNotAnimated = $(plugins.counter[i]).not('.animated');
            $document
                .on("scroll", $.proxy(function () {
                    var $this = this;

                    if ((!$this.hasClass("animated")) && (isScrolledIntoView($this))) {
                        $this.countTo({
                            refreshInterval: 40,
                            speed: $this.attr("data-speed") || 1000,
                            formatter: function (value, options) {
                                return value.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1 ');
                            }
                        });
                        $this.addClass('animated');
                    }
                }, $counterNotAnimated))
                .trigger("scroll");
        }
    }

    // Isotope
    if (plugins.isotope.length) {
        var isogroup = [];
        for (var i = 0; i < plugins.isotope.length; i++) {
            var isotopeItem = plugins.isotope[i],
                isotopeInitAttrs = {
                    itemSelector: '.isotope-item',
                    layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
                    filter: '*'
                };

            if (isotopeItem.getAttribute('data-column-width')) {
                isotopeInitAttrs.masonry = {
                    columnWidth: parseFloat(isotopeItem.getAttribute('data-column-width'))
                };
            } else if (isotopeItem.getAttribute('data-column-class')) {
                isotopeInitAttrs.masonry = {
                    columnWidth: isotopeItem.getAttribute('data-column-class')
                };
            }

            var iso = new Isotope(isotopeItem, isotopeInitAttrs);
            isogroup.push(iso);
        }


        setTimeout(function () {
            for (var i = 0; i < isogroup.length; i++) {
                isogroup[i].element.className += " isotope--loaded";
                isogroup[i].layout();
            }
        }, 200);

        var resizeTimout;

        $("[data-isotope-filter]").on("click", function (e) {
            e.preventDefault();
            var filter = $(this);
            clearTimeout(resizeTimout);
            filter.parents(".isotope-filters").find('.active').removeClass("active");
            filter.addClass("active");
            var iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]'),
                isotopeAttrs = {
                    itemSelector: '.isotope-item',
                    layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
                    filter: this.getAttribute("data-isotope-filter") === '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]'
                };
            if (iso.attr('data-column-width')) {
                isotopeAttrs.masonry = {
                    columnWidth: parseFloat(iso.attr('data-column-width'))
                };
            } else if (iso.attr('data-column-class')) {
                isotopeAttrs.masonry = {
                    columnWidth: iso.attr('data-column-class')
                };
            }
            iso.isotope(isotopeAttrs);
        }).eq(0).trigger("click")
    }

    /**
     * WOW
     * @description Enables Wow animation plugin
     */
    if (isDesktop && $html.hasClass("wow-animation") && $(".wow").length) {
        new WOW().init();
    }

    /**
     * Bootstrap tabs
     * @description Activate Bootstrap Tabs
     */
    if (plugins.bootstrapTabs.length) {
        var i;
        for (i = 0; i < plugins.bootstrapTabs.length; i++) {
            var bootstrapTabsItem = $(plugins.bootstrapTabs[i]);

            var hash = window.location.hash;
            hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            bootstrapTabsItem.on("click", "a", function (event) {
                event.preventDefault();
                $(this).tab('show');
                var scrollmem = $('body').scrollTop() || $('html').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        }
    }

    /**
     * JQuery mousewheel plugin
     * @description  Enables jquery mousewheel plugin
     */
    if (plugins.scroller.length) {
        var i;
        for (i = 0; i < plugins.scroller.length; i++) {
            var scrollerItem = $(plugins.scroller[i]);

            scrollerItem.mCustomScrollbar({
                scrollInertia: 200,
                scrollButtons: {enable: true}
            });
        }
    }

    /**
     * Google ReCaptcha
     * @description Enables Google ReCaptcha
     */
    if (plugins.captcha.length) {
        $.getScript("//www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=en");
    }

    /**
     * Radio
     * @description Add custom styling options for input[type="radio"]
     */
    if (plugins.radio.length) {
        var i;
        for (i = 0; i < plugins.radio.length; i++) {
            $(plugins.radio[i]).addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
        }
    }

    /**
     * Checkbox
     * @description Add custom styling options for input[type="checkbox"]
     */
    if (plugins.checkbox.length) {
        var i;
        for (i = 0; i < plugins.checkbox.length; i++) {
            $(plugins.checkbox[i]).addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
        }
    }

    /**
     * RD Input Label
     * @description Enables RD Input Label Plugin
     */
    if (plugins.rdInputLabel.length) {
        plugins.rdInputLabel.RDInputLabel();
    }

    /**
     * Regula
     * @description Enables Regula plugin
     */
    if (plugins.regula.length) {
        attachFormValidator(plugins.regula);
    }


    /**
     * RD Mailform
     * @version      3.2.0
     */
    if (plugins.rdMailForm.length) {
        var i, j, k,
            msg = {
                'MF000': 'Successfully sent!',
                'MF001': 'Recipients are not set!',
                'MF002': 'Form will not work locally!',
                'MF003': 'Please, define email field in your form!',
                'MF004': 'Please, define type of your form!',
                'MF254': 'Something went wrong with PHPMailer!',
                'MF255': 'Aw, snap! Something went wrong.'
            };

        for (i = 0; i < plugins.rdMailForm.length; i++) {
            var $form = $(plugins.rdMailForm[i]),
                formHasCaptcha = false;

            $form.attr('novalidate', 'novalidate').ajaxForm({
                data: {
                    "form-type": $form.attr("data-form-type") || "contact",
                    "counter": i
                },
                beforeSubmit: function (arr, $form, options) {
                    if (isNoviBuilder)
                        return;

                    var form = $(plugins.rdMailForm[this.extraData.counter]),
                        inputs = form.find("[data-constraints]"),
                        output = $("#" + form.attr("data-form-output")),
                        captcha = form.find('.recaptcha'),
                        captchaFlag = true;

                    output.removeClass("active error success");

                    if (isValidated(inputs, captcha)) {

                        // veify reCaptcha
                        if (captcha.length) {
                            var captchaToken = captcha.find('.g-recaptcha-response').val(),
                                captchaMsg = {
                                    'CPT001': 'Please, setup you "site key" and "secret key" of reCaptcha',
                                    'CPT002': 'Something wrong with google reCaptcha'
                                };

                            formHasCaptcha = true;

                            $.ajax({
                                method: "POST",
                                url: "bat/reCaptcha.php",
                                data: {'g-recaptcha-response': captchaToken},
                                async: false
                            })
                                .done(function (responceCode) {
                                    if (responceCode !== 'CPT000') {
                                        if (output.hasClass("snackbars")) {
                                            output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + captchaMsg[responceCode] + '</span></p>')

                                            setTimeout(function () {
                                                output.removeClass("active");
                                            }, 3500);

                                            captchaFlag = false;
                                        } else {
                                            output.html(captchaMsg[responceCode]);
                                        }

                                        output.addClass("active");
                                    }
                                });
                        }

                        if (!captchaFlag) {
                            return false;
                        }

                        form.addClass('form-in-process');

                        if (output.hasClass("snackbars")) {
                            output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>');
                            output.addClass("active");
                        }
                    } else {
                        return false;
                    }
                },
                error: function (result) {
                    if (isNoviBuilder)
                        return;

                    var output = $("#" + $(plugins.rdMailForm[this.extraData.counter]).attr("data-form-output")),
                        form = $(plugins.rdMailForm[this.extraData.counter]);

                    output.text(msg[result]);
                    form.removeClass('form-in-process');

                    if (formHasCaptcha) {
                        grecaptcha.reset();
                    }
                },
                success: function (result) {
                    if (isNoviBuilder)
                        return;

                    var form = $(plugins.rdMailForm[this.extraData.counter]),
                        output = $("#" + form.attr("data-form-output")),
                        select = form.find('select');

                    form
                        .addClass('success')
                        .removeClass('form-in-process');

                    if (formHasCaptcha) {
                        grecaptcha.reset();
                    }

                    result = result.length === 5 ? result : 'MF255';
                    output.text(msg[result]);

                    if (result === "MF000") {
                        if (output.hasClass("snackbars")) {
                            output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + msg[result] + '</span></p>');
                        } else {
                            output.addClass("active success");
                        }
                    } else {
                        if (output.hasClass("snackbars")) {
                            output.html(' <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>' + msg[result] + '</span></p>');
                        } else {
                            output.addClass("active error");
                        }
                    }

                    form.clearForm();

                    if (select.length) {
                        select.select2("val", "");
                    }

                    form.find('input, textarea').trigger('blur');

                    setTimeout(function () {
                        output.removeClass("active error success");
                        form.removeClass('success');
                    }, 3500);
                }
            });
        }
    }

    // MailChimp Ajax subscription
    if (plugins.mailchimp.length) {
        for (i = 0; i < plugins.mailchimp.length; i++) {
            var $mailchimpItem = $(plugins.mailchimp[i]),
                $email = $mailchimpItem.find('input[type="email"]');

            // Required by MailChimp
            $mailchimpItem.attr('novalidate', 'true');
            $email.attr('name', 'EMAIL');

            $mailchimpItem.on('submit', $.proxy(function ($email, event) {
                event.preventDefault();

                var $this = this;

                var data = {},
                    url = $this.attr('action').replace('/post?', '/post-json?').concat('&c=?'),
                    dataArray = $this.serializeArray(),
                    $output = $("#" + $this.attr("data-form-output"));

                for (i = 0; i < dataArray.length; i++) {
                    data[dataArray[i].name] = dataArray[i].value;
                }

                $.ajax({
                    data: data,
                    url: url,
                    dataType: 'jsonp',
                    error: function (resp, text) {
                        $output.html('Server error: ' + text);

                        setTimeout(function () {
                            $output.removeClass("active");
                        }, 4000);
                    },
                    success: function (resp) {
                        $output.html(resp.msg).addClass('active');
                        $email[0].value = '';
                        var $label = $('[for="' + $email.attr('id') + '"]');
                        if ($label.length) $label.removeClass('focus not-empty');

                        setTimeout(function () {
                            $output.removeClass("active");
                        }, 6000);
                    },
                    beforeSend: function (data) {
                        var isNoviBuilder = window.xMode;

                        var isValidated = (function () {
                            var results, errors = 0;
                            var elements = $this.find('[data-constraints]');
                            var captcha = null;
                            if (elements.length) {
                                for (var j = 0; j < elements.length; j++) {

                                    var $input = $(elements[j]);
                                    if ((results = $input.regula('validate')).length) {
                                        for (var k = 0; k < results.length; k++) {
                                            errors++;
                                            $input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
                                        }
                                    } else {
                                        $input.siblings(".form-validation").text("").parent().removeClass("has-error")
                                    }
                                }

                                if (captcha) {
                                    if (captcha.length) {
                                        return validateReCaptcha(captcha) && errors === 0
                                    }
                                }

                                return errors === 0;
                            }
                            return true;
                        })();

                        // Stop request if builder or inputs are invalide
                        if (isNoviBuilder || !isValidated)
                            return false;

                        $output.html('Submitting...').addClass('active');
                    }
                });

                return false;
            }, $mailchimpItem, $email));
        }
    }

    // Campaign Monitor ajax subscription
    if (plugins.campaignMonitor.length) {
        for (i = 0; i < plugins.campaignMonitor.length; i++) {
            var $campaignItem = $(plugins.campaignMonitor[i]);

            $campaignItem.on('submit', $.proxy(function (e) {
                var data = {},
                    url = this.attr('action'),
                    dataArray = this.serializeArray(),
                    $output = $("#" + plugins.campaignMonitor.attr("data-form-output")),
                    $this = $(this);

                for (i = 0; i < dataArray.length; i++) {
                    data[dataArray[i].name] = dataArray[i].value;
                }

                $.ajax({
                    data: data,
                    url: url,
                    dataType: 'jsonp',
                    error: function (resp, text) {
                        $output.html('Server error: ' + text);

                        setTimeout(function () {
                            $output.removeClass("active");
                        }, 4000);
                    },
                    success: function (resp) {
                        $output.html(resp.Message).addClass('active');

                        setTimeout(function () {
                            $output.removeClass("active");
                        }, 6000);
                    },
                    beforeSend: function (data) {
                        // Stop request if builder or inputs are invalide
                        if (isNoviBuilder || !isValidated($this.find('[data-constraints]')))
                            return false;

                        $output.html('Submitting...').addClass('active');
                    }
                });

                // Clear inputs after submit
                var inputs = $this[0].getElementsByTagName('input');
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].value = '';
                    var label = document.querySelector('[for="' + inputs[i].getAttribute('id') + '"]');
                    if (label) label.classList.remove('focus', 'not-empty');
                }

                return false;
            }, $campaignItem));
        }
    }


    /**
     * Custom Toggles
     */
    if (plugins.customToggle.length) {
        var i;

        for (i = 0; i < plugins.customToggle.length; i++) {
            var $this = $(plugins.customToggle[i]);

            $this.on('click', $.proxy(function (event) {
                event.preventDefault();
                var $ctx = $(this);
                $($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
            }, $this));

            if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
                $("body").on("click", $this, function (e) {
                    if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length == 0 && e.data.find($(e.target)).length == 0) {
                        $(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
                    }
                })
            }
        }
    }

    /**
     * Custom Waypoints
     */
    if (plugins.customWaypoints.length) {
        var i;
        for (i = 0; i < plugins.customWaypoints.length; i++) {
            var $this = $(plugins.customWaypoints[i]);

            $this.on('click', function (e) {
                e.preventDefault();
                $("body, html").stop().animate({
                    scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
                }, 1000, function () {
                    $(window).trigger("resize");
                });
            });
        }
    }

    // lightGallery
    if (plugins.lightGallery.length) {
        for (var i = 0; i < plugins.lightGallery.length; i++) {
            initLightGallery(plugins.lightGallery[i]);
        }
    }

    // lightGallery item
    if (plugins.lightGalleryItem.length) {
        // Filter carousel items
        var notCarouselItems = [];

        for (var z = 0; z < plugins.lightGalleryItem.length; z++) {
            if (!$(plugins.lightGalleryItem[z]).parents('.owl-carousel').length &&
                !$(plugins.lightGalleryItem[z]).parents('.swiper-slider').length &&
                !$(plugins.lightGalleryItem[z]).parents('.slick-slider').length) {
                notCarouselItems.push(plugins.lightGalleryItem[z]);
            }
        }

        plugins.lightGalleryItem = notCarouselItems;

        for (var i = 0; i < plugins.lightGalleryItem.length; i++) {
            initLightGalleryItem(plugins.lightGalleryItem[i]);
        }
    }

    // Dynamic lightGallery
    if (plugins.lightDynamicGalleryItem.length) {
        for (var i = 0; i < plugins.lightDynamicGalleryItem.length; i++) {
            initDynamicLightGallery(plugins.lightDynamicGalleryItem[i]);
        }
    }


    /**
     * Material Parallax
     */
    if (plugins.materialParallax.length) {
        var i;
        if (!isNoviBuilder && !isIE && !isMobile) {
            plugins.materialParallax.parallax();
        } else if (isNoviBuilder) {
            for (i = 0; i < plugins.materialParallax.length; i++) {
                $(plugins.materialParallax[i]).find("img").addClass('parallax-image-stretch');
            }
        } else {
            for (i = 0; i < plugins.materialParallax.length; i++) {
                $(plugins.materialParallax[i]).css({
                    "background-image": 'url(' + $(plugins.materialParallax[i]).find("img").attr("src") + ')',
                    "background-attachment": "fixed",
                    "background-size": "cover"
                });
            }
        }
    }
});

var btns = document.getElementsById('rd-toggle');
var par = document.getElementsById('main');
btns[0].onclick = function() {
    par[0].classList.add("active");
}
btns[1].onclick = function() {
    par[0].classList.remove("main--main-bg");
}

$("#rd-toggle rd-navbar-aside-toggle").click(function(e) {
    e.preventDefault();
    $("#rd-toggle").removeClass('active');
    $(this).addClass('active');
})
