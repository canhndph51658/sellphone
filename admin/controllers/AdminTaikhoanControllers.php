<?php

class AdminTaikhoanController
{
     public $modelTaikhoan;

     public function __construct()
     {
          $this->modelTaikhoan = new AdminTaikhoan();
     }
}
