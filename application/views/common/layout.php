<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Milestone">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Milestone">

    <meta name="theme-color" content="#4C7FF0">
    
    <title><?php echo $page_title?></title>

    <!-- page stylesheets -->
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css"/>
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>styles/app.skins.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>styles/custom.css"/>
    <!-- endbuild -->
  </head>
  <body>
    <div class="wrapper">
      <?php $this->load->view($header);?>
      <div class="app">
        <?php $this->load->view($menu);?>
        <!-- content panel -->
        <div class="main-panel">
          <!-- main area -->
          <div class="main-content">
            <?php $this->load->view($main);?>
            <?php $this->load->view($footer);?>
          </div>
          <!-- /main area -->
        </div>
        <!-- /content panel -->
      </div>
    </div>
    <script type="text/javascript">
      window.paceOptions = {
        document: true,
        eventLag: true,
        restartOnPushState: true,
        restartOnRequestAfter: true,
        ajax: {
          trackMethods: [ 'POST','GET']
        }
      };
    </script>

    <!-- build:js({.tmp,app}) scripts/app.min.js -->
    <script src="<?php echo ASSET_URL;?>vendor/jquery/dist/jquery.js"></script>
    <script src="<?php echo ASSET_URL;?>vendor/pace/pace.js"></script>
    <script src="<?php echo ASSET_URL;?>vendor/tether/dist/js/tether.js"></script>
    <script src="<?php echo ASSET_URL;?>vendor/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo ASSET_URL;?>vendor/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo ASSET_URL;?>scripts/constants.js"></script>
    <script src="<?php echo ASSET_URL;?>scripts/main.js"></script>
    <script src="<?php echo ASSET_URL;?>scripts/jquery.form.js"></script>
    <!-- endbuild -->

    <!-- page scripts -->
    <?php foreach($add_plugins as $plugin) {?>
      <script src="<?php echo ASSET_URL.$plugin?>"></script>
    <?php }?>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <?php foreach($add_scripts as $script) {?>
      <script src="<?php echo ASSET_URL.$script?>"></script>
    <?php }?>
    <!-- end initialize page scripts -->
    <script type="text/javascript">
      var base_url = "<?php echo base_url()?>";
      var site_url = "<?php echo site_url()?>";
    </script>
  </body>
</html>
