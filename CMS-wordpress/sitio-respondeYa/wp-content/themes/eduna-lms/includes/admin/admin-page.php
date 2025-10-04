<?php 

// Add Admin Menu
function eduna_lms_add_admin_menu() {
    add_menu_page(
        'Eduna LMS Settings', // Page Title
        'Eduna LMS', // Menu Title
        'manage_options', // Capability
        'eduna-lms-settings', // Menu Slug
        'eduna_lms_admin_page', // Callback Function
        'dashicons-welcome-learn-more', // Icon
        2 // Position (top)
    );
}
add_action('admin_menu', 'eduna_lms_add_admin_menu');

// Include the Admin Page
function eduna_lms_admin_page() {
    include_once get_template_directory() . '/includes/admin/admin-settings.php';
}


function eduna_lms_dashboard_notice() {
    // Show notice on Dashboard or Themes page
    $current_screen = get_current_screen();
    if ( ! in_array( $current_screen->base, ['dashboard', 'themes'] ) ) {
        return;
    }
    ?>
    <div class="eduna-dashboard-notice notice notice-info is-dismissible">
        <p class="eduna-notice-title">
            <strong><?php printf( esc_html__( 'Hello, %s 👋🏻 You are using the free version of Eduna LMS.', 'eduna-lms' ), esc_html( get_bloginfo( 'name' ) ) ); ?></strong>
        </p>
        
        <p class="eduna-notice-upgrade">
            <strong><?php esc_html_e( 'Eduna LMS Pro 🚀 – Make your Online Education & Course Website to the Next Level!', 'eduna-lms' ); ?></strong>
        </p>
        
        <p class="eduna-notice-text">
            <?php esc_html_e( 'Build your education or LMS website effortlessly with woocommerce ready, premade demos, advanced customization, and SEO-optimized features.', 'eduna-lms' ); ?>
        </p>
        
        <p class="eduna-notice-buttons">
            <a href="<?php echo esc_url(admin_url('admin.php?page=eduna-lms-settings')); ?>" class="button button-primary">
                <?php esc_html_e( 'Install Free Version', 'eduna-lms' ); ?>
            </a>     
            <a href="<?php echo esc_url( 'https://pencilwp.com/product/eduna-lms-pro/' ); ?>" class="button button-primary eduna-btn-pro" target="_blank">
                <?php esc_html_e( 'Upgrade to Premium', 'eduna-lms' ); ?>
            </a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'eduna_lms_dashboard_notice' );


// Enqueue Styles & Scripts
function eduna_lms_admin_assets($hook) {
    // Load styles for Dashboard (index.php), Settings page, and Themes page
    if ($hook !== 'toplevel_page_eduna-lms-settings' && $hook !== 'index.php' && $hook !== 'themes.php') return;

    wp_enqueue_style('eduna-lms-admin-style', get_template_directory_uri() . '/includes/admin/assets/admin-style.css');
    wp_enqueue_script('eduna-lms-admin-script', get_template_directory_uri() . '/includes/admin/assets/admin-scripts.js', array('jquery'), false, true);
}
add_action('admin_enqueue_scripts', 'eduna_lms_admin_assets');
