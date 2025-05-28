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
        

        // public function detailDonHang(){
        //     $don_hang_id = $_GET['id_don_hang'];

        //     //lấy thông tin đơn hàng ở bảng don_hang
        //     $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        //     //lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hang

        //     $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

        //     require_once './views/donhang/detailDonHang.php';
        // }
        // public function formEditSanPham()
        // { 
        //         $id = $_GET['id_sanpham'];
        //         $sanPham = $this->modelSanPham->getDetailSanPham($id);
        //         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        //         $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        //         if ($sanPham) {
        //             require_once './views/sanpham/editSanPham.php';
        //             deleteSessionError();
        //         } else {
        //             header("Location:" . BASE_URL_ADMIN . "?act=sanpham");
        //             exit();
        //         }
            
        // }
        // public function postEditSanPham()
        // {

        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $san_pham_id = $_POST['san_pham_id'] ?? '';
        //         $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
        //         $old_file = $sanPhamOld['hinh'];

        //         $ten_sp = $_POST['ten_sp'] ?? '';
        //         $gia = $_POST['gia'] ?? '';
        //         $giam_gia = $_POST['giam_gia'] ?? '';
        //         $soluong = $_POST['soluong'] ?? '';
        //         $ngay_nhap = $_POST['ngay_nhap'] ?? '';
        //         $danh_muc_id = $_POST['danh_muc_id'] ?? '';
        //         $trang_thai = $_POST['trang_thai'] ?? '';
        //         $mo_ta = $_POST['mo_ta'] ?? '';
        //         $hinh = $_FILES['hinh'] ?? null;


        //         $error = [];
        //         if (empty($ten_sp)) {
        //             $error['ten_sp'] = 'bạn phải nhập tên sản phẩm';
        //         }
        //         if (empty($gia)) {
        //             $error['gia'] = 'bạn phải nhập giá';
        //         }
        //         if (empty($giam_gia)) {
        //             $error['giam_gia'] = 'bạn phải nhập giá khuyến mãi';
        //         }
        //         if (empty($soluong)) {
        //             $error['soluong'] = 'bạn phải nhập số lượng';
        //         }
        //         if (empty($ngay_nhap)) {
        //             $error['ngay_nhap'] = 'bạn phải nhập ngày nhập';
        //         }
        //         if (empty($danh_muc_id)) {
        //             $error['danh_muc_id'] = 'bạn phải nhập danh mục sản phẩm';
        //         }

        //         if (empty($trang_thai)) {
        //             $error['trang_thai'] = 'bạn phải nhập trạng  thái';
        //         }

        //         $_SESSION['error'] = $error;
        //         if (isset($hinh) && $hinh['error'] == UPLOAD_ERR_OK) {
        //             $new_file = uploadFile($hinh, './uploads/');
        //             if (!empty($old_file)) {
        //                 deleteFile($old_file);
        //             }
        //         } else {
        //             $new_file = $old_file;
        //         }
        //         if (empty($error)) {
        //             $san_pham_id = $this->modelSanPham->updateSanpham($san_pham_id,$ten_sp, $gia, $giam_gia, $soluong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);
        //             header("Location:" . BASE_URL_ADMIN . "?act=sanpham");
        //             exit();
        //         } else {
        //             $_SESSION['flash'] = true;
        //             header("Location:" . BASE_URL_ADMIN . '?act=formsuasanpham&id_san_pham=' . $san_pham_id);
        //             exit();
        //         }
        //     }
        // }
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
