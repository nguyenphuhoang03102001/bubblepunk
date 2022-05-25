<?php
    include_once("db_module.php");
  function validateLenUP($up){
      return strlen($up)>=8&&strlen($up)<=30;
  }  
  function validateEmail($email){
      return filter_var($email,FILTER_VALIDATE_EMAIL)!=false?true:false;
  }
  function checkExistUsername($link, $username){
      $result = runQueryReturn($link, "select count(*) from tb_users where UserName ='".$username."'");
      $row = mysqli_fetch_row($result);
      mysqli_free_result($result);
      return $row[0]>0;
  }
?>