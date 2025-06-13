<head>
     <link rel="stylesheet" href="./LayoutClient/css/cart.css">
</head>

<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>

<main>
     <form action="<?= BASE_URL . '?act=thanh-toan' ?> " method="post">
          <div class="cart-container">
               <table class="cart-table">
                    <thead>
                         <tr>
                              <th>Chọn</th>
                              <th>Tên sản phẩm</th>
                              <th>Giá tiền</th>
                              <th>Số lượng</th>
                              <th>Tổng tiền</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $tongGioHang = 0;
                         ?>
                         <?php if (isset($chiTietGioHang) && is_array($chiTietGioHang)) : ?>
                              <?php foreach ($chiTietGioHang as $key => $sanPham): ?>
                                   <tr>
                                        <td>
                                             <input type="checkbox" name="chon_san_pham[]" value="<?= $sanPham['san_pham_id'] ?>">
                                        </td>
                                        <td class="product-info">

                                             <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="Asgaard sofa">
                                             <span><?= $sanPham['ten_sp'] ?></span>
                                        </td>
                                        <td>
                                             <span>
                                                  <?= isset($sanPham['giam_gia']) && $sanPham['giam_gia'] > 0
                                                       ? formatNumber($sanPham['giam_gia']) . ' đ'
                                                       : formatNumber($sanPham['gia']) . ' đ';
                                                  ?>
                                             </span>
                                        </td>
                                        <td class="product-quantity">
                                             <div class="pro-qty">
                                                  <button class="qty-btn decrement">-</button>
                                                  <input type="text"
                                                       name="so_luong[<?= $sanPham['san_pham_id'] ?>]"
                                                       style="width: 25px"
                                                       value="<?= $sanPham['so_luong'] ?>"
                                                       class="qty-input">
                                                  <button class="qty-btn increment">+</button>
                                             </div>
                                        </td>
                                        <td>
                                             <?php
                                             $tongTien = 0;
                                             if ($sanPham['gia']) {
                                                  $tongTien = $sanPham['gia'] * $sanPham['so_luong'];
                                             } else {
                                                  $tongTien = $sanPham['gia'] * $sanPham['so_luong'];
                                             }
                                             $tongGioHang += $tongTien;
                                             echo formatNumber($tongTien) . ' đ';
                                             ?>
                                        </td>
                                        <!-- <td>
                                   <a href="?act=gio-hang&action=delete&product_id=<?= $sanPham['san_pham_id'] ?>" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này?')">
                                        <i class="fas fa-trash" style="color: #D3D3D3;"></i>
                                   </a>


                              </td> -->
                                   </tr>
                              <?php endforeach; ?>
                         <?php else: ?>
                              <p>Không có sản phẩm nào trong giỏ hàng.</p>
                         <?php endif; ?>
                    </tbody>
               </table>

               <div class="cart-summary">
                    <h3>Tổng đơn hàng</h3>
                    <div class="summary-item">
                         <span>Tổng tiền sản phẩm</span>
                         <span><?= formatNumber($tongGioHang) . ' đ' ?></span>
                    </div>
                    <div class="summary-item">
                         <span>Vận chuyển</span>
                         <span>10.000 đ</span>
                    </div>
                    <div class="summary-item">
                         <span>Tổng thanh toán</span>
                         <span class="total"><?= formatNumber($tongGioHang + 10000) . ' đ' ?></span>
                    </div>
                    <button class="checkout-btn"> Tiến hành đặt hàng</button>
               </div>
          </div>
     </form>
</main>

<script src="./LayoutClient/js/cart.js"></script>

<?php require_once 'views/layout/footer.php' ?>