<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section>
        <div class="container_fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb-float-sm-right">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item"></li>
                    </ol>
                </div>
            </div>
        </div>

    </section>


    <section>
        <div class="container_fluid">
            <div class="row">
                <div class=" col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 col-sm-6">
                                <h3 class="mt-3">Tên sản phẩm:<?= $sanPham['ten_sp'] ?></h3>
                                <hr>
                                <h4 class="mt-3">Giá tiền:<?= $sanPham['gia'] . 'đ'?></h4>
                                <h4 class="mt-3">Giá Khuyến mãi:<?= $sanPham['giam_gia'] .'đ' ?></h4>
                                <h4 class="mt-3">số lượng:<?= $sanPham['soluong'] ?></h4>
                                <h4 class="mt-3">Lượt xem:<?= $sanPham['so_luot_xem'] ?></h4>
                                <h4 class="mt-3">ngày nhập: <?= $sanPham['ngay_nhap'] ?></h4>
                                <h4 class="mt-3">danh mục:<?= $sanPham['ten_loai'] ?></h4>
                                <h4 class="mt-3">trạng thái:<?= $sanPham['trang_thai'] == 1 ? 'còn bán ' : 'hết hàng' ?></h4>
                                <h4 class="mt-3">mô tả:<?= $sanPham['mo_ta'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-sm-1">
        <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">quay lại</a>
    </div>
</div>
<?php include_once('./views/layout/footer.php'); ?>