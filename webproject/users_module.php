<?php
    function Signup($link,$username,$password,$email){
        runQueryReturn($link,"insert into tb_users values(NULL,'".md5($password)."','".mysqli_real_escape_string($link,$username)."','".$email."',NULL,NULL)");
    }
    function Login($link,$username,$password){
        $result = runQueryReturn($link,"Select count(*) from tb_users where UserName= '".mysqli_real_escape_string($link,$username)."' and UserPass='".md5($password)."'");
        $row =mysqli_fetch_row($result);
        mysqli_free_result($result);
        if($row[0]>0){
            $_SESSION['UserName'] = $username;
            return true;
        }
        else return false;
    }
    function Logout(){
        if(isset($_SESSION['uid'])){
            unset($_SESSION['uid']);
            return true;
        }
        else return false;
    }
?>