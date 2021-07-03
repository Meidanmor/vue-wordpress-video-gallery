<?php
/**
 * Plugin Name: WordPress Vue Gallery
 * Description: A Vue Gallery in WordPress.
 */

//Register scripts to use
function func_load_vuescripts() {
//Styles
    wp_register_style( 'vueperslides-css', 'https://unpkg.com/vueperslides/dist/vueperslides.css');
    wp_register_style( 'app-1f96d57a-css', plugins_url( 'wp-vue-gallery/css/app.1f96d57a.css' ) );
    wp_register_style( 'chunk-vendors-eb78aeb9-css', plugins_url( 'wp-vue-gallery/css/chunk-vendors.eb78aeb9.css' ) );
//Scripts
    wp_register_script('wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
      wp_register_script('vueperslides-js', 'https://unpkg.com/vueperslides@2.15.1/dist/vueperslides.umd.min.js');
    wp_register_script('vuePress', plugin_dir_url( __FILE__ ).'js/app.8d2315cb.js', 'wpvue_vuejs', true );
    wp_register_script('chunk-vendors-8140237c-js', plugin_dir_url( __FILE__ ). 'js/chunk-vendors.8140237c.js' , 'wpvue_vuejs', true );
    
}
//Tell WordPress to register the scripts 
add_action('wp_enqueue_scripts', 'func_load_vuescripts');


//Return shortcode function
function func_wp_vue_videos(){
  //Add styles
  wp_enqueue_style( 'vueperslides-css' );
  wp_enqueue_style( 'app-1f96d57a-css' );
  wp_enqueue_style( 'chunk-vendors-eb78aeb9-css' );
  //Add Vue.js
  wp_enqueue_script('wpvue_vuejs');
  //Add my scripts
  wp_enqueue_script('vueperslides-js');
  wp_enqueue_script('chunk-vendors-8140237c-js');
  wp_enqueue_script('vuePress');

  //Build String
  $str= "<div id='vuePress'>"
    ."</div>";

  //Return to display
  return $str;
} // end function

//Add shortcode to WordPress
add_shortcode( 'wpvuevideo', 'func_wp_vue_videos' );
?>
