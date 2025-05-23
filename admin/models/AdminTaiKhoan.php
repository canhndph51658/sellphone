<?php

class AdminTaikhoan
{
     public $conn;
     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function getAllTaiKhoan($role)
     {
          try {
               $sql = "SELECT * FROM tai_khoan WHERE role = :role";

               $stmt = $this->conn->prepare($sql);

               $stmt->execute([':role' => $role]);

               return $stmt->fetchAll();
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }
}
