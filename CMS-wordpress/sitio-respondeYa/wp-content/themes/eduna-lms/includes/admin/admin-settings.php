<div class="wrap eduna-admin-wrap">
    <h1><?php esc_html_e(' Welcome to Eduna LMS! 🎉', 'eduna-lms'); ?></h1>

    <p><?php esc_html_e(' Thank you for choosing the Eduna LMS WordPress Theme! 🚀', 'eduna-lms'); ?></p>
    <p>
        <?php esc_html_e('In the free version, you must manually install as per WordPress rules. It’s super easy — just follow 3 simple steps 😊.', 'eduna-lms'); ?><br>
        <b><?php esc_html_e('Our pro version, the installation process is super easy — just one click!', 'eduna-lms'); ?>
        </b>
    </p>
    <p>
    <a href="<?php echo esc_url( 'https://pencilwp.com/product/eduna-lms' ); ?>" class="button button-secondary" target="_blank">
        <?php esc_html_e( 'Free Version', 'eduna-lms' ); ?>
    </a>   
    <a href="<?php echo esc_url( 'https://demo.pencilwp.com/preview/eduna-wp/' ); ?>" class="button button-primary" target="_blank">
        <?php esc_html_e( 'View Premium Demo', 'eduna-lms' ); ?>
    </a> 
    <a href="<?php echo esc_url( 'https://pencilwp.com/product/eduna-lms-pro/' ); ?>" class="button button-primary eduna-btn-pro" target="_blank">
        <?php esc_html_e( 'Upgrade to Premium', 'eduna-lms' ); ?>
    </a>
    </p>

    <h2 class="nav-tab-wrapper">
        <a href="#installation" class="nav-tab nav-tab-active"><?php esc_html_e('Installation Guide', 'eduna-lms'); ?></a>
        <a href="#customization" class="nav-tab"><?php esc_html_e('Customization', 'eduna-lms'); ?></a>
        <a href="#features" class="nav-tab"><?php esc_html_e('Free vs Pro Features', 'eduna-lms'); ?></a>
        <a href="#documentation" class="nav-tab"><?php esc_html_e('Documentation', 'eduna-lms'); ?></a>
    </h2>

    <div id="installation" class="tab-content">
       

        <table class="widefat">
            <thead>
                <tr>
                    <th><?php esc_html_e('Step', 'eduna-lms'); ?></th>
                    <th><?php esc_html_e('Action', 'eduna-lms'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b><?php esc_html_e('Step 1:', 'eduna-lms'); ?></b></td>
                   
                    <td>
                        <?php esc_html_e('You may encounter issues while bulk-installing plugins. Make sure all plugins are installed and activated.', 'eduna-lms'); ?><br>
                        <a href="<?php echo esc_url(admin_url('themes.php?page=tgmpa-install-plugins')); ?>" target="_blank" class="button button-secondary btn-demo"><?php esc_html_e('Install Required Plugins', 'eduna-lms'); ?></a>
                    </td>
                </tr>
                <tr>
                    <td><b><?php esc_html_e('Step 2:', 'eduna-lms'); ?></b></td>
                    <td>
                        <?php esc_html_e('Once downloaded, unzip the file and save the [XML demo content single file] to your PC.', 'eduna-lms'); ?><br>
                        <a href="https://demo.pencilwp.com/wp-free/eduna-lms/demo-data/demo-data.zip" 
                        class="button button-secondary btn-demo" target="_blank">
                        <?php esc_html_e('Download Demo Content', 'eduna-lms'); ?>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td><b><?php esc_html_e('Step 3:', 'eduna-lms'); ?></b></td>
                    <td>
                        <?php esc_html_e('Next, go to Demo Import page, then go to [Import Content] section, upload the XML file and click on [Continue & Import].', 'eduna-lms'); ?><br>
                        <a href="<?php echo esc_url(admin_url('themes.php?page=one-click-demo-import')); ?>" target="_blank" class="button button-secondary  btn-demo">
                            <?php esc_html_e('Import Demo Content', 'eduna-lms'); ?>
                        </a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>

    <div id="customization" class="tab-content" style="display:none;">
        <h2><?php esc_html_e('Customization', 'eduna-lms'); ?></h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php esc_html_e('Step', 'eduna-lms'); ?></th>
                    <th><?php esc_html_e('Action', 'eduna-lms'); ?></th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><b><?php esc_html_e('Customization:', 'eduna-lms'); ?></b></td>
                    <td>
                    <?php esc_html_e('We use the popular Tutor LMS plugin for managing courses. If you are selling products, you can integrate both WooCommerce and Tutor LMS. Alternatively, you can use Tutor LMS’s built-in cart, checkout, and payment system.', 'eduna-lms'); ?><br>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=tutor_settings')); ?>" target="_blank" class="button button-secondary  btn-demo">
                            <?php esc_html_e('Check Tutor Settings', 'eduna-lms'); ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="features" class="tab-content" style="display:none;">
        <h2><?php esc_html_e('Free vs Pro Features', 'eduna-lms'); ?></h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php esc_html_e('Feature', 'eduna-lms'); ?></th>
                    <th><?php esc_html_e('Free', 'eduna-lms'); ?></th>
                    <th><?php esc_html_e('Pro', 'eduna-lms'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php esc_html_e('One-Click Demo Import', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Customize', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Limited', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Advanced', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Header & Footer Customize', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Default', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Drag & Drop Customize', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('LMS Page Design', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Limited', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Complete', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Woocommerce Ready', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Yes', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Yes', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Section', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ 10 Section', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ 50+ Sections', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Blog', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ 1 Style', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ 3+ Styles', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Blog Widget', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Limited', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Advanced', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Blog Single', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ 1 Layout', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ 3 Layout', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Breadcrumb', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Fixed', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Customizable', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Course Page', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Limited', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Complete', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Animations', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Scroll Up', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Preloader', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Video Popup', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('FunFact', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Teachers Page', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Testimonial', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Brands', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Call to Action', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Contact Form', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Default', 'eduna-lms'); ?></td>
                    <td><?php esc_html_e('✅ Advanced', 'eduna-lms'); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Premium Support', 'eduna-lms'); ?></td>
                    <td>❌</td>
                    <td>✅</td>
                </tr>
            </tbody>

        </table>
    </div>

    <div id="documentation" class="tab-content" style="display:none;">
        <h2><?php esc_html_e('Documentation & Support', 'eduna-lms'); ?></h2>
        <p><a href="https://pencilwp.com/docs/eduna-lms/" class="button button-primary" target="_blank"><?php esc_html_e('View Full Documentation', 'eduna-lms'); ?></a></p>
    </div>
</div>
