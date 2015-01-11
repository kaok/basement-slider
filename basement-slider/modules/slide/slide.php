<?php
defined('ABSPATH') or die();

define( 'BASEMENT_SLIDER_TEXTDOMAIN', 'basement_slider' );
	
class Basement_Slide extends Basement_Cpt {
	
	private static $instance = null;
	private static $url = null;

	protected $post_type = 'slide';
	protected $show_thumbnail_admin_column = true;

	public function __construct() {
		parent::__construct();
		add_filter( 'basement_shortcodes_config', array( &$this, 'add_shortcodes' ) );
		add_filter( 'basement_shortcodes_groups_config', array( &$this, 'add_shortcodes_groups' ) );
	}

	public static function init() {
		self::instance();
		Basement_Asset::add_footer_script(
			BASEMENT_SLIDER_TEXTDOMAIN . '_caroufredsel_js', 
			self::url() . '/assets/javascript/jquery.carouFredSel-6.2.1-packed.js', 
			array( 'jquery' )
		);
		Basement_Asset::add_footer_script(
			BASEMENT_SLIDER_TEXTDOMAIN . '_script', 
			self::url() . '/assets/javascript/production.min.js', 
			BASEMENT_SLIDER_TEXTDOMAIN . '_caroufredsel_js'
		);
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new Basement_Slide();
		}
		return self::$instance;
	}

	public function no_basement_notice() { ?>
		<div class="error">
			<p><?php _e( 'Your theme doesn\'t support Basement Framework. Basement Slider plugin will not be available.', BASEMENT_SLIDER_TEXTDOMAIN ); ?></p>
		</div>
	<?php }

	public function add_shortcodes( $config ) {
		$config[ 'slider' ] = array(
			'group' => BASEMENT_SHORTCODES_TEXTDOMAIN,
			'class' => 'Basement_Shortcode_Slider',
			'title' => __( 'Slider', BASEMENT_SHORTCODES_TEXTDOMAIN ),
			'path' => __DIR__ . '/../shortcodes/slider.php'
		);
		return $config;
	} 

	public function add_shortcodes_groups( $config ) {
		$config[ BASEMENT_SHORTCODES_TEXTDOMAIN ] = __( 'Slider', BASEMENT_SHORTCODES_TEXTDOMAIN );
		return $config;
	} 

	public static function url() {
		if ( null === self::$url ) {
			self::$url = Basement_Url::of_file( realpath( __DIR__ . '/../' ) );
		}
		return self::$url;
	}

	protected function fill_post_type_args() {
		$this->post_type_args = apply_filters( 
			'basement_cpt_slide_args',
			array (
				'post_type' => $this->post_type,
				'description' => __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ),
				'public' => false,
				'exclude_from_search' => false,
				'publicly_queryable' => false,
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'show_in_menu' => true,
				'show_in_admin_bar' => true,
				'menu_position' => '20',
				'menu_icon' => 'dashicons-format-gallery',
				'hierarchical' => false,
				'has_archive' => true,
				'rewrite' => true,
				'query_var' => true,
				'can_export' => true,
				'label' => __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ),
				'labels' => array (
					'name' => __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ),
					'singular_name' => __( 'Slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'menu_name' => __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ),
					'name_admin_bar' => __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ),
					'all_items' => __( 'All slides', BASEMENT_SLIDER_TEXTDOMAIN ),
					'add_new' => __( 'Add slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'add_new_item' => __( 'Add slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'edit_item' => __( 'Edit slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'new_item' => __( 'New slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'view_item' => __( 'View slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'search_items' => __( 'Search orojects', BASEMENT_SLIDER_TEXTDOMAIN ),
					'not_found' => __( 'Slides not found', BASEMENT_SLIDER_TEXTDOMAIN ),
					'not_found_in_trash' => __( 'Slides not found in trash', BASEMENT_SLIDER_TEXTDOMAIN ),
				),
				'supports' => array (
					'title',
					'thumbnail'
				)
			)
		);
	}

	public function filter_parameters_panel_config( $config ) {
		global $post;

		// TODO: add descriptions
		$config[ 'slide_content' ] = array(
			'title' => __( 'Content', BASEMENT_SLIDER_TEXTDOMAIN ),
			'blocks' => array(
				array(
					'title' => __( 'Content', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'editor',
							'name' => '_basement_meta_slide_base_content',
							'value' => get_post_meta( $post->ID, '_basement_meta_slide_base_content', true ),
						)
					)
				),
				array(
					'title' => __( 'Background', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'background',
							'name_attr_part' => '_basement_meta_slide_base_background',
							'options' => get_post_meta( $post->ID, '_basement_meta_slide_base_background', true )
						)
					)
				)
			)
		);

		$config[ 'slide_overlay' ] = array(
			'title' => __( 'Overlay', BASEMENT_SLIDER_TEXTDOMAIN ),
			'blocks' => array(
				array(
					'title' => __( 'Content', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'editor',
							'name' => '_basement_meta_slide_overlay_content',
							'value' => get_post_meta( $post->ID, '_basement_meta_slide_overlay_content', true ),
						)
					)
				),
				array(
					'title' => __( 'Background', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'background',
							'name_attr_part' => '_basement_meta_slide_overlay_background',
							'options' => get_post_meta( $post->ID, '_basement_meta_slide_overlay_background', true )
						)
					)
				)
			)
		);

		$config[ 'slide_hover' ] = array(
			'title' => __( 'Hover', BASEMENT_SLIDER_TEXTDOMAIN ),
			'blocks' => array(
				array(
					'title' => __( 'Content', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'editor',
							'name' => '_basement_meta_slide_hover_content',
							'value' => get_post_meta( $post->ID, '_basement_meta_slide_hover_content', true ),
						)
					)
				),
				array(
					'title' => __( 'Background', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'background',
							'name_attr_part' => '_basement_meta_slide_hover_background',
							'options' => get_post_meta( $post->ID, '_basement_meta_slide_hover_background', true )
						)
					)
				)
			)
		);

		$config[ 'slide_link' ] = array(
			'title' => __( 'Link', BASEMENT_SLIDER_TEXTDOMAIN ),
			'blocks' => array(
				array(
					'title' => __( 'URL', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'textarea',
							'name' => '_basement_meta_slide_link',
							'value' => get_post_meta( $post->ID, '_basement_meta_slide_link', true ),
						)
					)
				),
				array(
					'title' => __( 'Title', BASEMENT_SLIDER_TEXTDOMAIN ),
					'description' => __( '', BASEMENT_SLIDER_TEXTDOMAIN ),
					'inputs' => array(
						array(
							'type' => 'text',
							'name' => '_basement_meta_slide_link_title',
							'value' => get_post_meta( $post->ID, '_basement_meta_slide_link_title', true ),
						)
					)
				)
			)
		);

		$config[ 'slide_link' ] = apply_filters( 'basement_post_slide_config_link_section', $config[ 'slide_link' ] );


		return $config;
	}

	public function add_slider_settings_section( $container ) {
		global $post;

		$togglers = $container->appendChild( $container->ownerDocument->createElement( 'div' ) );
		$togglers->setAttribute( 'class', 'basement_admin_togglers basement_admin_background_color_2' );

		$sections = array(
			'content' => __( 'Content', BASEMENT_SLIDER_TEXTDOMAIN ),
			'overlay' => __( 'Overlay', BASEMENT_SLIDER_TEXTDOMAIN ),
			'hover' => __( 'Hover', BASEMENT_SLIDER_TEXTDOMAIN ),
			'link' => __( 'Link', BASEMENT_SLIDER_TEXTDOMAIN ),
		);
				
		$togglers_hash = 'toggler_' . md5( '_add_slider_settings_section' . time() );

		foreach ( $sections as $section => $section_name ) {
			$toggler = $togglers->appendChild( $container->ownerDocument->createElement( 'a', $section_name ) );
			$classes = array(
				'basement_admin_toggler',
				'basement_admin_background_color_2',
				'basement_admin_active_background_color_3',
				'basement_admin_active_hover_background_color_3',
				'basement_admin_hover_background_color_1'
			);

			if ( 'content' == $section ) {
				$classes[] = 'active';
			}

			$toggler->setAttribute( 'class', implode( ' ', $classes ) );
			$toggler->setAttribute( 'href', '#' );
			$toggler->setAttribute( 'data-toggler-target', '.' . $togglers_hash . '_' . $section );
			$toggler->setAttribute( 'data-togglers-group', $togglers_hash );


		}

		$form = Form::instance();

		/**
		 * Content section
		 */
		$toggler_target = $container->appendChild( $container->ownerDocument->createElement( 'div' ) );
		$toggler_target->setAttribute( 'class', $togglers_hash . '_content basement_admin_toggler_target active' );
		$toggler_target->setAttribute( 'data-togglers-group', $togglers_hash );

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_editor( array(
						'name' => '_basement_meta_slide_base_content',
						'value' => get_post_meta( $post->ID, '_basement_meta_slide_base_content', true ),
					) 
				), true
			)
		);

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_background_input( array(
						'label_text' => __( 'Background color', BASEMENT_SLIDER_TEXTDOMAIN ),
						'name_attr_part' => '_basement_meta_slide_base_background',
						'options' => get_post_meta( $post->ID, '_basement_meta_slide_base_background', true )
					) 
				), true
			)
		);


		/**
		 * Overlay section
		 */
		$toggler_target = $container->appendChild( $container->ownerDocument->createElement( 'div' ) );
		$toggler_target->setAttribute( 'class', $togglers_hash . '_overlay basement_admin_toggler_target' );
		$toggler_target->setAttribute( 'data-togglers-group', $togglers_hash );

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_editor( array(
						'name' => '_basement_meta_slide_overlay_content',
						'value' => get_post_meta( $post->ID, '_basement_meta_slide_overlay_content', true )
					) 
				), true
			)
		);

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_background_input( array(
						'label_text' => __( 'Background color', BASEMENT_SLIDER_TEXTDOMAIN ),
						'name_attr_part' => '_basement_meta_slide_overlay_background',
						'options' => get_post_meta( $post->ID, '_basement_meta_slide_overlay_background', true )
					) 
				), true
			)
		);

		/**
		 * Hover section
		 */
		$toggler_target = $container->appendChild( $container->ownerDocument->createElement( 'div' ) );
		$toggler_target->setAttribute( 'class', $togglers_hash . '_hover basement_admin_toggler_target' );
		$toggler_target->setAttribute( 'data-togglers-group', $togglers_hash );

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_editor( array(
						'name' => '_basement_meta_slide_hover_content',
						'value' => get_post_meta( $post->ID, '_basement_meta_slide_hover_content', true )
					) 
				), true
			)
		);

		

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_background_input( array(
						'label_text' => __( 'Background color', BASEMENT_SLIDER_TEXTDOMAIN ),
						'name_attr_part' => '_basement_meta_slide_hover_background',
						'options' => get_post_meta( $post->ID, '_basement_meta_slide_hover_background', true )
					) 
				), true
			)
		);

		/**
		 * Link section
		 */
		$toggler_target = $container->appendChild( $container->ownerDocument->createElement( 'div' ) );
		$toggler_target->setAttribute( 'class', $togglers_hash . '_link basement_admin_toggler_target' );
		$toggler_target->setAttribute( 'data-togglers-group', $togglers_hash );

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_textarea( array(
						'label_text' => __( 'Slide link', BASEMENT_SLIDER_TEXTDOMAIN ),
						'name' => '_basement_meta_slide_link',
						'value' => get_post_meta( $post->ID, '_basement_meta_slide_link', true ),
					)  
				), true
			)
		);

		$toggler_target->appendChild( $container->ownerDocument->importNode( $form->create_input( array(
						'label_text' => __( 'Link title', BASEMENT_SLIDER_TEXTDOMAIN ),
						'name' => '_basement_meta_slide_link_title',
						'value' => get_post_meta( $post->ID, '_basement_meta_slide_link_title', true ),
					)  
				), true
			)
		);

		apply_filters( 'basement_post_slide_config_link_section', $toggler_target, $post );

		return $container;
	}

}

Basement_Slide::init();
