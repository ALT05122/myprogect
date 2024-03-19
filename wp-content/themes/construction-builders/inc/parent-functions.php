<?php
/*
All the Pluggable functions are overriden from here
*/

function construction_landing_page_site_header(){
    $phonelabel       = get_theme_mod( 'construction_builders_header_phone_label');
    $phonenumber      = get_theme_mod( 'construction_landing_page_phone' );
    $emailaddress     = get_theme_mod( 'construction_builders_header_email' );
    $ed_social        = get_theme_mod( 'construction_builders_ed_header_social_links',true );
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    ?>
    <header id="masthead" class="site-header header-7" role="banner" itemscope itemtype="https://schema.org/WPHeader">
        <div class="container">
            <?php if( has_custom_logo() || $site_title || $site_description || $header_text ){?>
                <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
                    <?php 
                        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                        } 
                    if( $site_title || $site_description ) {?>
                        <div class="text-logo">
                            <?php if ( is_front_page() ) : ?>
                                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif;
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description" itemprop="description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                            <?php
                            endif; ?>
                        </div>
                    <?php } ?>
                </div><!-- .site-branding -->
            <?php } ?>
            <div class="right-panel">
                <div class="top">
                    <div class="contact-info">                
                        <?php if ( $phonenumber || $phonelabel ) { ?>                                    
                        <span class="header-phone">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_107_650)">
                            <path d="M14.5 18.3333C11.0977 18.3289 7.8361 16.9754 5.43034 14.5696C3.02458 12.1638 1.67108 8.90219 1.66667 5.49993C1.66667 4.48327 2.07054 3.50825 2.78943 2.78936C3.50832 2.07047 4.48334 1.6666 5.50001 1.6666C5.71529 1.66496 5.93021 1.6845 6.14167 1.72493C6.3461 1.75518 6.54706 1.80542 6.74167 1.87493C6.87855 1.92296 7.00051 2.00588 7.09551 2.11549C7.19051 2.22511 7.25526 2.35762 7.28334 2.49993L8.425 7.49993C8.45578 7.63565 8.45207 7.77692 8.41423 7.91084C8.37638 8.04475 8.3056 8.16706 8.20834 8.2666C8.10001 8.38327 8.09167 8.3916 7.06667 8.92493C7.8875 10.7256 9.32767 12.1717 11.125 12.9999C11.6667 11.9666 11.675 11.9583 11.7917 11.8499C11.8912 11.7527 12.0135 11.6819 12.1474 11.644C12.2814 11.6062 12.4226 11.6025 12.5583 11.6333L17.5583 12.7749C17.6961 12.8069 17.8234 12.8734 17.9284 12.9681C18.0334 13.0629 18.1125 13.1828 18.1583 13.3166C18.2287 13.5144 18.2817 13.7179 18.3167 13.9249C18.3502 14.1344 18.3669 14.3462 18.3667 14.5583C18.3513 15.5706 17.9361 16.5357 17.2116 17.243C16.4872 17.9502 15.5124 18.3422 14.5 18.3333ZM5.50001 3.33327C4.92605 3.33546 4.37622 3.56444 3.97037 3.97029C3.56451 4.37615 3.33553 4.92597 3.33334 5.49993C3.33555 8.46084 4.51274 11.2998 6.60642 13.3935C8.7001 15.4872 11.5391 16.6644 14.5 16.6666C15.074 16.6644 15.6238 16.4354 16.0296 16.0296C16.4355 15.6237 16.6645 15.0739 16.6667 14.4999V14.2249L12.8 13.3333L12.5583 13.7916C12.1833 14.5166 11.9083 15.0416 11.2083 14.7583C9.82741 14.264 8.57392 13.4683 7.53895 12.429C6.50398 11.3897 5.71352 10.1329 5.22501 8.74993C4.92501 8.09993 5.49167 7.79993 6.20834 7.42493L6.66667 7.19993L5.77501 3.33327H5.50001Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_107_650">
                            <rect width="20" height="20" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <?php if( ! empty( $phonelabel ) ){ ?>
                        <span class="phone-label"> <?php echo esc_html( $phonelabel ); ?> </span>
                        <?php } ?>  
                        <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phonenumber ) ); ?>"><b><?php echo esc_html( $phonenumber ); ?></b></a>
                        </span>
                        <?php } ?>                                            
                        <?php if ($emailaddress) { ?>                                    
                        <span class="email-link-holder">
                            <i class="fa fa-envelope" aria-hidden="true"></i> 
                            <a href="mailto:<?php echo is_email( $emailaddress ); ?>"><?php echo is_email( $emailaddress ); ?></a>
                        </span>
                        <?php } ?>                
                    </div>                       
                    <?php if( $ed_social ) do_action( 'construction_builders_social_link' );  ?>
                    <?php if( get_theme_mod( 'construction_landing_page_header_ed_search', false ) ) {?>
                        <div class="form-holder">
                            <button type="button" class="search-btn" data-toggle-target=".header-search-modal" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".header-search-modal .search-field">
                                <i class="fa fa-search"></i>
                            </button type="button">
                            <div class="head-search-form search header-searh-wrap header-search-modal cover-modal" data-modal-target-string=".header-search-modal">
                                <?php get_search_form(); ?>
                                <button class="btn-form-close" data-toggle-target=".header-search-modal" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".header-search-modal">  </button>
                            </div>
                        </div>  
                    <?php } ?>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->         
            </div>	
        </div>
    </header><!-- #masthead -->
    <?php
}

