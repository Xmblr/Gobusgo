/*Mobile menu area js*/


$(document).ready(function () {

    // $(function () {
    //     var Accordion = function (el, multiple) {
    //         this.el = el || {};
    //         this.multiple = multiple || false;
    //
    //         // Variables privadas
    //         var links = this.el.find('.link');
    //         // Evento
    //         links.on('click', {
    //             el: this.el,
    //             multiple: this.multiple
    //         }, this.dropdown)
    //     }
    //
    //     Accordion.prototype.dropdown = function (e) {
    //         var $el = e.data.el;
    //         $this = $(this),
    //             $next = $this.next();
    //
    //         $next.slideToggle();
    //         $this.parent().toggleClass('open');
    //
    //         if (!e.data.multiple) {
    //             $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    //         };
    //     }
    //
    //     var accordion = new Accordion($('#mobilemenu'), false);
    // });


}); // DOM Ready


//============= Mobile Button  ============

$(".accordion-wrapper .mobile-open").on('click', function () {
    $(".accordion").toggleClass("active");
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
    if ($target.closest(".accordion").length == 0) {
        $(".accordion").removeClass("active");
        e.style.transition = "all 5s ease-in-out";
    }
});

// Swiper

$(document).ready(function () {
    //initialize swiper when document ready
    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    })
});

// Switcher Input

function switcher() {
    a = $("#z").val();b = $("#k").val();$("#z").val(b);$("#k").val(a);
}

// Text slide

var timerlen = 5;
var slideAniLen = 250;

var timerID = new Array();
var startTime = new Array();
var obj = new Array();
var endHeight = new Array();
var moving = new Array();
var dir = new Array();

function slidedown(objname) {
    if (moving[objname])
        return;

    if (document.getElementById(objname).style.display != "none")
        return; // cannot slide down something that is already visible

    moving[objname] = true;
    dir[objname] = "down";
    startslide(objname);
}

function slideup(objname) {
    if (moving[objname])
        return;

    if (document.getElementById(objname).style.display == "none")
        return; // cannot slide up something that is already hidden

    moving[objname] = true;
    dir[objname] = "up";
    startslide(objname);
}

if (window.innerWidth < 468) {
    function startslide(objname) {
        obj[objname] = document.getElementById(objname);

        endHeight[objname] = parseInt(obj[objname].style.height);
        startTime[objname] = (new Date()).getTime();

        if (dir[objname] == "down") {
            obj[objname].style.height = "1px";
        }

        obj[objname].style.display = "block";

        timerID[objname] = setInterval('slidetick(\'' + objname + '\');', timerlen);
    }

    function slidetick(objname) {
        var elapsed = (new Date()).getTime() - startTime[objname];

        if (elapsed > slideAniLen)
            endSlide(objname)
        else {
            var d = Math.round(elapsed / slideAniLen * endHeight[objname]);
            if (dir[objname] == "up")
                d = endHeight[objname] - d;

            obj[objname].style.height = d + "px";
        }

        return;
    }

    function endSlide(objname) {
        clearInterval(timerID[objname]);

        if (dir[objname] == "up")
            obj[objname].style.display = "none";

        obj[objname].style.height = endHeight[objname] + "px";

        delete(moving[objname]);
        delete(timerID[objname]);
        delete(startTime[objname]);
        delete(endHeight[objname]);
        delete(obj[objname]);
        delete(dir[objname]);

        return;
    }
}

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