// var isMobile = false;
jQuery(function ($) {
    $('.front-page-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 800,
        pauseOnHover: false,
        fade: true,
        cssEase: 'linear',
        arrows: false,
        dots: false
    });

    $("#singleProductImageItem").elevateZoom({

        zoomType: "inner",
        containLensZoom: true,
        gallery: 'singleProductGalleryImages',
        cursor: "crosshair",
        galleryActiveClass: "active",
        responsive: true,
        easing: true

    });


    $("#singleProductImageItem").bind("click", function (e) {
        var ez = $('#singleProductImageItem').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
    

});