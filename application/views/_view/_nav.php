    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <!--<li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Login/logout'); ?>" role="button">
            <i class="fa fa-power-off nav-icon"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- save state hamburger menu
    <script>
      /*Simpan cookie sidebar ke local storage*/

      $(document).ready(function() {
        /*
         check condition what value is stored in local storage if nothing then default 
         sidebar action would be performed you don't have to worry about this.
         In Admin lte version 3 sidebar-collapse added in body tag inspect you browser and check
        */
        if (window.localStorage.getItem('sidebar-toggle-collapsed') === 'false') {
          // if it is off sidebar-collapse close
          $("body").addClass("sidebar-collapse");
        } else {
          $("body").removeClass("sidebar-collapse");
        }

        // Perform click event action

        $("[data-widget='pushmenu']").click(function() {
          var buttonClickedValue = '';
          if (window.localStorage.getItem('sidebar-toggle-collapsed') === 'false') {
            buttonClickedValue = 'true';
          } else {
            buttonClickedValue = 'false';
          }

          // store value in local storage
          window.localStorage.setItem('sidebar-toggle-collapsed', buttonClickedValue);
        });

      });
    </script>
    -->