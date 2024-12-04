// Lắng nghe sự kiện cuộn trang
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    
    if (window.scrollY > 50) { 
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }
});
//slider
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-container', {
        slidesPerView: 1, // Hiển thị 1 card tại một thời điểm
        spaceBetween: 20, // Khoảng cách giữa các card
        loop: true, // Vòng lặp slider
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 3000, // Tự động chuyển slide sau 3 giây
            disableOnInteraction: false, // Không tắt autoplay khi tương tác
        },
    });
});




