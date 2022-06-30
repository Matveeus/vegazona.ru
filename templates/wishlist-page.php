<?php
/**
 * Template name: Список желаний
 */

get_header();
?>
    <div class="entry-content">
        <div class="container">
            <div class="private-area_pages">
                <?php get_template_part( 'template-parts/my-account-parts/content', 'account-navigation' ); ?>
                <?php get_template_part( 'template-parts/my-account-parts/content', 'account-wishlist' ); ?>
            </div>
        </div>
    </div>
<?php
get_footer();
