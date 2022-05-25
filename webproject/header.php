<body>
  <div class="header container-lg d-none d-lg-block">
    <div class="master">
      <div class="logo">
        <a href="http://localhost:3000/Main.php">
          <img src="https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/Logo2.png?raw=true" alt="">
        </a>
      </div>
      <form class="search" method="get" action="http://localhost:3000/Search.php">
        <input class="form-input-control" name="keyword" />
        <button type="submit" style="background-color:white; border:none;"><i class='fa-solid fa-magnifying-glass' style="color:black;"></i></button>
      </form>
      <div class="left">
        <div class="login">
        <?php
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
        if (isset($_SESSION['uid'])) {
          $result = runQuerynoReturn($link, "Select * from tb_users where UserID ='" . $_SESSION['uid'] . "'");
          $rows = mysqli_fetch_assoc($result);
          echo "<h5 style='color:#e5af42'>Xin chào, ".$rows['UserName']."</h5>";
          echo "<p style='font-size: 10px;color:grey'>".$rows['UserEmail']."</p>";
          echo "<a href='Logout.php' style='float:right;color:#212529'>Đăng xuất</a>";  
        } else echo " <a href='http://localhost:3000/Login.php' style='color:#212529'>Tài khoản</a>";
        ?>
        </div>
        <a href="http://localhost:3000/Cart.php" class="btn btn-dark" href="#" role="button">Giỏ hàng <i class="fa-solid fa-basket-shopping"></i></a>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg sticky-top" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <img class="d-block d-lg-none" src="https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/Logo1.png?raw=true" alt="">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="container-lg">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <?php
          if (isset($_SESSION['uid'])) {
            echo"<h2 style='color:white' style='font-size: 4rem !important;'>Xin chào, ".$rows['UserName']."</h2>
            <a href='Logout.php' style='float:left;color:#212529'>Đăng xuất</a> ";
          }
          else{
            
          }
          ?>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Game - Phần mềm
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">PC</a>
                <a class="dropdown-item" href="#">PS4/PS5</a>
                <a class="dropdown-item" href="#">Nintendo</a>
              </div>
            </div>
          </li>
          <li class="nav-item active">
            <a class="btn" href="http://localhost:3000/Main.php" role="button">Trang chủ</a>
          </li>
          <li class="nav-item active">
            <a class="btn" href="http://localhost:3000/Login.php" role="button">Tài khoản</a>
          </li>
          <li class="nav-item">
            <a class="btn" href="http://localhost:3000/Allproducts.php" role="button">Sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="btn" href="#" role="button">Liên hệ</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Giới thiệu
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Về BubblePunk</a>
                <a class="dropdown-item" href="#">Hướng dẫn thanh toán</a>
              </div>
            </div>
          </li>
          <li class="nav-item d-block d-lg-none">
            <div class="search">
              <input type="text" placeholder="Tìm kiếm sản phẩm" name="keyword">
              <a type="submit" href="http://localhost:3000/Search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>