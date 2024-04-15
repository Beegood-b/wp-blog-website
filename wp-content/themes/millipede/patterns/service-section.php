<?php

/**
 * Title: Service Section
 * Slug: millipede/service-section
 * Categories: millipede
 */
$millipede_agency_url = trailingslashit(get_template_directory_uri());
$millipede_images = array(
    $millipede_agency_url . 'assets/images/icon_1.png',
    $millipede_agency_url . 'assets/images/icon_2.png',
    $millipede_agency_url . 'assets/images/icon_3.png',
    $millipede_agency_url . 'assets/images/icon_4.png',
    $millipede_agency_url . 'assets/images/icon_5.png',
    $millipede_agency_url . 'assets/images/icon_6.png'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"80px","bottom":"80px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:var(--wp--preset--spacing--40);padding-bottom:80px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"48px"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="font-size:48px;font-style:normal;font-weight:500"><?php esc_html_e('How Can We Help', 'millipede') ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"24px"},"margin":{"top":"44px"}}}} -->
    <div class="wp-block-columns" style="margin-top:44px"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background-alt","className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box has-background-alt-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"align":"center","id":2846,"width":"66px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($millipede_images[0]) ?>" alt="" class="wp-image-2846" style="width:66px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px"}},"typography":{"fontSize":"24px"}}} -->
                <h3 class="wp-block-heading has-text-align-center" style="margin-top:24px;font-size:24px"><?php esc_html_e('Digital Marketing', 'millipede') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-color","fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color has-normal-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e('Read More', 'millipede') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background-alt","className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box has-background-alt-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"align":"center","id":2846,"width":"66px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($millipede_images[1]) ?>" alt="" class="wp-image-2846" style="width:66px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px"}},"typography":{"fontSize":"24px"}}} -->
                <h3 class="wp-block-heading has-text-align-center" style="margin-top:24px;font-size:24px"><?php esc_html_e('Brand Building', 'millipede') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-color","fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color has-normal-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e('Read More', 'millipede') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background-alt","className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box has-background-alt-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"align":"center","id":2846,"width":"66px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($millipede_images[2]) ?>" alt="" class="wp-image-2846" style="width:66px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px"}},"typography":{"fontSize":"24px"}}} -->
                <h3 class="wp-block-heading has-text-align-center" style="margin-top:24px;font-size:24px"><?php esc_html_e('Case Study', 'millipede') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-color","fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color has-normal-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e('Read More', 'millipede') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"24px"}}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background-alt","className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box has-background-alt-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"align":"center","id":2846,"width":"66px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($millipede_images[3]) ?>" alt="" class="wp-image-2846" style="width:66px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px"}},"typography":{"fontSize":"24px"}}} -->
                <h3 class="wp-block-heading has-text-align-center" style="margin-top:24px;font-size:24px"><?php esc_html_e('Content Marketing', 'millipede') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-color","fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color has-normal-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e('Read More', 'millipede') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background-alt","className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box has-background-alt-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"align":"center","id":2846,"width":"66px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($millipede_images[4]) ?>" alt="" class="wp-image-2846" style="width:66px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px"}},"typography":{"fontSize":"24px"}}} -->
                <h3 class="wp-block-heading has-text-align-center" style="margin-top:24px;font-size:24px"><?php esc_html_e('Finance Management', 'millipede') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-color","fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color has-normal-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e('Read More', 'millipede') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"40px","right":"40px"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background-alt","className":"millipede-hover-box","layout":{"type":"constrained"}} -->
            <div class="wp-block-group millipede-hover-box has-background-alt-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:image {"align":"center","id":2846,"width":"66px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($millipede_images[5]) ?>" alt="" class="wp-image-2846" style="width:66px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px"}},"typography":{"fontSize":"24px"}}} -->
                <h3 class="wp-block-heading has-text-align-center" style="margin-top:24px;font-size:24px"><?php esc_html_e('StartUp Ideas', 'millipede') ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'millipede') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"heading-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-button-hover-secondary-color","fontSize":"normal"} -->
                    <div class="wp-block-button has-custom-font-size is-style-button-hover-secondary-color has-normal-font-size"><a class="wp-block-button__link has-heading-color-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e('Read More', 'millipede') ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->