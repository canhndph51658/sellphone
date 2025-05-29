<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="./LayoutClient/css/login.css">
</head>

<body>
     <div class="container">
          <div class="singin-singup">

               <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                    <?php if (isset($_SESSION['error'])) { ?>
                         <p class="text-danger"><?= $_SESSION['error'] ?></p>
                    <?php } else {
                    ?><p class="login-box-msg text-center">Vui lòng đăng nhập</p>
                    <?php } ?>

                    <h2 class="title">ZPhone | Singin</h2>

                    <div class="input-field">
                         <i class="fas fa-user"></i>
                         <input type="text" placeholder="Email" name="email" required>
                    </div>

                    <div class="input-field">
                         <i class="fas fa-lock"></i>
                         <input type="password" placeholder="Password" name="password" required>
                    </div>

                    <input type="submit" value="Login" class="btn">

                    <p class="social-text">Hoặc đăng nhập bằng nền tảng</p>

                    <div class="social-media">
                         <a href="" class="social-icon">
                              <i class="fab fa-facebook"></i>
                         </a><a href="" class="social-icon">
                              <i class="fab fa-twitter"></i>
                         </a><a href="" class="social-icon">
                              <i class="fab fa-google"></i>
                         </a>
                    </div>

                    <p class="account-text">Quên mật khẩu - <a href="#" id="sing-up-btn2">Đăng ký</a></p>
               </form>

               <form action="<?= BASE_URL . '?act=' ?> " method="post" class="sing-up-form"></form>
          </div>


     </div>


     <script src="./LayoutClient/js/login.js"></script>
</body>

</html>