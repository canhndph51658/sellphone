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

     public function insertTaiKhoan($hoten, $email, $password, $role)
     {
          try {
               $sql = "INSERT INTO tai_khoan (hoten, email, mat_khau, role)
               VALUES (:hoten, :email, :matkhau, :role)";
               $stmt = $this->conn->prepare($sql);
               // var_dump($stmt);
               // die();
               $stmt->execute([
                    ':hoten' => $hoten,
                    ':email' => $email,
                    ':matkhau' => $password,
                    ':role' => $role
               ]);
               return true;
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }
}
