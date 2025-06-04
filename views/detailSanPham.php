<head>
    <link rel="stylesheet" href="./LayoutClient/css/trangchu.css">
    <link rel="stylesheet" href="./LayoutClient/css/details.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php require_once 'views/layout/menu.php' ?>
    <div class="banner">
        <div class="slider" id="slider">
            <div class="slide active">
                <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_2.png" alt="Slide 2">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_3.png" alt="Slide 3">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_4.png" alt="Slide 3">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_5.png" alt="Slide 3">
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
        <div class="product-page">
            <div class="product-image">
                <div class="img-main">
                    <img src="<?= BASE_URL . $listAnhSanPham[0]['link_hinh_anh'] ?>" alt="">
                </div>
                <div class="thumbnail-gallery">
                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                        <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" onclick="changeMainImage(this)" alt="">
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="product-details">
                <div class="manufacturer-name">
                    <a href="#"><?= $sanPham['ten_loai'] ?></a>
                </div>
                <h1><?= $sanPham['ten_sp'] ?></h1>
                <div class="availability">
                    <i class="fa fa-check-circle"></i>
                    <span><?= $sanPham['soluong'] > 0 ? $sanPham['soluong'] . 'còn hàng ' : 'hết hàng ' ?></span>
                </div>
                <ul class="promotion-details">
                    <?= $sanPham['mo_ta'] ?>
                    <div class="color-selection">
                        <div class="capacity-main">
                            <label for="capacity">dung lượng:</label>
                            <div class="capacity-options">
                                <button class="capacity" data-value="128GB">128GB</button>
                                <button class="capacity" data-value="256GB">256GB</button>
                                <button class="capacity" data-value="512GB">512GB</button>
                            </div>
                        </div>
                    </div>
                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="POST">
                        <div class="quantity-main">
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                            <label for="product-quantity">số lượng:</label>
                            <div class="quantity">
                                <input type="number" id="product-quantity" value="1" min="1" name="so_luong">
                            </div>
                        </div>
                        <div id="error-message" style="color:red; display:none ;"></div>
                        <hr align="center">

                        <div class="price">
                            <div class="giamgia" id="discount-price"><?= formatNumber($sanPham['giam_gia']) ?>đ</div>
                            <div id="total-price" data-price="<?= $sanPham['gia']; ?>">
                                <?= formatNumber($sanPham['gia']) ?> đ
                            </div>
                        </div>

                        <div class="purchase-buttons">
                            <div class="buy-now">
                                <button class="buy-now">
                                    <i class="fa-solid fa-bag-shopping"></i>đặt hàng
                                </button>
                            </div>
                            <button class="add-to-cart"> thêm giỏ hàng </button>
                            <button class="installment">mua trả góp</button>
                        </div>
                    </form>
                </ul>
                <div class="contact-message" style="display: none; color:red; margin-top:10px;">
                    vui lòng liên hệ để biết thêm chi tiết
                </div>
            </div>
        </div>
    </div>

    <script src="./LayoutClient/js/trangchu.js"></script>
    <script src="./LayoutClient/js/details.js"></script>
        <?php require_once 'views/layout/footer.php' ?>
</body>

</html>