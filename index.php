<?php
  session_start();
  require_once 'config/koneksi.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <?php include 'tg1_title.php'; ?>
  </head>
  <body>
     <!-- main -->
    <?php include 'tg1_main.php'; ?>
    <?php include 'konten.php'; ?>
    <!-- awal slider1 -->
    
    <?php include 'tg1_footer1.php'; ?> 
    <!-- section footer1 -->
    <?php include 'tg1_footer2.php'; ?> 
    <!-- </!--div>   -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
  </body>
</html>