<?php
    // memmulai sesion karena tidak terhubung dengan sesion config sebelumnya
    session_start();
    // ob_start();
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
      $sql = "SELECT * FROM profil where profil.id_user= $kode";
      // $sql ="SELECT * FROM users";
      $query = mysqli_query($konek,$sql) or die(mysqli_error($konek));
      $editprof = mysqli_fetch_assoc($query);
      include "edit-profil.php";
    }

?>
