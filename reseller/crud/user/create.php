<?php

    include '../../koneksi.php';

    $iduser = $_POST['iduser'];
    $namauser = $_POST['namauser'];
    $pass = md5($_POST['pass']);
    $level = $_POST['level'];

    $sql = mysqli_query($koneksi, "INSERT INTO tb_user VALUES('$iduser','$namauser','$pass','$level')");

    if($sql){
        header('location:../../user.php');
    }else{
        header('location:../../tambah_user.php');
    }

?>