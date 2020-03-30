<div class="container jarakatas">
   <div class="row ">
      <div class="col">
         <h4>Bergabunglah <b class="text-info">Bersama Kami <i class="fa fa-users"></i></b> </h4>
         <img class="line-1" src="./Assets/row1/Line 2.png" alt="">
         <div class="alert alert-primary" role="alert">
            <i class="fa fa-info-circle"></i> <a href="?page=register"><u>Registrasi</u></a> terlebih dahulu sebelum melanjutkan proses <i><b class="text-success">Apply</b></i>
            <i class="fa fa-info-circle"></i> <a href="?page=login">Login</a>
         </div>
         <div class="row">
            <div class="col-3">
               <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Reguler</a>
                  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Prohire</a>
                  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Beasiswa</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Campus Hiring</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-odp" role="tab" aria-controls="v-pills-settings" aria-selected="false">ODP</a>
               </div>
            </div>
           
           <!-- isi datfar lowongon kerja pada karier -->
            <div class="col-9">
               <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                     <h5>
                        <?php
                        $cari = mysqli_query($konek, "select * from lowongan where status_lowongan = 'active'") or die(mysqli_error($konek));
                        $data = mysqli_num_rows($cari);
                        ?>
                        <i class="fa fa-product-hunt"></i> Program Reguler
                        <small class="text-muted"><?= $data ?> available jobs for you !</small>
                     </h5>
                     <hr>
                     <ul class="list-unstyled">
                        <?php
                        $sql = "SELECT * FROM lowongan";
                        $query = mysqli_query($konek, $sql);
                        while ($data = mysqli_fetch_assoc($query)) :
                           if ($data['tgl_expired_lamaran'] < date("Y-m-d")) { ?>
                              <li class="media mt-4">
                                 <img src="upload/lowongan/<?= $data['foto_lowongan'] ?>" class="mr-3" alt="..." style="width: 20%">
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-1"><?= $data['lowongan'] ?></h5>
                                    <p class='text-justify font-weight-lighter mb-0 text-danger'>Expired : <?= date('d m Y', strtotime($data['tgl_expired_lamaran'])) ?> <i class="fa fa-warning text-warning"></i> </p>
                                    <p class="text-muted"><?= $data['lokasi_penempatan'] ?> · Benefit <?= $data['kisaran_gaji'] ?></p>
                                 </div>
                              </li>
                           <?php
                           } else { ?>
                              <li class="media mt-4">
                                 <img src="upload/lowongan/<?= $data['foto_lowongan'] ?>" class="mr-3" alt="..." style="width: 20%">
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-1"><?= $data['lowongan'] ?></h5>
                                    <p class='text-justify font-weight-lighter mb-0 text-success'>Expired : <?= date('d m Y', strtotime($data['tgl_expired_lamaran'])) ?> <i class="fa fa-warning text-warning"></i> </p>
                                    <p class="text-muted"><?= $data['lokasi_penempatan'] ?> · Benefit <?= $data['kisaran_gaji'] ?></p>
                                 </div>
                              </li>
                           <?php
                           }
                           ?>

                        <?php endwhile;
                        die; ?>
                     </ul>
                  </div>
                  <!--batas isi lowongan kerja pada form karier  -->
                  
                  
                  
                  
                  
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                     <h5>
                        <i class="fa fa-info"></i> Program Prohire
                        <small class="text-muted">Belum ada info yang terkait program prohire</small>
                     </h5>
                     <hr>
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                     <h5>
                        <i class="fa fa-info"></i> Program Beasiswa
                        <small class="text-muted">Belum ada info yang terkait program beasiswa</small>
                     </h5>
                     <hr>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                     <h5>
                        <i class="fa fa-info"></i> Program Campus Hiring
                        <small class="text-muted">Belum ada info yang terkait campus hiring</small>
                     </h5>
                     <hr>
                  </div>
                  <div class="tab-pane fade" id="v-pills-odp" role="tabpanel" aria-labelledby="v-pills-odp-tab">
                     <h5>
                        <i class="fa fa-info"></i> Program ODP
                        <small class="text-muted">Belum ada info yang terkait ODP</small>
                     </h5>
                     <hr>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


















