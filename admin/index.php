<?php

require_once '../commons/env.php';
require_once '../commons/function.php';

require_once './controllers/AdminDanhMucController.php';

require_once './models/AdminDanhMuc.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    
    'danhmuc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' => (new AdminDanhMucController())->deleteDanhMuc(),
};
