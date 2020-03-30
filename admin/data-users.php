<!-- MENAMPILKAN DATA USERS -->
<table class="table table-hover table-striped">
   <tr>
      <th>No</th>
      <th>Username</th>
      <th>Email</th>
      <th>Status</th>
      <th>Level</th>
      <th>Last Login</th>
      <th>Action</th>
   </tr>
   <?php
   $no = 1;
   $sql = "SELECT *  FROM users inner join tb_level on users.level= tb_level.kd_level";  //Sintak Mysql Untuk menampilkan Semua Data users
   $query = mysqli_query($konek, $sql) or die(mysqli_error($konek)); //Fungsi PHP untuk menjalankan query diatas
   while ($data = mysqli_fetch_assoc($query)) : ?>
      <!-- Perulangan Data dari database -->
      <tr>
         <td><?= $no++ ?></td>
         <td><?= $data['username'] ?></td>
         <td><?= $data['email'] ?></td>
         <td><?= $data['status'] == "Y" ? "Aktif" : "Tidak Aktif" ?></td>
         <td><?= $data['nm_level'] ?></td>
         <td><?= $data['login_at'] ?></td>
         <td>
            <a href="index.php?halaman=edit-user&iduser=<?= $data['id_user'] ?>">Edit</a> |
            <?php
            if ($data['nm_level'] == 'Administrator') {
               echo '';
            } else { ?>
               <a href="index.php?act=delete&id=<?= $data['id_user'];?>" onclick="return confirm('Yakin data users ingin dihapus ?')"> Delete</a>
            <?php
         
            }
            ?>

         </td>
      </tr>
   <?php endwhile ?>
</table>

<!-- EDIT INI tidak digunakan langsung dipanggil dari angker -->
<!-- <?php
if (isset($_GET['act'])) {
   if ($_GET['act'] == 'edit') {
      include 'edit-users.php';
   } else if ($_GET['act'] == 'edit-password') {
      include 'edit-password.php';
   }
}
?> -->


<!-- PROSES DELETE USERS -->
<?php
// NOTIFIKASI BILA BERHASIL HAPUS
if (isset($_SESSION['pesan'])) {
   // echo $_SESSION['pesan'];
   unset($_SESSION['pesan']);
}

// PROSES HAPUS DATA USERS
// if (isset($_GET['act'])) {
//    if ($_GET['act'] == 'delete') {
//       $iduser = $_GET['id'];
//       var_dump($iduser);
//       $sql = "delete from users where id_user='$iduser'";
//       $query = mysqli_query($konek, $sql);
//       if ($query == TRUE) {
//          $_SESSION['pesan'] = 'Data Users Berhasil dihapus';
//          include data-users.php;
//       } else {
//          echo "Terjadi Kesalahan " . mysqli_error($konek);
//       }
//    }
// }

?>