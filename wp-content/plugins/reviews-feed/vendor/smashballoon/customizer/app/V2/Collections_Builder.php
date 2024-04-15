<?php

namespace Smashballoon\Customizer\V2;

use Smashballoon\Stubs\Services\ServiceProvider;

/**
 * Class Customizer
 * Class to create
 *
 * @since 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Collections_Builder extends ServiceProvider {
    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = Container::getInstance()->get(self::class);
            return self::$instance;
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->current_plugin = apply_filters('sb_current_plugin', $this->current_plugin);
    }

    /**
     * Entry point
     *
     * @return void
     *
     * @since 1.0
     */
    public function register()
    {
        $add_to_menu = isset($this->add_to_menu) ? $this->add_to_menu : true;

        if (is_admin() && $add_to_menu) {
            add_action('admin_menu', [$this, 'register_menu']);
        }
    }

    /**
     * Register Menu
     *
     *
     * @since 1.0
     */
    public function register_menu()
    {
        $aboutus_builder = add_submenu_page(
            $this->menu['parent_menu_slug'],
            $this->menu['page_title'],
            $this->menu['menu_title'],
            'manage_options',
            $this->menu['menu_slug'],
            [$this, 'collections_page_output'],
            1
        );
        add_action('load-' . $aboutus_builder, [$this, 'collections_enqueue_admin_scripts']);
    }

    /**
     * Enqueue Builder CSS & Script.
     *
     * Loads only for builder pages
     *
     * @since 1.0
     */
    public function collections_enqueue_admin_scripts()
    {

        $collections_data = [
            'ajaxHandler' => admin_url('admin-ajax.php'),
            'adminPostURL' => admin_url('post.php'),
            'iconsList' => SB_Utils::get_icons(),
            'reactScreen' => 'collections'
        ];
        Feed_Builder::enqueue_date_i18n();


        $collections_js_file = SB_CUSTOMIZER_ASSETS . '/build/static/js/main.js';

        if (!SB_Utils::is_production()) {
            $collections_js_file = "http://localhost:3000/static/js/main.js";
        } else {
            wp_enqueue_style(
                'sb-customizer-style',
                SB_CUSTOMIZER_ASSETS . '/build/static/css/main.css',
                false,
                false
            );
        }

        $collections_data = array_merge($collections_data, $this->custom_collections_data()); //Data comming from the Actual plugin

        wp_enqueue_script(
            'sb-customizer-app',
            $collections_js_file,
            null,
            false,
            true
        );

        wp_localize_script(
            'sb-customizer-app',
            'sb_customizer',
            $collections_data
        );

        wp_enqueue_media();
    }

    public function custom_collections_data()
    {
        return [];
    }

    /**
     * Feed Customizer Output
     *
     * @return HTML
     *
     * @since 1.0
     */
    public function collections_page_output()
    {
    ?>
        <div id="sb-app" class="sb-fs"></div>
    <?php
    }

}