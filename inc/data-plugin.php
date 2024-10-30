<?php
class MagicSchemaData{
 
// display schema accordion website -> function MagicSchema_display
	static $display=true;
	public function __construct(){
	     add_action('plugins_loaded',array($this,'textdomain'));
	     add_action( 'wp_enqueue_scripts',array($this,'MagicSchema_front_enqueue_scripts') );
	}	
	public static function textdomain()
	{
		load_plugin_textdomain(MagicSchema_faq_version,false,MagicSchema_faq_path_folder.'/langueages');
	}
	public function MagicSchema_faq_plugins_url($url=""){
		 
		return plugins_url( MagicSchema_faq_path_folder.'/'.$url);
	}
    public function MagicSchema_front_enqueue_scripts(){
 	 
 		    wp_enqueue_script('MagicSchema_FAQ_front_js',$this->MagicSchema_faq_plugins_url('assets/js/MagicSchema-faq-front.js'),array(),MagicSchema_faq_version,true);
  		    wp_enqueue_style('MagicSchema_FAQ_front_style',$this->MagicSchema_faq_plugins_url('assets/css/MagicSchema-faq-front-style.css'),array(),MagicSchema_faq_version,'all');
 	}
 
}
?>