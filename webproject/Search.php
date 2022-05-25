<head>
  <title>Search</title>
  <meta http-equiv="refresh" content="30">
  <meta http-equiv="Content-Type" content="text/html" ;="" charset="UTF-8">
  <link rel="stylesheet" href="style/styleSearch.css">
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
  <?php include_once("header.php") ?>


  <div class="body">
    <div class="filter">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-6">
            <p>Kết quả tìm kiếm cho: '<?php echo $_GET['keyword']; ?>'</p> 
          </div>
          <div class="col-lg-6">
            <select name="orderby" class="orderby" aria-label="Đơn hàng của cửa hàng">
              <option value="relevance" selected="selected">Độ liên quan</option>
              <option value="popularity">Thứ tự theo mức độ phổ biến</option>
              <option value="rating">Thứ tự theo điểm đánh giá</option>
              <option value="date">Mới nhất</option>
              <option value="price">Thứ tự theo giá: thấp đến cao</option>
              <option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="result container-lg">
      <div class="row">
      <?php
        if(isset($_GET['keyword'])){
        $result =runQueryReturn($link,"select * from tb_product where ProductName like'%".$_GET['keyword']."%'");
        }
        else{
        $result = runQueryReturn($link,"select * from tb_product");
        }
        while($rows = mysqli_fetch_assoc($result)){
              echo "<div class='col-lg-3 col-4'>";
              echo "<a href='http://localhost:3000/Products.php?pid=".$rows['ProductID']."'>";
              echo "<div class='card'>";
              echo "<img class='card-img-top' src=" . $rows['ProductImg'] . " alt='Card image cap'>";
              echo "<div class='card-body'>";
              echo "<h3 class='card-title'>" . $rows['ProductName'] . "</h3>";
              echo "<p class='card-text'><small class='text-muted'>" . number_format($rows['ProductPrice'], 0, ',', '.') . " VND</small></p>";
              echo "</div>";
              echo "</div>";
              echo "</div></a>";
        }
        ?>
      </div>

    </div>
  </div>
  <?php include_once("footer.php") ?>
</body>