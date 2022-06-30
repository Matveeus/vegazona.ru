<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vegazona
 */

?>


        <h1 class="main-section-title"><?php if ( carbon_get_post_meta(14, 'vz_loyal_title') ) echo carbon_get_post_meta(14 ,'vz_loyal_title'); ?></h1>
        <p class="loyalty-programm-info">
            <?php if (carbon_get_post_meta(14, 'vz_loyal_desc')) echo carbon_get_post_meta(14, 'vz_loyal_desc'); ?>
        </p>
        <div class="loyalty-programm-cards">
            <?php $loyal_table = carbon_get_post_meta( 14 , 'vz_loyal_cards'); ?>
            <?php foreach ($loyal_table as $loyal_tab) { ?>
                <?php if( $loyal_tab['vz_loyal_card_img'] && $loyal_tab['vz_loyal_card_desc'] && $loyal_tab['vz_loyal_card_status']) { ?>
                    <div class="card-block">
                    <?php $loyal_card_img_url = wp_get_attachment_image_url( $loyal_tab['vz_loyal_card_img'], true ); ?>
                        <div class="loyalty-programm-card-first" style="background: url( <?php echo $loyal_card_img_url; ?> );background-size:cover;"></div>
                        <p class="card-text">
                            <span class="card-green-text"><?php echo $loyal_tab['vz_loyal_card_status']; ?>:</span>
                            <?php echo $loyal_tab['vz_loyal_card_desc']; ?>
                        </p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="attention-info">
            <p class="attention-message">
                <?php if (carbon_get_post_meta(14, 'vz_loyal_conditional')) echo carbon_get_post_meta(14, 'vz_loyal_conditional'); ?>
            </p>
        </div>
