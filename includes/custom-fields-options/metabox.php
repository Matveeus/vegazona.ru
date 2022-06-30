<?php 

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Главная страница' )
    ->show_on_post_type( 'page' )
    ->show_on_template( 'templates/main-page.php' )
    ->add_tab('Промо слайдер', array (
        Field::make ( 'image', 'vz_main_promo1', 'Первый слайд' )
        ->set_width( 25 ),
        Field::make ( 'image', 'vz_main_promo2', 'Второй слайд' )
        ->set_width( 25 ),
        Field::make ( 'image', 'vz_main_promo3', 'Третий слайд' )
        ->set_width( 25 ),
        Field::make ( 'image', 'vz_main_promo4', 'Четвертый слайд' )
        ->set_width( 25 ),
    ) )
    ->add_tab('Категории', array (
		Field::make( 'complex', 'vz_categories', 'Категории' )
			->add_fields( array(
				Field::make( 'text', 'vz_cat_title', 'Название' )
					->set_width( 33 ),
				Field::make( 'image', 'vz_cat_img', 'Изображение' )
					->set_width( 33 ),
                Field::make( 'text', 'vz_cat_link', 'Ссылка' )
					->set_width( 33 ),
                )
		    )
        ) 
    )
    ->add_tab('Наши преимущества', array (
        Field::make("select", "vz_advantages_on_off", "Показать наши преимущества")
			->add_options( array(
                'yes' => 'Да',
                'no' => 'Нет',
            )    
        ),
        Field::make ( 'text', 'vz_adv_title', 'Заголовок секции' )
        ->set_conditional_logic(array(
            'relation' => 'AND',
            array(
                'field' => 'vz_advantages_on_off',
                'value' => 'yes',
                'compare' => '=',
            )
        ))
        ->set_width( 100 ),
        Field::make( 'complex', 'vz_advantages', 'Наши примущества' )
        ->set_conditional_logic(array(
            'relation' => 'AND',
            array(
                'field' => 'vz_advantages_on_off',
                'value' => 'yes',
                'compare' => '=',
                )
            )
        )
        ->add_fields( array(
            Field::make( 'image', 'vz_adv_img', 'Изображение' ),
                )
            )
        ) 
    )
    ->add_tab('Слайдер с акциями', array (
        Field::make("radio", "vz_saleslider_on_off", "Показать слайдер")
			->add_options( array(
                'yes' => 'Да',
                'no' => 'Нет',
            )    
        ),
        )    
    )
    ->add_tab('Программа лояльности', array (
        Field::make("select", "vz_loyal_on_off", "Показать программу лояльности")
			->add_options( array(
                'yes' => 'Да',
                'no' => 'Нет',
            )    
        ),

        Field::make ( 'text', 'vz_loyal_title', 'Заголовок секции' )
        ->set_conditional_logic(array(
            'relation' => 'AND',
            array(
                'field' => 'vz_loyal_on_off',
                'value' => 'yes',
                'compare' => '=',
                )
            )
        )
        ->set_width( 100 ),
        Field::make ( 'text', 'vz_loyal_desc', 'Описание секции' )
        ->set_conditional_logic(array(
            'relation' => 'AND',
            array(
                'field' => 'vz_loyal_on_off',
                'value' => 'yes',
                'compare' => '=',
                )
            )
        )
        ->set_width( 100 ),
        Field::make ( 'complex', 'vz_loyal_cards', 'Карточки программы лояльности' )
        ->set_conditional_logic(array(
            'relation' => 'AND',
            array(
                'field' => 'vz_loyal_on_off',
                'value' => 'yes',
                'compare' => '=',
                )
            )
        )
        ->add_fields( array (
            Field::make ( 'image', 'vz_loyal_card_img', 'Изображение' )
                ->set_width(30),
            Field::make ( 'text', 'vz_loyal_card_status', 'Статус' )
                ->set_width(30),
            Field::make ( 'text', 'vz_loyal_card_desc', 'Описание' )
            ->set_width(40),
            )
        ),
        Field::make ( 'text', 'vz_loyal_conditional', 'Условия программы лояльности' )
        ->set_conditional_logic(array(
            'relation' => 'AND',
            array(
                'field' => 'vz_loyal_on_off',
                'value' => 'yes',
                'compare' => '=',
                )
            )
        )
        ->set_width(100),

        )
    );

    Container::make( 'post_meta', 'О нас' )
    ->show_on_post_type( 'page' )
    ->show_on_template( 'templates/about-us-page.php' )
    ->add_tab('Настройки', array (
		Field::make ( 'textarea', 'vz_about_us_desc', 'Описание "О нас"' )
        ->set_width(100),
        Field::make ( 'hidden', 'vz_about_phone_line', 'Телефоны' )
        ->set_width(20),
        Field::make ( 'text', 'vz_about_us_phone1', 'Телефон 1' )
        ->set_width(40),
        Field::make ( 'text', 'vz_about_us_phone2', 'Телефон 2' )
        ->set_width(40),
        Field::make ( 'hidden', 'vz_about_email_line', 'Email' )
        ->set_width(20),
        Field::make ( 'text', 'vz_about_us_email1', 'Для клиентов' )
        ->set_width(40),
        Field::make ( 'text', 'vz_about_us_email2', 'Для сотрудничества' )
        ->set_width(40),
        Field::make ( 'hidden', 'vz_about_address_line', 'Адрес и время работы' )
        ->set_width(20),
        Field::make ( 'text', 'vz_about_us_address', 'Адрес' )
        ->set_width(40),
        Field::make ( 'text', 'vz_about_us_worktime', 'Время работы' )
        ->set_width(40),
        Field::make ( 'hidden', 'vz_about_social_line', 'Социальные сети' )
        ->set_width(100),
        Field::make ( 'hidden', 'vz_about_inst_line', 'Инстаграм' )
        ->set_width(20),
        Field::make ( 'text', 'vz_about_us_inst', 'Название' )
        ->set_width(40),
        Field::make ( 'text', 'vz_about_us_inst_url', 'Ссылка' )
        ->set_width(40),
        Field::make ( 'hidden', 'vz_about_vk_line', 'ВКонтакте' )
        ->set_width(20),
        Field::make ( 'text', 'vz_about_us_vk', 'Название' )
        ->set_width(40),
        Field::make ( 'text', 'vz_about_us_vk_url', 'Ссылка' )
        ->set_width(40),
        Field::make ( 'hidden', 'vz_about_fb_line', 'Facebook' )
        ->set_width(20),
        Field::make ( 'text', 'vz_about_us_fb', 'Facebook' )
        ->set_width(40),
        Field::make ( 'text', 'vz_about_us_fb_url', 'Ссылка' )
        ->set_width(40),
        )
    )
    ->add_tab('Карта', array (
        Field::make ( 'hidden', 'vz_about_map_line', 'Карта' )
        ->set_width(20)
        ->help_text('Введите шорткод карты'),
		Field::make ( 'textarea', 'vz_about_us_map_shortcode', 'Шорткод карты' )
        ->set_width(80),
        )
    )
    
    
    ;