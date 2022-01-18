<?php
    include '../../koneksi.php';
    $id = $_POST['idgambar'];
    $kat = $_POST['kategori'];

    $gambar = $_FILES['gambar']['name'];
    $tmp_foto = $_FILES['gambar']['tmp_name'];
    $path = "../../img/gallery/".$gambar;

    if(move_uploaded_file($tmp_foto, $path)){
        $sql = mysqli_query($koneksi, "INSERT INTO tb_gambar VALUES('$id','$gambar','$kat')");
        if($sql){
            header('location:../../ligallery.php');
        }else{
            header('location:../../gallery.php');
        }
    }

?>