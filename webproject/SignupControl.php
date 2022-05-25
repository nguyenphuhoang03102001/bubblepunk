<?php
session_start();
require_once 'db_module.php';
require_once 'validate_module.php';
require_once 'users_module.php';
$link=NULL;
startConn($link);
if(isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['password2'])&& isset($_POST['email'])){
    $valid = $_POST['password']==$_POST['password2'];
    $valid=$valid && validateLenUP($_POST['username']);
    $valid=$valid&validateLenUP($_POST['password']);
    $valid=$valid && validateEmail($_POST['email']);
    if($valid){
        if(checkExistUsername($link,$_POST["username"])){
            freeData($link,true);
            header("Location:Login.php?msg=suduplicate&username=".$_POST['username']."&email=".$_POST['email']);
        }else{
            Signup($link,$_POST["username"],$_POST["password"],$_POST["email"]);
            freeData($link,true);
            header("Location:Login.php?msg=sudone");
        }
    }else{
        freeData($link,true);
        header("Location:Login.php?msg-unvalid-data&username=".$_POST['username']."&email=".$_POST['email']);
    }
   }
?>
