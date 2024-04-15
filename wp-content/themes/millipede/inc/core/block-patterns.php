<?php

/**
 * millipede: Block Patterns
 *
 * @since millipede 1.0.0
 */

/**
 * Registers pattern categories for millipede
 *
 * @since millipede 1.0.0
 *
 * @return void
 */
function millipede_register_pattern_category()
{
	$block_pattern_categories = array(
		'millipede' => array('label' => __('Millipede Patterns', 'millipede'))
	);

	$block_pattern_categories = apply_filters('millipede_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}
}
add_action('init', 'millipede_register_pattern_category', 9);
