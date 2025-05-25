<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>sửa thông tin sản phẩm: <?= $sanPham['ten_sp'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">cancel</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item"></li>
                    </ol>
                </div>
            </div>
        </div>

    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class=" card-title">thông tin sản phẩm
                            </h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=suasanpham' ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">tên Sản phẩm</label>
                                    <input type="text" class="form-control" name="ten_sp" value="<?= $sanPham['ten_sp'] ?>" placeholder="nhập tên sản phẩm">
                                    <?php if (isset($_SESSION['error']['ten_sp'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_sp'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">giá sản phẩm</label>
                                    <input type="text" class="form-control" name="gia" value="<?= $sanPham['gia'] ?>" placeholder="nhập giá sản phẩm">
                                    <?php if (isset($_SESSION['error']['gia'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group">
                                    <label for="">giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="giam_gia" value="<?= $sanPham['giam_gia'] ?>" placeholder="nhập giá khuyến mãi">
                                    <?php if (isset($_SESSION['error']['giam_gia'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['giam_gia'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh" placeholder="chọn hình ảnh">
                                    <?php if (isset($_SESSION['error']['hinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">số lượng </label>
                                    <input type="number" class="form-control" name="soluong" value="<?= $sanPham['soluong'] ?>" placeholder="nhập số lượng">
                                    <?php if (isset($_SESSION['error']['soluong'] )) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['soluong'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>" placeholder="nhập ngày nhập sản phẩm">
                                    <?php if (isset( $_SESSION['error']['ngay_nhap'] )) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">danh mục</label>
                                    <section>
                                        <select class="form-control" name="danh_muc_id" id="danhmucSelect">
                                            <?php foreach ($listDanhMuc as $danhmuc): ?>
                                                <option <?= $danhmuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['id']; ?>"><?= $danhmuc['ten_loai'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </section>
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">trạng thái</label>
                                    <section>
                                        <select class="form-control" name="trang_thai" id="trang_thai">
                                            <option selected disabled>chọn trạng thái sản phẩm</option>
                                            <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">còn hàng</option>
                                            <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">hết hàng</option>
                                        </select>
                                    </section>
                                </div>
                                <div class="form-group-12">
                                    <label for="">mô tả</label>
                                    <textarea class="form-control" name="mo_ta" rows="4"> <?= $sanPham['mo_ta'] ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">sửa thông tiin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once('./views/layout/footer.php'); ?>