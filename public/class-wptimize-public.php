<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.yossi.co.il/
 * @since      1.0.0
 *
 * @package    Wptimize
 * @subpackage Wptimize/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wptimize
 * @subpackage Wptimize/public
 * @author     Yossi Aharon
 */
class Wptimize_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $options_slug, $options_data ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options_slug = $options_slug;
		$this->options_data = $options_data;
		$this->wptimize_options = get_option($this->options_slug);

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
		 * defined in Wptimize_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wptimize_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wptimize-public.css', array(), $this->version, 'all' );

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
		 * defined in Wptimize_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wptimize_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wptimize-public.js', array( 'jquery' ), $this->version, false );

	}

 	/**
     * Cleanup functions depending on each checkbox returned value in admin
     *
     * @since    1.0.0
     */
    // Cleanup head
    public function wptimize_cleanup() {

        if($this->wptimize_options['rsd_clean']){
            remove_action( 'wp_head', 'rsd_link' );
        }
		
		if($this->wptimize_options['wlwmanifest_clean']){
            remove_action( 'wp_head', 'wlwmanifest_link' );
        }
		
		if($this->wptimize_options['wp_generator_clean']){
            remove_action( 'wp_head', 'wp_generator' );
        }
		
		if($this->wptimize_options['shortlink_clean']){
            remove_action( 'wp_head', 'wp_shortlink_wp_head' );
        }
		
		if($this->wptimize_options['feed_links_clean']){
           remove_action( 'wp_head', 'feed_links', 2 );   
        }
		
		if($this->wptimize_options['feed_links_extra_clean']){
    		remove_action('wp_head', 'feed_links_extra', 3);
        }
		
		if($this->wptimize_options['rel_links_clean']){
    		remove_action( 'wp_head', 'index_rel_link' );
        }
		
		if($this->wptimize_options['canonical_clean']){
			remove_action( 'wp_head', 'rel_canonical', 10, 0 );
        }
		
		if($this->wptimize_options['emoji_clean']){
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
        }
		
		if($this->wptimize_options['js2footer']){
			remove_action('wp_head', 'wp_print_scripts');
			remove_action('wp_head', 'wp_print_head_scripts', 9);
			remove_action('wp_head', 'wp_enqueue_scripts', 1);

			add_action('wp_footer', 'wp_print_scripts', 5);
			add_action('wp_footer', 'wp_enqueue_scripts', 5);
			add_action('wp_footer', 'wp_print_head_scripts', 5);
        }
		
		if($this->wptimize_options['query_string_clean']){
		function remove_cssjs_ver( $src ) {
		 if( strpos( $src, '?ver=' ) )
		 $src = remove_query_arg( 'ver', $src );
		 return $src;
		}
		add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
		add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
        }
		
		if($this->wptimize_options['clean_non_contactform7']){
		add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );

		function ac_remove_cf7_scripts() {
			if ( !is_page('contact') ) {
				wp_deregister_style( 'contact-form-7' );
				wp_deregister_style( 'contact-form-7-rtl' );
				wp_deregister_script( 'contact-form-7' );
			}
		}		
		}
		
		if($this->wptimize_options['clean_non_woocommerce']){
		add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

	function child_manage_woocommerce_styles() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
			}
				}
	
		}
		
		if($this->wptimize_options['clean_non_bbpress']){
		
		function bbpress_enqueue_wpse_87081() {

		   if ( class_exists('bbPress') ) {
			  if ( ! is_bbpress() ) {
				wp_dequeue_style('bbp-default');
				wp_dequeue_style('bbp-default-rtl');
				wp_dequeue_style( 'bbp_private_replies_style');
				wp_dequeue_script('bbpress-editor');
			  }
			}
		}

		add_action( 'wp_enqueue_scripts', 'bbpress_enqueue_wpse_87081', 15 );
		}
		
		if($this->wptimize_options['wp_api_clean']){
			remove_action( 'wp_head', 'rest_output_link_wp_head' );
        }
		
		if($this->wptimize_options['remove_wp_admin_bar']){
			 remove_action( 'wp_head', '_admin_bar_bump_cb' );
        }
		
		if($this->wptimize_options['hide_upgrade_notices']){
			remove_action( 'admin_notices', 'update_nag', 3 );
        }
		
		if($this->wptimize_options['disable_comments_feature_wp']){
		// Removes from admin menu
		add_action( 'admin_menu', 'my_remove_admin_menus' );
		function my_remove_admin_menus() {
			remove_menu_page( 'edit-comments.php' );
		}
		// Removes from post and pages
		add_action('init', 'remove_comment_support', 100);

		function remove_comment_support() {
			remove_post_type_support( 'post', 'comments' );
			remove_post_type_support( 'page', 'comments' );
		}
		// Removes from admin bar
		function mytheme_admin_bar_render() {
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('comments');
		}
		add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
        }
		
    }   
	
}