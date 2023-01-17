<?php
/**
 * AMP Clean Mega Menu compatibility plugin bootstrap.
 *
 * @package   Google\AMP_Clean_Mega_Menu
 * @author    milindmore22, rtCamp, Google
 * @license   GPL-2.0-or-later
 * @copyright 2023 Google Inc.
 *
 * @wordpress-plugin
 * Plugin Name: AMP Clean Mega Menu
 * Plugin URI: https://amp-wp.org
 * Description: Plugin to remove form from amp-mega-menu.
 * Version: 0.1
 * Author: milindmore22, rtcamp, Google
 * Author URI: https://amp-wp.org
 * License: GNU General Public License v2 (or later)
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Google\AMP_Clean_Mega_Menu;

/**
 * Whether the page is AMP.
 *
 * @return bool Is AMP.
 */
function is_amp() {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}

/**
 * Run Hooks.
 */
function add_hooks() {

		add_filter( 'amp_content_sanitizers', __NAMESPACE__ . '\filter_sanitizers' );
}

add_action( 'wp', __NAMESPACE__ . '\add_hooks' );

/**
 * Add sanitizer to fix up the markup.
 *
 * @param array $sanitizers Sanitizers.
 * @return array Sanitizers.
 */
function filter_sanitizers( $sanitizers ) {
	require_once __DIR__ . '/sanitizers/class-sanitizer.php';
	$sanitizers[ __NAMESPACE__ . '\Sanitizer' ] = array();
	return $sanitizers;
}
