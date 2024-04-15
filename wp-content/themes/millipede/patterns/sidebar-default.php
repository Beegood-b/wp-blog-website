<?php

/**
 * Title: Sidebar Default
 * Slug: millipede/sidebar-default
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/author_image.jpg',
);
?>
<!-- wp:group {"style":{"border":{"radius":"0px","width":"0px","style":"none"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"24px","right":"24px"}}},"backgroundColor":"background-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-alt-background-color has-background" style="border-style:none;border-width:0px;border-radius:0px;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:image {"align":"center","id":150,"width":"100px","height":"100px","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"50px","top":{"radius":"50px","width":"0px","color":"var:preset|color|primary","style":"none"},"right":{"radius":"50px","width":"0px","color":"var:preset|color|primary","style":"none"},"bottom":{"radius":"50px","width":"0px","style":"none"},"left":{"radius":"50px","width":"0px","color":"var:preset|color|primary","style":"none"}}}} -->
    <figure class="wp-block-image aligncenter size-large is-resized has-custom-border"><img src="<?php echo esc_url($millipede_images[0]) ?>" alt="" class="wp-image-150" style="border-radius:50px;border-top-color:var(--wp--preset--color--primary);border-top-style:none;border-top-width:0px;border-right-color:var(--wp--preset--color--primary);border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-color:var(--wp--preset--color--primary);border-left-style:none;border-left-width:0px;object-fit:cover;width:100px;height:100px" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
    <h3 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e('Liyana Parker', 'millipede') ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'millipede') ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#ffffff","iconBackgroundColor":"primary","iconBackgroundColorValue":"#F6D006","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <ul class="wp-block-social-links has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"x"} /-->

        <!-- wp:social-link {"url":"#","service":"lastfm"} /-->

        <!-- wp:social-link {"url":"#","service":"instagram"} /-->
    </ul>
    <!-- /wp:social-links -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"24px","right":"24px"},"margin":{"top":"20px"}},"border":{"radius":"0px","width":"0px","style":"none"}},"backgroundColor":"background-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-alt-background-color has-background" style="border-style:none;border-width:0px;border-radius:0px;margin-top:20px;padding-top:30px;padding-right:24px;padding-bottom:30px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"30px","width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="border-style:none;border-width:0px;border-radius:30px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"24px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
        <h4 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:24px;font-style:normal;font-weight:600"><?php esc_html_e('Featured Post', 'millipede') ?></h4>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":13,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"15px"}}} -->
        <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"15px"},"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"80px"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80px"><!-- wp:post-featured-image {"isLink":true,"height":"70px","style":{"border":{"radius":"0px"}}} /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"75%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75%"><!-- wp:post-title {"level":4,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark-color"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"18px"}}} /--></div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"24px","right":"24px"},"margin":{"top":"20px","bottom":"20px"}},"border":{"radius":"0px","width":"0px","style":"none"}},"backgroundColor":"background-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-alt-background-color has-background" style="border-style:none;border-width:0px;border-radius:0px;margin-top:20px;margin-bottom:20px;padding-top:30px;padding-right:24px;padding-bottom:30px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"30px","width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="border-style:none;border-width:0px;border-radius:30px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"24px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
        <h4 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:24px;font-style:normal;font-weight:600"><?php esc_html_e('Categories', 'millipede') ?></h4>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:categories {"showPostCounts":true,"className":"is-style-millipede-categories-bullet-hide-style millipede-sidebar-categories","style":{"typography":{"lineHeight":"2","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"20px"}}}} /-->
</div>
<!-- /wp:group -->