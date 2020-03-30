<a href="index.php?halaman=add-lowongan">Tambah Lowongan</a>

<table class="table table-striped">
   <tr>
      <th>No</th>
      <th>Lowongan</th>
      <th>Lokasi</th>
      <th>Status</th>
      <th>Tanggal Expired</th>
   </tr>
   <tr>
      <?php
      $no = 1;
      $sql = "SELECT *  FROM lowongan";  //Sintak Mysql Untuk menampilkan Semua Data users
      $query = mysqli_query($konek, $sql) or die(mysqli_error($konek)); //Fungsi PHP untuk menjalankan query diatas
      while ($data = mysqli_fetch_assoc($query)) : ?>
         <td><?= $no++ ?></td>
         <td><?= $data['lowongan'] ?></td>
         <td><?= $data['lokasi_penempatan'] ?></td>
         <td><?= $data['status_lowongan'] ?></td>
         <td><?= $data['tgl_expired_lamaran'] ?></td>
   </tr>

<?php endwhile ?>
</table>