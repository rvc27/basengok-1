<!DOCTYPE html>
<html>

<head>
  <title>AdminLTE 3 | <?php echo @$judul; ?></title>
  <link href='<?= base_url("assets/uploads/images/icon.png"); ?>' rel='shortcut icon' type='image/x-icon' />
  <!-- Tell the browser to be responsive to screen width -->
  <!-- meta -->
  <?php echo @$_meta; ?>

  <!-- css -->
  <?php echo @$_css; ?>

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url('assets'); ?>/vendor/plugins/jQuery/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- nav -->
    <?php echo @$_nav; ?>
    <!-- sidebar -->
    <?php echo @$_sidebar; ?>

    <!-- content -->
    <?php echo @$_content; ?>
    <!-- headerContent -->
    <!-- mainContent -->

    <!-- footer -->
    <?php echo @$_footer; ?>

    <div class="control-sidebar-bg"></div>
  </div>

  <!-- js -->
  <?php echo @$_js; ?>
</body>

</html>