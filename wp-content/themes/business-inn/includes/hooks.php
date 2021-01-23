<?php
/**
 * Load hooks.
 *
 * @package Business_Inn
 */

//=============================================================
// Doctype hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function business_inn_doctype_action() {
    ?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
    }
endif;

add_action( 'business_inn_doctype', 'business_inn_doctype_action', 10 );

//=============================================================
// Head hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function business_inn_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    }
endif;

add_action( 'business_inn_head', 'business_inn_head_action', 10 );

//=============================================================
// Top header hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_top_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function business_inn_top_header_action() {

        // Top header status.
        $header_status = business_inn_get_option( 'show_top_header' );
        if ( 1 != $header_status ) {
            return;
        }

        // Top Items.
        $top_address    = business_inn_get_option( 'top_address' );
        $top_phone      = business_inn_get_option( 'top_phone' );
        $top_email      = business_inn_get_option( 'top_email' );
        
        ?>
        <div id="top-bar" class="top-header">
            <div class="container">
                <?php 
                if( !empty( $top_address ) || !empty( $top_phone ) || !empty( $top_email ) ){ ?>
                    <div class="top-left">
                        <?php if( !empty( $top_address ) ){ ?>
                            <span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( $top_address ); ?></span>
                        <?php } ?>

                        <?php if( !empty( $top_phone ) ){ ?>
                            <span class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( $top_phone ); ?></span>
                        <?php } ?>

                        <?php if( !empty( $top_email ) ){ ?>
                            <span class="fax"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html( $top_email ); ?></span>
                        <?php } ?>
                        
                    </div><?php 
                } ?>

                <div class="top-right">
                    <?php 
                    if( has_nav_menu( 'top' ) ){ ?>
                        <div class="top-menu-content">
                            <?php
                            wp_nav_menu(
                                array(
                                'theme_location' => 'top',
                                'menu_id'        => 'top-menu',
                                'depth'          => 1,                                   
                                )
                            ); ?>
                        </div><!-- .menu-content -->
                        <?php
                    } ?>

                </div>
                
            </div>
        </div>
        <?php
    }
endif;

add_action( 'business_inn_top_header', 'business_inn_top_header_action' );

//=============================================================
// Before header hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_before_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function business_inn_before_header_action() {

        ?><header id="masthead" class="site-header" role="banner"><?php
    }
endif;

add_action( 'business_inn_before_header', 'business_inn_before_header_action' );

//=============================================================
// Header main hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_header_action' ) ) :

    /**
     * Site Header.
     *
     * @since 1.0.0
     */
    function business_inn_header_action() {
        ?>
        <div class="head-wrap">
            <div class="container">
            	<div class="site-branding">
            		<?php 

                    $site_identity = business_inn_get_option( 'site_identity' );

                    if( 'logo-only' == $site_identity ){  

                        business_inn_the_custom_logo();

                    }elseif( 'logo-desc' == $site_identity ){

                        business_inn_the_custom_logo();

                        $description = get_bloginfo( 'description', 'display' );

                        if ( $description || is_customize_preview() ) : ?>

                            <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                            <?php
                        endif; 

                    }else{ ?>

                        <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

                		<?php
                		$description = get_bloginfo( 'description', 'display' );

                        if ( $description || is_customize_preview() ) : ?>

                            <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                            <?php
                        endif; 
            		} ?>
            	</div><!-- .site-branding -->
                <?php
                if( has_nav_menu( 'social' ) ){ ?>

                    <div class="top-right-social-menu"> 

                        <?php the_widget( 'Business_Inn_Social_Widget' ); ?>

                    </div>
                    <?php
                } ?>
            </div><!-- .container -->
        </div>
        <?php
    }

endif;

add_action( 'business_inn_header', 'business_inn_header_action' );

//=============================================================
// Main nav hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_nav_action' ) ) :

    /**
     * Site Nav.
     *
     * @since 1.0.0
     */
    function business_inn_nav_action() {
        ?>
        <div class="main-nav-wrap">
            <div class="container">
                <div id="main-nav" class="clear-fix">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <div class="wrap-menu-content">
                            <?php
                            wp_nav_menu(
                                array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'fallback_cb'    => 'business_inn_primary_navigation_fallback',
                                )
                            );
                            ?>
                        </div><!-- .menu-content -->
                    </nav><!-- #site-navigation -->
                </div> <!-- #main-nav -->
            </div><!-- .container -->
        </div>
        <?php
    }

endif;

add_action( 'business_inn_nav', 'business_inn_nav_action' );

//=============================================================
// After header hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_after_header_action' ) ) :
    /**
     * Header End.
     *
     * @since 1.0.0
     */
    function business_inn_after_header_action() {
       
    ?></header><!-- #masthead --><?php
    }
endif;
add_action( 'business_inn_after_header', 'business_inn_after_header_action' );

//=============================================================
// Slider hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_main_content_for_slider' ) ) :

    /**
     * Add slider.
     *
     * @since 1.0.0
     */
    function business_inn_main_content_for_slider() {

        get_template_part( 'template-parts/slider' );

    }

endif;

add_action( 'business_inn_main_content', 'business_inn_main_content_for_slider' , 5 );

//=============================================================
// Breadcrumb hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_main_content_for_breadcrumb' ) ) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function business_inn_main_content_for_breadcrumb() {

        get_template_part( 'template-parts/breadcrumbs' );

    }

endif;

add_action( 'business_inn_main_content', 'business_inn_main_content_for_breadcrumb' , 7 );

//=============================================================
// Home widget hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_main_content_for_home_widgets' ) ) :

    /**
     * Add home widgets.
     *
     * @since 1.0.0
     */
    function business_inn_main_content_for_home_widgets() {

        get_template_part( 'template-parts/home-widgets' );

    }

endif;

add_action( 'business_inn_main_content', 'business_inn_main_content_for_home_widgets' , 9 );

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_before_content_action' ) ) :
    /**
     * Content Start.
     *
     * @since 1.0.0
     */
    function business_inn_before_content_action() {
    ?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
    }
endif;
add_action( 'business_inn_before_content', 'business_inn_before_content_action' );

//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_after_content_action' ) ) :
    /**
     * Content End.
     *
     * @since 1.0.0
     */
    function business_inn_after_content_action() {
    ?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php    
    }
endif;
add_action( 'business_inn_after_content', 'business_inn_after_content_action' );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'business_inn_credit_info' ) ) :

    function business_inn_credit_info(){ ?>

        <div class="site-info">
            <?php 
            /* translators: 1: name of theme, 2: Link of theme author */
            $footerLink = 'https://www.prodesigns.com/';
            printf( esc_html__( '%1$s by %2$s', 'business-inn' ), 'Business Inn', '<a href="'.$footerLink.'" rel="designer" target="_blank">ProDesigns</a>' ); 
            ?>
        </div><!-- .site-info -->
        
        <?php
    }

endif;

add_action( 'business_inn_credit', 'business_inn_credit_info', 10 );

