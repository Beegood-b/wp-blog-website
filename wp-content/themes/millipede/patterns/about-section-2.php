<?php

/**
 * Title: About Section 2
 * Slug: millipede/about-section-2
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/about_img_2.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"80px","bottom":"80px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="padding-top:80px;padding-right:var(--wp--preset--spacing--40);padding-bottom:80px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"60px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":2869,"sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full"><img src="<?php echo esc_url($millipede_images[0]) ?>" alt="" class="wp-image-2869" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"48px"}}} -->
            <h1 class="wp-block-heading" style="font-size:48px;font-style:normal;font-weight:500"><?php esc_html_e('One Team, One Goal,', 'millipede') ?><br><?php esc_html_e('Explore Our Story!', 'millipede') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure reprehenderit in voluptate.', 'millipede') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"18px","bottom":"18px"}}}} -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:0px;padding-top:18px;padding-right:var(--wp--preset--spacing--60);padding-bottom:18px;padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e('Explore More', 'millipede') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->