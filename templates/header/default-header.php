<?php
$options = governlia_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_logo = $options->get( 'light_color_logo' );
$light_logo_dimension = $options->get( 'light_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>


<div class="page-wrapper">
    
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close"><?php esc_html_e('Preloader Close', 'governlia'); ?></div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>
    </div>

    <!-- Main Header -->
    <header class="main-header header-style-one">
		<?php if( $options->get('show_header_topbar_v1') ){?>
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <?php if( $options->get('welcome_text_v1') ){?>
                    <div class="left-column">
                        <div class="text"><i class="icon-news"></i><?php echo wp_kses($options->get('welcome_text_v1'), true); ?></div>                        
                    </div>
                    <?php } ?>
                    <div class="right-column">
                        <?php if( $options->get('phone_no_v1') ){?><div class="phone"><a href="tel:<?php echo esc_attr($options->get('phone_no_v1')); ?>"><i class="fas fa-phone-volume"></i><?php echo wp_kses($options->get('phone_no_v1'), true); ?></a></div><?php } ?>
                        
						<?php if( $options->get('topbar_menu_list_v1') ){?>
                        <ul class="header-top-menu">
                            <?php echo wp_kses($options->get('topbar_menu_list_v1'), true); ?>
                        </ul>
                        <?php } ?>
                        
						<?php 
							$icons = $options->get( 'header_social_share_v1' );
							if ( !empty( $icons ) ) : 
						?>
                        <ul class="social-icon">
                            <?php foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( governlia_set( $h_icon, 'data' ) ) );
							if ( governlia_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', governlia_set( $header_social_icons, 'icon' ) ); ?>
							<li><a href="<?php echo esc_url(governlia_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(governlia_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(governlia_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fa <?php echo esc_attr( governlia_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
							<?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php } ?>
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><?php echo governlia_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar-2.png" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                        'container_class'=>'navbar-collapse collapse navbar-right',
                                        'menu_class'=>'nav navbar-nav',
                                        'fallback_cb'=>false,
                                        'items_wrap' => '%3$s',
                                        'container'=>false,
                                        'depth'=>'3',
                                        'walker'=> new Bootstrap_walker()
                                    ) ); ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <?php if( $options->get('show_seach_form_v1') ){?>
                    <div class="navbar-right">
                        <div class="search-form-two">
                            <?php get_template_part('searchform1')?>
                        </div>
                    </div>
                    <?php } ?>                      
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><?php echo governlia_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar-2.png" alt=""></div>
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                        </div>
                        <?php if( $options->get('show_seach_form_v1') ){?>
                        <div class="navbar-right">
                            <div class="search-form-two">
                                <?php get_template_part('searchform1')?>
                            </div>
                        </div> 
                        <?php } ?>                      
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><?php echo governlia_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<!--Social Links-->
				<?php 
					$icons = $options->get( 'header_social_share_v1' );
					if ( !empty( $icons ) ) : 
				?>
                <div class="social-links">
					<ul class="clearfix">
						<?php foreach ( $icons as $h_icon ) :
						$header_social_icons = json_decode( urldecode( governlia_set( $h_icon, 'data' ) ) );
						if ( governlia_set( $header_social_icons, 'enable' ) == '' ) {
							continue;
						}
						$icon_class = explode( '-', governlia_set( $header_social_icons, 'icon' ) ); ?>
						<li><a href="<?php echo esc_url(governlia_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(governlia_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(governlia_set( $header_social_icons, 'color' )); ?>" target="_blank"><span class="fa <?php echo esc_attr( governlia_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
						<?php endforeach; ?>
					</ul>
                </div>
                <?php endif; ?>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->