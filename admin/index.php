<?php


require_once '../commons/env.php';
require_once '../commons/function.php';


// Khai báo các controller
require_once './controllers/AdminThongKeController.php';


// Khai báo các model


// route
$act = $_GET['act'] ?? '/';


match ($act) {
     // Trang chủ
     '/' => (new AdminThongKeController())->home(),
};
