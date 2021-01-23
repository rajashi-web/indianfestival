<?php
/**
 * Custom widgets.
 *
 * @package Business_Inn
 */

if ( ! function_exists( 'business_inn_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function business_inn_load_widgets() {

		// Social.
		register_widget( 'Business_Inn_Social_Widget' );

		// Latest news.
		register_widget( 'Business_Inn_Latest_News_Widget' );

		// CTA widget.
		register_widget( 'Business_Inn_CTA_Widget' );

		// Services widget.
		register_widget( 'Business_Inn_Services_Widget' );

		// About Us widget.
		register_widget( 'Business_Inn_About_Widget' );

		// Testimonial widget.
		register_widget( 'Business_Inn_Testimonial_Widget' );

	}

endif;

add_action( 'widgets_init', 'business_inn_load_widgets' );

if ( ! class_exists( 'Business_Inn_Social_Widget' ) ) :

	/**
	 * Social widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Inn_Social_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'business_inn_widget_social',
				'description' => esc_html__( 'Social Icons Widget', 'business-inn' ),
			);
			parent::__construct( 'business-inn-social', esc_html__( 'BI: Social', 'business-inn' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . esc_html( $title ). $args['after_title'];
			}

			if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'social',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			}

			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = sanitize_text_field( $new_instance['title'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 * @return void
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title' => '',
			) );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'business-inn' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<?php if ( ! has_nav_menu( 'social' ) ) : ?>
	        <p>
				<?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Theme Location.', 'business-inn' ); ?>
	        </p>
	        <?php endif; ?>
			<?php
		}
	}

endif;


if ( ! class_exists( 'Business_Inn_Latest_News_Widget' ) ) :

	/**
	 * Latest News widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Inn_Latest_News_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'business_inn_widget_latest_news',
				'description' => esc_html__( 'Latest News Widget', 'business-inn' ),
    		);

			parent::__construct( 'business-inn-latest-news', esc_html__( 'BI: Latest News', 'business-inn' ), $opts );
	    }


	    function widget( $args, $instance ) {

			$title             	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$post_category     	= ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;

			$exclude_categories = !empty( $instance[ 'exclude_categories' ] ) ? esc_attr( $instance[ 'exclude_categories' ] ) : '';

			$excerpt_length		= !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 20;

			$read_more_text		= !empty( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';

			$disable_date   	= ! empty( $instance['disable_date'] ) ? $instance['disable_date'] : 0;

	        echo $args['before_widget']; ?>

	        <div class="latest-news-widget bp-latest-news">

		        <?php 

		        if ( $title ) {
		        	echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		        } 

		        $query_args = array(
					        	'posts_per_page' 		=> 3,
					        	'no_found_rows'  		=> true,
					        	'post__not_in'          => get_option( 'sticky_posts' ),
					        	'ignore_sticky_posts'   => true,
				        	);

		        if ( absint( $post_category ) > 0 ) {

		        	$query_args['cat'] = absint( $post_category );
		        	
		        }

		        if ( !empty( $exclude_categories ) ) {

		        	$exclude_ids = explode(',', $exclude_categories);

		        	$query_args['category__not_in'] = $exclude_ids;

		        }

		        $all_posts = new WP_Query( $query_args );

		        if ( $all_posts->have_posts() ) :?>

			        <div class="inner-wrapper">

						<?php 

						while ( $all_posts->have_posts() ) :

                            $all_posts->the_post(); ?>

				                <div class="latest-news-item">
					                <div class="latest-news-wrapper">

						                <?php if ( has_post_thumbnail() ) :  ?>
						                  <div class="latest-news-thumb">
						                    <a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'business-inn-small' ); ?>
						                    </a>
						                  </div><!-- .latest-news-thumb -->
						                <?php endif; ?>
						                <div class="latest-news-text-wrap">
											<h2 class="latest-news-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2><!-- .latest-news-title -->
											<?php if( 1 != $disable_date ){ ?>
												<span class="latest-news-date"><?php echo esc_html( get_the_date() ); ?></span>
											<?php } ?>

											<?php 
											$content = business_inn_get_the_excerpt( absint( $excerpt_length ) );
											
											echo $content ? wpautop( wp_kses_post( $content ) ) : '';

											if ( ! empty( $read_more_text ) ) {

												echo '<a href="' . esc_url( get_permalink() ) . '" class="btn-continue">' . esc_html( $read_more_text ) . '</a>';

											} ?>

						                </div><!-- .latest-news-text-wrap -->

					                </div>
				                </div>

				                <?php 

						endwhile; 

                        wp_reset_postdata(); ?>

                    </div>

		        <?php endif; ?>

	        </div><!-- .latest-news-widget -->

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
			$instance['title']          	= sanitize_text_field( $new_instance['title'] );
			$instance['post_category']  	= absint( $new_instance['post_category'] );
			$instance['exclude_categories'] = sanitize_text_field( $new_instance['exclude_categories'] );
			$instance['excerpt_length'] 	= absint( $new_instance['excerpt_length'] );

			$instance['read_more_text'] 	= sanitize_text_field( $new_instance['read_more_text'] );
			$instance['disable_date']    	= (bool) $new_instance['disable_date'] ? 1 : 0;

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
				'title'          		=> '',
				'post_category'  		=> '',
				'exclude_categories' 	=> '',
				'excerpt_length'		=> 20,
				'read_more_text'		=> esc_html__( 'Read More', 'business-inn' ),
				'disable_date'   		=> 0,
	        ) );
	        ?>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-inn' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	        </p>
	        <p>
	          <label for="<?php echo  esc_attr( $this->get_field_id( 'post_category' ) ); ?>"><strong><?php esc_html_e( 'Select Category:', 'business-inn' ); ?></strong></label>
				<?php
	            $cat_args = array(
	                'orderby'         => 'name',
	                'hide_empty'      => 0,
	                'class' 		  => 'widefat',
	                'taxonomy'        => 'category',
	                'name'            => $this->get_field_name( 'post_category' ),
	                'id'              => $this->get_field_id( 'post_category' ),
	                'selected'        => absint( $instance['post_category'] ),
	                'show_option_all' => esc_html__( 'All Categories','business-inn' ),
	              );
	            wp_dropdown_categories( $cat_args );
				?>
	        </p>
            <p>
            	<label for="<?php echo esc_attr( $this->get_field_id( 'exclude_categories' ) ); ?>"><strong><?php esc_html_e( 'Exclude Categories:', 'business-inn' ); ?></strong></label>
            	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude_categories' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['exclude_categories'] ); ?>" />
    	        <small>
    	        	<?php esc_html_e('Enter category id seperated with comma. Posts from these categories will be excluded from latest post listing.', 'business-inn'); ?>	
    	        </small>
            </p>
            <p>
            	<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>"><strong><?php esc_html_e( 'Excerpt Length:', 'business-inn' ); ?></strong></label>
            	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
            </p>

            <p>
            	<label for="<?php echo esc_attr( $this->get_field_id( 'read_more_text' ) ); ?>"><strong><?php esc_html_e( 'Read More Text:', 'business-inn' ); ?></strong></label>
            	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'read_more_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'read_more_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['read_more_text'] ); ?>" />
            	<small>
            		<?php esc_html_e('Leave this field empty if you want to hide read more button in services section', 'business-inn'); ?>	
            	</small>
            </p>
	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['disable_date'] ); ?> id="<?php echo $this->get_field_id( 'disable_date' ); ?>" name="<?php echo $this->get_field_name( 'disable_date' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'disable_date' ); ?>"><?php esc_html_e( 'Hide Posted Date', 'business-inn' ); ?></label>
	        </p>
	        <?php
	    }

	}

endif;

if ( ! class_exists( 'Business_Inn_CTA_Widget' ) ) :

	/**
	 * CTA widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Inn_CTA_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'business_inn_widget_call_to_action',
				'description' => esc_html__( 'Call To Action Widget', 'business-inn' ),
			);
			parent::__construct( 'business-inn-cta', esc_html__( 'BI: CTA', 'business-inn' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {
			$title       = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$cta_page    = !empty( $instance['cta_page'] ) ? $instance['cta_page'] : ''; 
			$button_text = ! empty( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
			$button_url  = ! empty( $instance['button_url'] ) ? esc_url( $instance['button_url'] ) : '';
			$secondary_button_text = ! empty( $instance['secondary_button_text'] ) ? esc_html( $instance['secondary_button_text'] ) : '';
			$secondary_button_url  = ! empty( $instance['secondary_button_url'] ) ? esc_url( $instance['secondary_button_url'] ) : '';
			$bg_pic  	 = ! empty( $instance['bg_pic'] ) ? esc_url( $instance['bg_pic'] ) : '';

			// Add background image.
			if ( ! empty( $bg_pic ) ) {
				$background_style = '';
				$background_style .= ' style="background-image:url(' . esc_url( $bg_pic ) . ');" ';
				$args['before_widget'] = implode( $background_style . ' ' . 'class="bg_enabled ', explode( 'class="', $args['before_widget'], 2 ) );
			}

			echo $args['before_widget']; ?>

			<div class="cta-widget">

				<?php

				if ( ! empty( $title ) ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				}  

				if ( $cta_page ) { 

					$cta_args = array(
									'posts_per_page' => 1,
									'page_id'	     => absint( $cta_page ),
									'post_type'      => 'page',
									'post_status'  	 => 'publish',
								);

					$cta_query = new WP_Query( $cta_args );	

					if( $cta_query->have_posts()){

						while( $cta_query->have_posts()){

							$cta_query->the_post(); ?>

							<div class="call-to-action-content">
								<?php the_content(); ?>
							</div>

							<?php

						}

						wp_reset_postdata();

					} ?>
					
				<?php } ?>

				<div class="call-to-action-buttons">

					<?php if ( ! empty( $button_text ) ) : ?>
						<a href="<?php echo esc_url( $button_url ); ?>" class="button cta-button cta-button-primary"><?php echo esc_html( $button_text ); ?></a>
					<?php endif; ?>

					<?php if ( ! empty( $secondary_button_text ) ) : ?>
						<a href="<?php echo esc_url( $secondary_button_url ); ?>" class="button cta-button cta-button-secondary"><?php echo esc_html( $secondary_button_text ); ?></a>
					<?php endif; ?>

				</div><!-- .call-to-action-buttons -->

			</div><!-- .cta-widget -->

			<?php
			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$instance['cta_page'] 	 	= absint( $new_instance['cta_page'] );

			$instance['button_text'] 	= sanitize_text_field( $new_instance['button_text'] );
			$instance['button_url']  	= esc_url_raw( $new_instance['button_url'] );

			$instance['secondary_button_text'] 	= sanitize_text_field( $new_instance['secondary_button_text'] );
			$instance['secondary_button_url']  	= esc_url_raw( $new_instance['secondary_button_url'] );

			$instance['bg_pic']  	 	= esc_url_raw( $new_instance['bg_pic'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title'       			=> '',
				'cta_page'    			=> '',
				'button_text' 			=> esc_html__( 'Find More', 'business-inn' ),
				'button_url'  			=> '',
				'secondary_button_text' => esc_html__( 'Buy Now', 'business-inn' ),
				'secondary_button_url'  => '',
				'bg_pic'      			=> '',
			) );

			$bg_pic = '';

            if ( ! empty( $instance['bg_pic'] ) ) {

                $bg_pic = $instance['bg_pic'];

            }

            $wrap_style = '';

            if ( empty( $bg_pic ) ) {

                $wrap_style = ' style="display:none;" ';
            }

            $image_status = false;

            if ( ! empty( $bg_pic ) ) {
                $image_status = true;
            }

            $delete_button = 'display:none;';

            if ( true === $image_status ) {
                $delete_button = 'display:inline-block;';
            }
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'cta_page' ); ?>">
					<strong><?php esc_html_e( 'CTA Page:', 'business-inn' ); ?></strong>
				</label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( 'cta_page' ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( 'cta_page' ),
					'selected'         => $instance[ 'cta_page' ],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-inn' ),
					)
				);
				?>
				<small>
		        	<?php esc_html_e('Content of this page will be used as content of CTA', 'business-inn'); ?>	
		        </small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><strong><?php esc_html_e( 'Primary Button Text:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><strong><?php esc_html_e( 'Primary Button URL:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['button_url'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'secondary_button_text' ) ); ?>"><strong><?php esc_html_e( 'Secondary Button Text:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'secondary_button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'secondary_button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['secondary_button_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'secondary_button_url' ) ); ?>"><strong><?php esc_html_e( 'Secondary Button URL:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'secondary_button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'secondary_button_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['secondary_button_url'] ); ?>" />
			</p>

			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>">
                    <strong><?php esc_html_e( 'Background Image:', 'business-inn' ); ?></strong>
                </label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'bg_pic' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>" value="<?php echo esc_url( $instance['bg_pic'] ); ?>" />
                <div class="rtam-preview-wrap" <?php echo $wrap_style; ?>>
                    <img src="<?php echo esc_url( $bg_pic ); ?>" alt="<?php esc_attr_e( 'Preview', 'business-inn' ); ?>" />
                </div><!-- .rtam-preview-wrap -->
                <input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'business-inn' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Background Image', 'business-inn' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'business-inn' ); ?>" />
                <input type="button" value="<?php echo esc_attr_x( 'X', 'Remove Button', 'business-inn' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $delete_button ); ?>" />
            </div>
		<?php
		} 
	
	}

endif;

if ( ! class_exists( 'Business_Inn_Services_Widget' ) ) :

	/**
	 * Service widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Inn_Services_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'business_inn_widget_services',
					'description' => esc_html__( 'Display services.', 'business-inn' ),
			);
			parent::__construct( 'business-inn-services', esc_html__( 'BI: Services', 'business-inn' ), $opts );
		}

		function widget( $args, $instance ) {

			$title 			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$excerpt_length	= !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 20;

			$read_more_text	= !empty( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';

			$services_ids 	= array();

			$item_number 	= 9;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				if ( ! empty( $instance["item_id_$i"] ) && absint( $instance["item_id_$i"] ) > 0 ) {
					$id = absint( $instance["item_id_$i"] );
					$services_ids[ $id ]['id']   = $id;
				}
			}

			echo $args['before_widget']; ?>

			<div class="binn-services">

				<?php

				if ( $title ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				}

				if ( ! empty( $services_ids ) ) {
					$query_args = array(
						'posts_per_page' => count( $services_ids ),
						'post__in'       => wp_list_pluck( $services_ids, 'id' ),
						'orderby'        => 'post__in',
						'post_type'      => 'page',
						'no_found_rows'  => true,
					);
					$all_services = get_posts( $query_args ); ?>

					<?php if ( ! empty( $all_services ) ) : ?>
						<?php global $post; ?>
						
							<div class="inner-wrapper">

								<?php foreach ( $all_services as $post ) : ?>
									<?php setup_postdata( $post ); ?>
									<div class="services-item">
										<div class="services-item-inner">
							                <?php if ( has_post_thumbnail() ) :  ?>
							                  <div class="services-item-thumb">
												<?php the_post_thumbnail('thumbnail'); ?>
							                  </div><!-- .service-thumb -->
							                <?php endif; ?>

											<h4 class="services-item-title"><?php the_title(); ?></h4>
											<?php 
											$content = business_inn_get_the_excerpt( absint( $excerpt_length ), $post );
											
											echo $content ? wpautop( wp_kses_post( $content ) ) : '';

											if ( ! empty( $read_more_text ) ) {

												echo '<a href="' . esc_url( get_permalink() ) . '" class="btn-continue">' . esc_html( $read_more_text ) . '</a>';

											} ?>
										</div><!-- .services-item-inner -->
									</div><!-- .services-item -->
								<?php endforeach; ?>

							</div><!-- .inner-wrapper -->

						<?php wp_reset_postdata(); ?>

					<?php endif;
				} ?>

			</div><!-- .services-list -->

			<?php

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );

			$instance['read_more_text'] = sanitize_text_field( $new_instance['read_more_text'] );

			$item_number = 9;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$instance["item_id_$i"]   = absint( $new_instance["item_id_$i"] );
			}

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
							'title' 			=> '',
							'excerpt_length'	=> 20,
							'read_more_text'	=> esc_html__( 'Read More', 'business-inn' ),
						);

			$item_number = 9;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$defaults["item_id_$i"]   = '';
			}

			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>"><strong><?php esc_html_e( 'Excerpt Length:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'read_more_text' ) ); ?>"><strong><?php esc_html_e( 'Read More Text:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'read_more_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'read_more_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['read_more_text'] ); ?>" />
				<small>
					<?php esc_html_e('Leave this field empty if you want to hide read more button in services section', 'business-inn'); ?>	
				</small>
			</p>
			
			<?php
				for ( $i = 1; $i <= $item_number; $i++ ) {
					?>
					<p>
						<label for="<?php echo $this->get_field_id( "item_id_$i" ); ?>"><strong><?php esc_html_e( 'Service Page:', 'business-inn' ); ?>&nbsp;<?php echo $i; ?></strong></label>
						<?php
						wp_dropdown_pages( array(
							'id'               => $this->get_field_id( "item_id_$i" ),
							'class'            => 'widefat',
							'name'             => $this->get_field_name( "item_id_$i" ),
							'selected'         => $instance["item_id_$i"],
							'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-inn' ),
							)
						);
						?>
					</p>
					<?php 
				}
		}
	}

endif;

if ( ! class_exists( 'Business_Inn_About_Widget' ) ) :

	/**
	 * About Us widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Inn_About_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'business_inn_widget_about_us',
				'description' => esc_html__( 'Widget to display about us section with skills', 'business-inn' ),
			);
			parent::__construct( 'business-inn-about', esc_html__( 'BI: About Us', 'business-inn' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {
			$title       		= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			
			$about_page  		= !empty( $instance['about_page'] ) ? $instance['about_page'] : ''; 

			$image_alignment 	= !empty( $instance['image_alignment'] ) ? $instance['image_alignment'] : '';

			$show_features 		= ! empty( $instance['show_features'] ) ? $instance['show_features'] : 0;

			$excerpt_length		= !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : '';

			$features_ids 	= array();

			$item_number 	= 5;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				if ( ! empty( $instance["item_id_$i"] ) && absint( $instance["item_id_$i"] ) > 0 ) {
					$id = absint( $instance["item_id_$i"] );
					$features_ids[ $id ]['id']   = $id;
					$features_ids[ $id ]['icon'] = $instance["item_icon_$i"];
				}
			}

			echo $args['before_widget']; ?>

			<div class="about-us-wrap">

				<?php

				if ( ! empty( $title ) ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				} 

				if( 'right' === $image_alignment ){

					$image_position 	= 'img-align-right';
					$content_position	= 'content-align-left';

				} else{

					$image_position 	= 'img-align-left';
					$content_position	= 'content-align-right';

				} ?>

				<div class="inner-wrapper">

					<div class="about-us-content <?php echo $content_position; ?>"">

						<?php

						if ( $about_page ) { 

							$about_args = array(
											'posts_per_page' => 1,
											'page_id'	     => absint( $about_page ),
											'post_type'      => 'page',
											'post_status'  	 => 'publish',
										);

							$about_query = new WP_Query( $about_args );	

							if( $about_query->have_posts()){

								while( $about_query->have_posts()){

									$about_query->the_post(); ?>

									<div class="about-us-text">
										<?php the_content(); ?>
									</div>

									<?php

								}

								wp_reset_postdata();

							} 

						} 

						if( 1 === $show_features && !empty( $features_ids ) ){ 

							$features_args = array(
								'posts_per_page' => count( $features_ids ),
								'post__in'       => wp_list_pluck( $features_ids, 'id' ),
								'orderby'        => 'post__in',
								'post_type'      => 'page',
								'no_found_rows'  => true,
							);

							$features_query = new WP_Query( $features_args );	

							if( $features_query->have_posts()){ ?>

								<div class="about-us-features">

									<?php 

									while( $features_query->have_posts()){

										$features_query->the_post(); ?>

										<div class="features-item">
											<div class="features-inner">
												<?php 
												$page_id 	  = get_the_ID();
												$feature_icon = $features_ids[ $page_id ]['icon'];

												if( !empty( $feature_icon ) ){ ?>
													<div class="features-icon">
														<i class="fa <?php echo esc_attr( $feature_icon ); ?>"></i>
													</div>
													<?php
												} ?>

												<div class="features-text-wrap">
													<h4 class="features-item-title"><?php the_title(); ?></h4>
													<?php 
													$content = business_inn_get_the_excerpt( absint( $excerpt_length ) );
													
													echo $content ? wpautop( wp_kses_post( $content ) ) : '';
													?>
												</div>
											</div>
										</div><!-- .features-item -->

										<?php

									}

									wp_reset_postdata(); ?>

								</div>
								<?php
							} 

						} ?>

					</div>

					<?php 

					$about_img = get_the_post_thumbnail_url( $about_page, 'full' );

					if( !empty( $about_img ) ){ ?>

						<div class="about-us-image <?php echo $image_position; ?>">

							<img src="<?php echo esc_url( $about_img ); ?>">

						</div><!-- .about-us-image -->

						<?php

					} ?>

				</div>

			</div><!-- .about-us-widget -->

			<?php
			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] 				= sanitize_text_field( $new_instance['title'] );

			$instance['about_page'] 		= absint( $new_instance['about_page'] );

			$instance['image_alignment'] 	= $new_instance['image_alignment'];

			$instance['show_features']    	= (bool) $new_instance['show_features'] ? 1 : 0;

			$instance['excerpt_length'] 	= absint( $new_instance['excerpt_length'] );

			$item_number = 5;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$instance["item_icon_$i"] = sanitize_text_field( $new_instance["item_icon_$i"] );
				$instance["item_id_$i"]   = absint( $new_instance["item_id_$i"] );
			}

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$defaults = wp_parse_args( (array) $instance, array(
				'title'       			=> '',
				'about_page'    		=> '',
				'image_alignment'   	=> 'right',
				'show_features'   		=> 1,
				'excerpt_length'		=> 10,
			) );

			$item_number = 5;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$defaults["item_icon_$i"] = 'icon-pencil';
				$defaults["item_id_$i"]   = '';
			}

			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'about_page' ); ?>">
					<strong><?php esc_html_e( 'Select Page:', 'business-inn' ); ?></strong>
				</label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( 'about_page' ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( 'about_page' ),
					'selected'         => $instance[ 'about_page' ],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-inn' ),
					)
				);
				?>
				<small>
		        	<?php esc_html_e('Content and featured image of this page will be used as content of about us section', 'business-inn'); ?>	
		        </small>
			</p>

	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'image_alignment' ) ); ?>"><strong><?php esc_html_e( 'Image Position:', 'business-inn' ); ?></strong></label>
				<?php
	            $this->dropdown_image_alignment( array(
					'id'       => $this->get_field_id( 'image_alignment' ),
					'name'     => $this->get_field_name( 'image_alignment' ),
					'selected' => esc_attr( $instance['image_alignment'] ),
					)
	            );
				?>
	        </p>

	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['show_features'] ); ?> id="<?php echo $this->get_field_id( 'show_features' ); ?>" name="<?php echo $this->get_field_name( 'show_features' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'show_features' ); ?>"><?php esc_html_e( 'Show Features', 'business-inn' ); ?></label>
	        </p>

			<hr>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>">
					<strong><?php esc_html_e( 'Excerpt Length:', 'business-inn' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
			</p>

	        <p>
		        <small>
		        	
		        	<?php 
		        	$fontLink = 'http://fontawesome.io/icons/';
		        	printf( esc_html__( '%1$s %2$s', 'business-inn' ), 'Font Awesome  icons are used for icon of each block. You can find icon code', '<a href="'.$fontLink.'" target="_blank">here</a>' ); ?>
		        </small>
	        </p>

			<?php
			for ( $i = 1; $i <= $item_number; $i++ ) {
				?>
				<h4 class="widefat widget-custom-info">
	                <span class="field-label"><strong><?php echo sprintf( esc_html__( 'Feature #%d', 'business-inn' ), $i ); ?></strong></span>
	            </h4>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( "item_icon_$i" ) ); ?>"><strong><?php esc_html_e( 'Icon:', 'business-inn' ); ?></strong></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "item_icon_$i" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "item_icon_$i" ) ); ?>" type="text" value="<?php echo esc_attr( $instance["item_icon_$i"] ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( "item_id_$i" ); ?>"><strong><?php esc_html_e( 'Select Page:', 'business-inn' ); ?></strong></label>
					<?php
					wp_dropdown_pages( array(
						'id'               => $this->get_field_id( "item_id_$i" ),
						'class'            => 'widefat',
						'name'             => $this->get_field_name( "item_id_$i" ),
						'selected'         => $instance["item_id_$i"],
						'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-inn' ),
						)
					);
					?>
				</p>
				<?php 
			} ?>

			
			
		<?php
		}

	    function dropdown_image_alignment( $args ) {
			$defaults = array(
		        'id'       => '',
		        'class'    => 'widefat',
		        'name'     => '',
		        'selected' => 'right',
			);

			$r = wp_parse_args( $args, $defaults );
			$output = '';

			$choices = array(
				'left' 		=> esc_html__( 'Left', 'business-inn' ),
				'right' 	=> esc_html__( 'Right', 'business-inn' ),
			);

			if ( ! empty( $choices ) ) {

				$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
				foreach ( $choices as $key => $choice ) {
					$output .= '<option value="' . esc_attr( $key ) . '" ';
					$output .= selected( $r['selected'], $key, false );
					$output .= '>' . esc_html( $choice ) . '</option>\n';
				}
				$output .= "</select>\n";
			}

			echo $output;
	    } 
	
	}

endif;

if ( ! class_exists( 'Business_Inn_Testimonial_Widget' ) ) :

	/**
	 * Testimonial widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Inn_Testimonial_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'business_inn_widget_testimonial',
					'description' => esc_html__( 'Widget to display testimonials.', 'business-inn' ),
			);
			parent::__construct( 'business-inn-testimonial', esc_html__( 'BI: Testimonials', 'business-inn' ), $opts );
		}

		function widget( $args, $instance ) {

			$title 			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$testimonial_ids = array();

			$item_number = 5;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				if ( ! empty( $instance["item_id_$i"] ) && absint( $instance["item_id_$i"] ) > 0 ) {
					$id = absint( $instance["item_id_$i"] );
					$testimonial_ids[ $id ]['id']   = $id;
				}
			}

			$transition_effects = !empty( $instance['transition_effects'] )? $instance['transition_effects'] : '';
			$transition_delay   = !empty( $instance['transition_delay'] )? $instance['transition_delay'] : 3;

			$show_pager         = ! empty( $instance['show_pager'] ) ? $instance['show_pager'] : 0;

			$enable_autoplay    = ! empty( $instance['enable_autoplay'] ) ? $instance['enable_autoplay'] : 0;

			$bg_pic             = ! empty( $instance['bg_pic'] ) ? esc_url_raw( $instance['bg_pic'] ) : '';

			// Add background image.
			if ( ! empty( $bg_pic ) ) {
			    $background_style = '';
			    $background_style .= ' style="background-image:url(' . esc_url( $bg_pic ) . ');" ';
			    $args['before_widget'] = implode( $background_style . ' ' . 'class="bg_enabled ', explode( 'class="', $args['before_widget'], 2 ) );
			}

			echo $args['before_widget']; ?>

			<div class="binn-testimonial">

				<?php

				if ( $title ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				}

				if ( ! empty( $testimonial_ids ) ) {
					$query_args = array(
						'posts_per_page' => count( $testimonial_ids ),
						'post__in'       => wp_list_pluck( $testimonial_ids, 'id' ),
						'orderby'        => 'post__in',
						'post_type'      => 'page',
						'no_found_rows'  => true,
					);
					$all_testimonials = get_posts( $query_args ); ?>

					<?php if ( ! empty( $all_testimonials ) ) : ?>
						<?php global $post; ?>
						
							<div class="inner-wrapper">

								<?php 

								if ( 1 === $enable_autoplay ) {
								    $timeout = 1000 * absint( $transition_delay ); // Change seconds to miliseconds.
								}
								else {
								    $timeout = 0;
								}

								?>

								<div class="cycle-slideshow" id="testimonial-slider" data-cycle-fx="<?php echo esc_attr( $transition_effects ); ?>" data-cycle-speed="1000" data-cycle-pause-on-hover="true" data-cycle-loader="true" data-cycle-log="false" data-cycle-swipe="true" data-cycle-auto-height="container" data-cycle-timeout="<?php echo absint( $timeout ); ?>" data-cycle-slides="article" data-cycle-pager-template='<span class="pager-box"></span>'>
								<?php foreach ( $all_testimonials as $post ) : ?>
									<?php setup_postdata( $post ); ?>
									<article class="testimonial-item">
						                <?php 
						                if ( has_post_thumbnail() ) :  ?>
						                	<div class="testimonial-item-thumb">
						                		<?php the_post_thumbnail('thumbnail'); ?>
						                	</div>
						                	<?php 
						                endif; ?>
						                <?php the_content(); ?>
										<h3 class="testimonial-item-title"><?php the_title(); ?></h3>
									</article>
								<?php endforeach; ?>
								<?php
								if ( 1 === $show_pager ) : ?>
			                        <div class="cycle-pager"></div>
			                    <?php endif; ?>

							</div>
							
							</div><!-- .inner-wrapper -->

						<?php wp_reset_postdata(); ?>

					<?php endif;
				} ?>

			</div><!-- .testimonial-list -->

			<?php

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$item_number = 5;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$instance["item_id_$i"]   = absint( $new_instance["item_id_$i"] );
			}

			$instance['transition_effects'] = esc_attr( $new_instance['transition_effects'] );
			$instance['transition_delay']   = absint( $new_instance['transition_delay'] );
			$instance['show_pager']         = (bool) $new_instance['show_pager'] ? 1 : 0;
			$instance['enable_autoplay']    = (bool) $new_instance['enable_autoplay'] ? 1 : 0;
			$instance['bg_pic']             = esc_url_raw( $new_instance['bg_pic'] );

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
							'title' => '',
							'transition_effects'    => 'scrollHorz',
							'transition_delay'      => 3,
							'show_pager'            => 1,
							'enable_autoplay'       => 1,
							'bg_pic'                => '',
						);

			$item_number = 5;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$defaults["item_id_$i"]   = '';
			}

			$show_caption      = isset( $instance['show_caption'] ) ? (bool) $instance['show_caption'] : 0;
			$show_arrow        = isset( $instance['show_arrow'] ) ? (bool) $instance['show_arrow'] : 0;
			$show_pager        = isset( $instance['show_pager'] ) ? (bool) $instance['show_pager'] : 0;
			$enable_autoplay   = isset( $instance['enable_autoplay'] ) ? (bool) $instance['enable_autoplay'] : 0;

			$bg_pic = '';

			if ( ! empty( $instance['bg_pic'] ) ) {

			    $bg_pic = $instance['bg_pic'];

			}

			$wrap_style = '';

			if ( empty( $bg_pic ) ) {

			    $wrap_style = ' style="display:none;" ';
			}

			$image_status = false;

			if ( ! empty( $bg_pic ) ) {
			    $image_status = true;
			}

			$delete_button = 'display:none;';

			if ( true === $image_status ) {
			    $delete_button = 'display:inline-block;';
			}

			$instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-inn' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			
			<?php
			for ( $i = 1; $i <= $item_number; $i++ ) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id( "item_id_$i" ); ?>"><strong><?php esc_html_e( 'Testimonial Page:', 'business-inn' ); ?>&nbsp;<?php echo $i; ?></strong></label>
					<?php
					wp_dropdown_pages( array(
						'id'               => $this->get_field_id( "item_id_$i" ),
						'class'            => 'widefat',
						'name'             => $this->get_field_name( "item_id_$i" ),
						'selected'         => $instance["item_id_$i"],
						'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-inn' ),
						)
					);
					?>
				</p>
				<?php 
			} ?>

			<p>
			  <label for="<?php echo esc_attr( $this->get_field_id( 'transition_effects' ) ); ?>"><strong><?php esc_html_e( 'Transition Effect:', 'business-inn' ); ?></strong></label>
			    <?php
			    $this->dropdown_transition_effect( array(
			        'id'       => $this->get_field_id( 'transition_effects' ),
			        'name'     => $this->get_field_name( 'transition_effects' ),
			        'selected' => esc_attr( $instance['transition_effects'] ),
			        )
			    );
			    ?>
			</p>

			<p>
			    <label for="<?php echo esc_attr( $this->get_field_id( 'transition_delay' ) ); ?>"><strong><?php esc_html_e( 'Transition Delay:', 'business-inn' ); ?></strong></label>
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'transition_delay' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'transition_delay' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['transition_delay'] ); ?>" min="1" />
			    <small><?php esc_html_e( 'in seconds', 'business-inn' ); ?></small>
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $show_pager ); ?> id="<?php echo $this->get_field_id( 'show_pager' ); ?>" name="<?php echo $this->get_field_name( 'show_pager' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'show_pager' ); ?>"><?php _e( 'Show Pager', 'business-inn' ); ?></label>
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $enable_autoplay ); ?> id="<?php echo esc_attr( $this->get_field_id( 'enable_autoplay' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_autoplay' ) ); ?>" />
			    <label for="<?php echo esc_attr($this->get_field_id( 'enable_autoplay' ) ); ?>"><?php esc_html_e( 'Enable Autoplay', 'business-inn' ); ?></label>
			</p>
			<div class="cover-image">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>">
			        <strong><?php esc_html_e( 'Background Image:', 'business-inn' ); ?></strong>
			    </label>
			    <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'bg_pic' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>" value="<?php echo esc_url( $instance['bg_pic'] ); ?>" />
			    <div class="rtam-preview-wrap" <?php echo $wrap_style; ?>>
			        <img src="<?php echo esc_url( $bg_pic ); ?>" alt="<?php esc_attr_e( 'Preview', 'business-inn' ); ?>" />
			    </div><!-- .rtam-preview-wrap -->
			    <input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'business-inn' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Background Image', 'business-inn' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'business-inn' ); ?>" />
			    <input type="button" value="<?php echo esc_attr_x( 'X', 'Remove Button', 'business-inn' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $delete_button ); ?>" />
			</div>

			<?php
		}

		function dropdown_transition_effect( $args ) {
		    $defaults = array(
		        'id'       => '',
		        'class'    => 'widefat',
		        'name'     => '',
		        'selected' => 0,
		    );

		    $r = wp_parse_args( $args, $defaults );
		    $output = '';

		    $choices = array(
		        'fade'       => esc_html__( 'fade', 'business-inn' ),
		        'fadeout'    => esc_html__( 'fadeout', 'business-inn' ),
		        'none'       => esc_html__( 'none', 'business-inn' ),
		        'scrollHorz' => esc_html__( 'scrollHorz', 'business-inn' ),
		    );

		    if ( ! empty( $choices ) ) {

		        $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
		        foreach ( $choices as $key => $choice ) {
		            $output .= '<option value="' . esc_attr( $key ) . '" ';
		            $output .= selected( $r['selected'], $key, false );
		            $output .= '>' . esc_html( $choice ) . '</option>\n';
		        }
		        $output .= "</select>\n";
		    }

		    echo $output;
		}
	}

endif;