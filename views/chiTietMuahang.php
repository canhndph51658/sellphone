<head>
    <link rel="stylesheet" href="./LayoutClient/css/cart.css">
</head>

<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>

<main>
     <div class="cart-container">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-7">
                        <!-- thông tin sản phẩm của đơn hàng -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bodered">
                                <thead>
                                    <tr colspan="5">
                                        <th>Thông tin sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    <?php foreach($chiTietDonHang as $item):?>
                                        <tr>
                                            <td><img src="<?= BASE_URL . $item['hinh'] ?>" alt="Asgaard sofa" width="100"></td>
                                            <td><?= $item['ten_sp'] ?></td>
                                            <td><?= number_format($item['don_gia'], 0, ',', '.')  ?>đ</td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= number_format($item['thanh_tien'], 0, ',', '.') ?>đ</td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- thông tin đơn hàng -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bodered">
                                <thead>
                                    <tr colspan="2">
                                        <th>Thông tin đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Mã đơn hàng:</th>
                                        <td><?= $donHang['ma_don_hang'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><?= $donHang['email_nguoi_nhan'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại:</th>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ:</th>
                                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Ngày đặt:</th>
                                        <td><?= $donHang['ngay_dat'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Ghi chú:</th>
                                        <td><?= $donHang['ghi_chu'] ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền:</th>
                                        <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?>đ</td>
                                    </tr>
                                    <tr>
                                        <th>Phương thức thanh toán:</th>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái đơn hàng</th>
                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?> </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
        
</main>
<script src="./LayoutClient/js/cart.js"></script>
<?php require_once 'views/layout/footer.php' ?>o-=
