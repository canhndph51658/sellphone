<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<?php include_once('./views/layout/footer.php'); ?>
<div class="content-wrapper">
   <section  class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý thông tin đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item"></li></ol>
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
                    <h3 class=" card-title">Chỉnh sửa thông tin đơn hàng: <?= $donHang['ma_don_hang']; ?></h3>
                </div>
                <form action="<?= BASE_URL_ADMIN .'?act=sua-don-hang'?>" method="POST">
                    <input type="text"name="don_hang_id" value="<?= $donHang['id']?>" hidden>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">tên người nhận</label>
                        <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan']?>" placeholder="nhập tên người nhận" disabled>
                      <?php if(isset($error['ten_nguoi_nhan'])) { ?>
                            <p class="text-danger"><?=$error['ten_nguoi_nhan']?></p>
                       <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan']?>" placeholder="nhập số điện thoại" disabled>
                      <?php if(isset($error['sdt_nguoi_nhan'])) { ?>
                            <p class="text-danger"><?=$error['sdt_nguoi_nhan']?></p>
                       <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan']?>" placeholder="nhập email" disabled>
                      <?php if(isset($error['email_nguoi_nhan'])) { ?>
                            <p class="text-danger"><?=$error['email_nguoi_nhan']?></p>
                       <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan']?>" placeholder="nhập dia chỉ " disabled>
                      <?php if(isset($error['dia_chi_nguoi_nhan'])) { ?>
                            <p class="text-danger"><?=$error['dia_chi_nguoi_nhan']?></p>
                       <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="">Ghi chú</label>
                        <textarea name="ghi_chu" id="" class="form-control" placeholder="ghi chú" disabled><?= $donHang['ghi_chu']?></textarea>
                    </div>
                    <div class="form-group">
                                    <label for="inputStatus">Trạng thái đơn hàng</label>                                    
                                        <select id="inputStatus" name="trang_thai_id" class="form-control">
                                            <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                                <option 
                                                    <?php
                                                        if($donHang['trang_thai_id'] > $trangThai['id']
                                                        || $donHang['trang_thai_id'] == 9
                                                        || $donHang['trang_thai_id'] == 10
                                                        || $donHang['trang_thai_id'] == 11)
                                                        {
                                                            echo'disabled';
                                                        }
                                                    ?> 
                                                    <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?> 
                                                    value="<?= $trangThai['id']; ?>">
                                                    <?= $trangThai['ten_trang_thai']; ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>                                   
                        </div>
                </div>
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
     </div>
</section>
</div>
