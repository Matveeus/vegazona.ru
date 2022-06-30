<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vegazona
 */


defined( 'ABSPATH' ) || exit;
?>

<div class="private-area_right-side">
    <h1 class="private-area_head">Избранное</h1>
    <?php echo do_shortcode('[ti_wishlistsview]'); ?>
</div>
