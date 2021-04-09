<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fabthemes
 */

?>

<!-- Mapbox -->

<div id="home-map-section">

<?php echo ft_of_get_option('fabthemes_map','');?>
    <div class="row">
        <div class="column medium-6 small-12 ">
            <div class="info-box">
                <h3>Реквизиты для помощи</h3>
                <p>Благотворительный Фонд "БЛАГО"</p>
                <p>ИНН: 2130996192</p>
                <p>КПП: 213001001</p>                
                <p>Расчетный счет: 40703810603000003668</p>
                <p>Банк: ПРИВОЛЖСКИЙ Ф-Л ПАО "ПРОМСВЯЗЬБАНК"</p>
                <p>БИК: 042202803</p>
                <p>Корр. счет: 30101810700000000803</p>                

            </div>
        </div>
    </div>
</div>

	</div><!-- #content -->

	<div id="footer-widgets">
		<div class="row">
			<?php dynamic_sidebar( 'footerbar' ); ?>
		</div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
            <div class="column medium-6">
    			<div class="site-info">
    			Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?> <br>
    			
    			</div><!-- .site-info -->
		    </div>
            <div class="column medium-6">
                    <div class="social-icons">
                    <p>
                Юридический адрес: 428027, Чувашская Республика Чувашия, Чебоксары г,Шумилова ул, дом 18, помещение 1Б
                </p>
                    <!--
                        <ul>
                            <li><a href="<?php echo ft_of_get_option('fabthemes_facebook',''); ?>"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="<?php echo ft_of_get_option('fabthemes_twitter',''); ?>"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="<?php echo ft_of_get_option('fabthemes_gplus',''); ?>"><i class="fa fa-google-plus-square"></i></a></li>
                            <li><a href="<?php echo ft_of_get_option('fabthemes_linkedin',''); ?>"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="<?php echo ft_of_get_option('fabthemes_youtube',''); ?>"><i class="fa fa-youtube-square"></i></a></li>
                        </ul>
                    -->    
                    </div>
            </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
