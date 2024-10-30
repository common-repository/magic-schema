<?php 
class CreateMagicSchema{
 	public function __construct()
 	{
 		add_action('admin_enqueue_scripts',array($this,'MagicSchema_admin_enqueue_scripts'));
        
 	}
 	public static function MagicSchema_admin_enqueue_scripts($hook){
 		if ($hook!='post.php' &&  ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages')) {
 			 return;
 		}else{
 			global $MagicSchema;
 			wp_enqueue_script('add_MagicSchema_FAQ',$MagicSchema->MagicSchema_faq_plugins_url('assets/js/add-MagicSchema-faq.js'),array(),MagicSchema_faq_version,true);
 			wp_enqueue_script('MagicSchema_FAQ_organize',$MagicSchema->MagicSchema_faq_plugins_url('assets/js/MagicSchema-faq-organize.js'),array(),MagicSchema_faq_version,true);
  		    wp_enqueue_style('MagicSchema_FAQ_admin_style',$MagicSchema->MagicSchema_faq_plugins_url('assets/css/MagicSchema-faq-admin-style.css'),array(),MagicSchema_faq_version,'all');


 		}
 	}


}
$CreateMagicSchema=new CreateMagicSchema();
?>