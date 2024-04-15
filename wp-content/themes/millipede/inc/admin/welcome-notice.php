<?php

/**
 * file for holding dashboard welcome page for theme
 */
if (!function_exists('millipede_welcome_notice')) :
    function millipede_welcome_notice()
    {
        if (get_option('millipede_dashboard_dismissed_notice')) {
            return;
        }
        global $pagenow;
        $current_screen  = get_current_screen();

        if (is_admin()) {
            if ($current_screen->id !== 'dashboard' && $current_screen->id !== 'themes') {
                return;
            }
            if (is_network_admin()) {
                return;
            }
            if (!current_user_can('manage_options')) {
                return;
            }


?>
            <div class="millipede-admin-notice notice notice-info is-dismissible content-install-plugin theme-info-notice" id="millipede-dismiss-notice">
                <div class="info-content">
                    <h3><span class="theme-name"><span><?php echo __('Thank you for using Millipede. In order to complete the task correctly, kindly install and activate the recommended plugin.', 'millipede'); ?></span></h3>
                    <p class="notice-text"><?php echo __('TemplateGalaxy: Please install and activate TemplateGalaxy pluign from our website to use additional patterns, templates  and import demo with "one click demo import" feature.', 'millipede') ?></p>
                    <p class="notice-text"><?php echo __('Advanced Import: This is required only for the one-click demo import features and can be deleted once the demo is imported.', 'millipede') ?></p>
                    <a href="#" id="install-activate-button" class="button admin-button info-button"><?php echo __('Getting started with a single click', 'millipede'); ?></a>
                    <a href="<?php echo admin_url(); ?>themes.php?page=about-millipede" class="button admin-button info-button"><?php echo __('Explore Millipede', 'millipede'); ?></a>
                </div>


            </div>
    <?php
        }
    }
endif;
add_action('admin_notices', 'millipede_welcome_notice');
function millipede_dashboard_dismissble_notice()
{
    update_option('millipede_dashboard_dismissed_notice', 1);
}
add_action('wp_ajax_millipede_dashboard_dismissble_notice', 'millipede_dashboard_dismissble_notice');
add_action('wp_ajax_millipede_dismissble_notice', 'millipede_dismissble_notice');
// Hook into a custom action when the button is clicked
add_action('wp_ajax_millipede_install_and_activate_plugins', 'millipede_install_and_activate_plugins');
add_action('wp_ajax_nopriv_millipede_install_and_activate_plugins', 'millipede_install_and_activate_plugins');
add_action('wp_ajax_millipede_rplugin_activation', 'millipede_rplugin_activation');
add_action('wp_ajax_nopriv_millipede_rplugin_activation', 'millipede_rplugin_activation');

// Function to install and activate the plugins



function check_plugin_installed_status($pugin_slug, $plugin_file)
{
    return file_exists(ABSPATH . 'wp-content/plugins/' . $pugin_slug . '/' . $plugin_file) ? true : false;
}

/* Check if plugin is activated */


function check_plugin_active_status($pugin_slug, $plugin_file)
{
    return is_plugin_active($pugin_slug . '/' . $plugin_file) ? true : false;
}

