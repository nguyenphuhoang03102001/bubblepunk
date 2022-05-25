<?php
    session_start();
    require_once"db_module.php";
    require_once"users_module.php";
    $link=NULL;
    startConn($link);
    if(Logout()){
        freeData($link,true);
        unset($_SESSION['uid']);
        unset($_SESSION['cart']);
        header("Location:Login.php");
    }else{
        freeData($link,true);
        header("Content-type:text/html;charset=utf8");
        echo"Không thể đăng xuất!";
    }
?>