<?php
    // memmulai sesion karena tidak terhubung dengan sesion config sebelumnya
    session_start();
    // ob_start();
    require_once '../config/koneksi.php';

    if (isset($_SESSION['username'])) {
        echo "Selamat Datang ".$_SESSION['username']."<br>";
        echo "<a href='logout.php'>Logout</a>";
        echo "<hr>";
        include "data_user.php";
      
    } else {
        header('location:/practice/index.php');

    }
    

    