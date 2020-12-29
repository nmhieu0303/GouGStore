$.fn.select2.defaults.set("theme", "bootstrap");
$(".locationMultiple").select2({
    width: null
})


$('.prd-detail-slide').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    // autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: false
            }
        }
    ]
});


$('.slide-banner').slick({
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false
});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
<<<<<<< HEAD
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    infinite: false,
=======
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    centerMode: true,
>>>>>>> 1bf8665cce91058128efe89fb743acebe097a42d
    focusOnSelect: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
<<<<<<< HEAD
                slidesToShow: 4,
                slidesToScroll: 1,
=======
                slidesToShow: 3,
                slidesToScroll: 3,
>>>>>>> 1bf8665cce91058128efe89fb743acebe097a42d
                dots: false
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false
            }
        }
    ]
<<<<<<< HEAD
});

// $('#handleCounter').handleCounter();
// $('#handleCounter').handleCounter({
//     minimum: 1,
//     maximize: null,
// });
// $('#handleCounter').handleCounter({
//     onChange: function() {},
//     onMinimum: function() {},
//     onMaximize: function() {}
// })

$(document).ready(function() {
    $('.mdb-select').materialSelect();
    $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function() {
        $(this).closest('.select-outline').find('label').toggleClass('active');
        $(this).closest('.select-outline').find('.caret').toggleClass('active');
    });
=======
>>>>>>> 1bf8665cce91058128efe89fb743acebe097a42d
});