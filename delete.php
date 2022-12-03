<?php
    include 'koneksi.php';

    $id = (int) $_GET['id'];

    if($id){
        echo $id; 
        $gambar_icon = "SELECT gambar_buku FROM produk_buku WHERE Id_buku = '$id'";
        $data_gambar = mysqli_query($conn, $gambar_icon);
        $gambar = mysqli_fetch_array($data_gambar);
        unlink('gambar_buku1/'.$gambar['gambar_buku']); 

        $sql = "DELETE FROM produk_buku WHERE Id_buku='{$id}'";
        $query = mysqli_query($conn, $sql);
    }
    header('Location: admin.php'); 
    exit;
?>