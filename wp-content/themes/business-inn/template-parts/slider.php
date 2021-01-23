<?php
/**
 * Helper functions.
 *
 * @package Business_Inn
 */

// Bail if no slider.
$slider_details = business_inn_get_slider_details();
if ( empty( $slider_details ) ) {
	return;
}

// Slider status.
$slider_status = business_inn_get_option( 'slider_status' );
if ( 1 !== absint( $slider_status ) ) {
	return;
}

if ( ! ( is_front_page()) && ! is_page_template( 'templates/home.php' ) ) {
    return;
} 

// Slider settings.
$slider_transition_effect 		= business_inn_get_option( 'slider_transition_effect' );
$slider_transition_delay  		= business_inn_get_option( 'slider_transition_delay' );
$slider_transition_duration  	= business_inn_get_option( 'slider_transition_duration' );
$slider_caption_status    		= business_inn_get_option( 'slider_caption_status' );
$slider_arrow_status      		= business_inn_get_option( 'slider_arrow_status' );
$slider_pager_status     		= business_inn_get_option( 'slider_pager_status' );
$slider_autoplay_status   		= business_inn_get_option( 'slider_autoplay_status' );
$slider_overlay_status   		= business_inn_get_option( 'slider_overlay_status' );

$slider_readmore_status   		= business_inn_get_option( 'slider_readmore_status' );
$slider_readmore_text   		= business_inn_get_option( 'slider_readmore_text' );

// Cycle data.
$slide_data = array(
	'fx'             => esc_attr( $slider_transition_effect ),
	'speed'          => absint( $slider_transition_duration ) * 1000,
	'pause-on-hover' => 'true',
	'loader'         => 'true',
	'log'            => 'false',
	'swipe'          => 'true',
	'auto-height'    => 'container',
);

if ( true === $slider_pager_status ) {
	$slide_data['pager-template'] = '<span class="pager-box"></span>';
}
if ( true === $slider_autoplay_status ) {
	$slide_data['timeout'] = absint( $slider_transition_delay ) * 1000;
} else {
	$slide_data['timeout'] = 0;
}

$slide_data['slides'] = 'article';

$slide_attributes_text = '';
foreach ( $slide_data as $key => $item ) {

	$slide_attributes_text .= ' ';
	$slide_attributes_text .= ' data-cycle-'.esc_attr( $key );
	$slide_attributes_text .= '="'.esc_attr( $item ).'"';

}
$overlay_class = ( true === $slider_overlay_status ) ? 'overlay-enabled' : 'overlay-disabled' ;
?>
<div id="featured-slider">
	<div class="cycle-slideshow <?php echo esc_attr( $overlay_class ); ?>" id="main-slider" <?php echo $slide_attributes_text; ?>>

		<?php 
		if ( true === $slider_arrow_status ) : ?>
			<div class="cycle-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			<div class="cycle-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			<?php 
		endif; 

		$count = 1; 

		foreach ( $slider_details as $slide ) :

			$extra_class = ( 1 === $count ) ? 'first' : ''; 
                
                        $tag = ( 1 == $count ) ? 'h1' : 'h2';

			?>
			<article class="<?php echo esc_attr( $extra_class ); ?>" data-cycle-tag="<?php echo $tag;?>" data-cycle-title="<?php echo esc_html( $slide['title'] ); ?>"  data-cycle-url="<?php echo esc_url( $slide['url'] ); ?>"  data-cycle-excerpt="<?php echo esc_html( $slide['excerpt'] ); ?>">

				<img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" />

				<?php if ( true === $slider_caption_status ) : ?>
					<div class="cycle-caption">
						<div class="container">
							<div class="caption-wrap">
								<?php 

								if( true === $slider_readmore_status ){ ?>

									<<?php echo $tag;?>><a href="<?php echo esc_url( $slide['url'] ); ?>"> <?php echo esc_html( $slide['title'] ); ?></a></<?php echo $tag;?>>

									<?php

								}else{ ?>

									<<?php echo $tag;?>><?php echo esc_html( $slide['title'] ); ?></<?php echo $tag;?>>

									<?php

								} ?>
								<div class="slider-meta"><p><?php echo esc_html( $slide['excerpt'] ); ?></p></div>
							</div>
						</div><!-- .cycle-wrap -->
					</div><!-- .cycle-caption -->
				<?php endif; ?>

			</article>

		<?php $count++; ?>

		<?php endforeach; ?>

		<?php if ( true === $slider_pager_status ) : ?>
			<div class="cycle-pager"></div>
		<?php endif; ?>

	</div> <!-- #main-slider -->
</div><!-- #featured-slider -->