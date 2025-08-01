import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Swiper
import 'swiper/swiper-bundle.css';
import Swiper from 'swiper/bundle';

document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.mySwiper', {
    slidesPerView: 1.5,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
});
