<?php

class AdminTaikhoanController
{
     public $modelTaikhoan;

     public function __construct()
     {
          $this->modelTaikhoan = new AdminTaikhoan();
     }

     public function danhSachQuanTri()
     {
          $listQuanTri = $this->modelTaikhoan->getAllTaiKhoan(1);
          // var_dump($listQuanTri);
          // die();
          require_once './views/taikhoan/quantri/listQuanTri.php';
     }

     public function formAddQuanTri()
     {
          require_once './views/taikhoan/quantri/addQuanTri.php';
     }

     public function postAddQuanTri()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $hoten = $_POST['hoten'];
               $email = $_POST['email'];

               $error = [];
               if (empty($hoten)) {
                    $error['hoten'] = 'Bạn phải nhập tên quản trị';
               }

               if (empty($email)) {
                    $error['email'] = 'Bạn phải nhập email quản trị';
               }

               $_SESSION['error'] = $error;

               if (empty($error)) {
                    $password = password_hash('123456', PASSWORD_BCRYPT);

                    $role = 1;

                    $this->modelTaikhoan->insertTaiKhoan($hoten, $email, $password, $role);


                    header("Location: " . BASE_URL_ADMIN . "?act=listtaikhoanquantri");
                    exit();
               } else {
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN . "?act=formthemquantri");
                    exit();
               }
          }
     }

     public function formEditQuanTri()
     {
          $id_quantri = $_GET['id_quantri'];
          $quantri = $this->modelTaikhoan->getDetailTaiKhoan($id_quantri);
          // var_dump($quantri);
          // die();
          require_once './views/taikhoan/quantri/editQuantri.php';
     }

     public function postEditQuanTri()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $quantri_id = $_POST['quantri_id'] ?? '';

               $hoten = $_POST['hoten'] ?? '';
               $email = $_POST['email'] ?? '';
               $dienthoai = $_POST['dienthoai'] ?? '';
               $trang_thai = $_POST['trang_thai'] ?? '';

               $error = [];

               if (empty($hoten)) {
                    $error['hoten'] = ' Bạn phải nhập tên quản trị';
               }
               if (empty($email)) {
                    $error['email'] = ' Bạn phải nhập email quản trị';
               }
               if (empty($dienthoai)) {
                    $error['dienthoai'] = ' Bạn phải nhập số điện thoại quản trị';
               }
               if (empty($trang_thai)) {
                    $error['trang_thai'] = ' Bạn phải nhập trạng thái quản trị';
               }

               $_SESSION['error'] = $error;
               // var_dump($error);
               // die();
               if (empty($error)) {
                    $this->modelTaikhoan->updateTaiKhoan($quantri_id, $hoten, $email, $dienthoai, $trng_thai);

                    header("Loccation: " . BASE_URL_ADMIN . "?act=listtaikhoanquantri");
                    exit();
               } else {
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN . "?act=formsuaquantri&id_quantri=" . $quantri_id);
                    exit();
               }
          }
     }


     public function deletePassword()
     {

     }
}
