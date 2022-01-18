<?php

    include '../../koneksi.php';

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE from tb_user WHERE id_user = '$id' ");
    
    if($sql){
        header('location:../../user.php');
    }else{
        header('location:../../user.php');
    }

?>