<?php

require_once './commons/env.php';
require_once './commons/function.php';

require_once './controllers/HomeController.php';

require_once './models/DanhMuc.php';
require_once './models/SanPham.php';
require_once './models/BinhLuan.php';
$act = $_GET['act'] ?? '/';

match ($act) {

   '/' => (new HomeController())->home(),
   'sanpham' => (new HomeController())->SanPham(),
   'chi-tiet-san-pham' => (new HomeController())->ChiTietSanPham(),
   'binh-luan' => (new HomeController())->binhLuan(),
    'san-pham-theo-danh-muc' => (new HomeController())->SanPhamTheoDanhMuc(),
};
