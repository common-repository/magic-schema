<?php 
class MagicSchemaMetaboxes{
	public function __construct(){

		add_action('add_meta_boxes', array( $this,'MagicSchema_add_metaboxes'));
		add_action('save_post', array( $this,'MagicSchema_save_postmeta'),10,2);
	}
	public function MagicSchema_add_metaboxes($post_type){ 

        // Limit meta box to certain post types.
        // $post_types = array( 'post', 'page' );
 
        // if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'some_meta_box_name',
                __( 'add MagicSchema (Fields should not be empty)', MagicSchema_faq_name ),
                array( $this, 'generated_html_MagicSchema' ) ,
                $post_type,
                'advanced',
                'high'
            );
        // }
	}
	//create html for post meta 
	public function generated_html_MagicSchema(){ 	
	 	global $MagicSchema; global $post;
		 echo "
		 <input name='MagicSchema_metabox_nonce' type='hidden' value='".wp_create_nonce(plugin_basename(__FILE__))."'>
		 <script>var path_host_adress ='".$MagicSchema->MagicSchema_faq_plugins_url()."';</script>";
		 // header themplate metabox
		 header_admin_theme_MagicSchema();
		 // The following section is about Metabax display
			$mgicFAQ_base_meta =  get_post_meta($post->ID,'MagicSchema_base_meta',TRUE);
			// If there were any MagicSchema questions
			if($mgicFAQ_base_meta){	 
	   		    MagicSchema_exist_admin($mgicFAQ_base_meta); 
 			 }else{ // If there were no MagicSchema questions  
	 	 	// MagicSchema_not_exist_admin();
 	  	    }

		 // footer themplate metabox
		 footer_admin_theme_MagicSchema();
	}

	// save post meta
	public function MagicSchema_save_postmeta($post_id,$post){
		// var_dump($post);
		$post_nonce= isset($_POST['MagicSchema_metabox_nonce']) ? $_POST['MagicSchema_metabox_nonce'] : 'null';
		// nonce check 
		if(!wp_verify_nonce($post_nonce,plugin_basename(__FILE__)))
		{
		 
		}else{
 			 // 1-check user can , 2-check post data 
 			if ((current_user_can('edit_posts',$post->ID) &&  current_user_can( 'edit_pages')) && ($_POST['questions'] && $_POST['answers'])) {
 				$index=0;
 				 foreach ($_POST['questions'] as $value) {
 				 	// pack data and sanitize 
 				 	 $MagicSchema_q_a[$index][]=sanitize_text_field($value);
 				 	 $index++;
 				 }
 				 $index=0;
 				 foreach ($_POST['answers'] as $value) {
 				 	// pack data and sanitize 
 				 	 $MagicSchema_q_a[$index][]=sanitize_text_field($value);
 				 	 $index++;
 				 }
 			}
 	 		if(!$MagicSchema_q_a){
 	 			delete_post_meta($post->ID,'MagicSchema_base_meta');
 	 		}else{

 	 			if (metadata_exists($post->post_type,$post->ID,'MagicSchema_base_meta')) {
	 				update_post_meta($post->ID,'MagicSchema_base_meta', $MagicSchema_q_a );
	 				// var_dump($MagicSchema_q_a);
	 			}else{
	 				add_post_meta($post->ID,'MagicSchema_base_meta',$MagicSchema_q_a);
	 			}
 	 		}
 

 		}
 
	}
}
 		 
$MagicSchemaMetaboxes=new MagicSchemaMetaboxes(); 
?>