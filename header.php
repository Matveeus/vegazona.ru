<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vegazona
 */

?>

<?php
global $woocommerce;

if (carbon_get_post_meta(14, 'vz_ip_on_off') == 'yes'):

$ips = carbon_get_theme_option( 'vz_ip' );
$current_ip = $_SERVER['REMOTE_ADDR'];
$founded = false;
if ( !empty($ips)): ?>
    <?php foreach ( $ips as $ip ): ?>
        <?php if ( $current_ip == trim($ip['vz_ip_text']) ) {
            $founded = true;
        } ?>
   <?php endforeach;?>
<?php endif;?>
<?php if ($founded == false) header('Location: http://vegazona.ru/soon/');
endif;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body onload="<?php if( !is_user_logged_in() ) echo 'onloadsubmit(); $modalLoginlooder(modalLoginLoad ());';?>" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="header">
            <div class="header-upper">
                <div class="container">
                    <div class="header-upper-block">
                    <div class="header-burger">
                            <span></span>
                        </div>
                        <?php $custom_logo_id = carbon_get_theme_option( 'vz_header_logo' ); $image = $custom_logo_id ? wp_get_attachment_image_src( $custom_logo_id , 'full' ) : ''; ?>
						<div class="logo" style="background: url(' <?php if ($image) echo $image[0]; else '';?> ');background-size:cover;"><a href="<?php echo home_url( '/' );?>" style="display: block; width: inherit; height: inherit;"> </a></div>
                        <div class="header-upper-contacts">
                            <a
                                href="tel:<?php echo carbon_get_theme_option('vz_header_phone'); ?>"
                                class="header-upper-contacts-item"
                                ><?php echo carbon_get_theme_option('vz_header_phone'); ?></a
                            >
                            <a
                                href="mailto:<?php echo carbon_get_theme_option('vz_header_email'); ?>"
                                class="header-upper-contacts-item"
                                ><?php echo carbon_get_theme_option('vz_header_email'); ?></a
                            >
                            <span class="header-upper-contacts-item"
                                ><?php echo carbon_get_theme_option('vz_header_worktime'); ?></span
                            >
                        </div>
                        <div class="header-upper-buttons">
                            <div class="header-upper-button header-upper-login">
                                <a href="<?php if (is_user_logged_in()) echo '/my-account'; else echo '#'; ?>"  id="<?php if (!is_user_logged_in()) echo 'login-button'; else echo 'profile_link_button' ?>" class="header-upper-button-link header-upper-login-link"><span class="header-upper-button-link-align"><?php if (is_user_logged_in()) echo wp_get_current_user()->user_firstname; else echo 'Вход';?></span></a>
                            </div>
                            <div class="header-upper-button header-upper-cart">
                                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="header-upper-button-link header-upper-button-cart-link"><span class="header-upper-button-link-align">Корзина</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-lower">
                <div class="container">
                    <div class="header-lower-block">
                        <nav class="header-lower-navigation">
							<?php wp_nav_menu("menu=menu1; "); ?>
                        </nav>
                        <div class="header-lower-search">
                            <input
                                type=""
                                name="search"
                                class="header-lower-search-input"
                                placeholder="Поиск"
                            />
                            <input
                                type="submit"
                                value=""
                                id="input-item"
                                class="header-lower-search-submit"
                            />
                        </div>
                    </div>
                </div>
            </div>
		</header>

