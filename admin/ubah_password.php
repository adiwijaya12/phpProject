<form action="" method="POST">
    <table border="1" cellspacing="4">
        <caption>GANTI PASSWORD</caption>
        <tr>
            <th align="left">Password Lama</th>
            <td>:</td>
            <td>
                <input type="password" name="pass_lama" id="" pLaceholder="***">
            </td>
        </tr>
        <tr>
            <th align="left">Password Baru</th>
            <td>:</td>
            <td>
                <input type="password" name="pass_baru" id="">
            </td>
        </tr>
        <tr>
            <th align="left">Ulangi Password</th>
            <td>:</td>
            <td>
                <input type="password" name="pass_ulang" id="">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit" name="btn-editpass">Simpan</button>
                <button type="submit" name="btn-keluar" >Keluar</button>
            </td>
        </tr>
    </table>
</form>

<?php
    if (isset($_POST['btn-editpass'])) {
        $id_user    = $_SESSION['id_user'];
        $pass_lama  = $_POST['pass_lama'];
        $pass_baru  = $_POST['pass_baru'];
        $pass_ulang = $_POST['pass_ulang'];
        $cari1 = "SELECT * from users where id_user=$id_user";//mencari data users
        $query1 = mysqli_query($konek,$cari1);//perintah sql query
        $cariquery = mysqli_num_rows($query1);
        if ($cariquery>0) {
            $queryedit = mysqli_fetch_assoc($query1);
            if ($queryedit['password']<>$pass_lama) {
                echo "Password Lama Tidak Sesuai";
            } elseif ($pass_baru=='') {
                echo "Password Baru Harus Diisi";
            } elseif ($pass_baru<>$pass_ulang) {
                echo "Password Baru tidak sesuai, ULANGI";
            } else {
               
                $editpass1 = "UPDATE users SET password='$pass_baru' where id_user=$id_user";
                $editpass2 = mysqli_query($konek,$editpass1);
                echo "PASSWORD berhasil dirubah";
            }
        }
    } elseif (isset($_POST['btn-keluar'])) {
        header('location:index.php');
    }
?>