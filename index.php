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


$act = $_GET['act'] ?? '/';

match ($act) {


   '/' => (new HomeController())->home(),
   'trangchu' => (new HomeController())->trangchu(),
   'sanpham' => (new HomeController())->SanPham(),




   //login
   'login' => (new HomeController())->formLogin(),
   'check-login' => (new HomeController())->postLogin(),
   'logout' => (new HomeController())->logout(),
};
