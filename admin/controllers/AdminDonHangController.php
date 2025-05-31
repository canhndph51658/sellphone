     <?php

    class AdminDonHangController
    {
        public $modelDonHang;

        public function __construct()
        {
            $this->modelDonHang = new AdminDonHang();
        }
        public function danhSachDonHang()
        {
            $listDonHang = $this->modelDonHang->getAllDonHang();
            require_once './views/donhang/listDonHang.php';
        }
        

        public function detailDonHang(){
            $don_hang_id = $_GET['id_don_hang'];

            //lấy thông tin đơn hàng ở bảng don_hang
            $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

            //lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hang
            $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

            require_once './views/donhang/detailDonHang.php';
        }


        public function formEditDonHang()
        { 
                $id = $_GET['id_don_hang'];
                $donHang = $this->modelDonHang->getDetailDonHang($id);
                $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
                if ($donHang) {
                    require_once './views/donhang/editDonHang.php';
                    deleteSessionError();
                }
                 else {
                    header("Location:" . BASE_URL_ADMIN . "?act=don-hang");
                    exit();
                }
        }
        public function postEditDonHang()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $don_hang_id = $_POST['don_hang_id'] ?? '';
        $trang_thai_id = $_POST['trang_thai_id'] ?? '';

        $error = [];
        if (empty($trang_thai_id)) {
            $error['trang_thai_id'] = 'Trạng thái đơn hàng không được để trống';
        }

        $_SESSION['error'] = $error;

        if (empty($error)){
            $this->modelDonHang->updateDonHang(
                $don_hang_id,
                $trang_thai_id
            ); 
            header("Location:" . BASE_URL_ADMIN . "?act=don-hang");
            exit();
        } else {
            $_SESSION['flash'] = true;
            header("Location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
            exit();
        }
    }
}
        // public function postEditAnhSanPham(){
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         $san_pham_id = $_POST['san_pham_id'];
        //         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

        //         $img_array = $_FILES['img_array'];
        //         $img_delete = isset($_POST['img_delete']) ? explode(',',$_POST['img_delete']) : [];
        //         $current_img_ids = isset($_POST['current_img_ids']) ? $_POST['current_img_ids'] :[];

        //         $upload_files = [];
            
        //         foreach ($img_array['name'] as $key => $value){
        //             if  ($img_array['error'][$key] == UPLOAD_ERR_OK){
        //                 $new_file = uploadFileAlbum($img_array, '/uploads',$key);
        //                 if ($new_file) {
        //                     $upload_files[] = [
        //                         'id' =>$current_img_ids[$key] ?? null ,
        //                         'file' => $new_file,
        //                     ];
        //                 }
        //             }
        //         }
        //      foreach($upload_files as $file_info){
        //         if  ($file_info['id']){
        //             $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

        //             $this->modelSanPham->updateAnhSanpham($file_info['id'],$file_info['file']);
        //             deleteFile($old_file);
        //         }else{
        //             $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$file_info['file']);
        //         }
        //      }
        //      foreach ($listAnhSanPhamCurrent as $anhSp){
        //         $anh_id = $anhSp['id'];
        //         if  (in_array($anh_id,$img_delete)){
        //             $this->modelSanPham->destroyAnhSanPham($anh_id);
        //             deleteFile($anhSp['link_hinh_anh']);
        //         }
        //      }
        //        header("Location: " . BASE_URL_ADMIN . "?act=formsuasanpham&sid_sanpham=" . $san_pham_id);
        //     exit();
        //     }   
            

        // }
        // public function deleteSanPham()
        // {
        //     $id = $_GET['id_sanpham'];
        //     $sanPham = $this->modelSanPham->getDetailSanPham($id);

        //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        //     if ($sanPham) {
        //         deleteFile($sanPham['hinh']);
        //         $this->modelSanPham->destroySanPham($id);
        //     }
        //     if($listAnhSanPham){
        //         foreach($listAnhSanPham as $key=>$anhSp){
        //             deleteFile($anhSp['link_hinh_anh']);
        //             $this->modelSanPham->destroyAnhSanPham($anhSp['id']);
        //         }
        //     }
        //     header("Location: " . BASE_URL_ADMIN . "?act=sanpham&status=success");
        //     exit();
        // }
        // public function detailSanPham()
        // {
        //     $id = $_GET['id_sanpham'];
        //     $sanPham = $this->modelSanPham->getDetailSanPham($id);
        //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        //     if ($sanPham) {
        //         require_once './views/sanpham/detailSanPham.php';
        //     } else {
        //         header("Location:" . BASE_URL_ADMIN . "?act=sanpham");
        //         exit();
        //     }
        // }
    }
