<?php
// session_start();
class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelBinhLuan = new BinhLuan();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function SanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
         $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/productSanPham.php';
        return $listSanPham;
    }
    
    public function ChiTietSanPham()
    {

        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

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
    public function SanPhamTheoDanhMuc()
    {
        $idDanhMuc = isset($_GET['id']) ? $_GET['id'] : 0;
        $listSanPham = $this->modelSanPham->getSanPhamTheoDanhMuc($idDanhMuc);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/productSanPham.php';
    }
    public function binhLuan()
    {
        if (isset($_POST['san_pham_id']) && isset($_POST['noi_dung']) && isset($_POST['tai_khoan_id'])) {
            $san_pham_id = $_POST['san_pham_id'];
            $noi_dung = $_POST['noi_dung'];
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ngay_bl = date('Y-m-d H:i:s');
            $tai_khoan_id = $_SESSION['tai_khoan_id']  ?? null;

            if ($san_pham_id && $noi_dung && $tai_khoan_id) {
                $binhLuan1 = $this->modelBinhLuan->addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung,  $ngay_bl);
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_sanpham=" . $san_pham_id);
                exit();
            } else {
                echo " vui lòng đăng nhập để điền đầy đủ thông tin";
            }
        } else {
            echo "dữ liệu không hợp lệ";
        }
    }
}
