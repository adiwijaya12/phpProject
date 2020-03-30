<table border="1">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Level</th>
        <th>Login</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no=1;
    $sql ="SELECT * FROM users inner join tb_level on users.level=tb_level.kd_level";
    // $sql ="SELECT * FROM users";
    $query = mysqli_query($konek,$sql) or die(mysqli_error($konek));//fungsi query untuk menjalankan query diatas
    while ($data = mysqli_fetch_assoc($query)) { ?>
         
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['username'] ?></td>
        <td><?= $data['email'] ?></td>
        <td><?= $data['status'] == 'Y' ? "Aktif" : "Tidak Aktif" ?></td>
        <td><?= $data['nm_level'] ?></td>
        <td><?= $data['login_at'] ?></td>
        
        <td>
            <a href="index.php?act=edit&id=<?=$data['id_user']?>">Edit</a> 
            <?php
                if ($data['nm_level']=='Administrator') {
                    echo '';
                } else { ?>
                     <a href="index.php?act=delete&id=<?=$data['id_user']?>"
                    onclick="return confirm ('Yakin akan dihapus?')">
                    delete</a>
            <?php
                }
            ?>
            
        </td>
    </tr>

    <?php } ?>
    
</table>


<!-- EDIT DATA USER -->
<?php
    if (isset($_GET['act'])) {
        if ($_GET['act']=='edit') {
            include 'edit-user.php';
            echo '<hr>';
        }
    }
?>



<?php
if (isset($_SESSION ['pesan'])) {
    echo $_SESSION['pesan'];
    unset($_SESSION['pesan']);
    // data didapat setelah proses dibawah (pemanggilan kembali)
}

//  HAPUS DATA USER

if (isset($_GET['act'])) {
    if ($_GET['act']=='delete') {
        $iduser =$_GET['id']; //mengambil nilai id_user untuk dihapus
        $periksa = mysqli_query($konek,"SELECT * FROM profil WHERE profil.id_user='$iduser'");
        $periksa2 = mysqli_num_rows($periksa);
        if ($periksa2>0) {
            $hpsprofil = mysqli_query($konek,"DELETE FROM profil WHERE profil.id_user='$iduser'");
            $sql = "DELETE FROM users where id_user='$iduser'";
            $query = mysqli_query($konek,$sql);
           
        } else {
            $sql = "DELETE FROM users where id_user='$iduser'";
            $query = mysqli_query($konek,$sql);
        }
        if ($query == TRUE) {
            $_SESSION['pesan']='Data Berhasil Dihapus';
            header('Location: index.php');
           
        } else
            echo "Telah terjadi kesalahan".mysqli_error($konek); 
    }
}

?>


