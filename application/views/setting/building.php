<style type="text/css">
    .x-panel-header-default {
        background-color: #50647b;
        border: 1px solid #50647b;
    }
    .x-panel-body-default {
        border-color: #50647b;
    }
</style>
<div class="content-view">
    <div class="layout-xs contacts-container">
        <?php $this->load->view('setting/sidebar');?>
        <div class="flexbox-xs layout-column-xs contact-view">
            <div id="javascriptrender" style="margin-left: 15px;"></div>
        </div>
    </div>
</div>
<script>
    var role = "<?php echo $user_info['role']?>";
</script>