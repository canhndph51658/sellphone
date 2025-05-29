<?php

class TaiKhoan
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function checkLogin($email, $mat_khau)
     {
          try {
               $sql = "SELECT * FROM taikhoan WHERE email = :email";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute(['email' => $email]);
               $user = $stmt->fetch();

               if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                    if ($user['role'] == 0) {
                         if ($user['trang_thai'] == 1) {
                              $_SESSION['tai_khoan_id'] = $user['id'];

                              return $user['email'];
                         } else {
                              return "Tài khoản bị cấm";
                         }
                    } else {
                         return "Tài khoản không có quyền đăng nhập";
                    }
               } else {
                    return "Bạn nhập sai tài khoản hoặc mật khẩu";
               }
          } catch (Exception $e) {
               echo "Lỗi kết nối: " . $e->getMessage();
               return false;
          }
     }
}
