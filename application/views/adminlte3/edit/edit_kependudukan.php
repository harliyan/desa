die(var_dump($data->id_desa));
<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
      -->
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">

      </nav>
      <!-- End Navbar -->
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <section class="content">

              <?php 
              foreach ($tb_kependudukan as $data)
                : ?>

                <a class="navbar-brand" href="#pablo"><b>Ubah Data Kependudukan</b></a>
                <div class="card-body">
                  <div class="tab-content">
                    <form class="form-horizontal" action="<?php echo site_url(). '/admin/kependudukan/update_kependudukan'; ?>" role="form" method="post"> 
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">

                       <a class="navbar-brand" href="#pablo" style="color: #1d1124"><b>ID Desa</b></a>
                       <input type="text" class="form-control" name="id_desa" placeholder="ID Desa" value="<?php echo $data->id_desa ?>" readonly>
                       <br>
                       <a class="navbar-brand" href="#pablo" style="color: #1d1124"><b>Jumlah Laki - laki</b></a>
                       <input type="text" class="form-control" name="laki_laki" placeholder="Jumlah Laki - laki" value="<?php echo $data->laki_laki ?>" required>
                       <br>
                       <a class="navbar-brand" href="#pablo" style="color: #1d1124"><b>Jumlah Perempuan</b></a>
                       <input type="text" class="form-control" name="perempuan" placeholder="Jumlah Perempuan" value="<?php echo $data->perempuan ?>" required>
                       <br>
                      <a class="navbar-brand" href="#pablo" style="color: #1d1124"><b>Tahun</b></a>
                       <input type="text" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $data->tahun ?>" required>
                       <br>
                   
                       <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                       <a class="btn btn-danger" href="<?php echo base_url() ?>admin/admin_wilayah">Batal</a>
                     </form>
                   <?php endforeach ?>
                 </section>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
