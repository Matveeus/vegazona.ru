<?php
/**
 * Template name: О нас
 */

get_header();
?>

<div class="entry-content">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
        <div class="page-title">О нас</div>
       
            
            <div class="about-us-info"><?php if ( carbon_get_post_meta(34, 'vz_about_us_desc') ) echo carbon_get_post_meta(34 ,'vz_about_us_desc'); ?></div>
            <div class="about-us-contacts">
                
                <div class="about-us-contacts-phones">
                
                <span class="green-text-about-us">Телефоны:</span> 
                <div class="about-us-phones-block">
                <a class="about-us-phone-number" href="tel: +74995553535"><?php if ( carbon_get_post_meta(34, 'vz_about_us_phone1') ) echo carbon_get_post_meta(34 ,'vz_about_us_phone1'); ?></a>
                <a class="about-us-phone-number" href="tel: +74995553535"><?php if ( carbon_get_post_meta(34, 'vz_about_us_phone2') ) echo carbon_get_post_meta(34 ,'vz_about_us_phone2'); ?></a>
                </div>
                </div>
                <div class="about-us-contacts-social">
                        <div class="inst-block">
                        <span  class="green-text-about-us">Instagram:</span> 
                        <a class="about-us-instagram" href="<?php if ( carbon_get_post_meta(34, 'vz_about_us_inst_url') ) echo carbon_get_post_meta(34 ,'vz_about_us_inst_url'); ?>"> <?php if ( carbon_get_post_meta(34, 'vz_about_us_inst') ) echo carbon_get_post_meta(34 ,'vz_about_us_inst'); ?> </a>
                         </div>
                        <div class="facebook-block">
                         <span class="indent green-text-about-us">Telegram:</span> 
                        <a class="about-us-facebook" href="<?php if ( carbon_get_post_meta(34, 'vz_about_us_fb_url') ) echo carbon_get_post_meta(34 ,'vz_about_us_fb_url'); ?>"><?php if ( carbon_get_post_meta(34, 'vz_about_us_fb') ) echo carbon_get_post_meta(34 ,'vz_about_us_fb'); ?></a>
                        </div>
                        
                </div>
                
                  <div class="about-us-contacts-emails">
                     <span  class="green-text-about-us">Email:</span>
                     <div class="block-for-and-links">
                     <div class="about-us-email-block-for">
                     <div class="about-us-email-for">Для клиентов</div>
                     <div class="about-us-email-for">Для сотрудничества</div>
                     </div>
                     <div class="about-us-email-links">
                     <a class="about-us-email-link" href="mailto:<?php if ( carbon_get_post_meta(34, 'vz_about_us_email1') ) echo carbon_get_post_meta(34 ,'vz_about_us_email1'); ?>"><?php if ( carbon_get_post_meta(34, 'vz_about_us_email1') ) echo carbon_get_post_meta(34 ,'vz_about_us_email1'); ?></a>
                     <a class="about-us-email-link" href="mailto:<?php if ( carbon_get_post_meta(34, 'vz_about_us_email2') ) echo carbon_get_post_meta(34 ,'vz_about_us_email2'); ?>"><?php if ( carbon_get_post_meta(34, 'vz_about_us_email2') ) echo carbon_get_post_meta(34 ,'vz_about_us_email2'); ?></a>
                     </div>
                     </div>
                  </div>
                  <div class="about-us-contacts-office">
                        <span class="green-text-about-us">Офис и точка самовывоза:</span>
                        <div class="address-and-work-hours">
                        <div class="about-us-address"><?php if ( carbon_get_post_meta(34, 'vz_about_us_address') ) echo carbon_get_post_meta(34 ,'vz_about_us_address'); ?></div>
                        <div class="about-us-work-hours"><?php if ( carbon_get_post_meta(34, 'vz_about_us_worktime') ) echo carbon_get_post_meta(34 ,'vz_about_us_worktime'); ?></div>
                        
                    </div>
                    
                  </div>
                 


           
        </div>
         <div class="address-map"><?php if ( carbon_get_post_meta(34, 'vz_about_us_map_shortcode') ) echo carbon_get_post_meta(34 ,'vz_about_us_map_shortcode'); ?></div>
    </div>

</div>


<?php
get_footer();
