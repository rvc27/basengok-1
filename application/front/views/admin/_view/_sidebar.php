<style>
  .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #28a745;
    color: white;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="text-center mt-2">
      <img src="<?= base_url('assets'); ?>/uploads/images/logo.png" alt="User Image" class="img-fluid" alt="Responsive image" style="width:80%">
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

        <!-- Sidebar Menu for ADMIN -->
        <?php if ($this->userdata->id_role === 1) : ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>home" <?php if ($this->uri->segment(1) == "home") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">

            <a href="<?= base_url(); ?>akademik" <?php if ($this->uri->segment(1) == "akademik") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-home nav-icon"></i>
              <p>Akademik</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>fakultas" <?php if ($this->uri->segment(1) == "fakultas") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-book nav-icon"></i>
              <p>Fakultas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>prodi" <?php if ($this->uri->segment(1) == "prodi") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-book-reader nav-icon"></i>
              <p>Prodi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>dosen" <?php if ($this->uri->segment(1) == "dosen") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-user-alt nav-icon"></i>
              <p>Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>mahasiswa" <?php if ($this->uri->segment(1) == "mahasiswa") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-address-card nav-icon"></i>
              <p>Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>makul" <?php if ($this->uri->segment(1) == "makul") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-book-open nav-icon"></i>
              <p>Mata Kuliah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>role" <?php if ($this->uri->segment(1) == "role") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-bullseye nav-icon"></i>
              <p>Role</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>user" <?php if ($this->uri->segment(1) == "user") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-user-alt nav-icon"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Login/logout'); ?>" class="nav-link">
              <i class="fa fa-power-off nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>

          <!-- Sidebar Menu for BAA -->
        <?php elseif ($this->userdata->id_role === 2) : ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>home" <?php if ($this->uri->segment(1) == "home") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>akademik" <?php if ($this->uri->segment(1) == "akademik") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-home nav-icon"></i>
              <p>Akademik</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>fakultas" <?php if ($this->uri->segment(1) == "fakultas") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-book nav-icon"></i>
              <p>Fakultas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>prodi" <?php if ($this->uri->segment(1) == "prodi") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-book-reader nav-icon"></i>
              <p>Prodi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>mahasiswa" <?php if ($this->uri->segment(1) == "mahasiswa") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-address-card nav-icon"></i>
              <p>Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>makul" <?php if ($this->uri->segment(1) == "makul") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="fa fa-book-open nav-icon"></i>
              <p>Mata Kuliah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Login/logout'); ?>" class="nav-link">
              <i class="fa fa-power-off nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>

          <!-- Sidebar Menu for else -->
        <?php else : ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>home" <?php if ($this->uri->segment(1) == "home") {
                                                echo 'class="nav-link active"';
                                              } else {
                                                echo 'class="nav-link"';
                                              } ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>akademik" <?php if ($this->uri->segment(1) == "akademik") {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?>>
              <i class="fa fa-home nav-icon"></i>
              <p>Akademik</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>krs" <?php if ($this->uri->segment(1) == "krs") {
                                              echo 'class="nav-link active"';
                                            } else {
                                              echo 'class="nav-link"';
                                            } ?>>
              <i class="fa fa-book-open nav-icon"></i>
              <p>KRS</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Login/logout'); ?>" class="nav-link">
              <i class="fa fa-power-off nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>

        <?php endif; ?>
      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  function preloadImage(url) {
    var img = new Image("<?= base_url('assets'); ?>/uploads/images/logo.png");
    img.src = url;
  }
</script>