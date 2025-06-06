<?php
class AdminTaiKhoan{
     public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email,$mat_khau){
        try
        {
            $sql="SELECT * FROM tai_khoan WHERE email = :email";
             $stmt = $this->conn->prepare($sql);
               $stmt->execute([
                'email' => $email ]);
           $user = $stmt->fetch();
           if ($user && password_verify($mat_khau,$user['mat_khau'])){
            if($user['role']==1){
                if($user['trang_thai'] == 1){
                    return $user['email'];
                }else{
                    return"tài khoản bị cấm !";
                }
            }else{
                return " tài khoản không có quyền đăng nhập !";
            }
           }else{
            return "bạn nhập sai tài khoản hoặc mật khẩu ";
           }
        }catch(\Exception $e){
            echo "lỗi ". $e->getMessage();
            return false;
        }
    }
}

?>