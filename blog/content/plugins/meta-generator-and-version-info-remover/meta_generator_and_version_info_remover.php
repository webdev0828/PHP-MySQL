<?php
/*
Plugin Name: Meta Generator and Version Info Remover
Plugin URI: http://pankajgurudeb.blogspot.com/2013/04/meta-generator-and-version-info-remover.html
Description: This plugin will remove the version information that gets appended to enqueued style and script URLs. It will also remove the Meta Generator in the head and in RSS feeds. Adds a bit of obfuscation to hide the WordPress version number and generator tag that many sniffers detect automatically from view source. But always remember to keep your WordPress updated.
Text Domain: meta-generator-and-version-info-remover
Author: Pankaj Kumar Mondal
Author URI: http://pankajmondal.com
Tags: remove, version, generator, security, meta, appended version, css ver, js ver, meta generator, wpml, wpml generator,  wpml generator tag, slider revolution, slider revolution generator tag, visual composer, visual composer generator, page builder, page builder generator, optimized, yoast seo, yoast seo comments
Version: 5.0
License: GPLv2 or later.
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

class Meta_generator_and_version_info_remover {
    public $options;
    public function __construct() {
        $this->options = get_option('meta_generator_and_version_info_remover_options');
        $this->pkm_register_settings_and_fields();
    }

    public function pkm_add_menu_page() {
        add_options_page(__('Meta Generator and Version Info Remover', 'meta-generator-and-version-info-remover'), __('Meta Generator and Version Info Remover', 'meta-generator-and-version-info-remover'), 'administrator', __FILE__, array('Meta_generator_and_version_info_remover','pkm_display_options_page'));
    }

    public static function pkm_display_options_page() {
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2><?php _e('Meta Generator and Version Info Remover Settings', 'meta-generator-and-version-info-remover'); ?></h2>
            <p style="font-size: 16px; background: #f9d527; padding: 5px 25px; display: inline-block; font-weight: bold; border-radius: 20px;"><?php _e('Trusted since 2013', 'meta-generator-and-version-info-remover'); ?></p><img src="<?php echo plugins_url('icons/trust.png', __FILE__) ?>" alt="" />
            <form method="post" action="options.php">
                <?php 
                    settings_fields('meta_generator_and_version_info_remover_options');
                    do_settings_sections(__FILE__);
                ?>
                <div style="padding: 10px; border: 2px solid #ffafaf; display: inline-block; border-radius: 20px;">
                    <p style="font-size: 16px; background: #ffafaf; padding: 5px 25px; display: inline-block; font-weight: bold; border-radius: 20px;"><?php _e('Show some Love', 'meta-generator-and-version-info-remover'); ?></p> <img src="<?php echo plugins_url('icons/donate.png', __FILE__) ?>" alt="Donate" />
                    <!-- Rating link -->
                    <p>
                        <a style="text-decoration: none; font-size: 16px; font-weight: bold;" href="https://wordpress.org/plugins/meta-generator-and-version-info-remover/" target="_blank"><img src="<?php echo plugins_url('icons/star.png', __FILE__) ?>" alt="" /><img src="<?php echo plugins_url('icons/star.png', __FILE__) ?>" alt="" /><img src="<?php echo plugins_url('icons/star.png', __FILE__) ?>" alt="" /><img src="<?php echo plugins_url('icons/star.png', __FILE__) ?>" alt="" /><img src="<?php echo plugins_url('icons/star.png', __FILE__) ?>" alt="" /> <?php _e('Rate and review this plugin &gt;', 'meta-generator-and-version-info-remover') ?></a>
                    </p>
                    <!-- Donation link -->
                    <p>
                        <a style="text-decoration: none; font-size: 16px; font-weight: bold; display: flex; justify-content: center; align-items: center;" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=896L8TENMKZWS" target="_blank"><img src="<?php echo plugins_url('icons/paypal.png', __FILE__) ?>" alt="Donate" /> <?php _e('Support development of this plugin &gt;', 'meta-generator-and-version-info-remover') ?></a>
                    </p>
                    <p><?php _e('You can donate any amount you want', 'meta-generator-and-version-info-remover'); ?></p>
                </div>
                <p class="submit">
                    <input name="submit" type="submit" class="button-primary" value="<?php _e('Save changes', 'meta-generator-and-version-info-remover'); ?>" />
                </p>
            </form>
        </div>
        <?php
    }

    public function pkm_register_settings_and_fields() {
        register_setting('meta_generator_and_version_info_remover_options', 'meta_generator_and_version_info_remover_options');
        add_settings_section('pkm_meta_generator_remover_section', __('Meta Generator Remover Settings', 'meta-generator-and-version-info-remover'), array($this, 'pkm_meta_generator_and_version_info_remover_callback'), __FILE__);
        add_settings_field('pkm_meta_generator_remover_enable_checkbox', __('Remove WordPress default meta generator tag', 'meta-generator-and-version-info-remover'), array($this, 'pkm_meta_generator_remover_checkbox_setting'), __FILE__, 'pkm_meta_generator_remover_section');
        add_settings_field('pkm_wpml_generator_remover_enable_checkbox', __('Remove WPML generator tag (Applicable if WordPress Multilingual Plugin is used)', 'meta-generator-and-version-info-remover'), array($this, 'pkm_wpml_generator_remover_checkbox_setting'), __FILE__, 'pkm_meta_generator_remover_section');
        add_settings_field('pkm_revslider_generator_remover_enable_checkbox', __('Remove Slider Revolution generator tag (Applicable if Slider Revolution Plugin is used)', 'meta-generator-and-version-info-remover'), array($this, 'pkm_revslider_generator_remover_checkbox_setting'), __FILE__, 'pkm_meta_generator_remover_section');
        add_settings_field('pkm_visual_composer_generator_remover_enable_checkbox', __('Remove Visual Composer generator tag (Applicable if Visual Composer / WPBakery Page Builder Plugin is used)', 'meta-generator-and-version-info-remover'), array($this, 'pkm_visual_composer_generator_remover_checkbox_setting'), __FILE__, 'pkm_meta_generator_remover_section');
        add_settings_section('pkm_meta_generator_and_version_info_remover_section', __('Version Info Remover Settings', 'meta-generator-and-version-info-remover'), array($this, 'pkm_meta_generator_and_version_info_remover_callback'), __FILE__);
        add_settings_field('pkm_version_info_remover_style_checkbox', __('Remove version from stylesheet (CSS files)', 'meta-generator-and-version-info-remover'), array($this, 'pkm_version_info_remover_style_checkbox_setting'), __FILE__, 'pkm_meta_generator_and_version_info_remover_section');
        add_settings_field('pkm_version_info_remover_script_checkbox', __('Remove version from script (JS files)', 'meta-generator-and-version-info-remover'), array($this, 'pkm_version_info_remover_script_checkbox_setting'), __FILE__, 'pkm_meta_generator_and_version_info_remover_section');
        add_settings_field('pkm_version_info_remover_script_exclude_css', __('Enter CSS/JS file names to exclude from version removal (comma separated list)', 'meta-generator-and-version-info-remover'), array($this, 'pkm_version_info_remover_script_exclude_css'), __FILE__, 'pkm_meta_generator_and_version_info_remover_section');
        add_settings_section('pkm_view_source_comments_remover_section', __('View Source Comments Remover Settings', 'meta-generator-and-version-info-remover'), array($this, 'pkm_meta_generator_and_version_info_remover_callback'), __FILE__);
        add_settings_field('pkm_comments_remover_yoast_seo_checkbox', __('Remove Yoast SEO comments', 'meta-generator-and-version-info-remover'), array($this, 'pkm_comments_remover_yoast_seo_checkbox_setting'), __FILE__, 'pkm_view_source_comments_remover_section');
    }
    
    public function pkm_meta_generator_and_version_info_remover_callback() {
        // silence is golden
    }

    public function pkm_meta_generator_remover_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_meta_generator_remover_enable_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_meta_generator_remover_enable_checkbox'] ); ?> />
        <?php 
    }

    public function pkm_wpml_generator_remover_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_wpml_generator_remover_enable_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_wpml_generator_remover_enable_checkbox'] ); ?> />
        <?php 
    }

    public function pkm_revslider_generator_remover_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_revslider_generator_remover_enable_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_revslider_generator_remover_enable_checkbox'] ); ?> />
        <?php 
    }

    public function pkm_visual_composer_generator_remover_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_visual_composer_generator_remover_enable_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_visual_composer_generator_remover_enable_checkbox'] ); ?> />
        <?php 
    }

    public function pkm_version_info_remover_style_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_version_info_remover_style_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_version_info_remover_style_checkbox'] ); ?> />
        <?php
    }

    public function pkm_version_info_remover_script_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_version_info_remover_script_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_version_info_remover_script_checkbox'] ); ?> />
        <?php
    }

    public function pkm_version_info_remover_script_exclude_css() {
        ?>
        <textarea placeholder="<?php _e('Enter comma separated list of file names (CSS/JS files) to exclude them from version removal process. Version info will be kept for these files.', 'meta-generator-and-version-info-remover'); ?>" name="meta_generator_and_version_info_remover_options[pkm_version_info_remover_script_exclude_css]" rows="7" cols="60" style="resize:none;"><?php if (isset($this->options['pkm_version_info_remover_script_exclude_css'])) { echo $this->options['pkm_version_info_remover_script_exclude_css']; } ?></textarea>
        <?php
    }

    public function pkm_comments_remover_yoast_seo_checkbox_setting() {
        ?>
        <input name="meta_generator_and_version_info_remover_options[pkm_comments_remover_yoast_seo_checkbox]" type="checkbox" value="1"<?php checked( 1 == $this->options['pkm_comments_remover_yoast_seo_checkbox'] ); ?> />
        <?php
    }
}

$options = get_option('meta_generator_and_version_info_remover_options');
$exclude_file_list = '';
if ( isset($options['pkm_version_info_remover_script_exclude_css']) ) {
    $exclude_file_list = $options['pkm_version_info_remover_script_exclude_css'];
}
$exclude_files_arr = array_map('trim', explode(',', $exclude_file_list));

/**
 * Hook into the WordPress default generator.
 */
