<?php
function bbpuos_settings_page() {
    global $bbpuos_options;
    ?>
    <div class="wrap">
        <div id="upb-wrap" class="upb-help">
            <h2><?php _e('bbp user online status Settings', 'bbp-user-online-status'); ?></h2>
            <?php
            if (!isset($_REQUEST['updated']))
                $_REQUEST['updated'] = false;
            ?>
            <?php if (false !== $_REQUEST['updated']) : ?>
                <div class="updated fade"><p><strong><?php _e('Options saved', 'bbp-user-online-status'); ?> );
                            ?></strong></p></div>
            <?php endif; ?>
            <form method="post" action="options.php">
                <?php settings_fields('bbpuos_settings_group'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th colspan="2"><font size="2" color="grey">This plugin allows you to show user's online/offline status in bbpress topics/replies.
                    </tr>
                    <tr valign="top">
                        <th><?php _e('Activate', 'bbp-user-online-status'); ?></th>
                        <td>
                            <?php activate_bbp_user_online_status(); ?>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary"
                           value="<?php _e('Save Options', 'bbp-user-online-status'); ?>"/>
                </p>
            </form>
        </div>
    </div>

<?php
}

function bbpuos_register_settings() {
    register_setting('bbpuos_settings_group', 'bbpuos_settings');
}

add_action('admin_init', 'bbpuos_register_settings');
add_action('admin_menu', 'bbpuos_settings_menu');
function bbpuos_settings_menu() {
    add_submenu_page('options-general.php', __('bbp user online status', 'bbp-user-online-status'), __('bbp user online status', 'bbp-user-online-status'), 'manage_options', 'bbp-user-online-status-settings', 'bbpuos_settings_page');
}

function activate_bbp_user_online_status() {
    global $bbpuos_options;
    $activate = $bbpuos_options['activate'];
    echo '<input name="bbpuos_settings[activate]" id="bbpuos_settings[activate]" type="checkbox" value="1" class="code" ' . checked(1, $activate, false) . ' /> Adds this item to bbpress topics/replies';
}