<?php


require_once '../commons/env.php';
require_once '../commons/function.php';


// Khai báo các controller
require_once './controllers/AdminThongKeController.php';
require_once './controllers/AdminTaikhoanControllers.php';



// Khai báo các model
require_once './models/AdminTaikhoan.php';

// route
$act = $_GET['act'] ?? '/';


match ($act) {
    // Trang chủ
    '/' => (new AdminThongKeController())->home(),

    // Tài khoản
    'listtaikhoanquantri' => (new AdminTaikhoanController())->danhSachQuanTri(),
    'formthemquantri' => (new AdminTaikhoanController())->formAddQuanTri(),
    'themquantri' => (new AdminTaikhoanController())->postAddQuanTri(),
    'formsuaquantri' => (new AdminTaikhoanController())->formEditQuanTri(),
    'suaquantri' => (new AdminTaikhoanController())->postEditQuanTri(),

    'xoapassword' => (new AdminTaikhoanController())->deletePassword(),

    'listtaikhoankhachhang' => (new AdminTaikhoanController())->danhSachKhachHang(),
    'chitietkhachhang' => (new AdminTaikhoanController())->detailKhachHang(),
    default => 'không tìm thấy trang này',
};
