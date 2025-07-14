<?php
$options = governlia_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_logo = $options->get( 'light_color_logo' );
$light_logo_dimension = $options->get( 'light_color_logo_dimension' );

//Dark Color Logo Settings
$dark_logo = $options->get( 'dark_color_logo' );
$dark_logo_dimension = $options->get( 'dark_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="page-wrapper theme-color-two">
    
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close"><?php esc_html_e('Preloader Close', 'governlia'); ?></div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>
    </div>

    <!-- Main Header -->
    <header class="main-header header-style-two">
		<?php if( $options->get('show_header_topbar_v2') ){?>
        <!-- Header Top two -->
        <div class="header-top-two">
            <div class="auto-container">
                <div class="inner-container">
                    <?php if($options->get('address_v2') || $options->get('phone_no_v2') || $options->get('email_address_v2')){ ?>
                    <div class="left-column">
                        <ul class="contact-info">
                            <?php if( $options->get('address_v2') ){?><li><i class="icon-placeholder"></i><?php echo wp_kses($options->get('address_v2'), true); ?></li><?php } ?>
                            <?php if( $options->get('phone_no_v2') ){?><li><a href="tel:<?php echo esc_attr($options->get('phone_no_v2')); ?>"><i class="icon-phone"></i><?php echo wp_kses($options->get('phone_no_v2'), true); ?></a></li><?php } ?>
                            <?php if( $options->get('email_address_v2') ){?><li><a href="mailto:<?php echo esc_attr($options->get('email_address_v2')); ?>"><i class="icon-envelope"></i> <?php echo wp_kses($options->get('email_address_v2'), true); ?></a></li><?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="right-column">
                        <?php 
							$icons = $options->get( 'header_social_share_v2' );
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
                        
                        <?php if( $options->get('show_button_v2') ){?>
                        <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v2'), true); ?>" class="theme-btn btn-style-one"><span><?php echo wp_kses($options->get('btn_title_v2'), true); ?></span></a></div>
                    	<?php } ?>
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
                        <div class="logo"><?php echo governlia_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar.png" alt=""></div>

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
                    <?php if( $options->get('show_seach_form_v2') ){?>
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
                            <div class="logo"><?php echo governlia_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar-2.png" alt=""></div>
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                        </div>
                        <?php if( $options->get('show_seach_form_v2') ){?>
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
            <div class="close-btn"><span class="icon far fa-times-circle"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><?php echo governlia_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<?php 
					$icons = $options->get( 'header_social_share_v2' );
					if ( !empty( $icons ) ) : 
				?>
                <!--Social Links-->
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