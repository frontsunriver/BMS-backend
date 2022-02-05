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
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo ASSET_URL;?>styles/app.skins.css"/>
    <!-- endbuild -->
  </head>
  <body>

    <div class="app no-padding no-footer layout-static">
      <div class="session-panel">
        <div class="session">
          <div class="session-content">
            <div class="card card-block form-layout">
              <form role="form" method="POST" id="register" action="<?php echo SITE_URL?>/admin/user/signup_action">
                <div class="text-xs-center m-b-3">
                  <img src="images/logo-icon.png" height="80" alt="" class="m-b-1"/>
                  <h5>
                    Register now!
                  </h5>
                  <p class="text-muted">
                    Create an app id to continue.
                  </p>
                </div>
                <fieldset class="form-group">
                  <label for="email">
                    Email address
                  </label>
                  <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="email address" required/>
                </fieldset>
                <fieldset class="form-group">
                  <label for="password">
                    Password
                  </label>
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="password" required/>
                </fieldset>
                <fieldset class="form-group">
                  <label for="cpassword">
                    Confirm password
                  </label>
                  <input type="password" class="form-control form-control-lg" id="cpassword" placeholder="confirm password" equalto="#password" required/>
                </fieldset>
                <button class="btn btn-primary btn-block btn-lg signup" type="submit">
                  Create your account
                </button>
                <div class="divider">
                  <span>
                    OR
                  </span>
                </div>
                <div class="text-xs-center">
                  <p>
                    Signup with your social account
                  </p>
                  <button href="javascript:;" class="btn btn-icon-icon btn-facebook btn-lg m-b-1 m-r-1">
                    <i class="fa fa-facebook">
                    </i>
                  </button>
                  <button href="javascript:;" class="btn btn-icon-icon btn-github btn-lg m-b-1 m-r-1">
                    <i class="fa fa-github">
                    </i>
                  </button>
                  <button href="javascript:;" class="btn btn-icon-icon btn-google btn-lg m-b-1 m-r-1">
                    <i class="fa fa-google-plus">
                    </i>
                  </button>
                  <button href="javascript:;" class="btn btn-icon-icon btn-linkedin btn-lg m-b-1 m-r-1">
                    <i class="fa fa-linkedin">
                    </i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          <footer class="text-xs-center p-y-1">
            <p>
              
              <a href="<?php echo BASE_URL?>/admin/user/signin">
                Log in instead
              </a>
            </p>
          </footer>
        </div>
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
    <script src="<?php echo ASSET_URL;?>vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo ASSET_URL;?>vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo ASSET_URL;?>vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="<?php echo ASSET_URL;?>scripts/helpers/noty-defaults.js"></script>
    <script src="<?php echo ASSET_URL;?>scripts/constants.js"></script>
    <script src="<?php echo ASSET_URL;?>scripts/main.js"></script>
    <!-- endbuild -->

    <!-- page scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <?php foreach($add_scripts as $script) {?>
      <script src="<?php echo ASSET_URL.$script?>"></script>
    <?php }?>
    <script type="text/javascript">
      var base_url = "<?php echo BASE_URL?>";
      var site_url = "<?php echo SITE_URL?>";
    </script>
    <!-- end initialize page scripts -->
  </body>
</html>
