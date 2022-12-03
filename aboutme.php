<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['username'])){
    echo"
    <script>
        alert(' SILAHKAN LOGIN TERLEBIH DAHULU! ');
        document.location.href = 'index.php'
    </script>";
    exit;
}
?>
<?php
    include 'koneksi.php';
    $sql = "SELECT * FROM produk_buku";
    // $sql = "SELECT * FROM produk INNER JOIN buku ON produk.id_produk = gambar.id_produk";
    $query = mysqli_query($conn, $sql)
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
    <title>Tampilan User</title>
    <link rel="stylesheet" href="aboutme.css">
</head>
<body>    
    <div class="header1" id="header1">
        <!-- <button id="button_slide" class="profil_slide2" style="display:none"><img src="icebera.png" height="32px"></button> -->
        <ul id="pilihan1">
            <li><a href="user.php" target="_self">Home</a></li>
            <li><a href="Aboutme.php" target="_self">About Me</a></li>
            <li><a href="keranjang.php"><i class="bi bi-bag-fill"></i></a></li>
            <button id="button_slide" class="profil_slide"><img src="icebera.png" height="32px"></button>
        </ul>
    </div>
    <div class="menu_side" id="mySidebar">
        <ul class="menu">
            <li><a href="user.php" target="_self">Home</a></li>
            <li><a href="Aboutme.php" target="_self">About Me</a></li>
            <li><a href="keranjang.php"><i class="bi bi-bag-fill"></i></a></li>
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
            <li><a href="#" target="_self">Profil</a></li>
            <li><a href="logout.php" target="_self">Logout</a></li>
        </ul>
    </div>
    <section class="konten">
    <div class="tentang-saya">
        <div class="foto">
            <div class="foto-1"><img src="https://divedigital.id/wp-content/uploads/2021/11/27.jpg"></div>
        </div>
        <div class="isi">
            <p class="saya-1">About Me</p>
            <p class="isi-1">Suka belajar hal yang gak penting-penting contohnya tidur dan makan</p>                            
            <p class="isi-2">
                <b>Nama: </b>  Muh. Hafiz<br>
                <b>NIM :</b>2109106045<br>
                <b>Kelas:</b> Infomatika A<br>
            
            </p>      
            <div class="sosial">
                <div><a href="https://www.instagram.com/muhmmdhafizz_/"><img src="https://iili.io/s8g7v1.png"></a></div>
                <div><a href="# "><img src="https://iili.io/s8gR3B.png"></a></div>
                <div><a href="#"><img src="https://iili.io/s8gu4V.png"></a></div>
                <div><a href="#"><img src="https://iili.io/s8g5YP.png"></a></div>
            </div>
        </div>       
    </div>
    </section>
    <section class="footer">
        <p class="footer2">Crate By Muh. Hafiz</p>
    </section>
</body>
</html>

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