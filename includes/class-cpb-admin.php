<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class CPB_Admin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function add_plugin_page() {
        add_options_page(
            'Custom Post Banner', 
            'Post Banner', 
            'manage_options', 
            'custom-post-banner', 
            array( $this, 'create_admin_page' )
        );
    }

    public function create_admin_page() {
        ?>
        <div class="wrap">
            <h1>Custom Post Banner Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'cpb_option_group' );
                do_settings_sections( 'custom-post-banner-admin' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function page_init() {
        register_setting( 'cpb_option_group', 'cpb_banner_is_active', 'absint' );
        register_setting( 'cpb_option_group', 'cpb_banner_content', 'wp_kses_post' );
        register_setting( 'cpb_option_group', 'cpb_banner_bg_color', 'sanitize_hex_color' );
        register_setting( 'cpb_option_group', 'cpb_banner_text_color', 'sanitize_hex_color' );

        add_settings_section(
            'cpb_setting_section', 
            'Banner Configuration', 
            null, 
            'custom-post-banner-admin'
        );

        add_settings_field(
            'cpb_banner_is_active', 
            'Enable Banner', 
            array( $this, 'is_active_callback' ), 
            'custom-post-banner-admin', 
            'cpb_setting_section'
        );

        add_settings_field(
            'cpb_banner_content', 
            'Banner Content (HTML allowed)', 
            array( $this, 'content_callback' ), 
            'custom-post-banner-admin', 
            'cpb_setting_section'
        );

        add_settings_field(
            'cpb_banner_bg_color', 
            'Background Color', 
            array( $this, 'bg_color_callback' ), 
            'custom-post-banner-admin', 
            'cpb_setting_section'
        );

        add_settings_field(
            'cpb_banner_text_color', 
            'Text Color', 
            array( $this, 'text_color_callback' ), 
            'custom-post-banner-admin', 
            'cpb_setting_section'
        );
    }

    public function is_active_callback() {
        $active = get_option( 'cpb_banner_is_active', 0 );
        echo '<input type="checkbox" name="cpb_banner_is_active" value="1" ' . checked( 1, $active, false ) . ' />';
    }

    public function content_callback() {
        $content = get_option( 'cpb_banner_content', '<strong>Notice:</strong> This is a custom banner!' );
        echo '<textarea name="cpb_banner_content" rows="5" cols="50" class="large-text">' . esc_textarea( $content ) . '</textarea>';
    }

    public function bg_color_callback() {
        $bg_color = get_option( 'cpb_banner_bg_color', '#ffffe0' );
        echo '<input type="color" name="cpb_banner_bg_color" value="' . esc_attr( $bg_color ) . '" />';
    }

    public function text_color_callback() {
        $text_color = get_option( 'cpb_banner_text_color', '#333333' );
        echo '<input type="color" name="cpb_banner_text_color" value="' . esc_attr( $text_color ) . '" />';
    }
}
