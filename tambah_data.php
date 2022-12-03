<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['admin'])){
    echo"
    <script>
        alert(' SILAHKAN LOGIN TERLEBIH DAHULU! ');
        document.location.href = 'index.php'
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="tambah_data.css">
</head>
<body>
    
    <div class="header1" id="header1">
        <!-- <button id="button_slide" class="profil_slide2" style="display:none"><img src="icebera.png" height="32px"></button> -->
        <ul id="pilihan1">
            <button id="button_slide" class="profil_slide"><img src="icebera.png" height="32px"></button>
        </ul>
    </div>
    <div class="menu_side" id="mySidebar">
        <ul class="menu">
            <li><a href="#" target="_self">Home</a></li>
            <li><a href="#"><i class="bi bi-person-circle"></i></a></li>
            <li><a href="logout.php" target="_self">Logout</a></li>
        </ul>
    </div>
    <div class="cobalagi">
    <button class="button_side" id="button_side1"><i class="bi bi-list"></i></button>
    </div>

    <div class="profil" id="profill">
        <!-- <button onclick="tutup_profil()" class="menu_profil">Close &times;</button> -->
        <ul class="menu_profil">
            <li><a href="logout.php" target="_self">Logout</a></li>
        </ul>
    </div>
    <section class="konten">
        <div class="tambah_data1">
            <h1 class="tambah_datatxt">Tambah Data</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input_from">
                    <label for="jenis_produk">Judul Buku</label><br>
                    <input type="text" name="judul_buku">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Pengarang</label><br>
                    <input type="text" name="pengarang">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Harga</label><br>
                    <input type="text" name="harga">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Deskripsi Produk</label><br>
                    <input type="text" name="deskripsi">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Upload Gambar</label><br>
                    <input type="file" name="gambar">
                    <span></span>
                </div>
                <div class="input_from">
                    <button type="submit">Tambah Data</button>
                    <span></span>
                </div>
            <form>
        </div>
    </section>
    <section class="footer">
        <!-- <div class="footer1">
            <h1>Footer</h1>
        </div> -->
    </section>
</body>
</html>
<?php
    include 'koneksi.php';
    if($_POST){
        $deskripsi = $_POST['deskripsi'];
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $harga = $_POST['harga'];
        $unique = rand(0,10000);

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$judul_buku-$unique.$ekstensi";        
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'gambar_buku/' . $gambar_baru)){
            $sql = "INSERT INTO produk_buku(nama_buku, pengarang, harga_buku, gambar_buku, deskripsi_buku)
                    VALUE ('$judul_buku','$pengarang','$harga', '$gambar_baru', '$deskripsi')";
            $query = mysqli_query($conn, $sql);

            if ($query){
                echo"OKEE DEKK";
                header('Location: admin.php');
            }
            else{
                die(mysqli_error($conn));
                // echo"gagal".mysqli_error();
            }
        }
    }

?>
<script>
    const toogle = document.getElementById("button_side1");
    const sidebar = document.getElementById('mySidebar');
    const toogle1 = document.getElementById("button_slide");
    const sidebar1 = document.getElementById('profill');

    // document.onclick = function(e){
    //     if(e.target.id != 'mySidebar' && e.target.id != 'button_side1'){
    //         toogle.classList.remove('active');
    //         sidebar.classList.remove('active');
    //     }
    // }

    toogle.onclick = function(){
        toogle.classList.toggle('active');
        sidebar.classList.toggle('active');
    }
    // document.onclick = function(e){
    //     if(e.target.id != 'profill' && e.target.id != 'button_slide'){
    //         toogle1.classList.remove('active');
    //         sidebar1.classList.remove('active');
    //     }
    // }
    toogle1.onclick = function(){
        toogle1.classList.toggle('active');
        sidebar1.classList.toggle('active');
    }
</script>