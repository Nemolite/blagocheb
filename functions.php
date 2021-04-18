<?php
/**
* Функции для дочерней темы
*/

function blagocheb_scripts_style() {
	wp_enqueue_script( 'blagocheb-script', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'blagocheb_scripts_style' );

/**
 * Подключение произвольных полей с помощью Optoion Tree
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
    $page_title = "Настройка темы";
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
     ?>
    <form name="admin_custem" id="admin_custem">
      <fieldset>
        <legend>Верхняя часть ( header )</legend>
          <p><label for="name">Номер телефона в раздел - Позвоните нам</label><input type="text" name="num_mobil"></p>
          <p><label for="email">E-mail в раздел - Напишите нам</label><input type="email" id="email" name="email"></p>
      </fieldset>
          <p><input id="btn_admin_custem" type="submit" value="Сохранить"></p>
    </form>  
     <?php         
  }

/**
 * Обработка запроса
 */

add_action( 'wp_ajax_admin_custem', 'blagocheb_admin_custem' );
function blagocheb_admin_custem(){
	
  if (isset($_POST['num_mobil'])&& $_POST['num_mobil'] != ''){        
    $num_mobil= $_POST['num_mobil'];
  }

  if (isset($_POST['email'])&& $_POST['email'] != ''){        
    $email= $_POST['email'];
  }

  global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'blagocheb_table';
	$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

	$sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	num_mobil varchar(255) NOT NULL default '',
  email varchar(255) NOT NULL default '',
	PRIMARY KEY  (id)
	
	)
	{$charset_collate};";

	dbDelta($sql);

  $wpdb->update( $table_name,
	[ 'num_mobil' => $num_mobil, 'email' => $email ],
	[ 'ID' => 1 ]
);

	wp_die(); 
}

/**
 * Извлечение данных из метаполей
 */

 function blagocheb_get_meta_date($field){
  global $wpdb;
  $table_name = $wpdb->get_blog_prefix() . 'blagocheb_table';

   if (!empty($field)){
    $velue = $wpdb->get_var( "SELECT $field FROM $table_name;" );
    return $velue;
   }
 }

 /**
  * Банеры "Спасибо за помощь"
  */
require 'inc/baners.php'; 


function blagocheb_register_widgets(){
	register_sidebar( array(
		'name' => 'Спасибо за помощь',
		'id' => 'baners',
		'description' => 'Банеры в сайтбаре',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="widget-title"><span class="title-wrapper">',
		'after_title' => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'blagocheb_register_widgets' );
?>