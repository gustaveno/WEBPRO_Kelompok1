<?php

$koneksi = mysqli_connect("localhost","root", "", "my_shop_database");
    $reseller_id = $_POST['reseller_id'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "UPDATE reseller SET username='$username'
    , password='$pass', phone='$phone', email='$email', alamat='$alamat' WHERE reseller_id='$reseller_id' " );

    if($sql){
        echo "<script>alert('profil telah di ubah')</script>";
        echo "<script>location='../../user.php';</script>";
       
    }else{
        header('location:../index.php');
    }

?>