<?php

$tab_url = "?page=".$this->plugin_name."-results&ays_result_tab=";

?>
<div class="wrap ays-quiz-list-table ays_reviews_table">
    <div class="ays-quiz-heading-box ays-quiz-heading-box-margin-top">
        <div class="ays-quiz-wordpress-user-manual-box">
            <a href="https://quiz-plugin.com/docs/" target="_blank">
                <i class="ays_fa ays_fa_file_text" ></i> 
                <span style="margin-left: 3px;text-decoration: underline;"><?php echo esc_html__("View Documentation", "quiz-maker"); ?></span>
            </a>
        </div>
    </div>
    <h1 class="wp-heading-inline">
        <?php
        echo esc_html(get_admin_page_title());
        ?>
    </h1>
    <?php do_action('ays_quiz_sale_banner'); ?>
    <div class="ays-quiz-export-import-box">
        <div class="only_pro">
            <div class="pro_features pro_features_popup">
                <div class="pro-features-popup-conteiner">
                    <div class="pro-features-popup-title">
                        <?php echo esc_html__("Export Results", 'quiz-maker'); ?>
                    </div>
                    <div class="pro-features-popup-content" data-link="https://www.youtube.com/watch?v=vHiXPuHM7CA">
                        <p>
                            <?php echo esc_html__("The WordPress Quiz Maker plugin allows you to export the result pages easily.", 'quiz-maker'); ?>
                        </p>
                        <p>
                            <?php echo sprintf( wp_kses_post( __("You also have an opportunity to filter whose results and what quiz results you want to export. Filter %s by Users, Quizzes, by both Users and Quizzes, %s and also select the period by choosing the date.", 'quiz-maker') ),
                                "<strong>",
                                "</strong>"
                            ); ?>
                        </p>
                        <p>
                            <?php echo esc_html__("Here for filtering you have two more checkboxes- export only guest’s results or include guests who do not have any personal data. The choice is yours. Just choose the best variant for you.", 'quiz-maker'); ?>
                        </p>
                        <p>
                            <?php echo sprintf( wp_kses_post( __("After filtering you should choose the file format for exporting the results page. You have three variants- %s CSV, XLSX, and JSON. %s", 'quiz-maker') ),
                                "<strong>",
                                "</strong>"
                            ); ?>
                        </p>
                        <div>
                            <a href="https://quiz-plugin.com/docs/" target="_blank"><?php echo esc_html__("See Documentation", 'quiz-maker'); ?></a>
                        </div>
                    </div>
                    <div class="pro-features-popup-button" data-link="https://ays-pro.com/wordpress/quiz-maker?utm_source=dashboard&utm_medium=quiz-free&utm_campaign=pro-popup-export-results-<?php echo esc_attr( AYS_QUIZ_VERSION ); ?>">
                        <?php echo esc_html__("Pricing", 'quiz-maker'); ?>
                    </div>
                </div>
            </div>
            <div>
                <a href="https://ays-pro.com/wordpress/quiz-maker?utm_source=dashboard&utm_medium=quiz-free&utm_campaign=pro-popup-export-results-<?php echo esc_attr( AYS_QUIZ_VERSION ); ?>" target="_blank" class="ays-quiz-export-button-link">
                    <button class="disabled-button" title="<?php echo esc_attr( __( "This property aviable only in pro version", 'quiz-maker' ) ); ?>" >
                        <?php echo esc_html__('Export','quiz-maker')?>
                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 4px;">
                            <path d="M15.29 4.35796C15.29 4.36496 15.29 4.37096 15.285 4.37796L13.805 11.152C13.7596 11.3905 13.6324 11.6058 13.4453 11.7606C13.2582 11.9154 13.0229 12.0001 12.78 12H3.22203C2.97923 11.9999 2.74405 11.9151 2.55698 11.7604C2.3699 11.6056 2.24262 11.3904 2.19703 11.152L0.718031 4.37796C0.718031 4.37096 0.715031 4.36496 0.714031 4.35796C0.67283 4.13344 0.706421 3.9016 0.809654 3.69801C0.912887 3.49442 1.08006 3.33032 1.28553 3.23087C1.491 3.13143 1.72342 3.10214 1.94714 3.1475C2.17085 3.19285 2.37351 3.31035 2.52403 3.48196L4.71903 5.84896L7.05403 0.612959C7.05412 0.61096 7.05412 0.608958 7.05403 0.606959C7.1377 0.426116 7.27138 0.272996 7.43928 0.165681C7.60717 0.0583672 7.80227 0.00134277 8.00153 0.00134277C8.20079 0.00134277 8.39589 0.0583672 8.56379 0.165681C8.73168 0.272996 8.86536 0.426116 8.94903 0.606959C8.94895 0.608958 8.94895 0.61096 8.94903 0.612959L11.284 5.84896L13.479 3.48196C13.6298 3.31133 13.8323 3.19472 14.0555 3.14994C14.2787 3.10515 14.5105 3.13465 14.7154 3.23393C14.9203 3.33322 15.0871 3.49682 15.1903 3.69978C15.2935 3.90274 15.3275 4.13389 15.287 4.35796H15.289H15.29Z" fill="#ED9700"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="nav-tab-wrapper">
        <a href="<?php echo esc_url($tab_url . "poststuff"); ?>" class="no-js nav-tab"><?php echo esc_html__('Results','quiz-maker')?></a>
        <a href="<?php echo esc_url($tab_url . "statistics"); ?>" class="no-js nav-tab"><?php echo esc_html__('Statistics','quiz-maker')?></a>
        <a href="<?php echo esc_url($tab_url . "leaderboard"); ?>" class="no-js nav-tab"><?php echo esc_html__('Leaderboard','quiz-maker')?></a>
        <a href="<?php echo esc_url("?page=".$this->plugin_name."-all-reviews&tab=" . "reviews"); ?>" class="no-js nav-tab nav-tab-active"><?php echo esc_html__('Reviews','quiz-maker')?></a>
    </div>
    <div id="reviews" class="ays-quiz-tab-content ays-quiz-tab-content-active">
        <div id="review-poststuff">
            <div id="post-body" class="metabox-holder">
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <?php
                            $this->all_reviews_obj->views();
                        ?>
                        <form method="post">
                            <?php
                            $this->all_reviews_obj->prepare_items();
                            $this->all_reviews_obj->search_box( 'Search', 'quiz-maker' );
                            $this->all_reviews_obj->display();
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <br class="clear">
        </div>
    </div>

    <div id="ays-reviews-modal" class="ays-modal">
        <div class="ays-modal-content">
            <div class="ays-quiz-preloader">
                <img class="loader" src="<?php echo esc_url(AYS_QUIZ_ADMIN_URL); ?>/images/loaders/3-1.svg">
            </div>
            <div class="ays-modal-header">
                <span class="ays-close" id="ays-close-reviews">&times;</span>
                <h2><?php echo esc_html__("Reviews for", 'quiz-maker'); ?></h2>
            </div>
            <div class="ays-modal-body" id="ays-reviews-body">
            </div>
        </div>
    </div>

    <div id="ays-results-modal" class="ays-modal">
        <div class="ays-modal-content">
            <div class="ays-quiz-preloader">
                <img class="loader" src="<?php echo esc_url(AYS_QUIZ_ADMIN_URL); ?>/images/loaders/3-1.svg">
            </div>
            <div class="ays-modal-header">
                <span class="ays-close" id="ays-close-results">&times;</span>
                <h2><?php echo esc_html__("Detailed report", 'quiz-maker'); ?></h2>
            </div>
            <div class="ays-modal-body" id="ays-results-body">
            </div>
        </div>
    </div>
    <div class="ays-modal" id="export-answers-filters">
        <div class="ays-modal-content">
            <div class="ays-quiz-preloader">
                <img class="loader" src="<?php echo esc_url(AYS_QUIZ_ADMIN_URL); ?>/images/loaders/3-1.svg">
            </div>
          <!-- Modal Header -->
            <div class="ays-modal-header">
                <span class="ays-close">&times;</span>
                <h2><?php echo esc_html__('Export Filter', 'quiz-maker'); ?></h2>
            </div>

          <!-- Modal body -->
            <div class="ays-modal-body">
                <form method="post" id="ays_export_answers_filter">
                    <div class="filter-col">
                        <label for="user_id-answers-filter"><?php echo esc_html__("Users", 'quiz-maker'); ?></label>
                        <button type="button" class="ays_userid_clear button button-small wp-picker-default"><?php echo esc_html__("Clear", 'quiz-maker')?></button>
                        <select name="user_id-select[]" id="user_id-answers-filter" multiple="multiple"></select>
                        <input type="hidden" name="quiz_id-answers-filter" id="quiz_id-answers-filter">
                    </div>
                    <div class="filter-block">
                        <div class="filter-block filter-col">
                            <label for="start-date-answers-filter"><?php echo esc_html__("Start Date from", 'quiz-maker'); ?></label>
                            <input type="date" name="start-date-filter" id="start-date-answers-filter">
                        </div>
                        <div class="filter-block filter-col">
                            <label for="end-date-answers-filter"><?php echo esc_html__("Start Date to", 'quiz-maker'); ?></label>
                            <input type="date" name="end-date-filter" id="end-date-answers-filter">
                        </div>
                    </div>
                </form>
            </div>

          <!-- Modal footer -->
            <div class="ays-modal-footer">
                <div class="export_results_count">
                    <p>Matched <span></span> results</p>
                </div>
                <span><?php echo esc_html__('Export to', 'quiz-maker'); ?></span>
                <button type="button" class="button button-primary export-anwers-action" data-type="xlsx"><?php echo esc_html__('XLSX', 'quiz-maker'); ?></button>
                <a download="" id="downloadFile" hidden href=""></a>
            </div>

        </div>
    </div>

    <div class="ays-modal" id="pro-features-popup-modal">
        <div class="ays-modal-content">
            <!-- Modal Header -->
            <div class="ays-modal-header">
                <span class="ays-close-pro-popup">&times;</span>
                <!-- <h2></h2> -->
            </div>

            <!-- Modal body -->
            <div class="ays-modal-body">
               <div class="row">
                    <div class="col-sm-6 pro-features-popup-modal-left-section">
                    </div>
                    <div class="col-sm-6 pro-features-popup-modal-right-section">
                       <div class="pro-features-popup-modal-right-box">
                            <div class="pro-features-popup-modal-right-box-icon"><i class="ays_fa ays_fa_lock"></i></div>

                            <div class="pro-features-popup-modal-right-box-title"></div>

                            <div class="pro-features-popup-modal-right-box-content"></div>

                            <div class="pro-features-popup-modal-right-box-button">
                                <a href="#" class="pro-features-popup-modal-right-box-link" target="_blank"></a>
                            </div>

                            <div class="pro-features-popup-modal-right-box-footer-text">
                                <span class="ays_quiz_small_hint_text_for_message_variables"><?php echo esc_html__( "One-time payment", 'quiz-maker' ); ?></span>
                            </div>
                       </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="ays-modal-footer" style="display:none">
            </div>
        </div>
    </div>
</div>

