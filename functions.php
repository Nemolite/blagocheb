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

  /**
   * Произвольные поля для настройки сайта
   */

  add_action( 'admin_menu', 'blagocheb_custem_menu', 200 );

  function blagocheb_custem_menu() {
    $page_title = "Настрока темы";
    $menu_title ="Настройка";
    $capability = "manage_options";
    $menu_slug = "custemer";
    $function = "blagocheb_custem_field";
    $icon_url = "dashicons-admin-page";
    $position ="100";

    add_menu_page( 
        $page_title, 
        $menu_title, 
        $capability, 
        $menu_slug, 
        $function, 
        $icon_url, 
        $position );
  }   

  
  function blagocheb_custem_field() {
      
      echo '<div class="wrap">';
          echo '<h2>'. get_admin_page_title() .'</h2>';  
     echo "test";     
      echo '</div>';
  
  }



?>