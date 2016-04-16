jQuery(document).ready(function($) {
    var owl = $(".partners-list");

    owl.owlCarousel( {
        pagination: true,
        items: 5,
        autoPlay: true,
    });

    var owl1 = $(".clients-list");

    owl1.owlCarousel( {
        pagination: true,
        autoPlay: true,
        items: 3,
        itemsDesktop : [1000,3],
        itemsDesktopSmall : [900,3],
        itemsTablet: [600,1],
        itemsMobile : false
    });

    var owl2 = $(".hero-slider");

    owl2.owlCarousel( {
        pagination: true,
        singleItem: true,
    });


});



