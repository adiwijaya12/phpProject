<form action="" method="POST" enctype="multipart/form-data">
   <div class="col-md-6">
      <table class="table table-striped">
         <tr>
            <th align="left">Nama Lowongan</th>
            <td>:</td>
            <td><input type="text" class="form-control" name="namaLowongan"></td>
         </tr>
         <tr>
            <th align="left">Tanggal Expired </th>
            <td>:</td>
            <td><input type="date" class="form-control" name="tglExpired"></td>
         </tr>
         <tr>
            <th align="left">Status Lowongan </th>
            <td>:</td>
            <td>
               <input type="radio" value="active" name="statusLowongan" id="Active" checked>
               <label for="Active">Aktif</label>
               <input type="radio" value="expired" name="statusLowongan" id="Expired">
               <label for="Expired">Expired</label>
            </td>
         </tr>
         <tr>
            <th align="left">Lokasi Penempatan </th>
            <td>:</td>
            <td>
               <input type="text" class="form-control" name="lokasiPenempatan">
            </td>
         </tr>
         <tr>
            <th align="left">Syarat Lowongan</th>
            <td>:</td>
            <td>
               <textarea name="syarat" class="form-control" cols="30" rows="5"></textarea>
            </td>
         </tr>
         <tr>
            <th align="left">Kisaran Gaji</th>
            <td>:</td>
            <td>
               <input type="text" name="kisaranGaji" class="form-control">
            </td>
         </tr>
         <tr>
            <th align="left">Foto</th>
            <td>:</td>
            <td>
               <input type="file" name="foto">
            </td>
         </tr>
         <tr>
            <td>
               <button type="submit" name="SimpanLowongan" class="btn btn-success btn-block">Simpan</button>
            </td>
         </tr>
      </table>
   </div>
</form>
<hr>

<?php
if (isset($_POST['SimpanLowongan'])) {
   if ($_POST['namaLowongan'] == '' or  $_POST['tglExpired'] == '' || $_POST['lokasiPenempatan'] == '') {
      echo "Data Yang kosong wajib diisi terlebih dahulu";
   } else {

      $ekstensiyangbolehdiupload = ['jpg', 'png', 'gif']; //jpg == $ekstensiyang diupload
      $ukuranFile                = $_FILES['foto']['size'];
      $lokasipenyimpananfile     = '../upload/lowongan/';
      $filetemp                  = $_FILES['foto']['tmp_name'];

      $namaFoto                  = $_FILES['foto']['name']; // 12.foto.JPG atau foto.png
      $ekstensi                  = explode('.', $namaFoto); //array(12, 'foto', 'JPG')
      $eks                       = strtolower(end($ekstensi)); // jpg

      if ($namaFoto == null) {
         $namaLowongan = $_POST['namaLowongan'];
         $tglTerbit    = date("Y-m-d H: i: s");
         $tglExpired   = $_POST['tglExpired'];
         $status       = $_POST['statusLowongan'];
         $lokasi       = $_POST['lokasiPenempatan'];
         $syarat       = $_POST['syarat'];
         $gaji         = $_POST['kisaranGaji'];
         $iduser       = $_SESSION['id_user'];

         $sql = "INSERT INTO lowongan (lowongan, tgl_terbit_lamaran, tgl_expired_lamaran, status_lowongan, lokasi_penempatan, syarat, kisaran_gaji, id_userfk) VALUES ('$namaLowongan','$tglTerbit','$tglExpired','$status','$lokasi','$syarat','$gaji','$iduser')";
         $query = mysqli_query($konek, $sql) or die(mysqli_error($konek));
         if ($query) {
            echo "Data Berhasil Masuk";
         } else {
            echo "Data gagal Masuk";
         }
      } else {
         //KALO FORM FOTO DIINPUTKAN OLEH USER
         if (in_array($eks, $ekstensiyangbolehdiupload) == true) { //CEK Ekstensi yang boleh diupload
            if ($ukuranFile < 1000000) { //Cek Ukuran File yang boleh diupload maks. 1 Mb  (dalam satuan byte)
               $fotonama = date("Y-m-d") . '-' . $namaFoto;
               move_uploaded_file($filetemp, $lokasipenyimpananfile . '' . $fotonama);

               $namaLowongan = $_POST['namaLowongan'];
               $tglTerbit    = date("Y-m-d H: i: s");
               $tglExpired   = $_POST['tglExpired'];
               $status       = $_POST['statusLowongan'];
               $lokasi       = $_POST['lokasiPenempatan'];
               $syarat       = $_POST['syarat'];
               $gaji         = $_POST['kisaranGaji'];
               $iduser       = $_SESSION['id_user'];

               $sql = "INSERT INTO lowongan (lowongan, tgl_terbit_lamaran, tgl_expired_lamaran, status_lowongan, lokasi_penempatan, syarat, kisaran_gaji, foto_lowongan, id_userfk) VALUES ('$namaLowongan','$tglTerbit','$tglExpired','$status','$lokasi','$syarat','$gaji','$fotonama','$iduser')";

               $query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

               if ($query) {
                  echo "Data Berhasil Masuk";
               } else {
                  echo "Data gagal Masuk";
               }
            } else {
               echo "Ukuran File terlalu besar";
            }
         } else {
            echo "Format File tidak sesuai";
         }
      }
   }
}
?>