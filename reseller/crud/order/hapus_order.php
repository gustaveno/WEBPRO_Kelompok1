<?php

    include '../../koneksi.php';

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE from pembelian WHERE id_pembelian = '$id' ");
    $pp = mysqli_query($koneksi, "DELETE from pembelian_produk WHERE id_pembelian = '$id' ");
    $tr = mysqli_query($koneksi, "DELETE from transaksi WHERE id_pembelian = '$id' ");
    $lp = mysqli_query($koneksi, "DELETE from laporan WHERE id_pembelian = '$id' ");
    
    if($sql){
        if($pp){
            if($tr){
                if($lp){
                    header('location:../../orderan.php');
                }
            }
        }
    }else{
        header('location:../../index.php');
    }

?>