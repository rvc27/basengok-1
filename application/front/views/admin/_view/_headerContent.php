      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <?php if (($this->userdata->nama_role == 'Mahasiswa') && ($judul == 'Beranda')) : ?>
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo @$judul; ?></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url(); ?>home">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo @$judul; ?></li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
              <div class="col">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <h4 class="alert-heading">Well done!</h4>
                  <p> Hai, <?php echo $this->userdata->username ?>! Pada semester ini kamu dapat mengambil mata kuliah dengan total bobot <strong><?php echo $jkrs ?> SKS </strong> dengan syarat sebagai berikut: </p>
                  <div class="row">
                    <div class="col">
                      <p>
                        1. blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla<br>
                        1. blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla<br>
                      </p>
                    </div>
                    <div class="col">
                      <p>
                        1. blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla<br>
                        1. blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla<br>
                      </p>
                    </div>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div><!-- /.row -->

          <?php else : ?>
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo @$judul; ?></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url(); ?>home">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo @$judul; ?></li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->

          <?php endif; ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <!-- /.content-header -->