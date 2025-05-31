<?php
// session_start();
class HomeController
{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
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

    public function ChiTietSanPham()
    {

        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        if($sanPham){
            require_once './views/detailSanPham.php';
        }
           else if($listSanPhamCungDanhMuc){
          require_once './views/productSanPham.php';
        } else{
            header("Location: " .BASE_URL);
            exit();
        }
    }
}
