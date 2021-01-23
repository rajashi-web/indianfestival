<?php
/**
 * The template part for header
 *
 * @package VW Health Coaching 
 * @subpackage vw_health_coaching
 * @since VW Health Coaching 1.0
 */
?>
<?php
  $vw_health_coaching_search_hide_show = get_theme_mod( 'vw_health_coaching_search_hide_show' );
  if ( 'Disable' == $vw_health_coaching_search_hide_show ) {
   $colmd = 'col-lg-12 col-md-12';
  } else { 
   $colmd = 'col-lg-11 col-md-10 col-6';
  } 
?>
<div class="main-header">
  <div class="main-header-inner">
    <div class="header-menu <?php if( get_theme_mod( 'vw_health_coaching_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
      <div class="container">
        <div class="row m-0">
          <div class="<?php echo esc_html( $colmd ); ?>">
            <?php get_template_part( 'template-parts/header/navigation' ); ?>
          </div>
          <?php if ( 'Disable' != $vw_health_coaching_search_hide_show ) {?>
            <div class="col-lg-1 col-md-2 col-6">
              <div class="search-box">
                <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-body">
            <div class="serach_inner">
              <?php get_search_form(); ?>
            </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="logo">
    <div class="logo-inner">
      <?php if ( has_custom_logo() ) : ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php endif; ?>
      <?php $blog_info = get_bloginfo( 'name' ); ?>
        <?php if ( ! empty( $blog_info ) ) : ?>
          <?php if ( is_front_page() && is_home() ) : ?>
            <?php if( get_theme_mod('vw_health_coaching_logo_title_hide_show',true) != ''){ ?>
              <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php } ?>
          <?php else : ?>
            <?php if( get_theme_mod('vw_health_coaching_logo_title_hide_show',true) != ''){ ?>
              <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php } ?>
          <?php endif; ?>
        <?php endif; ?>
        <?php
          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) :
        ?>
        <?php if( get_theme_mod('vw_health_coaching_tagline_hide_show',true) != ''){ ?>
          <p class="site-description">
            <?php echo esc_html($description); ?>
          </p>
        <?php } ?>
      <?php endif; ?>
    </div>
  </div>
</div>