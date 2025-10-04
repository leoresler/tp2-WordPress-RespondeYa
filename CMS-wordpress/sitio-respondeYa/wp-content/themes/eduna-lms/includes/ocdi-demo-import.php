<?php
add_action('ocdi/after_import', 'eduna_lms_after_import_setup');

function eduna_lms_after_import_setup() {
    // Assign Homepage and Blog Page
    $homepage = get_page_by_title('Eduna Home'); // Change 'Eduna Home' to your actual homepage title
    $blogpage = get_page_by_title('Blog'); // Change 'Blog' to your actual blog page title

    if ($homepage) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $homepage->ID);
    }

    if ($blogpage) {
        update_option('page_for_posts', $blogpage->ID);
    }

    // Assign Navigation Menus
    $menu_locations = get_theme_mod('nav_menu_locations');
    if (!$menu_locations) {
        $menu_locations = [];
    }
    $menus = wp_get_nav_menus(); // Get all menus

    if (!empty($menus)) {
        foreach ($menus as $menu) {
            if ($menu->name === 'Primary') {
                $menu_locations['menu-1'] = $menu->term_id;
                break; // Stop looping once the correct menu is found
            }
        }
        set_theme_mod('nav_menu_locations', $menu_locations); // Assign menu locations
    }

    // Flush cache to apply changes
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }
}

