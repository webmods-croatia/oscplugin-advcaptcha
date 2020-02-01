<?php
/* Developed by WEBmods
 * Zagorski oglasnik j.d.o.o. za usluge | www.zagorski-oglasnik.com
 *
 * License: GPL-3.0-or-later
 * More info in license.txt
*/

/*
Plugin Name: Advanced CAPTCHA
Plugin URI: https://www.zagorski-oglasnik.com/
Description: Your number one solution for CAPTCHA straight from WEBmods workshop. reCAPTCHA V3, math, text and Q&A CAPTCHA for login, register, contact and add comment pages.
Version: 1.0.0
Author: WEBmods by Zagorski Oglasnik jdoo
Author URI: https://www.zagorski-oglasnik.com/
Short Name: zo_advancedcaptcha
Plugin update URI: advcaptcha
*/

define('ADVCAPTCHA_PATH', dirname(__FILE__) . '/' );
define('ADVCAPTCHA_FOLDER', osc_plugin_folder(__FILE__) . '/' );
define('ADVCAPTCHA_REQUIRED', false);

require_once ADVCAPTCHA_PATH.'oc-load.php';

function advcaptcha_install() {
    foreach(advcaptcha_positions() as $id => $pos) {
        osc_set_preference('show_'.$id, '', 'plugin_advcaptcha');
    }
    
    osc_set_preference('recaptcha_site_key', '', 'plugin_advcaptcha');
    osc_set_preference('recaptcha_secret_key', '', 'plugin_advcaptcha');
}
osc_register_plugin(osc_plugin_path(__FILE__), 'advcaptcha_install');

function advcaptcha_uninstall() {
    Preference::newInstance()->delete(array('s_section' => 'plugin_advcaptcha'));
}
osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', 'advcaptcha_uninstall');

function advcaptcha_configuration() {
    osc_redirect_to(osc_route_admin_url('advancedcaptcha'));
}
osc_add_hook(osc_plugin_path(__FILE__).'_configure', 'advcaptcha_configuration');
