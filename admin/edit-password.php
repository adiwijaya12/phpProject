<h1>Edit Password Users</h1>
<form method="POST" action="">
   <table>
      <tr>
         <th align="left">
            <label>Masukkan Password yang Lama</label>
         </th>
         <td>
            <input type="text" name="passLama">
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <hr>
         </td>
      </tr>
      <tr>
         <th align="left">
            <label>Password Baru</label>
         </th>
         <td>
            <input type="password" name="passBaru">
         </td>
      </tr>
      <tr>
         <th align="left">
            <label>Ulangi Password Baru</label>
         </th>
         <td>
            <input type="password" name="passBaru2">
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <button type="submit" name="btn-SimpanPassword">Simpan Perubahan</button>
         </td>
      </tr>
   </table>
</form>

<?php
if (isset($_POST['btn-SimpanPassword'])) {
   $iduser = $_SESSION['id_user'];
   $passLama = $_POST['passLama'];

   $passBaru = $_POST['passBaru'];
   $passUlang = $_POST['passBaru2'];

   $sql1   = "SELECT * FROM users WHERE id_user = '$iduser' and password = '$passLama'"; //Vriabel yang bertipe data String
   $query1 = mysqli_query($konek, $sql1);
   $cek    = mysqli_num_rows(mysqli_query($konek, $sql1)); //kalo ada data (1) -- Kalo gak ada data (0)

   if ($cek == 0) {
      echo "Password yang lama tidak sesuai dengan database";
   } else {
      //PROSES JIKA PASSLAMO LAMA SUDAH BENAR DIINPUTKAN
      if ($passBaru == '') {
         echo "Data Password Baru Harus diisi terlebih dahulu";
      } else if ($passUlang == '') {
         echo "Data Ulangi Password Harus diisi terlebih dahulu";
      } else {
         //JIka Semua inputan telah diisi
         if ($passBaru <> $passUlang) {
            echo "Password tidak sama";
         } else {
            $sql = "UPDATE users SET password='$passBaru' where id_user ='$iduser'";
            $query = mysqli_query($konek, $sql);
            if ($query) {
               $_SESSION['pesan'] = 'Password Berhasil diubah';
               header("Location: index.php");
            } else {
               echo "Terjadi Kesalahan " . mysqli_error($konek);
            }
         }
      }
   }
}
?>



<!-- contoh pake md5 / text pass tidak terbaca -->