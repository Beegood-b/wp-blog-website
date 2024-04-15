<?php

/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package millipede
 * @since 1.0.0
 */

if (function_exists('register_block_style')) {
    /**
     * Register block styles.
     *
     * @since 0.1
     *
     * @return void
     */
    function hello_agency_register_block_styles()
    {
        register_block_style(
            'core/columns',
            array(
                'name'  => 'millipede-boxshadow',
                'label' => __('Box Shadow', 'millipede')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'millipede-boxshadow',
                'label' => __('Box Shadow', 'millipede')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'millipede-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'millipede')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'millipede-boxshadow-large',
                'label' => __('Box Shadow Large', 'millipede')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'millipede-boxshadow',
                'label' => __('Box Shadow', 'millipede')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'millipede-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'millipede')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'millipede-boxshadow-large',
                'label' => __('Box Shadow Larger', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-boxshadow',
                'label' => __('Box Shadow', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-boxshadow-larger',
                'label' => __('Box Shadow Large', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-image-pulse',
                'label' => __('Iamge Pulse Effect', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-image-hover-pulse',
                'label' => __('Hover Pulse Effect', 'millipede')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'millipede-image-hover-rotate',
                'label' => __('Hover Rotate Effect', 'millipede')
            )
        );
        register_block_style(
            'core/columns',
            array(
                'name'  => 'millipede-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'millipede')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'millipede-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'millipede')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'millipede-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'millipede')
            )
        );

        register_block_style(
            'core/post-terms',
            array(
                'name'  => 'categories-background-with-round',
                'label' => __('Background Color', 'millipede')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-color',
                'label' => __('Hover: Primary Color', 'millipede')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'millipede')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-bgcolor',
                'label' => __('Hover: Primary color fill', 'millipede')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-bgcolor',
                'label' => __('Hover: Secondary color fill', 'millipede')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-white-bgcolor',
                'label' => __('Hover: White color fill', 'millipede')
            )
        );

        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-color',
                'label' => __('Hover: Primary Color', 'millipede')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'millipede')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-fill',
                'label' => __('Hover: Primary Fill', 'millipede')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-fill',
                'label' => __('Hover: secondary Fill', 'millipede')
            )
        );

        register_block_style(
            'core/list',
            array(
                'name'  => 'list-style-no-bullet',
                'label' => __('Hide bullet', 'millipede')
            )
        );
        register_block_style(
            'core/gallery',
            array(
                'name'  => 'enable-grayscale-mode-on-image',
                'label' => __('Enable Grayscale Mode on Image', 'millipede')
            )
        );
        register_block_style(
            'core/social-links',
            array(
                'name'  => 'social-icon-size-small',
                'label' => __('Small Size', 'millipede')
            )
        );
        register_block_style(
            'core/social-links',
            array(
                'name'  => 'social-icon-size-large',
                'label' => __('Large Size', 'millipede')
            )
        );
        register_block_style(
            'core/page-list',
            array(
                'name'  => 'millipede-page-list-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'millipede')
            )
        );
        register_block_style(
            'core/page-list',
            array(
                'name'  => 'millipede-page-list-bullet-hide-style-white-color',
                'label' => __('Hide Bullet Style with White Text Color', 'millipede')
            )
        );
        register_block_style(
            'core/categories',
            array(
                'name'  => 'millipede-categories-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'millipede')
            )
        );
        register_block_style(
            'core/categories',
            array(
                'name'  => 'millipede-categories-bullet-hide-style-white-color',
                'label' => __('Hide Bullet Style with Text color White', 'millipede')
            )
        );
    }
    add_action('init', 'hello_agency_register_block_styles');
}
