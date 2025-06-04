<?php

session_start();
$tai_khoan_id = $_SESSION['tai_khoan_id'] ?? null;

require_once './commons/env.php';
require_once './commons/function.php';


//Contrillers
require_once './controllers/HomeController.php';

//Models
require_once './models/TaiKhoan.php';
require_once './models/SanPham.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';


require_once './models/BinhLuan.php';
$act = $_GET['act'] ?? '/';

match ($act) {


   '/' => (new HomeController())->home(),
   'trangchu' => (new HomeController())->trangchu(),
   'sanpham' => (new HomeController())->SanPham(),
   'chi-tiet-san-pham' => (new HomeController())->ChiTietSanPham(),

   //
   'gio-hang' => (new HomeController())->gioHang(),
   'them-gio-hang' => (new HomeController())->addGioHang(),
   'thanh-toan' => (new HomeController())->thanhToan(),
   'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),


   //login
   'login' => (new HomeController())->formLogin(),
   'check-login' => (new HomeController())->postLogin(),
   'logout' => (new HomeController())->logout(),

   //singup
   'form-signup' => (new HomeController())->formSignup(),
   'check-signup' => (new HomeController())->postSignup(),
   'binh-luan' => (new HomeController())->binhLuan(),
};
