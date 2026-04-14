<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="cpb-banner-wrapper" id="cpb-banner">
    <div class="cpb-banner-inner">
        <?php echo wp_kses_post( $banner_text ); ?>
    </div>
    <button class="cpb-banner-close" id="cpb-banner-close" aria-label="Close Banner">&times;</button>
</div>
