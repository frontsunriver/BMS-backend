<div class="header">
  <!-- top header -->
  <nav class="header navbar">
    <div class="header-inner">
      <a class="navbar-item navbar-spacer-right navbar-heading hidden-md-down app-logo" href="#">
        <span>Smartoa</span>
      </a>
    </div>
  </nav>
  <div class="dropdown">
    <button type="button" class="btn dropdown-toggle header-user-drop" data-toggle="dropdown">
      Hi <?php echo $user_info['first_name']?>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo BASE_URL?>/admin/user/sign_out">Sign out</a>
    </div>
  </div>
  <!-- /top header -->
</div>