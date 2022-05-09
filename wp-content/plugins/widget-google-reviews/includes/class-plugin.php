<?php

namespace WP_Rplg_Google_Reviews\Includes;

use WP_Rplg_Google_Reviews\Includes\Admin\Admin_Menu;
use WP_Rplg_Google_Reviews\Includes\Admin\Admin_Tophead;
use WP_Rplg_Google_Reviews\Includes\Admin\Admin_Notice;
use WP_Rplg_Google_Reviews\Includes\Admin\Admin_Feed_Columns;
use WP_Rplg_Google_Reviews\Includes\Admin\Admin_Rev;

use WP_Rplg_Google_Reviews\Includes\Core\Core;
use WP_Rplg_Google_Reviews\Includes\Core\Connect_Google;
use WP_Rplg_Google_Reviews\Includes\Core\Database;

final class Plugin {

    protected $name;
    protected $version;
    protected $activator;

    public function __construct() {
        $this->name = 'widget-google-reviews';
        $this->version = GRW_VERSION;
    }

    public function register() {
        register_activation_hook(GRW_PLUGIN_FILE, array($this, 'activate'));
        register_deactivation_hook(GRW_PLUGIN_FILE, array($this, 'deactivate'));

        add_action('plugins_loaded', array($this, 'register_services'));
    }

    public function register_services() {
        $this->init_language();

        $database = new Database();

        $activator = new Activator($database);
        $activator->register();

        $debug_info = new Debug_Info($activator);

        $assets = new Assets(GRW_ASSETS_URL, $this->version, get_option('grw_debug_mode') == '1');
        $assets->register();

        $post_types = new Post_Types();
        $post_types->register();

        $feed_deserializer = new Feed_Deserializer(new \WP_Query());

        $feed_page = new Feed_Page($feed_deserializer);
        $feed_page->register();

        $core = new Core();

        $view = new View();

        $builder_page = new Builder_Page($feed_deserializer, $core, $view);
        $builder_page->register();

        $feed_old = new Feed_Old();

        $feed_shortcode = new Feed_Shortcode($feed_deserializer, $assets, $core, $view, $feed_old);
        $feed_shortcode->register();

        Feed_Widget::$static_feed_deserializer = $feed_deserializer;
        Feed_Widget::$static_core              = $core;
        Feed_Widget::$static_view              = $view;
        Feed_Widget::$static_assets            = $assets;
        Feed_Widget::$static_feed_old          = $feed_old;
        add_action('widgets_init', function() {
            register_widget('WP_Rplg_Google_Reviews\Includes\Feed_Widget');
        });

        $connect_google = new Connect_Google();

        if (is_admin()) {
            $feed_serializer = new Feed_Serializer();
            $feed_serializer_ajax = new Feed_Serializer_Ajax($feed_deserializer, $core, $view);

            $admin_notice = new Admin_Notice();
            $admin_notice->register();

            $admin_menu = new Admin_Menu();
            $admin_menu->register();

            $admin_tophead = new Admin_Tophead();
            $admin_tophead->register();

            $admin_feed_columns = new Admin_Feed_Columns($feed_deserializer);
            $admin_feed_columns->register();

            $settings_save = new Settings_Save($activator);
            $settings_save->register();

            $plugin_settings = new Plugin_Settings($debug_info);
            $plugin_settings->register();

            $plugin_support = new Plugin_Support();
            $plugin_support->register();

            $admin_rev = new Admin_Rev();
            $admin_rev->register();
        }
    }

    public function init_language() {
        load_plugin_textdomain('widget-google-reviews', false, basename(dirname(GRW_PLUGIN_FILE)) . '/languages');
    }

    public function activate($network_wide = false) {
        $now = time();
        update_option('grw_activation_time', $now);

        add_option('grw_is_multisite', $network_wide);

        $activator = new Activator(new Database());
        $activator->activate();
    }

    public function deactivate() {
        $deactivator = new Deactivator();
        $deactivator->deactivate();
    }
}