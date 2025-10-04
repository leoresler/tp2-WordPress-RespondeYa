<?php
/**
 * Register required plugins using TGMPA.
 *
 * @package Eduna LMS
 */

require_once get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'eduna_lms_register_required_plugins');

function eduna_lms_register_required_plugins() {

    $plugins = array(
        array(
            'name'     => 'Elementor Website Builder',
            'slug'     => 'elementor',
            'required' => false,
        ),
        array(
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'     => 'Tutor LMS',
            'slug'     => 'tutor',
            'required' => false,
        ),
        array(
            'name'     => 'X Addons for Elementor',
            'slug'     => 'x-addons-elementor',
            'required' => false,
        ),
        array(
            'name'     => 'Kirki Customizer Framework',
            'slug'     => 'kirki',
            'required' => false,
        ),
        array(
            'name'     => 'Contact Form 7',
            'slug'     => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name'     => 'One Click Demo Import',
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
    );

    $config = array(
        'id'           => 'eduna-lms',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'is_automatic' => false, // Manual activation (WordPress.org compliant)
    );

    tgmpa($plugins, $config);
}
