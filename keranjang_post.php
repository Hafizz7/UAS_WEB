<style>
    body{
        background-color: #FECD70;
    }
</style>
<?php
    include 'koneksi.php';   
    // $nama1 = $_SESSION['user']['username'];
    $nama1 = 'hafiz';
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM produk_buku WHERE produk_buku.Id_buku='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
?>
<form action="" method="post" id="myform">
    <input type="hidden" name="id" value="<?= $data['id_buku']?>">
    <input type="hidden" name="gambar_barang" value="<?= $data['gambar_buku']?>">
    <input type="hidden" name="nama_barang" value="<?= $data['nama_buku']?>">
    <input type="hidden" name="harga_produk" value="<?= $data['harga_buku']?>">
    <input type="hidden" name="nama_user" value="<?=$nama1?>">
    
</form>

<?php

    
    include 'koneksi.php';
    if($_POST){
        echo"1";
        // $kamu = ['tmp_name'];
        $unique = rand(0,10000);
        $gambar_upload = $_POST['gambar_barang'];
        $nama_upload = $_POST['nama_barang'];
        $harga_barang_upload = $_POST['harga_produk'];
        $nama_user = $_POST['nama_user'];
        $fileku = 'gambar_buku/'.$gambar_upload;
        $filenya = 'keranjang/'.$gambar_upload;
        copy($fileku, $filenya);
        // copy($data['gambar_barang'], 'keranjang/' .$gambar_upload);
        $sql = "INSERT INTO keranjang(gambar_buku, nama_buku, harga_buku, nama_user)
                            VALUES ('$gambar_upload', '$nama_upload', '$harga_barang_upload', '$nama_user')";
        $query = mysqli_query($conn, $sql);
        if ($query){
            echo "data berhasil diubah";
            
            header('Location: keranjang.php');
        }
        else{
            echo "data gagal diubah".mysqli_error($conn);
        }
    }
?>

<script type="text/javascript">
  document.getElementById("myform").submit();
</script>