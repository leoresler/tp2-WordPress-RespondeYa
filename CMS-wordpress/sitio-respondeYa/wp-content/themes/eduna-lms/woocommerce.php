<?php
/**
 * Template Name: WooCommerce Template
 *
 * This template is used to display WooCommerce pages.
 *
 * @package Eduna LMS
 */

$eduna_lms_column = is_active_sidebar('eduna-lms-woocommerce-sidebar') ? 'col-lg-9' : 'col-12';

get_header();
?>
<div class="eduna-lms-woocommerce-page eduna-lms-page">
    <div class="container">
        <div class="row">
            <div class="<?php echo $eduna_lms_column;?>">
                <!-- Main Content Area -->
                <main id="main" class="site-main">
                    <?php woocommerce_content(); ?>
                </main>
                <!-- End Main Content Area -->
            </div>
            <?php if (is_active_sidebar('eduna-lms-woocommerce-sidebar')) : ?>
            <div class="col-lg-3 col-12">
                <!-- Sidebar -->
                <aside id="secondary" class="sidebar">               
                    <div class="widget-area">
                        <?php dynamic_sidebar('eduna-lms-woocommerce-sidebar'); ?>
                    </div>
                </aside>
                <!-- End Sidebar -->
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
