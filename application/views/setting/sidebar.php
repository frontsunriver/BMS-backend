<div class="flexbox-xs layout-column-xs contacts-list b-r">
    <div class="flex-xs scroll-y">
        <a href="<?php echo BASE_URL?>/admin/setting" class="column-equal setting_sub_menu <?php echo $sub_menu == 'building' ? 'active' : ''; ?>">
            <div class="col v-align-middle contact-details p-l-1">
                <span class="small">Manage Building</span>
            </div>
        </a>
        <a href="<?php echo BASE_URL?>/admin/setting/owner" class="column-equal setting_sub_menu <?php echo $sub_menu == 'owner' ? 'active' : ''; ?>">
            <div class="col v-align-middle contact-details p-l-1">
                <span class="small">Manage Owner</span>
            </div>
        </a>
        <a href="<?php echo BASE_URL?>/admin/setting/manager" class="column-equal setting_sub_menu <?php echo $sub_menu == 'manager' ? 'active' : ''; ?>">
            <div class="col v-align-middle contact-details p-l-1">
                <span class="small">Manage Association Manager</span>
            </div>
        </a>
    </div>
</div>