<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';

require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminThongKeController.php';
require_once './controllers/AdminTaikhoanController.php';


require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminTaiKhoan.php';
$act = $_GET['act'] ?? '/';
if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}

match ($act) {
    '/' => (new AdminThongKeController())->home(),

    'danhmuc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' => (new AdminDanhMucController())->deleteDanhMuc(),

    'sanpham' => (new AdminSanPhamController())->danhSachSanPham(),
    'formthemsanpham' => (new AdminSanPhamController())->formAddSanPham(),
    'themsanpham' => (new AdminSanPhamController())->postAddSanPham(),
    'formsuasanpham' => (new AdminSanPhamController())->formEditSanPham(),
    'suasanpham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoasanpham' => (new AdminSanPhamController())->deleteSanPham(),
    'chitietsanpham' => (new AdminSanPhamController())->detailSanPham(),
    'suaalbumanhsanpham' => (new AdminSanPhamController())->postEditAnhSanPham(),

    'updatetrangthaibinhluan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),

    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
    'generate-hash' => (new AdminTaiKhoanController())->generateHash(),
};
