<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Slider</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f0f0f0;
    }

    .slider-container {
      width: 80%;
      max-width: 600px;
      overflow: hidden;
      position: relative;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      box-sizing: border-box;
    }

    .slide img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .prev, .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      cursor: pointer;
      color: #333;
    }

    .prev { left: 10px; }
    .next { right: 10px; }
  </style>
</head>
<body>

<div class="slider-container">
  <div class="slides">
    <div class="slide"><img src="image1.jpg" alt="Image 1"></div>
    <div class="slide"><img src="image2.jpg" alt="Image 2"></div>
    <div class="slide"><img src="image3.jpg" alt="Image 3"></div>
    <!-- Add more slides as needed -->
  </div>
  <div class="prev">&#10094;</div>
  <div class="next">&#10095;</div>
</div>

<script>
  let currentIndex = 0;
  const slides = document.querySelector('.slides');
  const totalSlides = document.querySelectorAll('.slide').length;
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');

  function showSlide(index) {
    if (index < 0) {
      currentIndex = totalSlides - 1;
    } else if (index >= totalSlides) {
      currentIndex = 0;
    } else {
      currentIndex = index;
    }

    const translateValue = -currentIndex * 100 + '%';
    slides.style.transform = `translateX(${translateValue})`;
  }

  function showPrevSlide() {
    showSlide(currentIndex - 1);
  }

  function showNextSlide() {
    showSlide(currentIndex + 1);
  }

  prevBtn.addEventListener('click', showPrevSlide);
  nextBtn.addEventListener('click', showNextSlide);
</script>

</body>
</html>
