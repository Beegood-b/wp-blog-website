<?php

/**
 * Title: Author Info Box
 * Slug: millipede/custom-author-box
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/author_image.jpg',
);
?>
<!-- wp:group {"style":{"border":{"radius":"20px","top":{"radius":"20px","width":"1px","color":"var:preset|color|dark-color"},"right":{"radius":"20px","width":"5px","color":"var:preset|color|dark-color"},"bottom":{"radius":"20px","width":"5px","color":"var:preset|color|dark-color"},"left":{"radius":"20px","width":"1px","color":"var:preset|color|dark-color"}},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"24px","right":"24px"}}},"backgroundColor":"light-color","layout":{"type":"constrained","contentSize":"540px"}} -->
<div class="wp-block-group has-light-color-background-color has-background" style="border-radius:20px;border-top-color:var(--wp--preset--color--dark-color);border-top-width:1px;border-right-color:var(--wp--preset--color--dark-color);border-right-width:5px;border-bottom-color:var(--wp--preset--color--dark-color);border-bottom-width:5px;border-left-color:var(--wp--preset--color--dark-color);border-left-width:1px;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:image {"align":"center","id":150,"width":"100px","height":"100px","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"50px","top":{"radius":"50px","width":"1px","color":"var:preset|color|primary"},"right":{"radius":"50px","width":"5px","color":"var:preset|color|primary"},"bottom":{"radius":"50px","width":"5px","color":"var:preset|color|primary"},"left":{"radius":"50px","width":"1px","color":"var:preset|color|primary"}}}} -->
    <figure class="wp-block-image aligncenter size-large is-resized has-custom-border"><img src="<?php echo esc_url($millipede_images[0]) ?>" alt="" class="wp-image-150" style="border-radius:50px;border-top-color:var(--wp--preset--color--primary);border-top-width:1px;border-right-color:var(--wp--preset--color--primary);border-right-width:5px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:5px;border-left-color:var(--wp--preset--color--primary);border-left-width:1px;object-fit:cover;width:100px;height:100px" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
    <h3 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e('Liyana Parker', 'millipede') ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'millipede') ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:social-links {"iconColor":"dark-color","iconColorValue":"#021614","iconBackgroundColor":"primary","iconBackgroundColorValue":"#F6D006","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <ul class="wp-block-social-links has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"x"} /-->

        <!-- wp:social-link {"url":"#","service":"lastfm"} /-->

        <!-- wp:social-link {"url":"#","service":"instagram"} /-->
    </ul>
    <!-- /wp:social-links -->
</div>
<!-- /wp:group -->