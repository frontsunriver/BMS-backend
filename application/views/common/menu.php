<!--sidebar panel-->
<div class="sidebar-panel">
  <!-- main navigation -->
  <nav>
    <div style="padding: 0px 30px;">
    <a href="<?php echo BASE_URL?>/admin/dashboard"><p class="nav-title <?php echo $menu_item == 'dashboard' ? 'active' : ''; ?>"><i class="fas fa-home" style="font-size: 45px; margin-right: 10px"></i><span>Dashboard</span></p></a>
    </div>
    <?php if($user_info['role'] == 2) {?>
    <div class="col-md-6" style="margin-top:50px">
      <ul class="nav">
        <li>
          <a href="<?php echo BASE_URL?>/admin/request/pendingRequest" class="menu_item <?php echo $menu_item == 'pending' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-user-edit" style="font-size: 45px;"></i>
              <p>Pending Requests</p>
            </div>
          </a>
        </li>
        <li>
          <a href="<?php echo BASE_URL?>/admin/visit/visitentry" class="menu_item <?php echo $menu_item == 'view_entry' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-pencil-alt" style="font-size: 45px;"></i>
              <p>Visit Entry</p>
            </div>
          </a>
        </li>
        <li>
          <a href="<?php echo BASE_URL?>/admin/issue/repairRequest" class="menu_item <?php echo $menu_item == 'issue' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-file-import" style="font-size: 45px;"></i>
              <p>Repair Request</p>
            </div>
          </a>
        </li>
        <!-- <li>
          <a href="index.html" class="menu_item" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="material-icons">attach_money</i>
              <p>Board Member</p>
            </div>
          </a>
        </li> -->
      </ul>
    </div>
    <div class="col-md-6" style="margin-top:50px">
      <ul class="nav">
        <li>
          <a href="<?php echo BASE_URL?>/admin/request/archivedRequest" class="menu_item <?php echo $menu_item == 'archived' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-check-double" style="font-size: 45px;"></i>
              <p>Archived Requests</p>
            </div>
          </a>
        </li>
        <li>
          <a href="<?php echo BASE_URL?>/admin/message" class="menu_item <?php echo $menu_item == 'message' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-envelope" style="font-size: 45px;"></i>
              <p>Messages</p>
            </div>
          </a>
        </li>
        <li>
          <a href="<?php echo BASE_URL?>/admin/setting" class="menu_item <?php echo $menu_item == 'setting' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fa fa-cogs" style="font-size: 45px;"></i>
              <p>Settings</p>
            </div>
          </a>
        </li>
      </ul>
    </div>
    <?php } else { ?>
      <div class="col-md-6" style="margin-top:50px">
      <ul class="nav">
        <li>
          <a href="<?php echo BASE_URL?>/admin/visit/visitentry" class="menu_item <?php echo $menu_item == 'view_entry' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-pencil-alt" style="font-size: 45px;"></i>
              <p>Visit Entry</p>
            </div>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-md-6" style="margin-top:50px">
      <ul class="nav">
        <li>
          <a href="<?php echo BASE_URL?>/admin/request/archivedRequest" class="menu_item <?php echo $menu_item == 'archived' ? 'active' : ''; ?>" style="padding: 0px; margin-top: 50px;">
            <div style="text-align: center; padding-top: 10px;">
              <i class="fas fa-check-double" style="font-size: 45px;"></i>
              <p>Archived Requests</p>
            </div>
          </a>
        </li>
      </ul>
    </div>
    <?php }?>
  </nav>
</div>