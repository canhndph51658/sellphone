<?php

class AdminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = "SELECT sanpham.*,danhmuc.ten_loai
             FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function insertSanPham($ten_sp, $gia, $giam_gia, $soluong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh)
    {
        try {
            $sql = "INSERT INTO sanpham (
                    ten_sp, gia, giam_gia, soluong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh
                ) VALUES (
                    :ten_sp, :gia, :giam_gia, :soluong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh
                )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sp' => $ten_sp,
                ':gia' => $gia,
                ':giam_gia' => $giam_gia,
                ':soluong' => $soluong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh' => $hinh
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT sanpham.*,danhmuc.ten_loai
             FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
             WHERE sanpham.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function updateSanpham($ten_sp, $gia, $giam_gia, $soluong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh)
    {
        try {
            $sql = "UPDATE sanpham SET
            ten_sp = :ten_sp,
            gia = :gia,
            giam_gia = :giam_gia,
            soluong = :soluong,
            ngay_nhap = :ngay_nhap,
            danh_muc_id = :danh_muc_id,
            trang_thai = :trang_thai,
            mo_ta = :mo_ta,
            hinh = :hinh
        WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sp' => $ten_sp,
                ':gia' => $gia,
                ':giam_gia' => $giam_gia,
                ':soluong' => $soluong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh' => $hinh
            ]);
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function destroySanPham($id) 
    { try {
        $sql = "DELETE FROM sanpham WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id'=> $id
        ]);
         return true;
    }catch (Exception $e){
        echo "loi" . $e->getMessage();
    }}
}
