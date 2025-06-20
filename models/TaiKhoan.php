<?php

// session_start();
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
               $sql = "SELECT * FROM tai_khoan WHERE email = :email";
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
          } catch (\Exception $e) {
               echo "Lỗi kết nối: " . $e->getMessage();
               return false;
          }
     }

     public function getTaiKhoanFromEmail($email)
     {
          try {
               $sql = 'SELECT * FROM tai_khoan WHERE email = :email';
               $stmt = $this->conn->prepare($sql);
               $stmt->execute(['email' => $email]);
               return $stmt->fetch();
          } catch (Exception $e) {
               echo "Lỗi kết nối: " . $e->getMessage();
          }
     }

     public function getDangKyTaiKhoan($username, $email, $password)
     {
          try {

               $sqlCheck = "SELECT * FROM tai_khoan WHERE email = :email";
               $stmtCheck = $this->conn->prepare($sqlCheck);
               $stmtCheck->execute(['email' => $email]);
               if ($stmtCheck->fetch()) {
                    return "Email đã tồn tại. Vui lòng sử dụng email khác";
               }

               $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

               $sql = "INSERT INTO tai_khoan (hoten, email, mat_khau, role, trang_thai)
                    VALUES (:hoten, :email, :password, 0, 1)";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute([
                    'hoten' => $username,
                    'email' => $email,
                    'password' => $hashedPassword
               ]);

               return true;
          } catch (\Exception $e) {
               return "Lỗi kết nối: " . $e->getMessage();
          }
     }
}
