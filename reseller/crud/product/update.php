<?php
    include '../../koneksi.php';

    $id = $_POST['idgambar'];
    $kat = $_POST['kategori'];
    $gambarlama = $_POST['gambarlama'];

    $gambar = $_FILES['gambar']['name'];
    $tmp_foto = $_FILES['gambar']['tmp_name'];
    $path = "../../img/gallery/".$gambar;
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }
        
    
    
    $sql = mysqli_query($koneksi, "UPDATE tb_gambar SET gambar='$gambar', id_kategori='$kat' WHERE id_gambar='$id' ");
        if($sql){
            header('location:../../ligallery.php');
        }else{
            header('location:../../edit_gallery.php');
        }
    
    
?>