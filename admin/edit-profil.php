<form action="simpan-eprof.php" method="POST">
<table border="1">
    <caption>EDIT PROFIL</caption>
    <tr>
        <th style="text-align:left;">Id Profil</th>
        <td>:</td>
        <td>
            <input type="text" name="id_profil" value="<?=$editprof['id_profil'];?>" size="40" readonly>
            <!-- <td style="background-color:grey;" name="id_profil"><?=$editprof['id_profil']?></td> -->
        </td>
        
    </tr>
    <tr>
        <th style="text-align:left;">Nama Depan</th>
        <td>:</td>
        <td>
            <input type="text" name="nmdepan" value="<?=$editprof['nama_depan'];?>" size="40">
        </td>
    </tr>
    <tr>
        <th style="text-align:left;">Nama Belakang</th>
        <td>:</td>
        <td>
        <input type="text" name="nmbelakang" value="<?=$editprof['nama_belakang'];?>" size="40">
        </td>
    </tr>
    <tr>
        <th style="text-align:left;">Tgl Lahir</th>
        <td>:</td>
        <td>
            <input type="date" name="tgl_lahir" id="" value="<?= date($editprof['tgl_lahir']); ?>">
        </td>
    </tr>
    <tr>
        <th style="text-align:left;">Jenis Kelamin</th>
        <td>:</td>
        <td>
            <input type="radio" name="jk" id="" value="Pria" <?=$editprof['jk'] =='Pria' ? 'checked' :''; ?>>Pria
            <input type="radio" name="jk" id="" value="Wanita" <?=$editprof['jk'] =='Wanita' ? 'checked' :''; ?>>Wanita
        </td>
    </tr>
    <tr>
        <th style="text-align:left;">Alamat</th>
        <td>:</td>
        <td>
            <textarea name="alamat" id="" cols="38" rows="3"><?=$editprof['alamat'];?></textarea>
        </td>
    </tr>
    <tr>
        <th style="text-align:left;">No Kontak</th>
        <td>:</td>
        <td>
            <input type="text" name="kontak" id="" value=" <?=$editprof['kontak']?>" size="40">
        </td>
    </tr>
    <tr>
        <th style="text-align:left;">Foto</th>
        <td>:</td>
        <td style="background-color:grey;"><?=$editprof['foto']?></td>
    </tr>
    <tr>
        <th style="text-align:left;">Id User</th>
        <td>:</td>
        <td style="background-color:grey;"><?=$editprof['id_user']?></td>
    </tr>
    <tr>
        <td colspan="3">
            <!-- <input type="button" value="Simpan" name="btsave"> -->
            <button type="submit" name="btsave" id="btsave">Simpan</button>
            <button type="submit" name="bt-cancel">Keluar</button>
        </td>
      
    </tr>
</table>
</form>


<!-- <?php
    if (isset($_POST['btsave'])) {
        echo "succes";
        $edt_id         = $_POST['id_profil'];
        $edt_nmdepan    = $_POST['nmdepan'];
        $edt_nmbelakang = $_POST['nmbelakang'];
        $edt_tgl        = $_POST['tgl_lahir'];
        $edt_jk         = $_POST['jk'];
        $edt_alamat     = $_POST['alamat'];
        $edt_kontak     = $_POST['kontak'];
        $sqledit = "UPDATE profil set nama_depan = '$edt_nmdepan',nama_belakang = '$edt_nmbelakang',tgl_lahir = '$edt_tgl',jk = '$edt_jk',alamat = '$edt_alamat',kontak = '$edt_alamat' where id_profil = '$edt_id'";
        $profquery = mysqli_query($konek,$sqledit);

        if ($profquery) {
            echo "Data Berhasil di Update";
            // header('location:index.php');
        }else {
            echo "Terjadi Kesalahan".mysqli_error();
        }
    }
?> -->
