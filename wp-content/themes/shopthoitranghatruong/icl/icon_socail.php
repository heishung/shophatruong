<?php
function icon_socail( $wp_customize ) {

    $wp_customize->add_section (
        'section_a',
        array(
            'title' => 'Tùy biến ICON Mạng xã hội',
            'description' => 'Tùy chỉnh các ICON, liên kết mạng xã hội',
            'priority' => 25 ));


    $wp_customize->add_setting ('Facebook', array('default' => '') );
    $wp_customize->add_control ('control_Facebook', array(
        'label' => 'Liên kết facebook',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Facebook'));

    $wp_customize->add_setting ('Twitter', array('default' => '') );
    $wp_customize->add_control ('control_Twitter', array(
        'label' => 'Liên kết twitter',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Twitter'));

    $wp_customize->add_setting ('Linkedin', array('default' => '') );
    $wp_customize->add_control ('control_Linkedin', array(
        'label' => 'Liên kết linkedin',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Linkedin'));

    $wp_customize->add_setting ('Google-plus', array('default' => '') );
    $wp_customize->add_control ('control_Google-plus', array(
        'label' => 'Liên kết google-plus',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Google-plus'));

    $wp_customize->add_setting ('Facebook-plus', array('default' => '') );
    $wp_customize->add_control ('control_Facebook', array(
        'label' => 'Liên kết Facebook',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Facebook'));

}
add_action( 'customize_register', 'icon_socail' );