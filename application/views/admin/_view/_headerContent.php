      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
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
          <!-- <div class="row mb-2">
            <div class="col">
              <div class="alert alert-info alert-dismissible fadeOut show" role="alert">
                <h4 class="alert-heading">Hai, <?php echo $this->userdata->username ?>!</h4>
                <p> Total jumlah DTW dan Amenitas pada <?php echo (new \DateTime())->format('d M Y'); ?> adalah <?php echo array_sum($jumlah_amenitas + $jumlah_dtw) ?></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div> -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <!-- /.content-header -->