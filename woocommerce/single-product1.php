<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

get_header( 'shop' );
?>

	<main>
		<div class="container">

			<h1 class="error__title">404:  Страница не найдена...</h1>

			<p class="error__text">Зато найдена страница с вкусными и полезными продуктами :)</p>

			<form class="error__button-section"action="page/new.html" target="_blank">
				<button class="error__button">К катологу</button>
			</form>


		</div>

	</main><!-- #main -->

<?php
get_footer( 'shop' );