<!-- <header> -->
<?php include_once('./views/layout/header.php'); ?>
<!-- </header> -->
<!-- Navbar -->
<?php include_once('./views/layout/navbar.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once('./views/layout/sidebar.php'); ?>


<div class="content-wrapper">
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Quản lý tài khoản khách hàng</h1>
                    </div>
               </div>
          </div>
     </section>

     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-6">
                         <img src="<?= BASE_URL . $khachHang['hinh'] ?>" style="width:75%" alt=""
                              onerror="this.onerror=null; this.src='https://pluspng.com/img-png/user-png-icon-download-icons-logos-emojis-users-2240.png';">
                    </div>
                    <div class="col-6">
                         <div class="container">
                              <table class="table table-borderless">
                                   <tbody style="font-size: large;">
                                        <tr>
                                             <th>Họ tên: </th>
                                             <td><?= $khachHang['hoten'] ?></td>
                                        </tr>
                                        <tr>
                                             <th>Giới tính: </th>
                                             <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                        </tr>
                                        <tr>
                                             <th>Ngày sinh: </th>
                                             <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                             <th>Email: </th>
                                             <td><?= $khachHang['email'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                             <th>Số điện thoại: </th>
                                             <td><?= $khachHang['dienthoai'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                             <th>Địa chỉ: </th>
                                             <td><?= $khachHang['diachi'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                             <th>Trạng thái: </th>
                                             <td><?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                        </tr>
                                   </tbody>
                              </table>
                         </div>
                    </div>

                    <div class="col-12">
                         <hr>
                         <h2>Lịch sử mua hàng</h2>
                         <div>
                              <table id="example1" class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th>STT</th>
                                             <th>Mã đơn hàng</th>
                                             <th>Tên người nhận</th>
                                             <th>Số điện thoại</th>
                                             <th>Ngày đặt</th>
                                             <th>Tổng tiền</th>
                                             <th>Trạng thái</th>
                                             <th>Thao tác</th>
                                        </tr>
                                   </thead>
                              </table>

                              <tbody>
                              </tbody>
                         </div>
                    </div>

                    <div class="col-12">
                         <hr>
                         <h2>Lịch sử bình luận khách hàng</h2>
                         <div>
                              <table id="example1" class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th>STT</th>
                                             <th>Sản phẩm</th>
                                             <th>Nội dung</th>
                                             <th>Ngày bình Luận</th>
                                             <th>Trạng thái</th>
                                             <th>Thao tác</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>


<!-- Footer -->
<?php include_once './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
     $(function() {
          $(" #example1").DataTable({
               "responsive": true,
               "lengthChange": false,
               "autoWidth": false,
               // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
               "lengthChange": false,
               "autoWidth": false,
               "responsive": true,
          });
     });
</script>
<!-- Code injected by live-server -->

</body>

</html>