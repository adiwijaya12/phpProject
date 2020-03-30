<hr><hr><hr><hr><hr><hr>

<?php
    if (isset($_POST['submit-login'])) {
        $username = trim($_POST['username']);
        $email    = $_POST['email']; //ambil nilai inputan email
        $password = $_POST['password']; //ambil nilai inputan password    
        $pesan    = "Login Berhasil";

        $query = mysqli_query($konek,"SELECT * from users where username='$username'");
        $nilaiquery = mysqli_num_rows($query);//mencarnilai baris
        $nilaiarray_query = mysqli_fetch_assoc($query);
        if ($nilaiquery == TRUE) {
            if ($nilaiarray_query['status'] == 'Y') {
                if ($nilaiarray_query['email'] == $email) {
                    if ($nilaiarray_query['password'] == $password) {
                        $_SESSION['username']=$nilaiarray_query['username'];
                        $_SESSION['email']=$nilaiarray_query['email'];
                        $_SESSION['level']=$nilaiarray_query['level'];
                        $_SESSION['login_at']=$nilaiarray_query['login_at'];
                        $_SESSION['id_user']=$nilaiarray_query['id_user'];
                        if ($nilaiarray_query['level'] == 1) {
                            header ('location:admin/index.php');
                        } else if ($nilaiarray_query['level'] <> 1) {
                            header ('location:index.php');
                        }
                    } else {
                        echo 'Password Salah';
                    }
                } else {
                    echo 'Periksa Kembali Email Anda';
                }
            } else {
                echo 'Akun Anda Tidak Aktif';
            }
        } else {
            echo 'User belum Terdaftar';
        }
    
        
    }

?>

<!-- if ($nilaiquery == TRUE) {
            if ($nilaiarray_query['email'] <> $email ) {
                $pesan = "Periksa Kembali Email Anda";
                } elseif ($nilaiarray_query['password'] <> $password) {
                    $pesan = "Password Anda Salah";
            } else {
                // $_SESSION['datalogin']=[
                //     'username' => $nilaiarray_query['username'],
                //     'email'    => $nilaiarray_query['email'],
                //     'level'    => $nilaiarray_query['level'],
                //     'login_at' => $nilaiarray_query['login_at'],
                //     'id_user'  => $nilaiarray_query['id_user'],
                // ]
                $_SESSION['username']=$nilaiarray_query['username'];
                $_SESSION['email']=$nilaiarray_query['email'];
                $_SESSION['level']=$nilaiarray_query['level'];
                $_SESSION['login_at']=$nilaiarray_query['login_at'];
                $_SESSION['id_user']=$nilaiarray_query['id_user'];

                header('location:admin/index.php');
            }
         
        } else {
            $pesan = "User tidak ditemukan";
        }
        echo $pesan; -->