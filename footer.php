<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vegazona
 */

?>
        <!-- Модальное окно регистрации -->
        <?php get_template_part( 'template-parts/content', 'login-modal' ); ?>
		<footer class="footer">
            <div class="container">
                <div class="footer-block">
				<?php $custom_logo_id = carbon_get_theme_option( 'vz_header_logo' ); $image = $custom_logo_id ? wp_get_attachment_image_src( $custom_logo_id , 'full' ) : ''; ?>
					<div class="logo" style="background: url(' <?php if ($image) echo $image[0]; else ''; ?> ');background-size:cover;"><a href="http://vegazona.ru/" style="display: block; width: inherit; height: inherit;"> </a></div>
					<div class="footer-nav">
                      <div class="footer-nav__first">
						<p class="footer-nav-link"><a href="/my-account" class="footer-nav_link_option">Личный кабинет</a></p>
                        <p class="footer-nav-link"><a href="" class="footer-nav_link_option">Бонусная программа</a></p>
                        <p class="footer-nav-link"><a href="" class="footer-nav_link_option">Программа лояльности</a></p>
                        <p class="footer-nav-link footer-nav_link__last"><a href="" class="footer-nav_link_option">Опт</a></p>
                      </div>
                      <div class="footer-nav__second">
                        <p class="footer-nav-link"><a href="/about-us" class="footer-nav_link_option">Контакты</a></p>
                        <p class="footer-nav-link"><a href="/private-policy" class="footer-nav_link_option">Политика Конфиденциальности</a></p>
                        <p class="footer-nav-link"><a href="/terms-of-use" class="footer-nav_link_option">Пользовательское Соглашение</a></p>
                        <p class="footer-nav-link footer-nav_link__last"><a href="/about-us" class="footer-nav_link_option">О нас</a></p>
                     </div> 
                    </div>
                    <div class="social-block">
                        <div class="social-link__tg"> <a target="_blank" href="<?php echo carbon_get_theme_option( 'vz_footer_vkontakte' ); ?>" style="display: block; width: inherit; height: inherit;"> </a></div>
                        <div class="social-link__fb"> <a target="_blank" href="<?php echo carbon_get_theme_option( 'vz_footer_facebook' ); ?>" style="display: block; width: inherit; height: inherit;"> </a></div>
                        
                        <div class="social-link__inst"> <a target="_blank" href="<?php echo carbon_get_theme_option( 'vz_footer_instagram' ); ?>" style="display: block; width: inherit; height: inherit;"></a></div>
                    </div>
                </div>
            </div>
        </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
