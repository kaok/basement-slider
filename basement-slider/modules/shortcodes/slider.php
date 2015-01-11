<?php
defined('ABSPATH') or die();

class Basement_Shortcode_Slider extends Basement_Shortcode {


	public function section_config( $config = array() ) {

		$config = array(
			'description' => __( 'Creates carousel based on CarouFredSel jQuery plugin.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'blocks' => array()
		);

		$config[ 'blocks' ][] = array(
			'type' => 'radios',
			'title' => __( 'Effect', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets one of available effects.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'effect',
			'input' => array(
				'values' => array(
					'0' => __( 'Crossfade', BASEMENT_SLIDER_TEXTDOMAIN ),
					'directscroll' => __( 'Directscroll', BASEMENT_SLIDER_TEXTDOMAIN ),
					'slide' => __( 'Slide', BASEMENT_SLIDER_TEXTDOMAIN ),
					'fade' => __( 'Fade', BASEMENT_SLIDER_TEXTDOMAIN )
				)
			)
		);

		$config['blocks'][] = array(
			'type' => 'toggler',
			'param' => 'random',
			'title' => __( 'Random', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Shuffles slides on rendering.', BASEMENT_SLIDER_TEXTDOMAIN )
		);

		$config[ 'blocks' ][] = array(
			'type' => 'toggler',
			'title' => __( 'Arrows', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Check to use pagination arrows.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'arrows'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'toggler',
			'title' => __( 'Use dots', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Check to use pagination dots.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'dots'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'toggler',
			'title' => __( 'Logos style', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Check to use special style on slider.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'logos_style'
		);

		$config[ 'blocks' ][] = array(
			'title' => __( 'Minimum slides', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Enter integer value of slides to limit minimum items to show.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'min'
		);

		$config[ 'blocks' ][] = array(
			'title' => __( 'Maximum slides', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Enter integer value of slides to limit maximum items to show.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'max'
		);

		$config[ 'blocks' ][] = array(
			'title' => __( 'Height', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets slider height in pixels. Use integer value without "px".', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'height'
		);

		// TODO: add "common title" option to block config to create similar blocks title
		$config[ 'blocks' ][] = array(
			'title' => __( 'Header', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Text to show above slider.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'header'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'colorpicker',
			'title' => __( 'Header color', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets header text color.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'header_color'
		);

		$config[ 'blocks' ][] = array(
			'title' => __( 'Header size', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets header size. Use integer value without "px".', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'header_size'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'radios',
			'title' => __( 'Header align', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets header text alignment.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'header_align',
			'input' => array(
				'values' => array(
					'0' => __( 'Right', BASEMENT_SLIDER_TEXTDOMAIN ),
					'center' => __( 'Center', BASEMENT_SLIDER_TEXTDOMAIN ),
					'left' => __( 'Left', BASEMENT_SLIDER_TEXTDOMAIN ),
				),
			)
		);

		$config[ 'blocks' ][] = array(
			'title' => __( 'Top offset', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Adds top offset fot each slide content.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'slides_top_offset'
		);

		$config[ 'blocks' ][] = array(
			'title' => __( 'Label', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Text to show on slide label.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'textarea',
			'title' => __( 'Label link', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Link to use for label. Leave blank to disable link.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label_link'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'radios',
			'title' => __( 'Label link type', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Defines label link type. Video and Images gallery links are shown in popup.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label_link_type',
			'input' => array(
				'values' => array(
					'0' => __( 'Regular', BASEMENT_SLIDER_TEXTDOMAIN ),
					'video' => __( 'Video', BASEMENT_SLIDER_TEXTDOMAIN ),
					'gallery' => __( 'Images gallery (fill "Link" field with links to mediafiles; separate with commas)', BASEMENT_SLIDER_TEXTDOMAIN ),
				)
			)
		);

		$config[ 'blocks' ][] = array(
			'type' => 'colorpicker',
			'title' => __( 'Label color', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets label background color.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label_color'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'colorpicker',
			'title' => __( 'Label hover color', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Sets label hover background color.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label_hover_color'
		);

		$config[ 'blocks' ][] = array(
			'type' => 'radios',
			'title' => __( 'Label position', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Defines label position.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label_position',
			'input' => array(
				'values' => array(
					'0' => __( 'Bottom', BASEMENT_SLIDER_TEXTDOMAIN ),
					'top' => __( 'Top', BASEMENT_SLIDER_TEXTDOMAIN ),
				)
			)
		);

		$config[ 'blocks' ][] = array(
			'type' => 'radios',
			'title' => __( 'Label align', BASEMENT_SLIDER_TEXTDOMAIN ),
			'description' => __( 'Defines label alignment.', BASEMENT_SLIDER_TEXTDOMAIN ),
			'param' => 'label_align',
			'input' => array(
				'values' => array(
					'0' => __( 'Right', BASEMENT_SLIDER_TEXTDOMAIN ),
					'left' => __( 'Left', BASEMENT_SLIDER_TEXTDOMAIN ),
				)
			)
		);

		// TODO: don't init this shortcode if Slides CPT is not available
		if ( !post_type_exists( 'slide' ) ) {
			return $config;
		}
		

		$items = get_posts(array(
			'post_type' => 'slide',
			'posts_per_page' => -1
		));

		if ( count( $items ) ) {
			$config['blocks'][] = array(
				'title' => __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ),
				'description' => __( 'Click on squares/images to choose items you want to display in slider. Sort items with drag\'n\'drop.', BASEMENT_SLIDER_TEXTDOMAIN ),
				'type' => 'sortable_posts',
				'param' => 'id',
				'input' => array(
					'posts' => $items,
					'no_hidden' => true
				)
			);
		}

		return $config;
	}


				// TODO: save as filters template
				// $post_types_filters_header = $container->appendChild( $container->ownerDocument->createElement( 'div', __( 'Slides', BASEMENT_SLIDER_TEXTDOMAIN ) ) );
				// $post_types_filters_header->setAttribute( 'class', 'basement_shortcode_panel_shortcode_header' );
				
				// $post_types_filters = $container->appendChild( $container->ownerDocument->createElement( 'div' ) );
				// $post_types_filters->setAttribute( 'class', 'basement_admin_filters basement_admin_background_color_2' );
				// foreach ( $this->params[ 'post_type' ] as $post_type ) {
				// 	$post_type_object = get_post_type_object( $post_type );
				// 	if ( !$post_type_object ) {
				// 		continue;
				// 	}
				// 	$post_type_filter = $post_types_filters->appendChild( $container->ownerDocument->createElement( 'a', $post_type_object->labels->name ) );
				// 	$post_type_filter->setAttribute( 
				// 		'class', 
				// 		implode( ' ', array(
				// 				'basement_admin_filter',
				// 				'basement_admin_background_color_2',
				// 				'basement_admin_active_background_color_3',
				// 				'basement_admin_active_hover_background_color_3',
				// 				'basement_admin_hover_background_color_1'
				// 			) 
				// 		)
				// 	);
				// 	$post_type_filter->setAttribute( 'data-filter', '.' . $filters_hash . '_filter_' . $post_type );
				// 	$post_type_filter->setAttribute( 'data-filters-group', $filters_hash );
				// }
				// $param = Shortcode::create_param_wrapper( $container, 'check', 'id' );
				// $param->appendChild ( $container->ownerDocument->importNode( $this->form->create_sortable_posts_list_checkboxes( array(
				// 				'name' => 'carousel_caroufredsel_' . $this->tag,
				// 				'posts' => $items,
				// 				'no_hidden' => true,
				// 				'filters_hash' => $filters_hash
				// 			) 
				// 		), true
				// 	)
				// );

	public function render( $atts = array(), $content = '' ) {

		extract( $atts = wp_parse_args( $atts, array(
					'id' => '',
					'effect' => false,
					'label' => '',
					'label_link' => '',
					'label_color' => '',
					'label_hover_color' => '',
					'label_position' => '',
					'label_align' => '',
					'min' => 1,
					'max' => 5,
					'height' => '',
					'slides_top_offset' => ''
				) 
			)
		);

		$dom = new DOMDocument( '1.0', 'UTF-8' );

		$layers_contents = array();
		if ( !empty( $this->params[ 'post_type' ] ) ) {

			$items = $this->get_posts_by_ids( $id, $this->params[ 'post_type' ] );
			if ( count( $items ) ) {

				if ( in_array( 'random', $atts ) ) {
					shuffle( $items );
				}

				$article = $dom->appendChild( $dom->createElement( 'div' ) );

				$article_classes = array(
					'ribbon',
					'slider'
				);

				/**
				 * Filter: basement_shortcode_render_carousel_caroufredsel_{ $this->tag }_container_classes
				 */
				$article->setAttribute( 'class', implode( ' ', apply_filters( $this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_container_classes', $article_classes, $atts ) ) );
				if ( !empty( $atts[ 'header' ] ) || ( !empty( $atts[ 'label_position' ] ) && $atts[ 'label_position' ] == 'top' ) ) {

					$header_container = $article->appendChild( $article->ownerDocument->createElement( 'div' ) );
					$header_container->setAttribute( 'class', 'container basement_caroufredsel_slider_header_container' );

					$div = $header_container->appendChild( $article->ownerDocument->createElement( 'div' ) );

					if ( empty( $atts[ 'header_align' ] ) || 'right' == $atts[ 'header_align' ] ) {
						$class = ' text-right';
					} else if ( 'center' == $atts[ 'header_align' ] ) {
						$class = 'text-center';
					} else {
						$class = '';
					}

					$div->setAttribute( 'class', 'col-xs-12 ' . $class );

					if ( !empty( $atts[ 'header' ] ) ) {
						$header = $div->appendChild( $article->ownerDocument->createElement( 'h4', $atts[ 'header' ] ) );
						$header->setAttribute( 'class', 'text-muted' );
						$header_style = '';
						if ( !empty( $atts[ 'header_size' ] ) ) {
							$header_style .= 'font-size: ' . $atts[ 'header_size' ] . 'px;';
						}
						if ( !empty( $atts[ 'header_color' ] ) ) {
							$header_style .= 'color: ' . $atts[ 'header_color' ] . ';';
						}
						if ( $header_style ) {
							$header->setAttribute( 'style', $header_style );
						}
					}
					if ( !empty( $atts[ 'label' ] ) && !empty( $atts[ 'label_position' ]) && $atts[ 'label_position' ] == 'top' ) {
						$label_link_container = $div->appendChild( $article->ownerDocument->createElement( 'a', $atts[ 'label' ] ) );
						if ( !empty( $atts[ 'label_color' ] ) ) {
							$label_link_container->setAttribute( 'style', 'background-color: ' . $atts[ 'label_color' ] );
						}
						if ( !empty( $atts[ 'label_hover_color' ] ) ) {
							$label_link_container->setAttribute( 'onmouseover', 'this.style.backgroundColor = \'' . $atts[ 'label_hover_color' ] .'\'' );
							$normal_bg_color = !empty( $atts[ 'label_color' ] ) ? $atts[ 'label_color' ] : '' ;
							$label_link_container->setAttribute( 'onmouseout', 'this.style.backgroundColor = \'' . $normal_bg_color . '\'' );
						}
						$label_link_classes = array( 'block-link' );
						if ( empty( $atts[ 'label_align' ] ) || 'left' != $atts[ 'label_align' ] ) {
							$label_link_classes[] = ' right';
						}
						if ( !empty( $atts[ 'label_link_type' ] ) && 'gallery' == $atts[ 'label_link_type'] ) {
							$label_link_classes[] = 'magnific-gallery';
							if ( !empty( $atts[ 'label_link' ] ) ) {
								$label_link_container->setAttribute( 'data-gallery', $atts[ 'label_link' ] );
							}
							$label_link_container->setAttribute( 'href', '#' );
						} else {
							if ( !empty( $atts[ 'label_link' ] ) ) {
								$label_link_container->setAttribute( 'href', $atts[ 'label_link' ] );
							}
						}
						$label_link_container->setAttribute( 'class', implode( ' ', $label_link_classes ) );

					}

				}

				$container = apply_filters( $this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_before_carousel_wrapper', $article, $atts, $items );

				$carouwrap = $article->appendChild( $dom->createElement( 'div' ) );
				$carouwrap->setAttribute( 'class', 'carouwrap clearfix' );

				

				/**
				 * Filter: basement_shortcode_render_carousel_caroufredsel_{ $this->tag }_ul_wrapper
				 */
				$ul_container = apply_filters( $this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_ul_wrapper', $carouwrap, $atts );
				$ul = $ul_container->appendChild( $dom->createElement( 'ul' ) );

				if ( $effect && in_array( 
						$effect , 
						array(
							'slide', 'fade', 'crossfade', 'directscroll'
							) 
						)
					) {
					$ul->setAttribute( 'data-fx', $effect );
				}

				$data_min = absint( $min );
				$data_max = absint( $max );

				if ( $data_min > $data_max ) {
					$data_max = null;
				}

				if ( $data_min ) {
					$ul->setAttribute( 'data-min', $data_min );
				}

				if ( $data_max ) {
					$ul->setAttribute( 'data-max', $data_max );
				}

				$height = absint( $height );
				if ( $height ) {
					$ul->setAttribute( 'data-height', $height );
				}

				$slides_top_offset = absint( $slides_top_offset );
				if ( $slides_top_offset ) {
					$ul->setAttribute( 'data-padding-top', $slides_top_offset );
				}

				global $post;
				$current_post = $post;
				foreach ( $items as $post ) {
					setup_postdata( $post );
					$li = $ul->appendChild( $dom->createElement( 'li' ) );
					/**
					 * Filter: basement_shortcode_render_carousel_caroufredsel_{ $this->tag }_li_classes
					 */
					$li->setAttribute( 'class', implode( ' ', apply_filters( $this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_li_classes', 
								array(),
								$atts
							)
						) 
					);

					$slide_layers = array(
						'base',
						'overlay',
						'hover'
					);

					$content_container = $li;

					foreach ( $slide_layers as $slide_layer ) {
						$background = get_post_meta( $post->ID, '_basement_meta_slide_' . $slide_layer . '_background', true );

						$background_image_src = empty( $background['image'] ) ? '' : wp_get_attachment_url( $background['image'] );

						$background_color = '';
						if ( !empty( $background[ 'color' ] ) ) {
							$background_color = Color_Converter::instance()
										->hex_to_rgb( $background[ 'color' ] )
										->set_opacity( $background[ 'opacity' ] )
										->get_css_value();
						}

						$style = 
							( empty( $background_color ) ? '' : 'background-color:' . $background_color . ';' ) .
							( empty( $background_image_src ) ? '' : 'background-image: url(' . esc_attr( $background_image_src ) . ');' ) .
							( empty( $background[ 'position' ] ) || $background[ 'position' ] == 'left top' ? '' : 'background-position:' . $background[ 'position' ] . ';' ) .
							( empty( $background[ 'repeat' ] ) || $background[ 'repeat' ] == 'no-repeat' ? '' : 'background-repeat:' . $background[ 'repeat' ] . ';' ) .
							( empty( $background[ 'size' ] ) || $background[ 'size' ] == 'auto' ? '' : 'background-size:' . $background[ 'size' ] . ';' ) .
							( empty( $background[ 'attachment' ] ) || $background[ 'attachment' ] == 'scroll' ? '' : 'background-attachment:' . $background[ 'attachment' ] . ';' );



						if ( $height ) {
							$style .= 'height: ' . $height . 'px;';
						}

						$post_content_key = '#basement_slide_' . $slide_layer . '_content_' . $post->ID;

						$slide_content = get_post_meta( $post->ID, '_basement_meta_slide_' . $slide_layer . '_content', true );
						if ( 'base' == $slide_layer ) {
							$content_container->appendChild( $dom->createTextNode( $post_content_key ) );
							if ( $style ) {
								$content_container->setAttribute( 'style', $style );
							}
						} else {
							if ( $slide_content || !empty( $background_color ) || !empty( $background_image_src ) ) {
								$upper_layer_container = $content_container->appendChild( $dom->createElement( 'span', $post_content_key ) );
								$upper_layer_container->setAttribute( 'class', 'basement_slide_upper_layer basement_slide_' . $slide_layer . '_layer' );
								$layers_contents[ $post_content_key ] = do_shortcode( $slide_content );
								if ( $style ) {
									$upper_layer_container->setAttribute( 'style', $style );
								}
							}
						}
						
						$layers_contents[ $post_content_key ] = apply_filters( 
							$this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_item_content',
							wpautop( do_shortcode( $slide_content ) )
						);

					}

					$slide_link = get_post_meta( $post->ID, '_basement_meta_slide_link', true );
					if ( $slide_link ) {
						$link_layer = $content_container->appendChild( $dom->createElement( 'a' ) );
						$link_layer_classes = array(
							'basement_slide_upper_layer',
							'basement_slide_link'
						);

						$link_layer->setAttribute( 'class', implode( ' ', apply_filters( 'basement_post_slide_link_layer_classes', $link_layer_classes, $post ) ) );
						$link_layer->setAttribute( 'href', apply_filters( 'basement_post_slide_link_layer_href', $slide_link, $post ) );
						$link_layer_title = get_post_meta( $post->ID, '_basement_meta_slide_link_title', true );
						if ( !$link_layer_title ) {
							$link_layer_title = get_the_title( $post->ID );
						}
						$link_layer->setAttribute( 'title', $link_layer_title );
						
						apply_filters( 'basement_post_slide_link_layer', $link_layer, $post, $slide_link );
					}

					/**
					 * Filter: basement_shortcode_render_carousel_caroufredsel_{ $this->tag }_append_after_slide_content
					 */
					apply_filters( $this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_append_after_slide_content', $content_container, $post );


				}
				wp_reset_query();

				$slidebar = $carouwrap->appendChild( $dom->createElement( 'div' ) );
				$slidebar->setAttribute( 'class', 'slidebar' );

				/**
				 * Filter: basement_shortcode_render_carousel_caroufredsel_{ $this->tag }_prepend_slidebar
				 */
				apply_filters( $this->textdomain . '_render_carousel_caroufredsel_' . $this->tag . '_prepend_slidebar', $slidebar, $atts, $items );

				if ( empty( $label_position ) && !empty( $atts['label'] ) ) {
					$label_link_container = $slidebar->appendChild( $article->ownerDocument->createElement( 'div' ) );

					$label_link_container->setAttribute( 'class', 'container' );
					$label_link_container = $label_link_container->appendChild( $article->ownerDocument->createElement( 'a', $atts[ 'label' ] ) );
					if ( !empty( $atts[ 'label_color' ] ) ) {
						$label_link_container->setAttribute( 'style', 'background-color: ' . $atts[ 'label_color' ] );
					}
					if ( !empty( $atts[ 'label_hover_color' ] ) ) {
						$label_link_container->setAttribute( 'onmouseover', 'this.style.backgroundColor = \'' . $atts[ 'label_hover_color' ] .'\'' );
						$normal_bg_color = !empty( $atts[ 'label_color' ] ) ? $atts[ 'label_color' ] : '' ;
						$label_link_container->setAttribute( 'onmouseout', 'this.style.backgroundColor = \'' . $normal_bg_color . '\'' );
					}
					$label_link_classes = array( 'block-link' );
					if ( empty( $atts[ 'label_align' ] ) || 'left' != $atts[ 'label_align' ] ) {
						$label_link_classes[] = ' right';
					}
					if ( !empty( $atts[ 'label_link_type' ] ) && 'gallery' == $atts[ 'label_link_type'] ) {
						$label_link_classes[] = 'magnific-gallery';
						if ( !empty( $atts[ 'label_link' ] ) ) {
							$label_link_container->setAttribute( 'data-gallery', $atts[ 'label_link' ] );
						}
						$label_link_container->setAttribute( 'href', '#' );
					} else {
						if ( !empty( $atts[ 'label_link' ] ) ) {
							$label_link_container->setAttribute( 'href', $atts[ 'label_link' ] );
						}
					}
					$label_link_container->setAttribute( 'class', implode( ' ', $label_link_classes ) );
				}
				


				if ( in_array( 'arrows', $atts ) ) {
					$nav_prev = $slidebar->appendChild( $dom->createElement( 'a' ) );
					$nav_prev->setAttribute( 'class', 'arrow prev' );
					$nav_prev->setAttribute( 'href', '#' );
					$nav_prev->appendChild( $dom->createElement( 'i' ) );

					$nav_next = $slidebar->appendChild( $dom->createElement( 'a' ) );
					$nav_next->setAttribute( 'class', 'arrow next' );
					$nav_next->setAttribute( 'href', '#' );
					$nav_next->appendChild( $dom->createElement( 'i' ) );
				}

				if ( in_array( 'dots', $atts ) ) {
					$nav_pages = $slidebar->appendChild( $dom->createElement( 'nav' ) );
					$nav_pages->setAttribute( 'class', 'nav-pages' );
				}
			}
		}

		$markup = sprintf( $dom->saveHTML(), do_shortcode( $content ) );

		return str_replace( array_keys( $layers_contents ), $layers_contents, $markup );
	}

}