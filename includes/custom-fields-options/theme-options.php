<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'theme_options', 'Настройки темы' )
    ->set_icon( 'dashicons-admin-generic' )
    ->add_tab( 'Шапка' , array(
        Field::make( 'image', 'vz_header_logo', 'Логотип' )
        ->set_width( 25 ),
        Field::make( 'text', 'vz_header_phone', 'Телефон' )
        ->set_width( 25 ),
        Field::make( 'text', 'vz_header_email', 'Электронная почта' )
        ->set_width( 25 ),
        Field::make( 'text', 'vz_header_worktime', 'Режим работы' )
        ->set_width( 25 ),
    ) )
    ->add_tab( 'Подвал', array(
        Field::make( 'text', 'vz_footer_instagram', 'Ссылка на Instagram' ),
        Field::make( 'text', 'vz_footer_vkontakte', 'Ссылка на ВКонтакте' ),
        Field::make( 'text', 'vz_footer_facebook', 'Ссылка на Facebook' ),
    ) )
    ->add_tab( 'IP', array(
        Field::make("select", "vz_ip_on_off", "Проверять по ip?")
            ->add_options( array(
                    'yes' => 'Да',
                    'no' => 'Нет',
            )
        ),
        Field::make( 'complex', 'vz_ip', 'Проверка по IP' )
            ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'vz_ip_on_off',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                )
            )
			->add_fields( array(
				Field::make( 'text', 'vz_ip_text', 'IP' )
				
                )
		    )
		    ->set_help_text( 'Current IP - ' . $_SERVER['REMOTE_ADDR'] )
		    
    ) );
    
    
   


// // Add second options page under 'Basic Options'
// Container::make( 'theme_options', 'Social Links' )
//     ->set_page_parent( $basic_options_container ) // reference to a top level container
//     ->add_fields( array(
//         Field::make( 'text', 'crb_facebook_link' ),
//         Field::make( 'text', 'crb_twitter_link' ),
//     ) );

// // Add third options page under "Appearance"
// Container::make( 'theme_options', 'Customize Background' )
//     ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
//     ->add_fields( array(
//         Field::make( 'color', 'crb_background_color' ),
//         Field::make( 'image', 'crb_background_image' ),
//     ) );