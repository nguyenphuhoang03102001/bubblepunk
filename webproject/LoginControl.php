<?php
    session_start();
    require_once "db_module.php";
    require_once "users_module.php";
    $link=NULL;
    startConn($link);
    if(isset($_POST['username'])&& isset($_POST['password'])){
        if(Login($link,$_POST["username"],$_POST["password"])){
            $result = runQuerynoReturn($link, "Select * from tb_users where UserName ='".$_POST['username']."'");
            $rows = mysqli_fetch_assoc($result);
            header("Location:Main.php");
            $_SESSION['uid']=$rows['UserID'];
            freeData($link,true);
        }else{
            freeData($link,true);
            header("Location:Login.php?msg=login-fail");
        }
    }else{
        freeData($link,true);
        header("Location:Main.php");
    }
?>