function construction_landing_page_mobile_header(){
    $phonelabel       = get_theme_mod( 'construction_builders_header_phone_label');
    $phonenumber      = get_theme_mod( 'construction_landing_page_phone' );
    $emailaddress     = get_theme_mod( 'construction_builders_header_email' );
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    ?>
    <div class="mobile-header">
        <div class="container">
            <?php if( has_custom_logo() || $site_title || $site_description || $header_text ){?>
                <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
                    <?php if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                        echo '<div class="custom-logo">';
                        the_custom_logo();
                        echo '</div>';
                    } 
                    if( $site_title || $site_description ) {?>
                    <div class="text-logo">
                        <?php if ( is_front_page() ) : ?>
                            <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif;
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description" itemprop="description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                        <?php
                        endif; ?>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <button class="menu-opener" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="mobile-menu">
                <!-- This is primary-menu -->
                <nav id="mobile-navigation" class="primary-navigation">        
                    <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                    <button class="close-mobile-menu" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                    <div class="mobile-menu-title" aria-label="<?php esc_attr_e( 'Mobile', 'construction-builders' ); ?>">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'mobile-primary-menu',
                                'menu_class'     => 'nav-menu main-menu-modal',
                            ) );
                        ?>
                    </div>
                    <?php if( $phonelabel || $phonenumber ){ ?>
                        <div class="phone-holder">
                            <?php if( ! empty( $phonelabel ) ){ 
                                echo esc_html( $phonelabel ); 
                                } 
                                if( ! empty( $phonenumber ) ){ ?>
                                <a href="<?php echo esc_url( 'tel:'.preg_replace( '/[^\d+]/', '', $phonenumber ) ); ?>"><?php echo esc_html( $phonenumber ); ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if ( ! empty( $emailaddress ) ) { ?>
                        <div class="email-holder">
                        <a href="<?php echo esc_url( 'mailto:'.sanitize_email( $emailaddress ) ); ?>"><?php echo esc_html( $emailaddress ); ?></a> 
                        </div>
                    <?php } ?>
                    </div>
                </nav><!-- #mobile-site-navigation -->
            </div>
        </div>
    </div>
        
    <?php
}

function construction_landing_page_phone_link( $menu, $args ){
    $url                = get_theme_mod( 'construction_builders_header_get_a_quote_url' );
    $header_button_text = get_theme_mod( 'construction_builders_header_button_text', __('Get A Quote', 'construction-builders') );
    if( $url && $args->theme_location == 'primary' ){
        $menu .= '<li><a href="'. esc_url( $url ) .'" class="request-link">' . esc_html( $header_button_text ) . '</a></li>';        
    }
    return $menu; 
}

function construction_landing_page_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Demo and Documentation' , 'construction-builders' ),
		'priority'    => 6,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Documentation', 'construction-builders' ) . ': </label><a href="' . esc_url( 'https://docs.rarathemes.com/docs/construction-builders/' ) . '" target="_blank">' . __( 'here', 'construction-builders' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Demo', 'construction-builders' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/previews/?theme=construction-builders' ) . '" target="_blank">' . __( 'here', 'construction-builders' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Info', 'construction-builders' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/wordpress-themes/construction-builders/' ) . '" target="_blank">' . __( 'here', 'construction-builders' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support Ticket', 'construction-builders' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'construction-builders' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Rate this theme', 'construction-builders' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/support/theme/construction-builders/reviews/' ) . '" target="_blank">' . __( 'here', 'construction-builders' ) . '</a></span><br />';

	$wp_customize->add_control( new Construction_Landing_Page_Theme_Info( $wp_customize ,'theme_info_theme',array(
		'section'     => 'theme_info',
		'description' => $theme_info
	)));
}

