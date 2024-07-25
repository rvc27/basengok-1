  <nav class="navbar navbar-expand-lg bg-white shadow-sm" aria-label="Navigation Bar">
    <div class="container">

      <a class="navbar-brand justify-center items-center" style=" float: none;" href="<?php echo base_url() ?>">
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="" width="32px">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0" style="font-weight:600; font-size: 14px;">
          <li class="nav-item" style="padding-left: 30px; padding-right: 30px;">
            <a class="nav-link  
            <?php
            if ($_SERVER['REQUEST_URI'] === base_url()) {
              echo $active;
            }
            ?>" href="<?php echo base_url() ?>">Daya Tarik Wisata</a>
          </li>
          <li class="nav-item" style="padding-left: 30px; padding-right: 30px;">
            <a class="nav-link  
            <?php
            if ($_SERVER['REQUEST_URI'] === '/amenitas') {
              echo $active;
            }
            ?>" href="<?php echo base_url('/amenitas') ?>">Amenitas</a>
          </li>
          <li class="nav-item" style="padding-left: 30px; padding-right: 30px;">
            <a class="nav-link  
            <?php
            if ($_SERVER['REQUEST_URI'] === '/pendukung') {
              echo $active;
            }
            ?>" href="<?php echo base_url('/pendukung') ?>">Data Pendukung</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>