<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://artee.io
 * @since      1.0.0
 *
 * @package    Rectags
 * @subpackage Rectags/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rectags
 * @subpackage Rectags/admin
 * @author     Artee <artee2025@gmail.com>
 */
class Rectags_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rectags    The ID of this plugin.
	 */
	private $rectags;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rectags       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rectags, $version ) {

		$this->rectags = $rectags;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rectags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rectags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->rectags, plugin_dir_url( __FILE__ ) . 'css/rectags-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rectags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rectags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->rectags, plugin_dir_url( __FILE__ ) . 'js/rectags-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Rectags Settings', 'rectags' ),
			__( 'Rectags', 'rectags' ),
			'manage_options',
			$this->rectags,
			array( $this, 'display_options_page' )
		);
	
	}

	public function add_action_links( $links ) {
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge(" $settings_link, $links ");
	}


	public function display_options_page() {
		include_once 'partials/rectags-admin-display.php';
	}

}
