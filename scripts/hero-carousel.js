/* hero-carousel.js */

class HeroCarousel {
  constructor(selector) {
    this.carousel = document.querySelector(selector);
    if (!this.carousel) return;
    
    this.slides = this.carousel.querySelectorAll('.carousel-slide');
    this.indicators = this.carousel.querySelectorAll('.indicator');
    this.prevBtn = this.carousel.querySelector('.carousel-nav--prev');
    this.nextBtn = this.carousel.querySelector('.carousel-nav--next');
    
    this.currentSlide = 0;
    this.slideCount = this.slides.length;
    this.autoPlayInterval = null;
    this.autoPlayDelay = 8000; // 8 seconds per slide
    this.resumeDelay = 5000; // Resume after 5 seconds
    this.isPaused = false;
    
    this.init();
  }
  
  init() {
    // Set up event listeners
    this.prevBtn?.addEventListener('click', () => this.prevSlide());
    this.nextBtn?.addEventListener('click', () => this.nextSlide());
    
    // Indicator clicks
    this.indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => this.goToSlide(index));
    });
    
    // Pause on hover
    this.carousel.addEventListener('mouseenter', () => this.pauseAutoPlay());
    this.carousel.addEventListener('mouseleave', () => this.resumeAutoPlay());
    
    // Handle video slides
    this.initVideoSlides();
    
    // Start autoplay
    this.startAutoPlay();
  }
  
  initVideoSlides() {
    this.slides.forEach(slide => {
      const video = slide.querySelector('.slide-video');
      if (video) {
        // Ensure video is muted for autoplay
        video.muted = true;
        video.loop = true;
        
        // Play video when slide is active
        if (slide.classList.contains('active')) {
          video.play().catch(e => console.log('Video autoplay failed:', e));
        }
      }
    });
  }
  
  goToSlide(index) {
    // Remove active class from current slide
    this.slides[this.currentSlide].classList.remove('active');
    this.indicators[this.currentSlide].classList.remove('active');
    
    // Add prev class to current slide for exit animation
    this.slides[this.currentSlide].classList.add('prev');
    
    // Pause current video if any
    const currentVideo = this.slides[this.currentSlide].querySelector('.slide-video');
    if (currentVideo) {
      currentVideo.pause();
    }
    
    // Update current slide
    this.currentSlide = index;
    
    // Remove prev class from all slides after animation
    setTimeout(() => {
      this.slides.forEach(slide => slide.classList.remove('prev'));
    }, 800);
    
    // Add active class to new slide
    this.slides[this.currentSlide].classList.add('active');
    this.indicators[this.currentSlide].classList.add('active');
    
    // Play new video if any
    const newVideo = this.slides[this.currentSlide].querySelector('.slide-video');
    if (newVideo) {
      newVideo.currentTime = 0;
      newVideo.play().catch(e => console.log('Video autoplay failed:', e));
    }
    
    // Reset autoplay timer
    if (!this.isPaused) {
      this.startAutoPlay();
    }
  }
  
  nextSlide() {
    const next = (this.currentSlide + 1) % this.slideCount;
    this.goToSlide(next);
  }
  
  prevSlide() {
    const prev = (this.currentSlide - 1 + this.slideCount) % this.slideCount;
    this.goToSlide(prev);
  }
  
  startAutoPlay() {
    this.stopAutoPlay();
    this.autoPlayInterval = setInterval(() => {
      this.nextSlide();
    }, this.autoPlayDelay);
  }
  
  stopAutoPlay() {
    if (this.autoPlayInterval) {
      clearInterval(this.autoPlayInterval);
      this.autoPlayInterval = null;
    }
  }
  
  pauseAutoPlay() {
    this.isPaused = true;
    this.stopAutoPlay();
  }
  
  resumeAutoPlay() {
    this.isPaused = false;
    setTimeout(() => {
      if (!this.isPaused) {
        this.startAutoPlay();
      }
    }, this.resumeDelay);
  }
}

// Initialize carousel when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new HeroCarousel('#heroCarousel');
});