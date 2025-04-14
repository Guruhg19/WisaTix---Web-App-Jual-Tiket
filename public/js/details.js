const swiperGallery = new Swiper('.swiper-gallery', {
    direction: 'horizontal',
    slidesPerView: 'auto',
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        renderBullet: function (index, className) {
            return '<div class="!flex !w-full max-w-[50px] !rounded-[50px] !h-1 !shrink-0 ' + className +'"></div>';
        },
        bulletActiveClass: 'swiper-pagination-bullet-active !bg-[#13181D]',
        clickable: "true",
    },
});