if ( isset($options['pkm_meta_generator_remover_enable_checkbox']) && ($options['pkm_meta_generator_remover_enable_checkbox'] == 1) ) {
    add_filter( 'the_generator', '__return_null' );
}

/**
 * Hook into the WPML generator.
 */
if ( isset($options['pkm_wpml_generator_remover_enable_checkbox']) && ($options['pkm_wpml_generator_remover_enable_checkbox'] == 1) ) {
    if ( !empty ( $GLOBALS['sitepress'] ) ) {
        function remove_wpml_generator() {
            remove_action(
                current_filter(),
                array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
            );
        }
        add_action( 'wp_head', 'remove_wpml_generator', 0 );
    }
}

/**
 * Hook into the Slider Revolution generator.
 */
if ( isset($options['pkm_revslider_generator_remover_enable_checkbox']) && ($options['pkm_revslider_generator_remover_enable_checkbox'] == 1) ) {
    function remove_revslider_meta_tag() {
        return '';
    }
    add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );
}

/**
 * Hook into the Visual Composer / WPBakery Page Builder generator.
 */
if ( isset($options['pkm_visual_composer_generator_remover_enable_checkbox']) && ($options['pkm_visual_composer_generator_remover_enable_checkbox'] == 1) ) {
    add_action('init', 'visual_composer_generator_remover_fn', 100);
    function visual_composer_generator_remover_fn() {
        if ( class_exists( 'Vc_Manager' ) || class_exists( 'Vc_Base' ) ) {
            remove_action('wp_head', array(visual_composer(), 'addMetaData'));
        }
    }
}

