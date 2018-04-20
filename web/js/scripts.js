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
});

$(".accordion .closeme").on('click',function () {
    $(this).parents('.accordion').removeClass("active");
});

$(document).mouseup(function(e) {
    var $target = $(e.target);
    if ($target.closest(".accordion").length == 0) {
        $(".accordion").removeClass("active");
    }
});

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
