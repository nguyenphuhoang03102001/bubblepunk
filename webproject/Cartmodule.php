<?php 
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
?>