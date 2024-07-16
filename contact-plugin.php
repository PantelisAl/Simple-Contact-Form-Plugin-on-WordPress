<?php
/**
 * Plugin Name: Contact Plugin
 * Description: Contact Plugin
 * Author: Mr Alevras Pantelis
 * Version: 1.0.0
 * Text Domain: contact-plugin
 */

if (!defined('ABSPATH')) {
    die('You cannot be here');
}

if (!class_exists('ContactPlugin')) {

    class ContactPlugin {

        public function __construct() {
            $this->load_dependencies();
        }

        private function load_dependencies() {
            define('PLUGIN_PATH', plugin_dir_path(__FILE__));
            define('PLUGIN_URL', plugin_dir_url( __FILE__ ));

            $autoload_path = PLUGIN_PATH . 'vendor/autoload.php';
            if (file_exists($autoload_path)) {
                require_once $autoload_path;
            } else {
                error_log('Autoload file not found: ' . $autoload_path);
            }
        }

        public function initialize(){
            include_once(PLUGIN_PATH.'includes/utilities.php');
            include_once(PLUGIN_PATH.'includes/options-page.php');
            include_once(PLUGIN_PATH.'includes/contact-form.php');
        }


   }

    $contactPlugin =  new ContactPlugin();
    $contactPlugin->initialize();
}
