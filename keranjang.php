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
    $nama1 = 'hafiz';
    $sql = "SELECT * FROM keranjang WHERE nama_user = '$nama1'";
    $query = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="keranjang.css">
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
            <li><a href="logout.php"><i class="bi bi-person-circle"></i></a></li>
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
        <?php
            while ($data = mysqli_fetch_array($query)){
        ?>
        <div class="konten3">
            <div class="gambar_keranajng">
            <img src="keranjang/<?=$data['gambar_buku']?>">
            </div>
            <div class="konte_4">
                <h1 class="judul44"><?php echo $data['nama_buku']?></h1>
                <h2 class="harga44"><?php echo $data['harga_buku']?></h2>
            </div>
            <div class="hapus44">
            <a href="delete_keranjang.php?id=<?= $data['id_keranjang']?>"><i class="bi bi-trash" style="font-size: 40px" ></i></a>
            </div>
        </div>
        <?php
        }
        ?>
        
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