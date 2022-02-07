<div class="content-view">
  <div class="layout-xs contacts-container">
    <div class="flexbox-xs layout-column-xs contact-view">
      <div class="flex-xs scroll-y p-a-3">
        <div class="column-equal m-b-2">
          <div class="col" style="width:150px;">
            <a href="<?php echo BASE_URL?>/admin/request/archivedRequest"><i class="fas fa-arrow-left" style="font-size: 30px;"></i></a>
          </div>
          <div class="col v-align-middle p-l-2">
            <h1>
              <?php if($list[0]['move_type'] == 1) {
                echo '<b>NOC MOVE IN</b>';
              } else if($list[0]['move_type'] == 2) {
                echo '<b>NOC MOVE OUT</b>';
              } else{
                echo '<b>NOC MAINTENANCE</b>';
              }?>
            </h1>
          </div>
        </div>
        <?php if($list[0]['move_type'] == 2) { ?>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Request User</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['first_name']. ' '. $list[0]['first_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Building Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['building_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Unit Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['unit_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Date</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['move_date']); ?>
              </span>
            </div>
          </div>
        <?php } else if($list[0]['move_type'] == 1){ ?>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Request User</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['first_name']. ' '. $list[0]['first_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Building Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['building_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Unit Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['unit_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Date</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['move_date']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenant Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['tenants_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenant Email</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['tenants_email']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenant Mobile</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['tenants_mobile']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Owner passport</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['owner_passport'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Title Deed</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['title_deed'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenancy Contract</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['contract'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenancy Passport</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['tenants_passport'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenants Visa</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['tenants_visa'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Tenants Emirates ID</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['tenants_emirates_id'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
        <?php }else{ ?>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Request User</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['first_name']. ' '. $list[0]['first_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Building Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['building_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Unit Name</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['unit_name']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Content</span>
            </div>
            <div class="col p-l-2">
              <span>
                <?php echo ($list[0]['carried_content']); ?>
              </span>
            </div>
          </div>
          <div class="column-equal m-b-2">
            <div class="col p-l-2 text-xs-right" style="width:150px;">
              <span class="text-muted">Trade Licence</span>
            </div>
            <div class="col p-l-2">
              <a target="_blank" href="<?php echo (BASE_URL.'/'.$list[0]['trade_licence'])?>">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>