/**
 * Hook into the Yoast SEO comments.
 */
if ( isset($options['pkm_comments_remover_yoast_seo_checkbox']) && ($options['pkm_comments_remover_yoast_seo_checkbox'] == 1) ) {
    function remove_yoast_seo_comments_fn() {
        if ( ! class_exists( 'WPSEO_Frontend' ) ) {
            return;
        }
        $instance = WPSEO_Frontend::get_instance();
        // To ensure that future version of the plugin does not cause any problem
        if ( ! method_exists( $instance, 'debug_mark') ) {
            return;
        }
        remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
    }
    add_action('template_redirect', 'remove_yoast_seo_comments_fn', 9999);
}

/**
 *  remove wp version param from any enqueued scripts (using wp_enqueue_script()) or styles (using wp_enqueue_style()). But first check the list of user defined excluded CSS/JS files... Those files will be skipped and version information will be kept.
 */
function pkm_remove_appended_version_script_style( $target_url ) {
    $filename_arr = explode('?', basename($target_url));
    $filename = $filename_arr[0];
    global $exclude_files_arr, $exclude_file_list;
    // first check the list of user defined excluded CSS/JS files
    if (!in_array(trim($filename), $exclude_files_arr)) {
        /* check if "ver=" argument exists in the url or not */
        if (strpos( $target_url, 'ver=' )) {
            $target_url = remove_query_arg( 'ver', $target_url );
        }
    }
    return $target_url;
}

