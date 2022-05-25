<?php
    session_start();
    function addtoCart($prod){
        if(isset($_SESSION['cart'])){
            $cart=$_SESSION['cart'];
            if(!array_key_exists($prod["id"],$cart))
                $cart[$prod["id"]]=$prod;
            $_SESSION['cart']=$cart;
        }else{
            $cart[$prod["id"]]=$prod;
            $_SESSION['cart']=$cart;
        }
    }
    function removefromCart($key){
        if(isset($_SESSION['cart'])){
            $cart=$_SESSION['cart'];
            unset($cart[$key]);
            $_SESSION['cart']=$cart;
        }
    }
    function SumTotal(){
        $sum=0;
        $cart=$_SESSION['cart'];
        foreach($cart as $v)
            $sum+=$v['price'];
        return number_format($sum);
    }
    {if(isset($_POST['action']))
        switch($_POST['action']){
        case "Thêm vào Giỏ":
            $prod=array("id"=>$_POST['id'],"name"=>$_POST['name'],"price"=>$_POST['price'],"img"=>$_POST['img']);
            addtoCart($prod);
            header("Location:".$_SERVER['HTTP_REFERER']);
            break;
        case"Xóa":
            removefromCart($_POST['id']);
            header("Location:".$_SERVER['HTTP_REFERER']);
            break;
        case "Thanh toán":
            include_once "db_module.php";
            $link = NULL;
            startConn($link);
            echo "payment gateway";
            $result = runQuerynoReturn($link, "Select * from tb_users where UserID ='".$_SESSION['uid']."'");
            $rows = mysqli_fetch_assoc($result);
            $insertOrder = runQuerynoReturn($link, "insert into tb_order values(NULL,".$rows['UserID'].",'".$rows['UserEmail']."',".date("Y/m/d").")");
            $result1 = runQuerynoReturn($link, "Select * from tb_order where UserID ='".$_SESSION['uid']."'");
            $orderID = mysqli_fetch_assoc($result1);
            date_default_timezone_set("Asia/Bangkok");
            $sql = "insert into tb_orderdetail values";
            $numItems = count($_SESSION['cart']);
            $i = 0;
            foreach($_SESSION['cart'] as $k => $val){
                if(++$i === $numItems) {
                    $sql .= "(".$orderID['OrderID'].",".$k.",'".$val['name']."');";
                  }
                  else{

                      $sql .= "(".$orderID['OrderID'].",".$k.",'".$val['name']."'),";
                  }
            } 
            $insertOrderdetail = runQueryReturn($link, $sql);
            freeData($link,$result);
            break;
        default:
            break;
        }
    }
