<!-- FORM EDIT USER -->
<?php
    $iduser=$_GET['id'];
    $sql = "SELECT * FROM users where users.id_user=$iduser";
    $query = mysqli_query($konek,$sql);
    $data =mysqli_fetch_assoc($query);
?>
<hr>
<form action="" method="POST">
    <input type="text" name="id_users" value="<?=$data['id_user']?>" readonly>
    <table border="1">
        <caption>Edit User <?=$data['username'] ?></caption>
        <tr>
            <th align="left" >email</th>
            <td>:</td>
            <td><?=$data['email']?></td>
        </tr>
        <tr>
            <th align="left">Status</th>
            <td>:</td>
            <td>
                <input type="radio" name="status" id="" value="Y" <?=$data['status'] =='Y' ? 'checked' :'' ?>>Aktif
                <input type="radio" name="status" id="" value="N" <?=$data['status'] =='N' ? 'checked' :'' ?>> Tidak Aktif
            </td>
        </tr>
        <tr>
            <th align="left">Level</th>
            <td>:</td>
            <td>
                <select name="level" id="" >
                    <option value="1" <?=$data['level']==1 ?'selected' : '' ?>>Administrator</option>
                    <option value="2" <?=$data['level']==2 ?'selected' : '' ?>>User</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit" name="simpan-users">Simpan Perubahan</button>
                <button type="submit" name="keluar">Keluar</button>
            </td>
        </tr>
    </table>
</form>

<?php
    if (isset($_POST['simpan-users'])) {
        $iduser =$_POST['id_users'];
        $status =$_POST['status'];
        $level  =$_POST['level'];

        $sql = "UPDATE users SET status='$status',level='$level' where id_user='$iduser'  ";
        $query = mysqli_query($konek,$sql);

        if ($query) {
            echo "Data Berhasil di Update";
            header('location:index.php');
        }else {
            echo "Terjadi Kesalahan".mysqli_error();
        }
     
       } else {
            if (isset($_POST['keluar'])) {
            header('location:index.php');
         }
    }
?>
