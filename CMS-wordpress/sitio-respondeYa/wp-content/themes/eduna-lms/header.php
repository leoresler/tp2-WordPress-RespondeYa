<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eduna LMS
 */

$header_category_search = get_theme_mod( 'header_category_search','off' );
$header_register_text = get_theme_mod( 'header_register_text','Register' );
$header_register_url = get_theme_mod( 'header_register_url','#' );
$header_login_btn_text = get_theme_mod( 'header_login_btn_text','Dashboard' );
$header_login_btn_url = get_theme_mod( 'header_login_btn_url','#' );
$header_contact_number = get_theme_mod( 'header_contact_number','+532-321-3333' );
$header_email_address = get_theme_mod( 'header_email_address','hello.eduna@example.com' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Start Page -->
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'eduna-lms' ); ?></a>


		<header id="masthead" class="eduna-lms-header eduna-lms-header site-header">
			
			<!-- Start Topbar Area  -->
			<div class="ed-topbar">
				<?php if ( get_header_image() ) : ?>
				<div class="header-image">
					<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
				</div>
				<?php endif; ?>
				<div class="container ed-container-expand">
					<div class="ed-topbar__inner">
						<!-- Logo  -->
						<div class="ed-topbar__logo">
							<?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							}else { ?>
								<div class="normal-text">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html(get_bloginfo('name'));?></a>
									<?php $eduna_lms_title_description = get_bloginfo( 'description', 'display' ); ?>
									<p class="site-description"><?php echo esc_html($eduna_lms_title_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								</div>
							<?php } ?>
						</div>
						
						<?php 
							if ( true == get_theme_mod( 'header_category_search', 'on' ) ) : 
								// Check if the 'course-category' taxonomy exists before running the query
								if ( taxonomy_exists( 'course-category' ) ) :
							?>
								<!-- Category Dropdown -->
								<div class="ed-topbar__search-widget">
									<div class="ed-topbar__category">
										<select id="course-category-select" class="ed_select ed_select_cats">
											<option value="" <?php selected(get_query_var('course-category'), ''); ?>><?php esc_html_e('All Categories', 'eduna-lms'); ?></option>
											<?php
											// Fetch all categories from 'course-category' taxonomy
											$categories = get_terms(array(
												'taxonomy' => 'course-category',
												'hide_empty' => false,
											));
											
											$selected_category_url = isset($_GET['course-category']) ? esc_url($_GET['course-category']) : ''; // Get the selected category URL
											
											foreach ($categories as $category) {
												$category_url = get_term_link($category); // Get the URL for each category
												echo '<option value="' . esc_url($category_url) . '" ' . selected($selected_category_url, esc_url($category_url), false) . '>' . esc_html($category->name) . '</option>';
											}
											?>
										</select>
									</div>
									<div class="ed-topbar__search">
										<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
											<input type="hidden" name="post_type" value="courses"> <!-- For searching only in courses -->
											<input type="hidden" id="selected-category" name="course-category" value="">
											<input type="search" name="s" placeholder="<?php esc_attr_e('Search your courses...', 'eduna-lms'); ?>" required />
											<button type="submit"><?php esc_html_e('Search','eduna-lms');?> <i class="fa-solid fa-magnifying-glass"></i></button>
										</form>
									</div>
								</div>
							<?php 
								else :
									// Optional: Display a message if taxonomy does not exist
									echo '<p>' . esc_html__('No course categories available.', 'eduna-lms') . '</p>';
								endif; 
							endif; 
						?>
						<!-- Topbar Info -->
						<div class="ed-topbar__info">
							
							<!-- Topbar Button -->
							<div class="ed-topbar__info-buttons">
								<a href="<?php echo esc_url($header_register_url);?>" type="button" class="register-btn" data-bs-toggle="modal" data-bs-target="#registerModal">
									<?php echo esc_html($header_register_text);?>
								</a>
								<a type="button" class="login-btn eduna-user" href="<?php echo esc_url($header_login_btn_url);?>">
									<?php echo esc_html($header_login_btn_text);?>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar Area -->

			<!-- Start Header Area -->
			<div class="ed-header">
				<div class="container ed-container-expand">
					<div class="ed-header__inner">
						<div class="row align-items-center">
							<div class="col-lg-7 col-12">
								<!-- Navigation Menu -->
								<nav class="ed-header__navigation">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'menu_class'        => 'nav ed-header__menu navbar-nav',
										) );
									?>
								</nav>
							</div>
							<div class="col-lg-5 col-12">
								<!-- Header Right -->
								<div class="ed-header__right">
									<ul class="ed-header__contact">
										<li><a href="tel:<?php echo esc_attr($header_contact_number)?>"><?php echo esc_html($header_contact_number);?></a></li>
										<li>
											<a href="mailto:<?php echo esc_attr($header_email_address)?>"><?php echo esc_html($header_email_address);?></a>
										</li>
									</ul>
									
									<div class="ed-header__action">
										<?php if (class_exists('WooCommerce')) : ?>
										<div class="ed-header__cart">
											<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="ed-topbar__action-icon">
												<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M10.5004 0.65625C9.45609 0.65625 8.45457 1.07109 7.71614 1.80952C6.97772 2.54794 6.56288 3.54946 6.56288 4.59375V5.25H6.01819C5.4657 5.24942 4.93428 5.46195 4.53455 5.84334C4.13482 6.22473 3.8976 6.74559 3.87225 7.2975L3.35381 18.0928C3.34052 18.3831 3.38615 18.6731 3.48795 18.9453C3.58974 19.2174 3.74559 19.4662 3.94611 19.6765C4.14663 19.8869 4.38766 20.0544 4.65467 20.1691C4.92169 20.2838 5.20916 20.3432 5.49975 20.3438H15.501C15.7916 20.3432 16.0791 20.2838 16.3461 20.1691C16.6131 20.0544 16.8541 19.8869 17.0546 19.6765C17.2552 19.4662 17.411 19.2174 17.5128 18.9453C17.6146 18.6731 17.6602 18.3831 17.6469 18.0928L17.1285 7.2975C17.1032 6.74559 16.8659 6.22473 16.4662 5.84334C16.0665 5.46195 15.5351 5.24942 14.9826 5.25H14.4379V4.59375C14.4379 3.54946 14.023 2.54794 13.2846 1.80952C12.5462 1.07109 11.5447 0.65625 10.5004 0.65625ZM7.87538 4.59375C7.87538 3.89756 8.15194 3.22988 8.64422 2.73759C9.1365 2.24531 9.80418 1.96875 10.5004 1.96875C11.1966 1.96875 11.8642 2.24531 12.3565 2.73759C12.8488 3.22988 13.1254 3.89756 13.1254 4.59375V5.25H7.87538V4.59375ZM15.816 7.35656L16.3344 18.1584C16.3386 18.2713 16.3204 18.3839 16.281 18.4897C16.2416 18.5956 16.1817 18.6926 16.1048 18.7753C16.0262 18.856 15.9323 18.9202 15.8287 18.9641C15.725 19.0081 15.6136 19.0309 15.501 19.0312H5.49975C5.38715 19.0309 5.27576 19.0081 5.17209 18.9641C5.06842 18.9202 4.97456 18.856 4.896 18.7753C4.81907 18.6926 4.75919 18.5956 4.71978 18.4897C4.68037 18.3839 4.6622 18.2713 4.66631 18.1584L5.18475 7.35656C5.19488 7.14242 5.28714 6.94041 5.44236 6.79253C5.59757 6.64464 5.8038 6.56226 6.01819 6.5625H14.9826C15.1969 6.56226 15.4032 6.64464 15.5584 6.79253C15.7136 6.94041 15.8059 7.14242 15.816 7.35656Z" fill="#4E5450"></path>
													<path d="M7.45312 8.65594C7.81556 8.65594 8.10938 8.36213 8.10938 7.99969C8.10938 7.63726 7.81556 7.34344 7.45312 7.34344C7.09069 7.34344 6.79688 7.63726 6.79688 7.99969C6.79688 8.36213 7.09069 8.65594 7.45312 8.65594Z" fill="#4E5450"></path>
													<path d="M13.5469 8.65594C13.9093 8.65594 14.2031 8.36213 14.2031 7.99969C14.2031 7.63726 13.9093 7.34344 13.5469 7.34344C13.1844 7.34344 12.8906 7.63726 12.8906 7.99969C12.8906 8.36213 13.1844 8.65594 13.5469 8.65594Z" fill="#4E5450"></path>
												</svg>
												<span class="ed-header__cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
											</a>
										</div>
										<?php endif;?>		
										
										<?php 
										if (defined('TUTOR_VERSION')) { ?>
											<div class="navbar-utils">

												<?php
												// Check if Tutor LMS is set for monetization via its own system
												if (class_exists('Tutor\Ecommerce\CartController') && 'tutor' === tutor_utils()->get_option('monetize_by')) {
													$tutor_cart = new Tutor\Ecommerce\CartController();
													$cart_items = $tutor_cart->get_cart_items();

													if (!empty($cart_items['courses']['total_count'])) { ?>
														<a class="cart-contents ed-topbar__action-icon" href="<?php echo esc_url($tutor_cart->get_page_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'eduna-lms'); ?>">
															<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M10.5004 0.65625C9.45609 0.65625 8.45457 1.07109 7.71614 1.80952C6.97772 2.54794 6.56288 3.54946 6.56288 4.59375V5.25H6.01819C5.4657 5.24942 4.93428 5.46195 4.53455 5.84334C4.13482 6.22473 3.8976 6.74559 3.87225 7.2975L3.35381 18.0928C3.34052 18.3831 3.38615 18.6731 3.48795 18.9453C3.58974 19.2174 3.74559 19.4662 3.94611 19.6765C4.14663 19.8869 4.38766 20.0544 4.65467 20.1691C4.92169 20.2838 5.20916 20.3432 5.49975 20.3438H15.501C15.7916 20.3432 16.0791 20.2838 16.3461 20.1691C16.6131 20.0544 16.8541 19.8869 17.0546 19.6765C17.2552 19.4662 17.411 19.2174 17.5128 18.9453C17.6146 18.6731 17.6602 18.3831 17.6469 18.0928L17.1285 7.2975C17.1032 6.74559 16.8659 6.22473 16.4662 5.84334C16.0665 5.46195 15.5351 5.24942 14.9826 5.25H14.4379V4.59375C14.4379 3.54946 14.023 2.54794 13.2846 1.80952C12.5462 1.07109 11.5447 0.65625 10.5004 0.65625ZM7.87538 4.59375C7.87538 3.89756 8.15194 3.22988 8.64422 2.73759C9.1365 2.24531 9.80418 1.96875 10.5004 1.96875C11.1966 1.96875 11.8642 2.24531 12.3565 2.73759C12.8488 3.22988 13.1254 3.89756 13.1254 4.59375V5.25H7.87538V4.59375ZM15.816 7.35656L16.3344 18.1584C16.3386 18.2713 16.3204 18.3839 16.281 18.4897C16.2416 18.5956 16.1817 18.6926 16.1048 18.7753C16.0262 18.856 15.9323 18.9202 15.8287 18.9641C15.725 19.0081 15.6136 19.0309 15.501 19.0312H5.49975C5.38715 19.0309 5.27576 19.0081 5.17209 18.9641C5.06842 18.9202 4.97456 18.856 4.896 18.7753C4.81907 18.6926 4.75919 18.5956 4.71978 18.4897C4.68037 18.3839 4.6622 18.2713 4.66631 18.1584L5.18475 7.35656C5.19488 7.14242 5.28714 6.94041 5.44236 6.79253C5.59757 6.64464 5.8038 6.56226 6.01819 6.5625H14.9826C15.1969 6.56226 15.4032 6.64464 15.5584 6.79253C15.7136 6.94041 15.8059 7.14242 15.816 7.35656Z" fill="#4E5450"></path>
																<path d="M7.45312 8.65594C7.81556 8.65594 8.10938 8.36213 8.10938 7.99969C8.10938 7.63726 7.81556 7.34344 7.45312 7.34344C7.09069 7.34344 6.79688 7.63726 6.79688 7.99969C6.79688 8.36213 7.09069 8.65594 7.45312 8.65594Z" fill="#4E5450"></path>
																<path d="M13.5469 8.65594C13.9093 8.65594 14.2031 8.36213 14.2031 7.99969C14.2031 7.63726 13.9093 7.34344 13.5469 7.34344C13.1844 7.34344 12.8906 7.63726 12.8906 7.99969C12.8906 8.36213 13.1844 8.65594 13.5469 8.65594Z" fill="#4E5450"></path>
															</svg>
															<span class="ed-header__cart-count"><?php echo esc_html($cart_items['courses']['total_count']); ?></span>
														</a>
													<?php } 
												} ?>
											</div> <!-- .navbar-utils -->
										<?php } ?>

										<!-- End Mobile Menu Button -->
										<div class="menu-click"><a href="#" class="eduna-lms-header__button--icon"><i class="fa fa-bars"></i><?php esc_html_e('Menu','eduna-lms');?></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header Area -->


			<!-- Sidebar Menu -->
			<div class="eduna-lms-mobile-menu">
				<div class="menu-inner">
					<h4 class="oe-menu-title"><?php esc_html_e('Navigation','eduna-lms');?></h4>
					<div class="eduna-lms-nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'side-menu',
							'menu_class'        => 'side-nav',
						) );
					?>
					</div>
					<div class="close-menu"><a href="#"><i class="fa fa-remove"></i><?php esc_html_e('Close Menu','eduna-lms');?></a></div>
				</div>
			</div>
			<!-- End Sidebar Menu -->
			
		</header>
		<!-- End Header -->
		
	<div id="primary" class="eduna-lms-section-main">