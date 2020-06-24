<?php

	/* Exit if accessed directly. */
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	$args = array(
	   'public'   => true,
	);
	$all_post_type_objs = get_post_types( $args, 'name' );
	$all_post_type = array();
    if( !empty( $all_post_type_objs ) ) {
		foreach ( $all_post_type_objs as $key => $value ) {

			if( $key != 'attachment' ) {

				$all_post_type[$key] = !empty( $value->labels ) && !empty( $value->labels->menu_name ) ? $value->labels->menu_name : $key;
			}
		}
	}

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_custom_sidebar_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_custom_sidebar_separator', array(
	    'label'      		=> esc_attr__( 'Custom Sidebars', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_custom_sidebar_separator',	   
	    'priority'	 		=> 2, 
	) ) );

	/* End Separator Settings */

	/* Custom Sidebars Settings */
	$wp_customize->add_setting( 'pofo_custom_sidebars', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Custom_Sidebars( $wp_customize, 'pofo_custom_sidebars', array(
	    'label'      		=> esc_attr__( 'Manage Sidebars', 'pofo' ),
	    'type'              => 'pofo_custom_sidebar',
	    'description'		=> esc_attr__( 'You can add widgets in these sidebars at Appearance > Widgets and these sidebars can be assigned in header, footer, pages and posts.', 'pofo' ), 
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_custom_sidebars',	 
	    'priority'	 		=> 2,   
	) ) );

	/* End Custom Sidebars Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_page_scroll_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_page_scroll_separator', array(
	    'label'     		=> esc_attr__( 'Page Scroll', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'   		=> 'pofo_add_general_panel',
	    'settings'  		=> 'pofo_page_scroll_separator',
	    'priority'	 		=> 3,
	) ) );

	/* End Separator Settings */
	
	/* Set Under Construction page */

	$wp_customize->add_setting( 'pofo_disable_page_scrolling_effect', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_page_scrolling_effect', array(
		'label'     		=> esc_attr__( 'Page Smooth Scroll', 'pofo' ),
		'section'   		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_disable_page_scrolling_effect',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
										'1' => esc_html__( 'On', 'pofo' ),
									  	'0' => esc_html__( 'Off', 'pofo' ),
								   	),
		'priority'	 		=> 3,
	) ) );

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_image_meta_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_image_meta_separator', array(
	    'label'      		=> esc_attr__( 'Image Meta Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__('Set visibility for image alt, title and caption attributes with below switch on / off options.', 'pofo'),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_image_meta_separator',	 
	    'priority'	 		=> 5,   
	) ) );

	/* End Separator Settings */

	/* Render Image Alt */
    $wp_customize->add_setting( 'pofo_image_alt', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_alt', array(
		'label'       		=> esc_attr__( 'Alt', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_alt',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Render Image Alt */

	/* Render Image Title */
    $wp_customize->add_setting( 'pofo_image_title', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_title',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Render Image Title */

	/* Show Image Title in Lightbox Popup */
    $wp_customize->add_setting( 'pofo_image_title_lightbox_popup', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_title_lightbox_popup', array(
		'label'       		=> esc_attr__( 'Title in Lightbox Popup', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_title_lightbox_popup',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Show Image Title in Lightbox Popup */

	/* Show Image Caption in Lightbox Popup */
    $wp_customize->add_setting( 'pofo_image_caption_lightbox_popup', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_caption_lightbox_popup', array(
		'label'       		=> esc_attr__( 'Caption in Lightbox Popup', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_caption_lightbox_popup',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Show Image Caption in Lightbox Popup */

	/* Scroll To Top Title Settings */

	$wp_customize->add_setting( 'pofo_scroll_to_top_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_scroll_to_top_separator', array(
	    'label'      		=> esc_attr__( 'Scroll to Top', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_scroll_to_top_separator',
	    'priority'	 		=> 4,
	) ) );

	/* End Scroll To Top Title Settings */

	/* Hide Scroll to Top */

    $wp_customize->add_setting( 'pofo_hide_scroll_to_top', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_scroll_to_top', array(
		'label'       		=> esc_attr__( 'Scroll to Top', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_hide_scroll_to_top',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo' ),
										  	'0' => esc_html__( 'Off', 'pofo' ),
									   	),
		'priority'	 		=> 4,
	) ) );

	/* End Hide Scroll to Top */

	/* Scroll to Top Show on Mobile */

    $wp_customize->add_setting( 'pofo_hide_scroll_to_top_on_phone', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_scroll_to_top_on_phone', array(
		'label'       		=> esc_attr__( 'Show on Mobile', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_hide_scroll_to_top_on_phone',
		'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo' ),
										  	'0' => esc_html__( 'Off', 'pofo' ),
									   	),
		'priority'	 		=> 4,
	) ) );

	/* End Scroll to Top Show on Mobile */

	/* Button size setting */

	$wp_customize->add_setting( 'pofo_scroll_to_top_button_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_scroll_to_top_button_size', array(
		'label'       		=> esc_attr__( 'Button size', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_scroll_to_top_button_size',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'text',
	    'priority'	 		=> 4,
	) ) );
	
	/* End Button size setting */

	/* Button icon size setting */

	$wp_customize->add_setting( 'pofo_scroll_to_top_button_icon_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_scroll_to_top_button_icon_size', array(
		'label'       		=> esc_attr__( 'Button icon size', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_scroll_to_top_button_icon_size',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'text',
	    'priority'	 		=> 4,
	) ) );
	
	/* End Button icon size setting */

	/* Button thickness */

    $wp_customize->add_setting( 'pofo_scroll_to_top_button_icon_thickness', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_scroll_to_top_button_icon_thickness', array(
		'label'       		=> esc_attr__( 'Button icon thickness', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_scroll_to_top_button_icon_thickness',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo' ),
										  	'0' => esc_html__( 'Off', 'pofo' ),
									   	),
		'priority'	 		=> 4,
	) ) );

	/* End Button thickness */

	/* Button color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_color', array(
	    'label'      		=> esc_attr__( 'Button Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button color setting */

	/* Button Hover color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_hover_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button Hover color setting */

	/* Button BG color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_bg_color', array(
	    'label'      		=> esc_attr__( 'Button Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_bg_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button BG color setting */

	/* Button Hover BG color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_hover_bg_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_hover_bg_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button Hover BG color setting */

	/* Callback Functions */

    if ( ! function_exists( 'pofo_scroll_to_top_callback' ) ) :
		function pofo_scroll_to_top_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_hide_scroll_to_top' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Callback Functions */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_portfolio_rewrite_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_rewrite_separator', array(
	    'label'      		=> esc_attr__( 'Portfolio URL Slug', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__('Set portfolio, categories and tags url slug. After updating slug in this setting please go to Settings > Permalinks and click Save Changes button to have this new url slug change affected in your overall website.', 'pofo'),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_portfolio_rewrite_separator',
	    'priority'	 		=> 6,	    
	) ) );

	/* End Separator Settings */

	/* Portfolio URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_url_slug', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_url_slug', array(
		'label'       		=> esc_attr__( 'Portfolio URL Slug', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_portfolio_url_slug',
		'type'              => 'text',	
		'priority'	 		=> 6,	
	) ) );
	/* End Portfolio URL Slug */

	/* Categories URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_cat_url_slug', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_cat_url_slug', array(
		'label'       		=> esc_attr__( 'Categories URL Slug', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_portfolio_cat_url_slug',
		'type'              => 'text',
		'priority'	 		=> 6,		
	) ) );
	/* End Categories URL Slug */

	/* Tags URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_tags_url_slug', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_tags_url_slug', array(
		'label'       		=> esc_attr__( 'Tags URL Slug', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_portfolio_tags_url_slug',
		'type'              => 'text',
		'priority'	 		=> 6,
	) ) );
	/* End Tags URL Slug */

	/* Search Block Settings */
	$wp_customize->add_setting( 'pofo_search_block_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_search_block_separator', array(
	    'label'      		=> esc_attr__( 'Search Block Settings', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__( 'Set search placeholder text.', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_search_block_separator',
	) ) );

	/* End Search Block Settings */

	/* Search Block Placeholder Text */

	$wp_customize->add_setting( 'pofo_search_placeholder_text', array(
		'default' 			=> 'Enter your keywords...',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_search_placeholder_text', array(
		'label'       		=> esc_attr__( 'Placeholder Text', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_search_placeholder_text',
		'type'              => 'text',
	) ) );
	
	/* End Search Block Placeholder Text */

	/* Header Search Options  */

	$wp_customize->add_setting( 'pofo_search_content_setting', array(
        'default'           => array( 'page','post'),
        'sanitize_callback' => 'esc_attr'
    ) );
	$wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_search_content_setting', array(
        'label'   			=> esc_attr__( 'Search Options', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section' 			=> 'pofo_add_general_panel',
        'settings'			=> 'pofo_search_content_setting',
        'choices'           => $all_post_type,
    ) ) );

	/* End Header Search Options */