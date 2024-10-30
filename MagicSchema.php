<?php 
/*
Plugin Name: Magic schema  
Description: Plugin for displaying FAQ asked questions in WordPress 
Author: korosh abbasy 
Version: 1
Author URI: https://www.instagram.com/korosh_abbasy/
*/
require_once 'inc/init.php';
//  Basic things like Introducing the WordPress Translation portion
$MagicSchema=new MagicSchemaData(); 
global $MagicSchema; 
// activate plugin 
function active_plugin_MagicSchema(){
}
register_activation_hook(__FILE__,'active_plugin_MagicSchema');
 

 ?>