require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/misc.php');
require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
function millipede_install_and_activate_plugins()
{
    // Define the plugins to be installed and activated
    $recommended_plugins = array(
        array(
            'slug' => 'templategalaxy',
            'file' => 'templategalaxy.php',
            'name' => 'TemplateGalaxy'
        ),
        array(
            'slug' => 'advanced-import',
            'file' => 'advanced-import.php',
            'name' => 'Advanced Imporrt'
        )
        // Add more plugins here as needed
    );

    // Include the necessary WordPress functions


    // Set up a transient to store the installation progress
    set_transient('install_and_activate_progress', array(), MINUTE_IN_SECONDS * 10);

    // Loop through each plugin
    foreach ($recommended_plugins as $plugin) {
        $plugin_slug = $plugin['slug'];
        $plugin_file = $plugin['file'];
        $plugin_name = $plugin['name'];

        // Check if the plugin is active
        if (is_plugin_active($plugin_slug . '/' . $plugin_file)) {
            update_install_and_activate_progress($plugin_name, 'Already Active');
            continue; // Skip to the next plugin
        }

        // Check if the plugin is installed but not active
        if (is_millipede_plugin_installed($plugin_slug . '/' . $plugin_file)) {
            $activate = activate_plugin($plugin_slug . '/' . $plugin_file);
            if (is_wp_error($activate)) {
                update_install_and_activate_progress($plugin_name, 'Error');
                continue; // Skip to the next plugin
            }
            update_install_and_activate_progress($plugin_name, 'Activated');
            continue; // Skip to the next plugin
        }

        // Plugin is not installed or activated, proceed with installation
        update_install_and_activate_progress($plugin_name, 'Installing');

        // Fetch plugin information
        $api = plugins_api('plugin_information', array(
            'slug' => $plugin_slug,
            'fields' => array('sections' => false),
        ));

        // Check if plugin information is fetched successfully
        if (is_wp_error($api)) {
            update_install_and_activate_progress($plugin_name, 'Error');
            continue; // Skip to the next plugin
        }

        // Set up the plugin upgrader
        $upgrader = new Plugin_Upgrader();
        $install = $upgrader->install($api->download_link);

        // Check if installation is successful
        if ($install) {
            // Activate the plugin
            $activate = activate_plugin($plugin_slug . '/' . $plugin_file);

            // Check if activation is successful
            if (is_wp_error($activate)) {
                update_install_and_activate_progress($plugin_name, 'Error');
                continue; // Skip to the next plugin
            }
            update_install_and_activate_progress($plugin_name, 'Activated');
        } else {
            update_install_and_activate_progress($plugin_name, 'Error');
        }
    }

    // Delete the progress transient
    $redirect_url = admin_url('themes.php?page=advanced-import');

    // Delete the progress transient
    delete_transient('install_and_activate_progress');
    // Return JSON response
    wp_send_json_success(array('redirect_url' => $redirect_url));
}

// Function to check if a plugin is installed but not active
function is_millipede_plugin_installed($plugin_slug)
{
    $plugins = get_plugins();
    return isset($plugins[$plugin_slug]);
}

// Function to update the installation and activation progress
function update_install_and_activate_progress($plugin_name, $status)
{
    $progress = get_transient('install_and_activate_progress');
    $progress[] = array(
        'plugin' => $plugin_name,
        'status' => $status,
    );
    set_transient('install_and_activate_progress', $progress, MINUTE_IN_SECONDS * 10);
}

