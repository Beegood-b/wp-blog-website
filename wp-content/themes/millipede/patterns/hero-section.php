<?php

/**
 * Title: Hero Section
 * Slug: millipede/hero-section
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/banner_image.jpg',
);
?>
<!-- wp:cover {"url":"<?php echo esc_url($millipede_images[0]) ?>","id":2809,"dimRatio":20,"minHeight":750,"customGradient":"linear-gradient(180deg,rgba(0,0,0,0) 24%,rgb(6,8,71) 100%)","isDark":false,"style":{"spacing":{"padding":{"bottom":"200px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="padding-bottom:200px;min-height:750px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg,rgba(0,0,0,0) 24%,rgb(6,8,71) 100%)"></span><img class="wp-block-cover__image-background wp-image-2809" alt="" src="<?php echo esc_url($millipede_images[0]) ?>" data-object-fit="cover" />
    <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.4","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"xxx-large"} -->
            <h1 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-xxx-large-font-size" style="font-style:normal;font-weight:500;line-height:1.4"><?php esc_html_e('Your Vision, Our Expertise,', 'millipede') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.4","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontSize":"xxx-large"} -->
            <h1 class="wp-block-heading has-text-align-center has-heading-color-color has-text-color has-link-color has-xxx-large-font-size" style="font-style:normal;font-weight:500;line-height:1.4"><?php esc_html_e('Elevate Your Brands.', 'millipede') ?></h1>
            <!-- /wp:heading -->

            <!-- wp:group {"layout":{"type":"constrained","contentSize":"540px"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"24px"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                <p class="has-text-align-center has-foreground-color has-text-color has-link-color" style="margin-top:24px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"32px"}}}} -->
            <div class="wp-block-buttons" style="margin-top:32px"><!-- wp:button {"style":{"border":{"width":"0px","style":"none","radius":"0px"},"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"20px","bottom":"20px"}}}} -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;border-radius:0px;padding-top:20px;padding-right:var(--wp--preset--spacing--70);padding-bottom:20px;padding-left:var(--wp--preset--spacing--70)"><?php esc_html_e('Download', 'millipede') ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"border":{"radius":"0px","width":"2px"},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"18px","bottom":"18px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-bgcolor"} -->
                <div class="wp-block-button is-style-button-hover-secondary-bgcolor"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="border-width:2px;border-radius:0px;padding-top:18px;padding-right:var(--wp--preset--spacing--60);padding-bottom:18px;padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e('Discover More', 'millipede') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->