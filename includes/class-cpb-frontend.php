<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class CPB_Frontend {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        add_filter( 'the_content', array( $this, 'display_banner' ) );
    }

    public function enqueue_assets() {
        if ( is_single() && get_option( 'cpb_banner_is_active', 0 ) ) {
            wp_enqueue_style( 'cpb-style', CPB_PLUGIN_URL . 'assets/css/cpb-style.css', array(), '1.0.0' );
            wp_enqueue_script( 'cpb-script', CPB_PLUGIN_URL . 'assets/js/cpb-script.js', array(), '1.0.0', true );

            // Strict Security Fix: Escape attributes before outputting them in inline CSS
            $bg_color   = esc_attr( get_option( 'cpb_banner_bg_color', '#ffffe0' ) );
            $text_color = esc_attr( get_option( 'cpb_banner_text_color', '#333333' ) );
            
            $custom_css = "
                .cpb-banner-wrapper {
                    background-color: {$bg_color};
                    color: {$text_color};
                }
            ";
            wp_add_inline_style( 'cpb-style', $custom_css );
        }
    }

    public function display_banner( $content ) {
        if ( is_single() && is_main_query() && get_option( 'cpb_banner_is_active', 0 ) ) {
            $banner_text = get_option( 'cpb_banner_content', '' );
            
            if ( empty( $banner_text ) ) {
                return $content;
            }

            ob_start();
            include CPB_PLUGIN_DIR . 'templates/banner-view.php';
            $banner_html = ob_get_clean();

            return $banner_html . $content;
        }

        return $content;
    }
}
