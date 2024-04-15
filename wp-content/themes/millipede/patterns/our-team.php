<?php

/**
 * Title: Our Team
 * Slug: millipede/our-team
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/team_1.jpg',
    $millipede_agency_url . 'assets/images/team_2.jpg',
    $millipede_agency_url . 'assets/images/team_3.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"100px","bottom":"100px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"background-alt","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group has-background-alt-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"48px"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="font-size:48px;font-style:normal;font-weight:500"><?php esc_html_e('Meet Our Team', 'millipede') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"48px"},"blockGap":{"left":"32px"}}}} -->
    <div class="wp-block-columns" style="margin-top:48px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box"><!-- wp:image {"id":2882,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($millipede_images[0]) ?>" alt="" class="wp-image-2882" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:0"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:24px;font-style:normal;font-weight:500"><?php esc_html_e('Matt Poklets', 'millipede') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Founder', 'millipede') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box"><!-- wp:image {"id":2882,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($millipede_images[1]) ?>" alt="" class="wp-image-2882" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:0"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:24px;font-style:normal;font-weight:500"><?php esc_html_e('Alexa Tress', 'millipede') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Project Manager', 'millipede') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box"><!-- wp:image {"id":2882,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url($millipede_images[2]) ?>" alt="" class="wp-image-2882" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:0"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:24px;font-style:normal;font-weight:500"><?php esc_html_e('Patrick Le', 'millipede') ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php esc_html_e('Finance Manager', 'millipede') ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->