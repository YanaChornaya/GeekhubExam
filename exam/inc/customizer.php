<?php
/**
 * exam Theme Customizer.
 *
 * @package exam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function exam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*---------------------Social-------------------------*/

	$wp_customize->add_section('my_social_settings', array(
			'title' => __('Social Media Icons', ''),
			'priority' => 35
	));
	$social_sites = my_customizer_social_media_array();
	$priority = 5;
	foreach ($social_sites as $social_site) {
		$wp_customize->add_setting("$social_site", array(
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control($social_site, array(
				'label' => __("$social_site url:", ''),
				'section' => 'my_social_settings',
				'type' => 'text',
				'priority' => $priority
		));
		$priority = $priority + 5;
	}

	/*-------------------About----------------------*/
	$wp_customize->add_section('about', array(
			'title' => __('About', 'exam'),
			'priority' => 30,
	));

	$wp_customize->add_setting('about-description', array(
			'default' => '',
			'transport' => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'about-description', array(
			'label' => __('About description', 'rex'),
			'section' => 'about',
			'settings' => 'about-description',
			'priority' => 1
	)
	));

	/*-----------------Logo---------------------*/
	$wp_customize->add_section('logo', array(
			'title' => __('Logo', 'exam'),
			'priority' => 30,
	));

	$wp_customize->add_setting('logo-img', array(
			'default' => '',
			'transport' => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'logo-img', array(
			'label' => __('Logo', 'rex'),
			'section' => 'logo',
			'settings' => 'logo-img',
			'priority' => 1
	)
	));

	/*------------------Phone----------------------*/
	$wp_customize->add_section('header-phone', array(
			'title' => __('Header phone', 'exam'),
			'priority' => 30,
	));

	$wp_customize->add_setting('phone-header', array(
			'default' => '',
			'transport' => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'header-phone', array(
					'label' => __('Header phone', 'rex'),
					'section' => 'header-phone',
					'settings' => 'phone-header',
					'priority' => 1
			)
	));
}
add_action( 'customize_register', 'exam_customize_register' );

function my_customizer_social_media_array()
{
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');
	return $social_sites;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function exam_customize_preview_js() {
	wp_enqueue_script( 'exam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'exam_customize_preview_js' );


