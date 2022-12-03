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
    <link rel="stylesheet" href="admin.css">
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
            <li><a href="Aboutme.php" target="_self">About Me</a></li>        
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
        <div class="konten3">
            <div class="tambah_data">
                <a href="tambah_data.php">+Tambah Data</a>
            </div>
            <div class="keranjang">
                <table border="1" width="1000px" align="center" cellspacing="0" cellpadding="0">
                    <form action="" method="GET">
                        <div class="cari1">
                            <div class="cariko">
                                <input type="text" name="tulisan" placeholder="cari judul buku" id="tulisan">
                            </div>
                            <div class="carieh">
                                <button type="submit" name="cari"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <tr class="jamuhijau">
                        <th class="coba-2">Gambar</th>
                        <th class="coba-2">Judul Buku</th>
                        <th class="coba-2">Pengarang</th>                        
                        <th class="coba-2">Harga</th>
                        <th colspan="2 " class="coba-2">Kelola</th>
                    </tr>
                
            </div>
            <?php
            if(isset($_GET['cari'])){
                $tulisan = $_GET['tulisan'];
                $sql = "SELECT * FROM produk_buku WHERE nama_buku LIKE '%".$tulisan."%'";
                $query = mysqli_query($conn, $sql);
            }
            else{
                $sql = "SELECT * FROM produk_buku";
            }
            
            while ($data = mysqli_fetch_array($query)){
                ?>
                <div class="keranjang">
                    <tr border="0">
                        <th><img src="gambar_buku/<?=$data['gambar_buku']?>" alt="" height="100px"></th>
                        <th><?php echo $data['nama_buku']?></th>
                        <th><?php echo $data['pengarang']?></th>
                        <th><?php echo $data['harga_buku']?></th>                       
                        <th class="aturicon"><a href="edit.php?id=<?= $data['Id_buku']?>"><i class="bi bi-pencil-square"></i></a>
                        <a href="delete.php?id=<?= $data['Id_buku']?>"><i class="bi bi-trash"></i></a></th>
                    </tr>
                </div>
            <?php
            }
            ?>
            </table>
        </div>
    </section>
    <section class="footer">
        <div class="footer1">
            <h1>Footer</h1>
        </div>
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