function millipede_dashboard_menu()
{
    add_theme_page(esc_html__('About Millipede', 'millipede'), esc_html__('About Millipede', 'millipede'), 'edit_theme_options', 'about-millipede', 'millipede_theme_info_display');
}
add_action('admin_menu', 'millipede_dashboard_menu');
function millipede_theme_info_display()
{ ?>
    <div class="dashboard-about-millipede">
        <h1> <?php echo __('Welcome to Millipede- Full Site Editing WordPress Theme', 'millipede') ?></h1>
        <p><?php echo __('Millipede is a sleek and efficient Full Site Editing theme designed for those who value simplicity and speed. With a focus on speed optimization, this lightweight theme harnesses the power of the WordPress blocks editor to craft distinctive and visually captivating layouts. Ideal for blogs, small businesses, startups, law firms, and creative agencies alike, Millipede offers a seamless blend of minimalism and functionality, allowing users to create polished and engaging websites with ease. Explore more about Millipede at https://websiteinwp.com/millipede-free-wordpress-theme/', 'millipede') ?></p>
        <h3><span class="theme-name"><span><?php echo __('Recommended Plugins:', 'millipede'); ?></span></h3>
        <p class="notice-text"><?php echo __('TemplateGalaxy: Please install and activate TemplateGalaxy pluign from our website to use additional patterns, templates  and import demo with "one click demo import" feature.', 'millipede') ?></p>
        <p class="notice-text"><?php echo __('Advanced Import: This is required only for the one-click demo import features and can be deleted once the demo is imported.', 'millipede') ?></p>
        <a href="#" id="install-activate-button" class="installing-all-pluign button admin-button info-button"><?php echo __('Getting started with a single click', 'millipede'); ?></a>
        <h3 class="millipede-baisc-guideline-header"><?php echo __('Basic Theme Setup', 'millipede') ?></h3>
        <div class="millipede-baisc-guideline">
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Setup Header Layout:', 'millipede') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Patterns -> Template Parts -> Header:', 'millipede') ?></li>
                            <li> - <?php echo __('click on Header > Click on Edit (Icon) -> Add or Remove Requirend block/content as your requirement.:', 'millipede') ?></li>
                            <li> - <?php echo __('Click on save to update your layout', 'millipede') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Setup Footer Layout:', 'millipede') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Patterns -> Template Parts -> Footer:', 'millipede') ?></li>
                            <li> - <?php echo __('click on Footer > Click on Edit (Icon) > Add or Remove Requirend block/content as your requirement.:', 'millipede') ?></li>
                            <li> - <?php echo __('Click on save to update your layout', 'millipede') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Setup Templates like Homepage/404/Search/Page/Single and more templates Layout:', 'millipede') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Templates:', 'millipede') ?></li>
                            <li> - <?php echo __('click on Template(You need to edit/update) > Click on Edit (Icon) > Add or Remove Requirend block/content as your requirement.:', 'millipede') ?></li>
                            <li> - <?php echo __('Click on save to update your layout', 'millipede') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Restore/Reset Default Content layout of Template(Like: Frontpage/Blog/Archive etc.)', 'millipede') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Templates:', 'millipede') ?></li>
                            <li> - <?php echo __('Click on Manage all Templates', 'millipede') ?></li>
                            <li> - <?php echo __('Click on 3 Dots icon at right side of respective Template', 'millipede') ?></li>
                            <li> - <?php echo __('Click on Clear Customization', 'millipede') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Restore/Reset Default Content layout of Template Parts(Header/Footer/Sidebar)', 'millipede') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Patterns:', 'millipede') ?></li>
                            <li> - <?php echo __('Click on Manage All Template Parts', 'millipede') ?></li>
                            <li> - <?php echo __('Click on 3 Dots icon at right side of respective Template parts', 'millipede') ?></li>
                            <li> - <?php echo __('Click on Clear Customization', 'millipede') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="featured-list">
            <div class="half-col free-features">
                <h3><?php echo __('millipede Features (Free)', 'millipede') ?></h3>
                <ul>
                    <li> <strong>- <?php echo __('Base Templates Ready', 'millipede') ?></strong>
                        <ul>
                            <li> <?php echo __('404 Template', 'millipede') ?></li>
                            <li> <?php echo __('Archive Template', 'millipede') ?></li>
                            <li> <?php echo __('Blank Template', 'millipede') ?></li>
                            <li> <?php echo __('Front Page Template', 'millipede') ?></li>
                            <li> <?php echo __('Blog Home Template', 'millipede') ?></li>
                            <li> <?php echo __('Index Page Template', 'millipede') ?></li>
                            <li> <?php echo __('Search Template', 'millipede') ?></li>
                            <li> <?php echo __('Page Template', 'millipede') ?></li>

                        </ul>
                    <li>
                    <li><strong> - <?php echo __('9 Global Styles Variations', 'millipede') ?></strong></li>
                    <li><strong> - <?php echo __('Fully Customizable Header Layout', 'millipede') ?></strong></li>
                    <li> <strong>- <?php echo __('Fully Customizable Footer Layout', 'millipede') ?></strong></li>
                    <li><strong> - <?php echo __('Multiple Typography Option', 'millipede') ?></strong></li>
                    <li> <strong>- <?php echo __('Advanced Color Options', 'millipede') ?></strong></li>
                    <li> <strong>- <?php echo __('Grid Layout for Post Display', 'millipede') ?></strong></li>
                    <li> <strong>- <?php echo __('List Layout for Post Display', 'millipede') ?></strong></li>
                </ul>
            </div>
            <div class="half-col pro-features">
                <h3><?php echo __('Premium Version Offer', 'millipede') ?></h3>
                <ul>
                    <li><?php echo __('Slider Patterns', 'millipede') ?></li>
                    <li><?php echo __('Team Carousel Pattern', 'millipede') ?></li>
                    <li><?php echo __('Testimonial Carousel Pattern', 'millipede') ?></li>
                    <li><?php echo __('Post Carousel Patterns', 'millipede') ?></li>
                    <li><?php echo __('Social Share Icons display shortcode as Pattern', 'millipede') ?></li>
                    <li><?php echo __('Breadcrumb display shortcode as Pattern', 'millipede') ?></li>
                    <li><?php echo __('Related Posts display shortcode as Pattern', 'millipede') ?></li>
                    <li><?php echo __('Current Date display shortcode as Pattern', 'millipede') ?></li>
                    <li><?php echo __('Current Time display shortcode as Pattern', 'millipede') ?></li>
                </ul>
                <a href="https://websiteinwp.com/plan-and-pricing/" class="upgrade-btn button" target="_blank"><?php echo __('Upgrade to Pro', 'millipede') ?></a>
            </div>
        </div>
    </div>
<?php
}
