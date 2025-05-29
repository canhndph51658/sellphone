<?php require_once 'views/layout/header.php' ?>

<body>
    <?php require_once 'views/layout/menu.php' ?>
    <div class="banner " >
        <div class="slider" id="slider">
            <div class="slide active" >
                <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_2.png" alt="Slide 1">
            </div >
            <div class="slide active">
                <img src="./LayoutClient/img/slider_3.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_4.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_5.png" alt="Slide 1">
            </div>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>

        <div class="dots" id="dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <div class="container">
    <h2>sản phẩm mới </h2>
    <button class="btn2">
        view All
    </button>
    </div>


<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide')
    const dots = document.querySelectorAll('.dot')
    const prev = document.querySelector('.prev')
    const next = document.querySelector('.next')

    function showSlide(index){
        if(index >= slides.length) slideIndex = 0;
        if(index < 0) slideIndex = slides.length -1 ;

        slides.forEach((slide,i)=>{
            slide.style.display = i === slideIndex ? 'block' : 'none';
            dots[i].classList.toggle('active' ,i === slideIndex);
        });
    }
    function nextSlide(){
        slideIndex++;
        showSlide(slideIndex);
    }
    function prevSlide(){
         slideIndex--;
        showSlide(slideIndex);
    }
    showSlide(slideIndex);

    prev.addEventListener('click',prevSlide);
    next.addEventListener('click', nextSlide);
</script>
<style>
    .slide{
        display: none;
    }
</style>
</body>
