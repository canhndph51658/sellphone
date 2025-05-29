<?php
// session_start();
class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;


    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function SanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/productSanPham.php';
        return $listSanPham;
    }


    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header('Location:' . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            unset($_SESSION['tai_khoan_id']);
            header('Location:' . BASE_URL . '?act=trangchu;');
        }
    }

    public function trangchu()
    {
        require_once './views/home.php';
    }
};
