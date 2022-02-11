<div class="content-view">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"><i class="fas fa-hand-point-left"></i> </span>
              </span>
              <span><?php echo count($pending_noc_move_in)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Pending Noc Move In Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-eject"></i></span>
              </span>
              <span><?php echo count($rejected_noc_move_in)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Rejected Noc Move In Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"><i class="fas fa-check-double"></i> </span>
              </span>
              <span><?php echo count($approved_noc_move_in)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Approved Noc Move In Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-hand-point-right"></i></span>
              </span>
              <span><?php echo count($pending_noc_move_out)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Pending Noc Move Out Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-eject"></i></span>
              </span>
              <span><?php echo count($rejected_noc_move_out)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Rejected Noc Move Out Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-check-double"></i></span>
              </span>
              <span><?php echo count($approved_noc_move_out)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Approved Noc Move Out Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-truck-monster"></i></span>
              </span>
              <span><?php echo count($pending_noc_move_maintenance)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Pending Noc Move Maintenance Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-eject"></i></span>
              </span>
              <span><?php echo count($rejected_noc_move_maintenance)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Rejected Noc Move Maintenance Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-check-double"></i></span>
              </span>
              <span><?php echo count($approved_noc_move_maintenance)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Approved Noc Move Maintenance Request Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"> <i class="fas fa-box-tissue"></i></span>
              </span>
              <span><?php echo count($issues)?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Issues Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"><i class="fas fa-building"></i></span>
              </span>
              <span><?php echo ($building[0]['cnt'])?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Building Counts
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="card card-block" style="padding: 30px;">
            <h5 class="m-b-0 v-align-middle text-overflow">
              <span class="pull-xs-right">
                <span style="line-height: 24px;"><i class="fas fa-laptop-house"></i></span>
              </span>
              <span><?php echo ($unit[0]['cnt'])?></span>
            </h5>
            <div class="small text-overflow" style="margin-top: 30px;">
              Total Unit Counts
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>