<head>
  <title>Products</title>
  <meta http-equiv="refresh" content="30">
  <meta http-equiv="Content-Type" content="text/html" ;="" charset="UTF-8">
  <link rel="stylesheet" href="style/styleProducts.css">
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
  include_once("db_module.php");
  $link = NULL;
  startConn($link);
  
  ?>
  <?php include_once("header.php");
  $result = runQuerynoReturn($link, "Select * from tb_product where ProductID ='" . $_GET['pid'] . "'");
  $rows = mysqli_fetch_assoc($result); ?>
  <div class="body">
    <div class="container-lg">
      <div class="row">
        <div class="content col-lg-9">
          <div class="thumbnail row">
            <div class="slide col-lg-5">
              <div class="card">
                <div class="carousel">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                        <img class="d-block w-100 h-50" src="<?php echo $rows['ProductImg']?>" alt="First slide">
                      </li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1">
                        <img class="d-block w-100 h-50" src="<?php echo $rows['ProductImg']?>" alt="Second slide">
                      </li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2">
                        <img class="d-block w-100 h-50" src="<?php echo $rows['ProductImg']?>" alt="Third slide">
                      </li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100 h-50" src="<?php echo $rows['ProductImg']?>" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 h-50" src="<?php echo $rows['ProductImg']?>" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 h-50" src="<?php echo $rows['ProductImg']?>" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="price col-lg-7">
              <div class="card">
                <?php
                echo "<h4>" . $rows['ProductName'] . "</h4>";
                echo "<h2>" . number_format($rows['ProductPrice'], 0, ',', '.') . " VND</h2>";
                ?>

                <div class="row">
                  <div class="col-8">
                    <?php 
                    if(isset($_SESSION['uid'])){
                      echo"
                      <form method='post' action='Cartcontrol.php'>
                      <input type='hidden' value='".$rows['ProductID']."' name='id'>
                      <input type='hidden' value='".$rows['ProductName']."' name='name'>
                      <input type='hidden' value='".$rows['ProductPrice']."' name='price'>
                      <input type='hidden' value='".$rows['ProductImg']."' name='img'>
                      <input type='submit' value='Thêm vào Giỏ' name='action'>
                    </form>
                      ";
                    }
                    else{
                      echo "<div class='alert alert-danger' role='alert'> Bạn phải đăng nhập trước khi thêm vào giỏ hàng</div>";
                    }
                    ?>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class=" card descrb row">
            <div class="col">
              <div class="switch row">
                <button class="btn btn-primary">
                  Mô tả
                </button>
                <button class="btn btn-primary" disabled>
                  Đánh giá
                </button>
              </div>
              <div class="describe">
                <h4>Giới thiệu về game <?php echo $rows['ProductName']; ?></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam molestias provident
                  consequuntur non esse blanditiis sint labore! Facilis voluptatem a eum? Sed consequuntur, dignissimos
                  dolor in maiores velit amet!</p>
                <img src=<?php echo "'" . $rows['ProductImg'] . "'"; ?> alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, placeat repellat debitis velit officiis
                  impedit rerum aspernatur error quas soluta, inventore ex in ad explicabo nobis voluptas, rem laborum
                  maiores!</p>
                <h4>Trailer</h4>
                <div class="container">
                  <iframe width="2385" height="1042" src=<?php echo "'" . $rows['ProductTrailer'] . "'"; ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="similar row">
            <h2>Sản phẩm tương tự</h2>
            <div class="row row-cols-2 row-cols-lg-4">
              <?php
              $result = runQueryReturn($link, "Select * from tb_product where PlatformID =".$rows['PlatformID']);
              while ($rows = mysqli_fetch_assoc($result)) {
                echo "<div class='col-lg-3 col-4'>";
                echo "<a href='http://localhost:3000/Products.php?pid=" . $rows['ProductID'] . "'>";
                echo "<div class='card'>";
                echo "<img class='card-img-top' src=" . $rows['ProductImg'] . " alt='Card image cap'>";
                echo "<div class='card-body'>";
                echo "<h4 class='text-truncate' style='color:black;max-width: 10rem;'class='card-title'>" . $rows['ProductName'] . "</h4>";
                echo "<p class='card-text'><small class='text-muted'>" . number_format($rows['ProductPrice'], 0, ',', '.') . " VND</small></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
              }
              ?>
            </div>

          </div>
        </div>
        <div class="more col-lg-3 d-none d-lg-block ">
          <div class="info card">
            <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=11KuF4vF4QsfULFZzYE4DOoiFPlFOWF79" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">BubblePunk là website chuyên cung cấp game bản quyền và tài khoản premium trên các
                nền tảng học tập và giải trí</p>
            </div>
          </div>
          <div class="catergory">
            <div class="card">

              <div class="card-body">
                <h4 class="card-title">Danh mục sản phẩm</h4>
                <ul>
                  <li><a href="">Game trên GOG</a></li>
                  <li><a href="">Game trên Origin</a></li>
                  <li><a href="">Game trên Steam</a></li>
                  <li><a href="">Tài khoản Premium</a></li>
                  <li><a href="">Steam wallet</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="productlist">

          </div>
          <div class="news"></div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once("footer.php")  ?>
</body>