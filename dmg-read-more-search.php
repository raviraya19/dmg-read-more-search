<?php
/**
 * Plugin Name:       Dmg Read More Search
 * Description:       A custom Gutenberg block to insert stylized anchor links to posts.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Raviraya
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dmg-read-more-search
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_dmg_read_more_search_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_dmg_read_more_search_block_init' );

// Include the WP-CLI command class file.
if (defined('WP_CLI') && WP_CLI) {
	require_once __DIR__ . '/wp-cli/class-dmg-read-more-cli-command.php';
	WP_CLI::add_command('dmg-read-more-search', 'DMG_Read_More_CLI_Command');
}
