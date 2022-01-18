<?php
    include '../../koneksi.php';

    $id = $_POST['idslider'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_foto = $_FILES['gambar']['tmp_name'];
    $path = "../../img/slider/".$gambar;

    if(move_uploaded_file($tmp_foto, $path)){
        $sql = mysqli_query($koneksi, "UPDATE tb_slider SET slider='$gambar' WHERE id_slider='$id' ");
        if($sql){
            header('location:../../slider.php');
        }else{
            header('location:../../edit_slider.php');
        }
    }

?>