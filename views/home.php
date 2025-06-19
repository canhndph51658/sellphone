<?php require_once 'views/layout/header.php' ?>

<body>
    <?php require_once 'views/layout/menu.php' ?>
    <div class="banner">
        <div class="slider" id="slider">
            <div class="slide active">
                <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_2.png" alt="Slide 1">
            </div>
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
        <h2>Sản phẩm mới </h2>
        <button class="btn2">
            view All
        </button>
        <div class="product-container">
            <button class="prev-btn"><</button>
            <div class="product-wrapper">
                <?php foreach ($listSanPham as $key => $sanPham): ?>
                    <div class="pro-item hidden">
                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id'] ?>">
                            <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="">
                        </a>
                        <?php
                        if (!empty($sanPham['ngay_nhap']) && strtotime($sanPham['ngay_nhap'])) {
                            try {
                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                $ngayHienTai = new DateTime();
                                $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                if ($tinhNgay->invert == 0 && $tinhNgay->days <= 7) {
                        ?>
                                    <div class="product-label discount">
                                        <span>new</span>
                                    </div>
                        <?php
                                }
                            } catch (Exception $e) {
                                error_log("lỗi định dạng ngày nhập " . $e->getMessage());
                            }
                        } else {
                            error_log("ngày nhập sản phẩm không hợp lệ hoặc trống.");
                        }
                        ?>
                        <div class="ten"><?= $sanPham['ten_sp'] ?></div>
                        <div class="giamgia"><?= formatNumber($sanPham['giam_gia'])  ?> đ</div>
                        <div class="gia"><?= formatNumber($sanPham['gia']) ?> đ</div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="next-btn">></button>
        </div>

    </div>
    <div class="container">
        <h2>sản phẩm Hot </h2>
        <button class="btn2">
            view All
        </button>
        <div class="product-container-hot">
            <button class="prev-btn-hot"><
            </button>
            <div class="product-wrapper-hot">
                <?php foreach ($listSanPhamHot as $key => $sanPham): ?>
                    <div class="pro-item hidden">
                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id']; ?>">
                            <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="">
                        </a>
                        <div class="ten"><?= $sanPham['ten_sp'] ?></div>
                        <div class="giamgia"><?= formatNumber($sanPham['giam_gia'])  ?> đ</div>
                        <div class="gia"><?= formatNumber($sanPham['gia']) ?> đ</div>
                        <button class="btn1" onclick="location.href= '<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id']; ?>'">xem chi tiết</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="next-btn-hot">></button>
        </div>


    </div>
    <div class="banner hidden">
        <img src="./LayoutClient/img/section_banner.webp" alt="">
    </div>
    <div class="container">
        <h2> tin tức</h2>
        <button class="btn2">
            view all
        </button>
        <div class="product2 hidden">
            <div class="pro-item">
                <img src="./LayoutClient/img/news1.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>11/11/2024</p>
                    </span>
                </div>
                <div class="ten">giá iphone tháng 11 </div>
                <div class="new"><a href="">xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>
            </div>
            <div class="pro-item">
                <img src="./LayoutClient/img/news5.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>11/11/2024</p>
                    </span>
                </div>
                <div class="ten">samsung giá chính hãng </div>
                <div class="new"><a href="">xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>
            </div>
            <div class="pro-item">
                <img src="./LayoutClient/img/news3.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>11/11/2024</p>
                    </span>
                </div>
                <div class="ten">sản phẩm giảm giá </div>
                <div class="new"><a href="">xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>
            </div>
            <div class="pro-item">
                <img src="./LayoutClient/img/news4.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>11/11/2024</p>
                    </span>
                </div>
                <div class="ten">ipad giá chính hãng </div>
                <div class="new"><a href="">xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>
            </div>
        </div>
    </div>

    <script src="./LayoutClient/js/trangchu.js"></script>
    <?php require_once 'views/layout/footer.php' ?>
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide')
        const dots = document.querySelectorAll('.dot')
        const prev = document.querySelector('.prev')
        const next = document.querySelector('.next')

        function showSlide(index) {
            if (index >= slides.length) slideIndex = 0;
            if (index < 0) slideIndex = slides.length - 1;

            slides.forEach((slide, i) => {
                slide.style.display = i === slideIndex ? 'block' : 'none';
                dots[i].classList.toggle('active', i === slideIndex);
            });
        }

        function nextSlide() {
            slideIndex++;
            showSlide(slideIndex);
        }

        function prevSlide() {
            slideIndex--;
            showSlide(slideIndex);
        }
        showSlide(slideIndex);

        prev.addEventListener('click', prevSlide);
        next.addEventListener('click', nextSlide);
    </script>

</body>