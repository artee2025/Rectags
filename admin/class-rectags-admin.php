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
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'rectags';

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
		// $settings_link = array(
		// 	'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		// );
		// return array_merge($settings_link, $links);
		return $links;
	}


	public function display_options_page() {
		include_once 'partials/rectags-admin-display.php';
	}

	public function register_setting(){
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'rectags' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->rectags
		);

		add_settings_field(
			$this->option_name . '_position',
			__( 'Text position', 'rectags' ),
			array( $this, $this->option_name . '_position_cb' ),
			$this->rectags,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_position' )
		);

		add_settings_field(
			$this->option_name . '_day',
			__( 'Post is outdated after', 'rectags' ),
			array( $this, $this->option_name . '_day_cb' ),
			$this->rectags,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_day' )
		);

		register_setting( $this->rectags, $this->option_name . '_position', array( $this, $this->option_name . '_sanitize_position' ) );
		register_setting( $this->rectags, $this->option_name . '_day', 'intval' );
	}

	public function rectags_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'rectags' ) . '</p>';
	}

	public function rectags_position_cb() {
		?>
			<fieldset>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" id="<?php echo $this->option_name . '_position' ?>" value="before">
					<?php _e( 'Before the content', 'rectags' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" value="after">
					<?php _e( 'After the content', 'rectags' ); ?>
				</label>
			</fieldset>
		<?php
	}

	public function rectags_day_cb() {
		echo '<input type="text" name="' . $this->option_name . '_day' . '" id="' . $this->option_name . '_day' . '"> '. __( 'days', 'rectags' );
	}

	public function rectags_sanitize_position( $position ) {
		if ( in_array( $position, array( 'before', 'after' ), true ) ) {
	        return $position;
	    }
	}

}
