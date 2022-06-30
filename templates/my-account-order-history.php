<?php
/**
 * Template name: История покупок
 */

get_header();
?>

<div class="container">
    <div class="private-area_pages">
        <?php get_template_part( 'template-parts/my-account-parts/content', 'account-navigation' ); ?>
        <?php get_template_part( 'template-parts/my-account-parts/content', 'account-order-history' ); ?>
    </div>
</div>

<?php
get_footer();

