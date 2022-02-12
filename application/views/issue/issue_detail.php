<div class="content-view">
  <div class="layout-xs contacts-container">
    <div class="flexbox-xs layout-column-xs contact-view">
      <div class="col">
        <a href="<?php echo BASE_URL?>/admin/issue/repairRequest" style="float: left;"><i class="fas fa-arrow-left" style="font-size: 30px;"></i></a>
          <?php if(count($list) > 0) {?>
          <div class="card card-block" style="margin-left:50px">
            <span><?php echo $list[0]['content'] ?><br>
          </div>
          <?php }?>
      </div>

      <div class="flex-xs scroll-y p-a-3 message-content">
        <?php if(count($list) > 0) {?>
          <?php foreach ($list as $item) {
            if ($item['user_id'] == $userid) {?>
              <div class="my-message">
                <div class="chat">
                  <div class="profile-timeline-user-details">
                      <p><?php echo $item['first_name'].' '.$item['last_name']?></p>
                  </div>
                  <p>
                    <?php echo $item['content']?>
                  </p>
                  <p class="date pull-right"><?php echo $item['submit_date']?></p>
                </div>
              </div>
            <?php }else{?>
              <div class="other-message">
                <div class="chat">
                  <p>
                    <?php echo $item['content']?>
                  </p>
                  <p class="date pull-right"><?php echo $item['submit_date']?></p>
                </div>
              </div>
            <?php }
          }?>
        <?php }?>
      </div>
      <?php if($user_info['role'] == 2) { ?>
        <div style="display: flex; justify-content: center; padding: 20px;">
            <input type="text" class="form-control" id="send_notify_input">
            <input type="hidden" name="notify_id" id="notify_id" value="<?php echo $notify_id?>" />
            <a href="javascript: send_notify();" class="btn btn-default"><i class="material-icons notify-send-icon" aria-hidden="true">send</i></a>
        </div>
      <?php }?>
  </div>
</div>