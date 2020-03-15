<?php
session_start();
require_once '../config/koneksi.php';
    if (isset($_POST['btsave'])) {
        $edt_id         = $_POST['id_profil'];
        $edt_nmdepan    = $_POST['nmdepan'];
        $edt_nmbelakang = $_POST['nmbelakang'];
        $edt_tgl        = $_POST['tgl_lahir'];
        $edt_jk         = $_POST['jk'];
        $edt_alamat     = $_POST['alamat'];
        $edt_kontak     = $_POST['kontak'];
        $sqledit = "UPDATE profil set nama_depan = '$edt_nmdepan',nama_belakang = '$edt_nmbelakang',tgl_lahir = '$edt_tgl',jk = '$edt_jk',alamat = '$edt_alamat',kontak = '$edt_kontak' where id_profil = '$edt_id'";
        $profquery = mysqli_query($konek,$sqledit);

        if ($profquery) {
            // echo "Data Berhasil di Update";
            header('location:index.php');
        }else {
            echo "Terjadi Kesalahan".mysqli_error();
        }
    } else if (isset($_POST['bt-cancel'])) {
        header('location:index.php');
    }
?>
