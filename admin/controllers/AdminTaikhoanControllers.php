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
}
