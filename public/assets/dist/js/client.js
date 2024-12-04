// Lắng nghe sự kiện cuộn trang
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    
    if (window.scrollY > 50) { 
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }
});



