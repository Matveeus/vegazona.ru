<?php
/**
 * Template name: Главная страница
 */

get_header();
?>
    <div class="entry-content">
		<section class="promo">
            <div class="container">
                <div class="promo-slider">
                    <div class="promo-slider__wrapper">
                        <div class="promo-slider__items">
                            <div class="promo-slider__item">
                            <?php $promo1_id = carbon_get_post_meta( 14 , 'vz_main_promo1'); $promo1_url = $promo1_id ? wp_get_attachment_image_url( $promo1_id, 'full' ) : ''; ?>
                            <div class="promo-item-std" style="background: url(<?php echo $promo1_url; ?>) center no-repeat" ></div>
                            </div>
                            <div class="promo-slider__item">
                            <?php $promo2_id = carbon_get_post_meta( 14 , 'vz_main_promo2'); $promo2_url = $promo2_id ? wp_get_attachment_image_url( $promo2_id, 'full' ) : ''; ?>
                                <div class="promo-item-std" style="background: url(<?php echo $promo2_url; ?>) center no-repeat"></div>
                            </div>
                            <div class="promo-slider__item">
                            <?php $promo3_id = carbon_get_post_meta( 14 , 'vz_main_promo3'); $promo3_url = $promo3_id ? wp_get_attachment_image_url( $promo3_id, 'full' ) : ''; ?>
                                <div class="promo-item-std" style="background: url(<?php echo $promo3_url; ?>) center no-repeat"></div>
                            </div>
                            <div class="promo-slider__item">
                            <?php $promo4_id = carbon_get_post_meta( 14 , 'vz_main_promo4'); $promo4_url = $promo4_id ? wp_get_attachment_image_url( $promo4_id, 'full' ) : ''; ?>
                                <div class="promo-item-std" style="background: url(<?php echo $promo4_url; ?>) center no-repeat"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="main-categories">
            <div class="container">
                <div class="main-categories-cards">
                <?php $table = carbon_get_post_meta( 14 , 'vz_categories');
                if ( ! empty( $table ) ) { ?>
                    <?php foreach ($table as $tr) {?>
                        <?php if ($tr['vz_cat_title'] && $tr['vz_cat_img']) {?>

                            <div class="card">
                                <a href="<?php echo $tr['vz_cat_link']; ?>">
                                <?php $cat_img_url = wp_get_attachment_image_url( $tr['vz_cat_img'], 'full' ); ?>
                                <div class="card-bg" style="background: url(<?php echo $cat_img_url; ?>) top no-repeat; background-size: contain;"></div>
                                <p class="card-title-text"><?php echo $tr['vz_cat_title']; ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

                </div>
            </div>
        </section>

        <?php if(carbon_get_post_meta(14, 'vz_saleslider_on_off') == 'yes'): ?>
        <section class="main-page-sale-section">
            <div class="container">
                <h1 class="main-section-title">Акции</h1>
                <?php get_template_part( 'template-parts/content', 'slider' ); ?>
            </div>
        </section>
        <?php endif; ?>

        <section class="our-advantages">
            <div class="container">
                <h1 class="main-section-title"><?php if ( carbon_get_post_meta(14, 'vz_adv_title') ) echo carbon_get_post_meta(14 ,'vz_adv_title'); ?></h1>
                <div class="advantages-cards">
                <?php if( carbon_get_post_meta( 14 , 'vz_advantages_on_off') == 'yes' ) { ?>
                    <?php $adv_table = carbon_get_post_meta( 14 , 'vz_advantages');
                    if ( ! empty( $adv_table ) ) { ?>
                        <?php foreach($adv_table as $adv_tab) {?>
                            <?php if($adv_tab['vz_adv_img']) { ?>
                                <?php $adv_url = wp_get_attachment_image_url( $adv_tab['vz_adv_img'], 'full' ); ?>
                                <div class="advantages-card" style="background: url( <?php echo $adv_url; ?> );background-size:cover;"></div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </section>


        <?php if (carbon_get_post_meta( 14 , 'vz_loyal_on_off') == 'yes' ): ?>
        <section class="loyalty-programm">
            <div class="container">
                <?php get_template_part( 'template-parts/content', 'loyal' ); ?>
            </div>
        </section>
        <?php endif; ?>
    </div>
<?php
get_footer();
