<?php


require_once '../commons/env.php';
require_once '../commons/function.php';


// Khai báo các controller
require_once './controllers/AdminThongKeController.php';
require_once './controllers/AdminTaikhoanControllers.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';


// Khai báo các model
require_once './models/AdminTaikhoan.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';

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
    default => 'không tìm thấy trang này',


    // Danh mục
    'danhmuc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // Sản phẩm
    'sanpham' => (new AdminSanPhamController())->danhSachSanPham(),
    'formthemsanpham' => (new AdminSanPhamController())->formAddSanPham(),
    'themsanpham' => (new AdminSanPhamController())->postAddSanPham(),
    'formsuasanpham' => (new AdminSanPhamController())->formEditSanPham(),
    'suasanpham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoasanpham' => (new AdminSanPhamController())->deleteSanPham(),
    'chitietsanpham' => (new AdminSanPhamController())->detailSanPham(),
};
