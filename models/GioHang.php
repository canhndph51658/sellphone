<?php
class GioHang

{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getGioHangFromUser($id){
        try{
            $sql = 'SELECT * FROM gio_hang WHERE tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':tai_khoan_id'=>$id]);


            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();

        }
    }
    public function getDetailGioHang($id){
        try{
            $sql = 'SELECT chi_tiet_gio_hang *,san_pham.ten_san_pham 
            FROM chi_tiet_gio_hang 
            INSERT JOIN san_pham ON san_pham.danh_muc_id = san_pham.id
            WHERE chi_tiet_gio_hang.tai_khoan_id = :id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id'=>$id]);


            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();

        }
    } 
    
    public function addGioHang($id){
        try{
            $sql = 'INSERT INTO gio_hang (tai_khoan_id) VALUES (:id)';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);


            return $this->conn->lastInsertId();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();

        }
    }

    public function updateSoLuong($gio_hang_id,$san_pham_id,$so_luong){
        try{
            $sql = 'UPDATE chi_tiet_gio_hang
                    SET so_luong = :so_luong
                    WHERE gio_hang_id = :gio_hang_id AND san_pham =:san_pham_id           
            ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id'=>$gio_hang_id,':san_pham_id' => $san_pham_id,':so_luong' => $so_luong]);


            return true;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();

        }
    }
    public function addDetailGioHang($gio_hang_id,$san_pham_id,$so_luong){
        try{
            $sql = 'INSERT INTO chi_tiet_gio_hang(gio_hang_id,san_pham_id,so_luong)
                    VALUES (:gio_hang_id,:san_pham_id,:so_luong)          
            ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id'=>$gio_hang_id,':san_pham_id' => $san_pham_id,':so_luong' => $so_luong]);


            return true;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();

        }
    }
}