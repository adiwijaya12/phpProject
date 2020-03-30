<h3>Selamat Datang <?= $_SESSION['username'] ?></h3>
<p>Anda Login Sebagai <?= $_SESSION['level'] == 1 ? 'Admin' : 'User' ?></p>
<?php
if (isset($_GET['act'])) {
   if ($_GET['act'] == 'delete') {
      $iduser = $_GET['id'];
      $sql = "delete from users where id_user='$iduser'";
      $query = mysqli_query($konek, $sql);
      if ($query == TRUE) {
         $_SESSION['pesan'] = 'Data Users Berhasil dihapus';
         header('Location: index.php');
      } else {
         echo "Terjadi Kesalahan " . mysqli_error($konek);
      }
   }
}

if (isset($_SESSION['pesan'])) {
    echo $_SESSION['pesan'];
    // unset($_SESSION['pesan']);
 }

?>