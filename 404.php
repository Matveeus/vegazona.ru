<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vegazona
 */

get_header();
?>

<main>
    <div class="container">
            
            <h1 class="error-title">404:  Страница не найдена...</h1>
            
            <p class="error-info">Зато найдена страница с вкусными и полезными продуктами :)</p>
            
            <form class="error-button-section"action="/shop">
                <button class="error-button">К катологу</button>
            </form>
             
       
    </div>

</main><!-- #main -->

<?php
get_footer();
