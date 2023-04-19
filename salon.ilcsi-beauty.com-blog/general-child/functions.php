<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
);
}

function theme_customizer_extension($wp_customize) {
  $wp_customize->add_setting( 'header_background_color', array(
  'default' => '#333',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
  'label' => 'フッター背景色',
  'section' => 'colors',
  'settings' => 'header_background_color',
  'priority' => 20,
  )));
 }
 add_action('customize_register', 'theme_customizer_extension');
?>