/**
 * Priority set to 20000. Higher numbers correspond with later execution.
 * Hook into the style loader and remove the version information.
 */
if ( isset($options['pkm_version_info_remover_style_checkbox']) && ($options['pkm_version_info_remover_style_checkbox'] == 1) ) {
    add_filter('style_loader_src', 'pkm_remove_appended_version_script_style', 20000);
}

/**
 * Hook into the script loader and remove the version information.
 */
if ( isset($options['pkm_version_info_remover_script_checkbox']) && ($options['pkm_version_info_remover_script_checkbox'] == 1) ) {
    add_filter('script_loader_src', 'pkm_remove_appended_version_script_style', 20000);
}

add_action('admin_menu', 'pkm_meta_generator_add_options_page_function');

function pkm_meta_generator_add_options_page_function() {
    $object = new Meta_generator_and_version_info_remover();
    $object->pkm_add_menu_page();
}

add_action('admin_init', 'pkm_meta_generator_remover_initiate_class');

function pkm_meta_generator_remover_initiate_class() {
    new Meta_generator_and_version_info_remover();
}

function meta_generator_and_version_info_remover_defaults() {
    $current_options = get_option('meta_generator_and_version_info_remover_options');
    $defaults = array(
        'pkm_meta_generator_remover_enable_checkbox'            => 1,
        'pkm_wpml_generator_remover_enable_checkbox'            => 1,
        'pkm_revslider_generator_remover_enable_checkbox'       => 1,
        'pkm_visual_composer_generator_remover_enable_checkbox' => 1,
        'pkm_version_info_remover_style_checkbox'               => 1,
        'pkm_version_info_remover_script_checkbox'              => 1,
        'pkm_version_info_remover_script_exclude_css'           => ( isset($current_options['pkm_version_info_remover_script_exclude_css']) ? $current_options['pkm_version_info_remover_script_exclude_css'] : '' ),
        'pkm_comments_remover_yoast_seo_checkbox'               => 1
    );

    if ( is_admin() ) {
        update_option( 'meta_generator_and_version_info_remover_options', $defaults );
    }
}

register_activation_hook( __FILE__, 'meta_generator_and_version_info_remover_defaults' );

function meta_generator_and_version_info_remover_set_plugin_meta($links, $file) {
    $plugin = plugin_basename(__FILE__);
    // create link
    if ($file == $plugin) {
        return array_merge(
            $links,
            array( sprintf( '<a href="options-general.php?page=%s">%s</a>', $plugin, __('Settings') ) )
        );
    }
    return $links;
}

add_filter( 'plugin_row_meta', 'meta_generator_and_version_info_remover_set_plugin_meta', 10, 2 );

add_action('plugins_loaded', 'meta_generator_and_version_info_remover_load_textdomain');
function meta_generator_and_version_info_remover_load_textdomain() {
    load_plugin_textdomain( 'meta-generator-and-version-info-remover', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}
