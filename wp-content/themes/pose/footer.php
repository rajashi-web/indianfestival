<?php 
/**
 * The template for displaying widgets in the footer
 *
 * @version    0.0.36
 * @package    pose
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.com All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */
?>



<?php
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
?>  

    <footer id="site-footer" class="site-footer" role="contentinfo">


<div class="flowid footer-4-col">

    <div class="mg-auto wid-90 mobwid-90">
        
        <div class="inner dsply-fl fl-wrap">
            
            <!-- BEGIN FOOTER -->
            <div class="wid-25 footer mobwid-100">
                <div class="footer-inner">
                    
                    <div class="footer-items">
                        <?php dynamic_sidebar('left-footer'); ?> 
                    </div>
                    
                </div>
            </div>
            
            <div class="wid-25 footer mobwid-100">
                <div class="footer-inner">
                    
                    <div class="footer-items">
                        <?php dynamic_sidebar('middle-footer'); ?>    
                    </div>
                    
                </div>
            </div>
            
            <div class="wid-25 footer mobwid-100">
                <div class="footer-inner">
                    
                    <div class="footer-items">
                        <?php dynamic_sidebar('right-footer'); ?>  
                    </div>
                    
                </div>
            </div>
            
            <div class="wid-25 footer mobwid-100">
                <div class="footer-inner">
                    
                    <div class="footer-items">
                        <?php dynamic_sidebar('fourth-footer'); ?> 
                    </div>
                    
                </div>
            </div>

            <div class="wid-100 footer mobwid-100">
                <div class="footer-inner text-center">
                    
                    <div class="footer-items"> 
                        <?php dynamic_sidebar('full-width-footer'); ?>  
                    </div>
                    
                </div>
            </div>

            <div class="wid-100 footer pd-td-10 mobwid-100">
                <div class="footer-inner text-center">
                    
                    <div class="footer-items site-info">
                    	<div class="site-info-inner">
                        <a href="<?php echo esc_url(  'http://zidithemes.com'  ); ?>"><?php esc_html_e( 'Theme by Zidithemes', 'pose' ); ?></a>
                    	</div>
                    </div>

                </div>
            </div>
            
            <!-- END FOOTER -->
            
            
            
            
        </div>

    </div>

</div>




</footer>

<?php } ?>

</div><!-- #page -->


<?php wp_footer(); ?>
</body>
</html>