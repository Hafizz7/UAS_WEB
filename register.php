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
    <link rel="stylesheet" href="index.css">
</head>
<body>    
    <div class="menu_side" id="mySidebar">
        <ul class="menu">
            <li><a href="#" target="_self">Home</a></li>
            <li><a href="Aboutme.php" target="_self">About Me</a></li>
            <li><a href="#"><i class="bi bi-bag-fill"></i></a></li>
            <li><a href="#"><i class="bi bi-person-circle"></i></a></li>
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
            <div class="bungkusflex">
                <div class="sigin"><a href="index.php">SIGN IN</a></div>
                <div class="sigin"><a href="signin.php">SIGN UP</a></div>
            </div>
            <h1 class="tambah_datatxt">BUAT AKUN</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input_from">
                    <label for="jenis_produk">Email</label><br>
                    <input type="email" name="email" placeholder="Email">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Username</label><br>
                    <input type="text" name="usernamee" placeholder="Username">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Password</label><br>
                    <input type="password" name="psw" placeholder="Password">
                    <span></span>
                </div>
                <div class="input_from">
                    <label for="jenis_produk">Konfirmasi Password</label><br>
                    <input type="password" name="psw_hash" placeholder="Password">
                    <span></span>
                </div>
                <div class="input_from">
                    <button type="submit">SIGN UP</button>
                    <span></span>
                </div>
            <form>
        </div>
    </section>
</body>
</html>
<?php
    include 'koneksi.php';
    if($_POST){
        $emaill = $_POST['email'];
        $usernamee = $_POST['usernamee'];
        $psw = $_POST['psw'];
        $psw_hash = $_POST['psw_hash'];
        if ($psw === $psw_hash){
            $psw = password_hash($psw, PASSWORD_DEFAULT);
            $result = mysqli_query($conn,"SELECT username FROM login_user WHERE username = '$usernamee'");
            $result_2 = mysqli_query($conn,"SELECT email FROM login_user WHERE email = '$emaill'"); 
            if(mysqli_fetch_assoc($result)){
                echo "
                <script>
                    alert('Username telah digunakan. Silahkan Cari Lagi!')
                    document.location.href = 'register.php';
                </script>";
                
            }
            elseif (mysqli_fetch_assoc($result_2)){
                echo "
                <script>
                    alert('Email telah digunakan. Silahkan Cari Lagi!')
                    document.location.href = 'register.php';
                </script>";
            }        
            else{
                $sql = "INSERT INTO login_user(email, username, psw) values ('$emaill','$usernamee','$psw')";
                $result = mysqli_query($conn,$sql);
            }

            if(mysqli_affected_rows($conn) > 0){
                echo "
                <script>
                    alert('Registrasi Berhasil')
                    document.location.href = 'index.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('Registrasi Gagal!')
                    document.location.href = 'register.php';
                </script>";
            }

        }else{
            echo "<script>
                alert('Konfirmasi Password Anda Tidak Sesuai!');
                document.location.href = 'register.php';
            </script>";
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