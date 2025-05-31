<header>
    <img src="" alt="">
    <nav>
        <ul>
            <li><a href="">trang chủ</a></li>
            <li><a href="">sản phẩm</a></li>
            <li><a href="">giới thiệu</a></li>
            <li><a href="">liên hệ</a></li>    
        </ul>
    </nav>
    <div class="icon1"> 
        <form action="" id="search-box">
            <div class="search-container">
                <input type="text" id="search-text" placeholder="bạn muốn tìm gì..." required>
                <button id="search-btn">
                    <i class="fa-solid fa-magnifying-glass" style="color: #fff;"></i>
                </button>
            </div>
        </form>

        <label for="">
            <?php if(isset($_SESSION['user_client'])){
                echo $_SESSION['user_client'];
            }?>
        </label>
        <div class="dropdown-container">
            <span class="material-symbols-outlined dropdown-icon">person</span>
            <div class="dropdown-menu">
                <?php if (!isset($_SESSION['user_client'])){ ?>
            <a href="<?= BASE_URL .'?act=login' ?>" class="dropdown-item"> đăng nhập</a>        
            <?php } else{?>
                <a href="" class="dropdown-item">thông tin cá nhân</a>
                <a href="" class="dropdown-item">lịch sử mua hàng</a>
                 <a href="<?= BASE_URL .'?act=logout' ?>" class="dropdown-item" onclick="return confirm('bạn có chắc là muốn đăng xuất')"> đăng xuất</a>    
               <?php }?>  
        </div>
        </div>
         <a href="<?= BASE_URL .'?act=gio-hang' ?>"><span class="material-symbols-outlined">
            shopping_cart
         </span></a> 
    </div>
</header>

