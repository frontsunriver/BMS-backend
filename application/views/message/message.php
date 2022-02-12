<div class="content-view">
  <div class="layout-xs contacts-container">
    <div class="flexbox-xs layout-column-xs contacts-list b-r">
      <div class="contact-header bg-default">
        <div class="contact-toolbar">
          <form class="form-inline" action="<?php echo BASE_URL?>/admin/message" method="POST">
            <input class="form-control" type="text" placeholder="Search" name="query" value="<?php echo $message_chanel;?>">
          </form>
        </div>
      </div>
      <div class="flex-xs scroll-y">
        <?php if(count($list) > 0) { 
          foreach ($list as $item) { ?>
            <a href="javascript:onChanelSelect('<?php echo $item['id']?>');" class="column-equal">
              <div class="col v-align-middle contact-details p-l-1">
                <span class="bold"><?php echo $item['title']?></span>
                <span class="small"><?php echo $item['first_name'].' '.$item['last_name']?></span>
                <span class="small pull-right"><?php echo $item['reg_date']?></span>
              </div>
            </a>
          <?php }
        }?>
        
      </div>
    </div>
    <div class="flexbox-xs layout-column-xs contact-view">
      <div class="flex-xs scroll-y p-a-3 message-content">
      </div>
    <?php if($user_info['role'] == 2) { ?>
      <div style="display: flex; justify-content: center; padding: 20px;">
          <input type="text" class="form-control" id="send_message_input">
          <input type="hidden" name="message_id" id="message_id" />
          <a href="javascript: send_message();" class="btn btn-default"><i class="material-icons message-send-icon" aria-hidden="true">send</i></a>
      </div>
    <?php }?>
  </div>
</div>
<script>
  var userid = "<?php echo $this->session->userdata(USER_INFO)['id'];?>";
</script>