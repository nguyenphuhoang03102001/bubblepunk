<head>
    <title>Login</title>
    <meta http-equiv="refresh" content="30">
    <meta http-equiv="Content-Type" content="text/html" ;="" charset="UTF-8">
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
    <?php include("header.php") ?>
    <div class="container-lg card">
        <div class="row">
            <div class="col-lg card signup">
                <form action="SignupControl.php" method="post" style="padding:10px;">
                    <h3 style="text-align:center;color:black;background:#e5af42;padding:5px;">Đăng Ký</h3>
                    <div class="frm_row">
                        <div class="cls_caption">Tên tài khoản:</div>
                        <div class="cls_input">
                            <input type="text" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ""; ?>" />
                        </div>
                    </div><br style="clear: both;" />
                    <div class="frm_row">
                        <div class="cls_caption">Mật khẩu:</div>
                        <div class="cls_input"><input type="password" name="password" /></div>
                    </div><br style="clear: both;" />
                    <div class="frm_row">
                        <div class="cls_caption">Nhắc lại mật khẩu:</div>
                        <div class="cls_input"><input type="password" name="password2" /></div>
                    </div><br style="clear: both; " />
                    <div class="frm_row">
                        <div class="cls_caption">Email:</div>
                        <div class="cls_input">
                            <input type="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""; ?>" />
                        </div>
                    </div><br style="clear: both;" />
                    <div class="img_row">
                        <input type="submit" value="Đăng Ki" />
                    </div><br style="clear: both;" />
                </form>
                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "sudone") {
                        echo "<div class='msg' style='text-align:center;background-color:green;color:white;'> Bạn đã đăng kí thành công tài khoản! </div>";
                    } else if ($_GET['msg'] == "unvalid-data") {
                        echo "<div class='msg' style='text-align:center;background-color:red;color:white;'> Vui lòng kiểm tra lại dữ liệu nhập vào! </div>";
                    } else if ($_GET['msg'] == "suduplicate") {
                        echo "<div class='msg' style='text-align:center;background-color:orange;color:white;'> Tài khoản bạn đăng kí đã tồn tại,xin vui lòng chọn tên đăng nhập khác! </div>";
                    }
                }
                ?>
            </div>
            <div class="col-lg card login">

                <form action="LoginControl.php" method="post">
                    <h3 style="text-align:center;color:black;background:#e5af42;padding:5px;">Đăng Nhập</h3>
                    <div class=" frm_row">
                        <div class="cls_caption">Tên tài khoản:</div>
                        <div class="cls_input"><input type="text" name="username" /></div>
                    </div><br style="clear: both;" />
                    <div class="frm_row">
                        <div class="cls_caption">Mật khẩu:</div>
                        <div class="cls_input"><input type="password" name="password" /></div>
                    </div><br style="clear: both;" />
                    <div class="img_row">
                        <input type="submit" value="Đăng Nhập" />
                    </div><br style="clear: both;" />
                </form>
                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "done") {
                        echo "<div class='msg' style='background-color:green;color:white;'> Bạn đã đăng kí thành công tài khoản! </div>";
                    } else if ($_GET['msg'] == "unvalid-data") {
                        echo "<div class='msg' style='background-color:red;color:white;'> Vui lòng kiểm tra lại dữ liệu nhập vào! </div>";
                    } else if ($_GET['msg'] == "duplicate") {
                        echo "<div class='msg' style='background-color:orange;color:white;'> Tài khoản bạn đăng kí đã tồn tại,xin vui lòng chọn tên đăng nhập khác! </div>";
                    } else if ($_GET['msg'] == "login-fail") {
                        echo "<div class='msg' style='background-color:red;color:white;'> Username hoặc Password không đúng.Vui lòng kiểm tra lại </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>


</body>