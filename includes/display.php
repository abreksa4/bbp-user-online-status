<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/2015
 * Time: 9:58 PM
 */
add_action('wp', 'update_online_users_status');
function update_online_users_status() {

    if (is_user_logged_in()) {

        // get the online users list
        if (($logged_in_users = get_transient('users_online')) === false) $logged_in_users = array();

        $current_user = wp_get_current_user();
        $current_user = $current_user->ID;
        $current_time = current_time('timestamp');

        if (!isset($logged_in_users[$current_user]) || ($logged_in_users[$current_user] < ($current_time - (15 * 60)))) {
            $logged_in_users[$current_user] = $current_time;
            set_transient('users_online', $logged_in_users, 30 * 60);
        }

    }
}

function is_user_online($user_id) {

    // get the online users list
    $logged_in_users = get_transient('users_online');

    // online, if (s)he is in the list and last activity was less than 15 minutes ago
    return isset($logged_in_users[$user_id]) && ($logged_in_users[$user_id] > (current_time('timestamp') - (15 * 60)));
}

add_action('bbp_theme_after_reply_author_details', 'bbp_user_online_status');
function bbp_user_online_status() //This function adds the item and label if required to the author section of topics/replies

{
    global $bbpuos_options;

    echo '<ul>';
    $user_id = bbp_get_reply_author_id($reply_id);

    //show item1 if activated & show on topics
    if ($bbpuos_options['activate'] == true) {
        echo '<li>';
        //show label if required
        /*
        if (get_user_meta($user_id, 'bbp-uos-loggedin', true)) {
            echo "Online";
        } else {
            echo "Offline";
        }
        */
        if (is_user_online($user_id)) {
            echo "Online";
        } else {
            echo "Offline";
        }
        echo '</li>';
    }

}

/*
add_action('wp_logout', array(&$this, 'set_user_logged_out'));
function set_user_logged_out() {
    global $current_user;
    get_currentuserinfo();

    if (update_user_meta($current_user->ID, 'bbp-uos-loggedin', false)) return $user;
    elseif (add_user_meta($current_user->ID, 'bbp-uos-loggedin', false)) return $user;
    else return $user;
}

add_action('wp_login', array(&$this, 'set_user_logged_in'));
function set_user_logged_in($user) {
    $u = get_user_by('login', $user);

    if (update_user_meta($u->ID, 'bbp-uos-loggedin', true)) return $user;
    elseif (add_user_meta($u->ID, 'bbp-uos-loggedin', true)) return $user;

    return $user;
}
*/