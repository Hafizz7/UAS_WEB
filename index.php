<?php
session_start();
include 'koneksi.php';
if(isset($_SESSION['login'])){
    header("Location: user.php");
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
                <div class="sigin"><a href="register.php">SIGN UP</a></div>
            </div>
            <h1 class="tambah_datatxt">LOGIN</h1>
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
                    <input type="submit" name="login" value="LOGIN">
                    <span></span>
                </div>
            <form>
        </div>
    </section>
</body>
</html>
<?php
    include 'koneksi.php';
    if(isset($_POST['login'])){        
        $username = $_POST['usernamee'];
        $password = $_POST['psw'];
        $email = $_POST['email'];
        if($username == "admin"){                    
                $result = mysqli_query($conn, "SELECT * FROM login_admin WHERE username = '$username' OR email = '$email'");

                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);
                    
                    if(password_verify($password, $row['psw'])){
                        $_SESSION['admin'] = $row;
                        header("Location: admin.php");
                        exit;
                    }
                    else{
                        echo"
                        <script>
                            alert(' PASSWORD SALAH ... !! ');
                        </script>";
                    }
                }
                else{
                    echo"
                    <script>
                        alert(' USERNAME TIDAK TERDAFTAR..!! ');
                    </script>";
                }
                $error = true;
            }
        else{
            $result2 = mysqli_query($conn, "SELECT * FROM login_user WHERE username = '$username' OR email = '$email'");
            if(mysqli_num_rows($result2) == 1){
                $row = mysqli_fetch_assoc($result2);
                
                if(password_verify($password, $row['psw'])){
                    $_SESSION['username'] = $row;
                    header("Location: user.php");
                    exit;
                }
                else{
                    echo"
                    <script>
                        alert(' PASSWORD SALAH ... !! ');
                    </script>";
                }
            }
            else{
                echo"
                <script>
                    alert(' USERNAME TIDAK TERDAFTAR..!! ');
                </script>";
            }
            $error = true;
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