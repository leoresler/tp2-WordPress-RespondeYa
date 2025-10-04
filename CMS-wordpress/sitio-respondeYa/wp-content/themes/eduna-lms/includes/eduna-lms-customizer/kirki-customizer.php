<?php
add_action( 'init', 'eduna_lms_kirki_customizer_setup' );

function eduna_lms_kirki_customizer_setup() {


Kirki::add_config( 'my_theme_config', array(
    'capability' => 'edit_theme_options',
    'option_type' => 'theme_mod',
) );


new \Kirki\Panel(
	'eduna_lms_panel_id',
	[
		'priority'    => 1,
		'title'       => esc_html__( 'Eduna LMS: Theme Options', 'eduna-lms' ),
		'description' => esc_html__( 'Theme Settings.', 'eduna-lms' ),
	]
);


/* Topbar Settings */
new \Kirki\Section(
	'eduna_lms_header',
	[
		'title'       => esc_html__( 'Header Settings', 'eduna-lms' ),
		'description' => esc_html__( 'Customize Header Options.', 'eduna-lms' ),
		'panel'       => 'eduna_lms_panel_id',
		'priority'    => 160,
	]
);


/* Header Search Form */
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'header_category_search',
		'label'       => esc_html__( 'Show Search Form?', 'eduna-lms' ),
		'section'     => 'eduna_lms_header',
		'default'     => 'off',
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'eduna-lms' ),
			'off' => esc_html__( 'Disable', 'eduna-lms' ),
		],
		'priority' => 3,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'header_register_text',
		'label'    => esc_html__( 'Register Button Text', 'eduna-lms' ),
		'section'  => 'eduna_lms_header',
		'default'  => esc_html__( 'Register', 'eduna-lms' ),
		'priority' => 8,
	]
);

new \Kirki\Field\URL(
	[
		'settings' => 'header_register_url',
		'label'    => esc_html__( 'Register Button Link', 'eduna-lms' ),
		'section'  => 'eduna_lms_header',
		'default'  => esc_html__( '#', 'eduna-lms' ),
		'priority' => 5,
	]
);



new \Kirki\Field\Text(
	[
		'settings' => 'header_login_btn_text',
		'label'    => esc_html__( 'Login Button Text', 'eduna-lms' ),
		'section'  => 'eduna_lms_header',
		'default'  => esc_html__( 'Dashboard', 'eduna-lms' ),
		'priority' => 8,
	]
);

new \Kirki\Field\URL(
	[
		'settings' => 'header_login_btn_url',
		'label'    => esc_html__( 'Login Button URL', 'eduna-lms' ),
		'section'  => 'eduna_lms_header',
		'default'  => esc_html__( '#', 'eduna-lms' ),
		'priority' => 5,
	]
);


new \Kirki\Field\Text(
	[
		'settings' => 'header_contact_number',
		'label'    => esc_html__( 'Contact Number', 'eduna-lms' ),
		'section'  => 'eduna_lms_header',
		'default'  => esc_html__( '+532-321-3333', 'eduna-lms' ),
		'priority' => 8,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'header_email_address',
		'label'    => esc_html__( 'Email Address', 'eduna-lms' ),
		'section'  => 'eduna_lms_header',
		'default'  => esc_html__( 'hello.eduna@example.com', 'eduna-lms' ),
		'priority' => 8,
	]
);


/* Product Category Settings */
new \Kirki\Section(
	'eduna_lms_page_breadcrumb',
	[
		'title'       => esc_html__( 'Breadcrumbs', 'eduna-lms' ),
		'description' => esc_html__( 'Breadcrumbs Settings.', 'eduna-lms' ),
		'panel'       => 'eduna_lms_panel_id',
		'priority'    => 160,
	]
);

new \Kirki\Field\Checkbox(
	[
		'settings'    => 'eduna_lms_page_bc',
		'label'       => esc_html__( 'Show page breadcrumb', 'eduna-lms' ),
		'section'     => 'eduna_lms_page_breadcrumb',
		'default'     => true,
	]
);

new \Kirki\Field\Checkbox(
	[
		'settings'    => 'eduna_lms_archive_bc',
		'label'       => esc_html__( 'Show Archive breadcrumb', 'eduna-lms' ),
		'section'     => 'eduna_lms_page_breadcrumb',
		'default'     => true,
	]
);

new \Kirki\Field\Checkbox(
	[
		'settings'    => 'eduna_lms_search_bc',
		'label'       => esc_html__( 'Show Search breadcrumb', 'eduna-lms' ),
		'section'     => 'eduna_lms_page_breadcrumb',
		'default'     => true,
	]
);

}