<div class="container-fluid">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="?halaman=users">Users</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="?halaman=lowongan">Lowongan</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
            </li>
         </ul>

      </div>
      <span class="float-right">
         <a href="?halaman=profile">
            <i class="fa fa-user-alt-slash fa-10x"></i>
            Welcome, <?= $_SESSION['username'] ?>
         </a>
      </span>
   </nav>
</div>