<head>
  <title>Cart</title>
  <meta http-equiv="refresh" content="30">
  <meta http-equiv="Content-Type" content="text/html" ;="" charset="UTF-8">
  <link rel="stylesheet" href="style/styleCart.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/49d56f182a.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
 
  include("Cartcontrol.php");
  include_once("db_module.php");
  $link = NULL;
  startConn($link);
  ?>
  <?php include_once("header.php") ?>

  <div class="body">
    <div class="container-lg">
      <div class="row row">
        <div class="col-lg-7">
          <div class="cart table-responsive-lg">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Sản phẩm</th>
                  <th scope="col">Giá</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_SESSION['cart'])){
                  foreach($_SESSION['cart'] as $k=>$v){
                    echo"
                    
                    <tr>
                      <td>
                      <form method='post'action='Cartcontrol.php'><input type='hidden'name='id'value='".$k."'><button type='submit' name='action' value='Xóa'>Xóa</button></form>
                      </td>
                      <td><img width='100rem' height='70rem' src='" . $v['img'] . "'>
                      " . $v['name'] . "</td>
                      <td>" . number_format($v['price'], 0, ',', '.')  . " VND</td>
                    </tr>
                    ";

                  }
                  }
                  else echo "<tr><td>Chưa có sản phẩm</td></tr>";
                ?>
                <tr>
                  <td colspan="4">
                    <a href="Main.php" class="btn btn-primary active" role="button" aria-pressed="true">Quay về trang chủ</a>
                    <a href="#" class="btn btn-secondary active" role="button" aria-pressed="true">Cập nhật giỏ hàng</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="payment table-responsive-lg">
            <table class="table">
              <thead>
                <tr>
                  <th colspan="2">Cộng giỏ hàng</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tạm tính</td>
                  <td class="result"><?php echo (isset($_SESSION['cart'])?SumTotal():"0")?> VND</td>
                </tr>
                <tr>
                  <td>Tổng</td>
                  <td class="result"><?php echo (isset($_SESSION['cart'])?SumTotal():"0")?> VND</td>
                </tr>
                <tr>
                  <td colspan="2">
                  <form method="post" action="Cartcontrol.php">
                    <button type='submit' name='action' value="Thanh toán" class="btn btn-secondary btn-block active">Tiến hành thanh toán</button>
                  </form> 
                  </td>
                </tr>
                <tr>
                  <th colspan="2">
                    Phiếu ưu đãi
                  </th>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="text" placeholder="Mã giảm giá">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <a href="#" class="btn btn-secondary btn-block active" role="button" aria-pressed="true">Áp dụng</a>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
  <?php include("footer.php") ?>
</body>