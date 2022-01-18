<?php

    include '../../koneksi.php';

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE from tb_gambar WHERE id_gambar = '$id' ");
    
    if($sql){
        header('location:../../ligallery.php');
    }else{
        header('location:../../ligallery.php');
    }

?>