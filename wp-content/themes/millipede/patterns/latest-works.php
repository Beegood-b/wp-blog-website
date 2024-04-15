<?php

/**
 * Title: Latest Works
 * Slug: millipede/latest-works
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/project_1.jpg',
    $millipede_agency_url . 'assets/images/project_2.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"40px","bottom":"100px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"48px"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="font-size:48px;font-style:normal;font-weight:500"><?php esc_html_e('Latest Works', 'millipede') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"48px"}}}} -->
    <div class="wp-block-columns" style="margin-top:48px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($millipede_images[0]) ?>","id":2718,"dimRatio":50,"gradient":"dark-gradient","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"className":"millipede-hover-cover","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-left millipede-hover-cover" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-2718" alt="" src="<?php echo esc_url($millipede_images[0]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"background","fontSize":"large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-background-color has-text-color has-link-color has-large-font-size" style="font-style:normal;font-weight:400"><a href="#"><?php esc_html_e('Mobile Apps', 'millipede') ?></a></h3>
                    <!-- /wp:heading -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($millipede_images[1]) ?>","id":2715,"dimRatio":50,"gradient":"dark-gradient","contentPosition":"bottom left","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"millipede-hover-cover","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-left millipede-hover-cover" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-2715" alt="" src="<?php echo esc_url($millipede_images[1]) ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"background","fontSize":"large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-background-color has-text-color has-link-color has-large-font-size" style="font-style:normal;font-weight:400"><a href="#"><?php esc_html_e('Modern Architecture', 'millipede') ?></a></h3>
                    <!-- /wp:heading -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->