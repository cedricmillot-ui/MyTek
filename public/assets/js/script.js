const swiper = new Swiper('.home-carousel', {
    loop: true,
    speed: 800,
    autoplay: { delay: 5000 },
    

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});