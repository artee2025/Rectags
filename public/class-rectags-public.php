<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rectags
 * @subpackage Rectags/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rectags
 * @subpackage Rectags/public
 * @author     Your Name <email@example.com>
 */
class Rectags_Public {

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
	 * @param      string    $rectags       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rectags, $version ) {

		$this->rectags = $rectags;
		$this->version = $version;

	}
	public function do_cloud(){
		$tags = get_tags();
		$html = '<div class="post_tags">';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
					
			$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
			$html .= "{$tag->name}</a></br>";
		}
		$html .= '</div>';
		echo $html;
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->rectags, plugin_dir_url( __FILE__ ) . 'css/rectags-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->rectags, plugin_dir_url( __FILE__ ) . 'js/rectags-public.js', array( 'jquery' ), $this->version, false );

	}

}
