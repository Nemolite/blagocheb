<?php
/**
* Функции для дочерней темы
*/

/**
 * Подключение произвольных полей с помощью Carbon 
 */

 //add_filter( 'ot_theme_mode', '__return_true' );
 add_filter( 'ot_show_pages', '__return_true' );

 require 'option-tree/ot-loader.php';
 require 'inc/meta-boxes.php';
 require 'inc/theme-options.php';

 /**
  *  Carbon Fields
  */ 

  use Carbon_Fields\Container;
  use Carbon_Fields\Field;
  
  add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
  function crb_attach_theme_options() {
    Container::make( 'theme_options', 'Настройки полей' )
   
    ->add_tab( 'Контакты', array(
        Field::make( 'text', 'call_us', 'Позвоните нам' ),
        Field::make( 'text', 'lett_us', 'Напишите нам' ),       
       
    ) );
   
  }



?>