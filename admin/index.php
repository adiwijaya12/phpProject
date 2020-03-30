<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['username'])) {
   header('Location: ../');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Administrator</title>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>


<body>
   <?php include 'header.php' ?>

   <div class="container-fluid">
      <?php include 'content.php' ?>
   </div>


   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>