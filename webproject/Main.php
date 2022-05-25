<head>
  <title>Main</title>
  <meta http-equiv="refresh" content="30">
  <meta http-equiv="Content-Type" content="text/html" ;="" charset="UTF-8">
  <link rel="stylesheet" href="style/styleMain.css">
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
  include_once "db_module.php";
  $link = NULL;
  startConn($link);
  
  ?>
  <?php include("header.php") ?>
  <div class="body">
    <div class="container-lg">
      <div class="carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="http://drive.google.com/uc?export=view&id=1yZ8PmdmSf9aeGsr5El_0gSaierLRoIoy" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://drive.google.com/uc?export=view&id=1O39tlnUIe_3ffai0HV5NnP4C9C2Xe1S0" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://drive.google.com/uc?export=view&id=1frerRRPgbLk5h1PmcAPA8HKuVbeUrHtP" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://drive.google.com/uc?export=view&id=1x_OcrLjmYK-kfw-cTUl_0leitwZ91HuO" alt="Third slide">
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
      <div class="ads d-none d-lg-block">
        <div class="card-deck">
          <div class="card">
            <img src="https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/1.png?raw=true" alt="">
          </div>
          <div class="card">
            <img src="https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/2.png?raw=true" alt="">
          </div>
          <div class="card">
            <img src="https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/3.png?raw=true" alt="">
          </div>
        </div>

      </div>
      <div class="products">
        <div class="acc">
          <h2>Game nổi bật</h2>
          
          <div class="row">
            <?php
           $result = runQueryReturn($link, "
           select * from tb_product
           inner join tb_platform on tb_product.PlatformID=tb_platform.PlatformID
           order by RAND() limit 4");
           while ($rows = mysqli_fetch_assoc($result)) {
             echo "<div class='col-lg-3 col-6'>";
             echo "<a href='http://localhost:3000/Products.php?pid=".$rows['ProductID']."'>";
             echo "<div class='card'>";
             echo "<img class='card-img-top' src=" . $rows['ProductImg'] . " alt='Card image cap'>";
             echo "<div class='card-body'>";
             echo "<h4 class='text-truncate' style='color:black;width: 100%;'class='card-title'>" . $rows['ProductName'] . "</h4>";
             echo "<p class='card-text'>".$rows['PlatformName']."</p>";
             echo "<p class='card-text'><small class='text-muted'>" . number_format($rows['ProductPrice'], 0, ',', '.') . " VND</small></p>";
             echo "</div>";
             echo "</div>";
             echo "</div>";
             echo "</a>";
           }
            ?>
          </div>
        </div>
        <div class="game">
          <h2>Game PC</h2>
          <div class="row">
            <?php
            $result = runQueryReturn($link, "
            select * from tb_product
            inner join tb_platform on tb_product.PlatformID=tb_platform.PlatformID
            where tb_product.PlatformID=1");
            while ($rows = mysqli_fetch_assoc($result)) {
              echo "<div class='col-lg-3 col-6'>";
              echo "<a href='http://localhost:3000/Products.php?pid=".$rows['ProductID']."'>";
              echo "<div class='card'>";
              echo "<img class='card-img-top' src=" . $rows['ProductImg'] . " alt='Card image cap'>";
              echo "<div class='card-body'>";
              echo "<h4 class='text-truncate' style='color:black;width: 100%;'class='card-title'>" . $rows['ProductName'] . "</h4>";
              echo "<p class='card-text'>".$rows['PlatformName']."</p>";
              echo "<p class='card-text'><small class='text-muted'>" . number_format($rows['ProductPrice'], 0, ',', '.') . " VND</small></p>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</a>";
            }
            ?>
          </div>
        </div>
        <div class="game">
          <h2>Game PS4</h2>
          <div class="row">
            <?php
            $result = runQueryReturn($link, "
            select * from tb_product
            inner join tb_platform on tb_product.PlatformID=tb_platform.PlatformID
            where tb_product.PlatformID=2");
            while ($rows = mysqli_fetch_assoc($result)) {
              echo "<div class='col-lg-3 col-6'>";
              echo "<a href='http://localhost:3000/Products.php?pid=".$rows['ProductID']."'>";
              echo "<div class='card'>";
              echo "<img class='card-img-top' src=" . $rows['ProductImg'] . " alt='Card image cap'>";
              echo "<div class='card-body'>";
              echo "<h4 class='text-truncate' style='color:black;width: 100%;'class='card-title'>" . $rows['ProductName'] . "</h4>";
              echo "<p class='card-text'>".$rows['PlatformName']."</p>";
              echo "<p class='card-text'><small class='text-muted'>" . number_format($rows['ProductPrice'], 0, ',', '.') . " VND</small></p>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</a>";
            }
            ?>
          </div>
        </div>
        <div class="game">
          <h2>Game Nintendo</h2>
          <div class="row">
          <?php
            $result = runQueryReturn($link, "
            select * from tb_product
            inner join tb_platform on tb_product.PlatformID=tb_platform.PlatformID
            where tb_product.PlatformID=4");
            while ($rows = mysqli_fetch_assoc($result)) {
              echo "<div class='col-lg-3 col-6'>";
              echo "<a href='http://localhost:3000/Products.php?pid=".$rows['ProductID']."'>";
              echo "<div class='card'>";
              echo "<img class='card-img-top' src=" . $rows['ProductImg'] . " alt='Card image cap'>";
              echo "<div class='card-body'>";
              echo "<h4 class='text-truncate' style='color:black;width: 100%;'class='card-title'>" . $rows['ProductName'] . "</h4>";
              echo "<p class='card-text'>".$rows['PlatformName']."</p>";
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
      <div class="news">
        <div class="container-lg">
          <h2>Tin tức - Bài viết</h2>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <div class="card d-none d-lg-block">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                  <div class="card d-none d-lg-block">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <div class="card d-none d-lg-block">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                  <div class="card d-none d-lg-block">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <div class="card d-none d-lg-block">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                  <div class="card d-none d-lg-block">
                    <img class="card-img-top" src="http://drive.google.com/uc?export=view&id=1l-WEj0Qskmrq7RwnhadDQ_H3hTI0cH8F" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, tenetur
                        ratione doloribus non quisquam natus cumque vitae reprehenderit provident libero perferendis,
                        mollitia, labore doloremque repudiandae et animi. Dolore, voluptas non.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("footer.php") ?>
</body>