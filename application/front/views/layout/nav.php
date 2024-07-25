  <nav class="navbar navbar-expand-lg bg-white shadow-sm" aria-label="Navigation Bar">
    <div class="container">

      <a class="navbar-brand justify-center items-center" style=" float: none;" href="/home">
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="" width="32px">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-weight:600; font-size: 14px">
          <li class="nav-item">
            <a class="nav-link  
            <?php
            if ($_SERVER['REQUEST_URI'] === '/dtw') {
              echo $active;
            }
            ?>" href="dtw">Daya Tarik Wisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  
            <?php
            if ($_SERVER['REQUEST_URI'] === '/amenitas') {
              echo $active;
            }
            ?>" href="/amenitas">Amenitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  
            <?php
            if ($_SERVER['REQUEST_URI'] === '/pendukung') {
              echo $active;
            }
            ?>" href="/pendukung">Data Pendukung</a>
          </li>

        </ul>
        <a class="btn btn-primary btn-sm" <?php
                                          if ($_SERVER['REQUEST_URI'] === '/login') {
                                            echo $hidden;
                                          }
                                          ?> href="/login">Login</a>
      </div>
    </div>
  </nav>