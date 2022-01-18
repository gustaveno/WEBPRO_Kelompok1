<?php
session_start();

$koneksi = mysqli_connect("localhost","root", "", "tubes2");
  $product_id = $_GET['id'];

if(isset($_SESSION['cart'][$product_id])){
    $_SESSION['cart'][$product_id] += 1;
}else{
    $_SESSION['cart'][$product_id] = 1;
}


echo "<script>alert('produk telah masuk kedalam keranjang')</script>";
echo "<script>location='cart.php';</script>";

?>