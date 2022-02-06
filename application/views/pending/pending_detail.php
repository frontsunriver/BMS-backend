<div class="content-view">
  <div class="layout-xs contacts-container">
    <div class="flexbox-xs layout-column-xs contact-view">
      <div class="flex-xs scroll-y p-a-3">
        <div class="column-equal m-b-2">
          <div class="col" style="width:150px;">
            <a href="<?php echo BASE_URL?>/admin/request/pendingRequest"><i class="fas fa-arrow-left" style="font-size: 30px;"></i></a>
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
        <div style="border-top: 1px solid #e2e2e2;"></div>
        <form class="collapse" id="collapseExample" action="<?php echo BASE_URL?>/admin/request/reject" method="POST">
          <div class="column-equal m-t-2 " style="width: 500px;">
            <input type="hidden" id="id" name="id" value="<?php echo $list[0]['id']?>">
            <textarea class="form-control" name="reply"></textarea>
            <input type="hidden" id="status" name="status" value="3">
            <button class="btn btn-primary m-t-1 pull-right" type="submit">Submit</button>
          </div>  
        </form>
        <div class="m-t-2">
          <a class="btn btn-primary" href="javascript: approved(<?php echo $list[0]['id']?>)">
            APPROVED
          </a>
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            REJECT
          </a>
        </div>
        <form id="approve_form" action="<?php echo BASE_URL?>/admin/request/approve" method="POST" >
          <input type="hidden" id="id" name="id" value="<?php echo $list[0]['id']?>">
          <input type="hidden" id="status" name="status" value="2">
        </form>
      </div>
    </div>
  </div>
</div>