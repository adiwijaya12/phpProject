<?php
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';

switch ($halaman) {
   case '':
      include 'home.php';
      break;
   case 'profile':
      include 'profile.php';
      break;
   case 'password':
      include 'edit-password.php';
      break;
   case 'home':
      include 'home.php';
      break;
   case 'users':
      include 'data-users.php';
      break;
   case 'edit-user':
      include 'edit-users.php';
      break;
   case 'lowongan':
      include 'lowongan.php';
      break;
   case 'add-lowongan':
      include 'add-lowongan.php';
      break;
   default:
      include '404.php';
      break;
}