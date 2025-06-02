<?php
// session_start();
class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;


    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
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
            header('Location:' . BASE_URL . '?act=trangchu');
        }
    }

    public function formSignup()
    {
        require_once './views/auth/formLogin.php';
        exit();
    }

    public function postSignup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $this->modelTaiKhoan->getDangKyTaiKhoan($username, $email, $password);

            if ($result === true) {
                $_SESSION['success'] = "Đăng ký thành công";
                header("Location: " . BASE_URL . "?act=login");
                exit();
            } else {
                $_SESSION['error'] = $result;
                $_SESSION['flash'] =  true;
                header("Location: " . BASE_URL . '?act=form-signup');
                exit();
            }
        }
    }

    public function trangchu()
    {
        require_once './views/home.php';
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['user_client']) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }

                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                var_dump('chưa đăng nhập');
                die();
            }
        }
    }

    public function gioHang()
    {
        if ($_SESSION['user_client']) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';
        } else {
            header("location:" . BASE_URL . '?act=login');
        }
    }

    public function ChiTietSanPham()
    {

        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else if ($listSanPhamCungDanhMuc) {
            require_once './views/productSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
};
