<?php

class AdminTaikhoan
{
     public $conn;
     public function __construct()
     {
          $this->conn = connectDB();
     }
}
