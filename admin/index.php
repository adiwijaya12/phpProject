<?php
    // memmulai sesion karena tidak terhubung dengan sesion config sebelumnya
    session_start();
    // on start dibuat untuk menghilangkan pesan "cannot modify header informatian
    ob_start();
    require_once '../config/koneksi.php';

    if (isset($_SESSION['username'])) {
        echo "Selamat Datang ".$_SESSION['username']."<br>";
        echo "<a href='logout.php'>Logout</a>"; ?>
        
        <form  method ="post" action="">
        <button type="submit" name="btn-edit" style="margin-left:80%;color:red;"> Edit Profil</button>
        
        </form>

<?php
        echo "<hr>";
        include "data_user.php";  
        echo "<hr>"; 
    } else {
        header('location:../index.php');

    }
?>

<?php
    if (isset($_POST['btn-edit'])) {
      $kode = $_SESSION['id_user'];
      $kodenama = $_SESSION['username'];
      $sql = "SELECT * FROM profil where profil.id_user= $kode";
       // $sql ="SELECT * FROM users";
    //   $query = mysqli_query($konek,$sql) or die(mysqli_error($konek));";
      $query = mysqli_query($konek,$sql);
      $cek =mysqli_num_rows($query);
      if ($cek>0) {
        $editprof = mysqli_fetch_assoc($query);
        include "edit-profil.php";
      
      } else {
        $baru = "INSERT INTO profil (id_profil, nama_depan, id_user) VALUES (NULL, '$kodenama', '$kode')";
        $query = mysqli_query($konek,$baru);
        $sqlku = "SELECT * FROM profil where profil.id_user= $kode";
        $querybaru = mysqli_query($konek,$sqlku);
        $editprof = mysqli_fetch_assoc($querybaru);
        include "edit-profil.php";
        // var_dump($query);
      }

    }

?>
