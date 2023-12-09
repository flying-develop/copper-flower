<?php

add_action( 'customize_register', 'copperflower_customize' );

function copperflower_customize ( $wp_customize ) {

    $wp_customize->add_section(
        'template_section',
        array(
            'title' => 'Настройки шаблона',
            'description' => '',
            'priority' => 11,
        )
    );

    $wp_customize->add_setting(
        'site_email',
        array()
    );

    $wp_customize->add_control(
        'site_email',
        array(
            'label'   => 'E-mail',
            'type'    => 'email',
            'section' => 'template_section'
        )
    );

    $wp_customize->add_setting(
        'site_address',
        array()
    );

    $wp_customize->add_control(
        'site_address',
        array(
            'label'   => 'Адрес',
            'type'    => 'text',
            'section' => 'template_section'
        )
    );

    $wp_customize->add_setting(
        'site_vk',
        array()
    );

    $wp_customize->add_control(
        'site_vk',
        array(
            'label'   => 'Вконтакте',
            'type'    => 'text',
            'section' => 'template_section'
        )
    );

    $wp_customize->add_setting(
        'site_tg',
        array()
    );

    $wp_customize->add_control(
        'site_tg',
        array(
            'label'   => 'Telegram',
            'type'    => 'text',
            'section' => 'template_section'
        )
    );

    $wp_customize->add_setting(
        'google_play',
        array()
    );

    $wp_customize->add_control(
        'google_play',
        array(
            'label'   => 'Приложение в Google Play',
            'type'    => 'text',
            'section' => 'template_section'
        )
    );

    $wp_customize->add_setting(
        'app_store',
        array()
    );

    $wp_customize->add_control(
        'app_store',
        array(
            'label'   => 'Приложение в App Store',
            'type'    => 'text',
            'section' => 'template_section'
        )
    );

}