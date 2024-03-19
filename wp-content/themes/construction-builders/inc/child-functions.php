<?php

function construction_builders_customize_register( $wp_customize ){

    // Load our custom control.
    require_once get_stylesheet_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';

    //Modify default parent theme controls
    $wp_customize->get_control( 'construction_landing_page_phone' )->priority   =  30;

    /** Enable/Disable services Section */
    $wp_customize->add_setting(
        'construction_landing_page_header_ed_search',
        array(
            'default'           => false,
            'sanitize_callback' => 'construction_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'construction_landing_page_header_ed_search',
        array(
            'label'    => __( 'Enable header search', 'construction-builders' ),
            'section'  => 'construction_landing_page_phone_number',
            'type'     => 'checkbox',
            'priority' => 10
        )
    );
    /** Header Phone Label */
    $wp_customize->add_setting(
        'construction_builders_header_phone_label',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'construction_builders_header_phone_label',
        array(
            'type'     => 'text',
            'section'  => 'construction_landing_page_phone_number',
            'label'    => __( 'Phone Label', 'construction-builders' ),
            'priority' => 20
            
        )
    );

    // Selective refresh for header Phone
    $wp_customize->selective_refresh->add_partial( 'construction_builders_header_phone_label', array(
        'selector'        => '.header-7 .right-panel .contact-info span.header-phone .phone-label',
        'render_callback' => 'construction_builders_header_phone_label',
    ) );

    /** Header Email Address */
    $wp_customize->add_setting(
        'construction_builders_header_email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
        )
    );

    $wp_customize->add_control(
        'construction_builders_header_email',
        array(
            'type'     => 'email',
            'section'  => 'construction_landing_page_phone_number',
            'label'    => __( 'Email Address', 'construction-builders' ),
            'priority' => 40
        )
    );

    /** Header Phone Label */
    $wp_customize->add_setting(
        'construction_builders_header_button_text',
        array(
            'default'           => __( 'Get A Quote', 'construction-builders' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'construction_builders_header_button_text',
        array(
            'type'     => 'text',
            'section'  => 'construction_landing_page_phone_number',
            'label'    => __( 'Header Button Text', 'construction-builders' ),
            'priority' => 50
        )
    );

    // Selective refresh for Header Button Text
    $wp_customize->selective_refresh->add_partial( 'construction_builders_header_button_text', array(
        'selector'        => '#site-navigation .menu .request-link',
        'render_callback' => 'construction_builders_header_button_text',
    ) );

    $wp_customize->add_setting(
        'construction_builders_header_get_a_quote_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'construction_builders_header_get_a_quote_url',
        array(
            'type'            => 'text',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Button link for Get A Quote', 'construction-builders' ),
            'description'     => __( 'You can find this in the end of navigation menu..', 'construction-builders' ),
            'priority' => 60
        )
    );

    /** Enable Social Links */
    $wp_customize->add_setting(
        'construction_builders_ed_header_social_links',
        array(
            'default'           => true,
            'sanitize_callback' => 'construction_landing_page_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'construction_builders_ed_header_social_links',
        array(
            'label'       => __( 'Enable Social Links', 'construction-builders' ),
            'description' => __( 'Enable to show social links at header.', 'construction-builders' ),
            'section'     => 'construction_landing_page_phone_number',
            'type'        => 'checkbox',
            'priority' => 70
        )
    );

    /** Add social link repeater control */
    $wp_customize->add_setting( 
        new Construction_Builders_Repeater_Setting( 
            $wp_customize, 
            'construction_builders_header_social_links', 
            array(
                'default'           => array(),
                'sanitize_callback' => array( 'Construction_Builders_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Construction_Builders_Control_Repeater(
            $wp_customize,
            'construction_builders_header_social_links',
            array(
                'section' => 'construction_landing_page_phone_number',               
                'label'   => __( 'Social Links', 'construction-builders' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'construction-builders' ),
                        'description' => __( 'Example: fa-bell', 'construction-builders' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'construction-builders' ),
                        'description' => __( 'Example: http://facebook.com', 'construction-builders' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'links', 'construction-builders' ),
                    'field' => 'link'
                ),
                'choices'   => array(
                    'limit' => 10
                ),             
                'active_callback' => 'construction_builders_customizer_active_callback',      
                'priority' => 80,           
            ),
        )
    );
}
add_action( 'customize_register', 'construction_builders_customize_register', 100);

function construction_builders_header_phone_label(){
    $phone_label  = get_theme_mod( 'construction_builders_header_phone_label');

    if( ! empty( $phone_label ) ){
        return esc_html( $phone_label );
    }
    return false; 
}

function construction_builders_header_button_text(){
    $button_label  = get_theme_mod( 'construction_builders_header_button_text', __('Get A Quote', 'construction-builders') );

    if( ! empty( $button_label ) ){
        return esc_html( $button_label );
    }
    return false; 
}

/**
* Callback for Social Links
*/
function construction_builders_social_links_cb(){
    $social_icons = get_theme_mod( 'construction_builders_header_social_links', array() );

    if( $social_icons ){
    ?>
    <ul class="social-networks">
		<?php
        foreach( $social_icons as $socials ){
            if( $socials['link'] ){ ?>
                <li><a href="<?php echo esc_url( $socials['link'] );?>" <?php if( $socials['font'] != 'skype' ) echo 'target="_blank"'; ?> title="<?php echo esc_attr( $socials['font'] ); ?>"><i class="<?php echo esc_attr( $socials['font'] );?>"></i></a></li>
        <?php
            }
        }?>
	</ul>
    <?php
    }
}
add_action( 'construction_builders_social_link', 'construction_builders_social_links_cb' );

/**
 * Customizer active callback function
 */
function construction_builders_customizer_active_callback( $control ){
    $ed_social_link = $control->manager->get_setting( 'construction_builders_ed_header_social_links' )->value();
    $control_id     = $control->id;
    // Phone number, Address, Email and Custom Link controls
    if ( $control_id == 'construction_builders_header_social_links' && $ed_social_link ) return true;
    return false;
}

if ( ! function_exists( 'construction_builders_get_fontawesome_ajax' ) ) :
    /**
     * Return an array of all icons.
     */
    function construction_builders_get_fontawesome_ajax() {
        // Bail if the nonce doesn't check out
        if ( ! isset( $_POST['construction_builders_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['construction_builders_customize_nonce'] ), 'construction_builders_customize_nonce' ) ) {
            wp_die();
        }
    
        // Do another nonce check
        check_ajax_referer( 'construction_builders_customize_nonce', 'construction_builders_customize_nonce' );
    
        // Bail if user can't edit theme options
        if ( ! current_user_can( 'edit_theme_options' ) ) {
            wp_die();
        }
    
        // Get all of our fonts
        $fonts = construction_builders_get_fontawesome_list();
        
        ob_start();
        if( $fonts ){ ?>
            <ul class="font-group">
                <?php 
                    foreach( $fonts as $font ){
                        echo '<li data-font="' . esc_attr( $font ) . '"><i class="' . esc_attr( $font ) . '"></i></li>';                        
                    }
                ?>
            </ul>
            <?php
        }
        echo ob_get_clean();
    
        // Exit
        wp_die();
    }
    endif;
add_action( 'wp_ajax_construction_builders_get_fontawesome_ajax', 'construction_builders_get_fontawesome_ajax' );


function construction_builders_customize_script(){
    wp_localize_script( 'construction-builders-repeater', 'construction_builders_customize',
        array(
            'nonce' => wp_create_nonce( 'construction_builders_customize_nonce' )
        )
    );
}
add_action( 'customize_controls_enqueue_scripts', 'construction_builders_customize_script' );