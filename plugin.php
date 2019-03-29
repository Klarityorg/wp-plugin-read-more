<?php
/**
 * Plugin Name: Klarity read more block
 * Plugin URI: https://github.com/Klarityorg/wp-plugin-read-more
 * Description: Klarity read more block
 * Author: Klarity
 * Author URI: https://github.com/Klarityorg
 * Version: 1.1.2
 * License: MIT
 *
 * @package Klarity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
