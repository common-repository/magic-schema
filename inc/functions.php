<?php 
// display schema accordion website -> function MagicSchema_display
 

function MagicSchema_exist_admin($mgicFAQ_base_meta){
	global $MagicSchema;
	$output="";
	if ($mgicFAQ_base_meta) {
		$i=0;
	 	 foreach ($mgicFAQ_base_meta as $filds)
	 	 {
	 	 	$output.="<tr>
	 	 				<td>
	 	 					<textarea type='text' name='questions[]' class='question-MagicSchema-faq-form'  > ".esc_attr($filds[0])."</textarea>
	 	 				</td>
	 	 				<td>
	  						<textarea type='text' name='answers[]' class='answer-MagicSchema-faq-form'  > ".esc_attr($filds[1])."</textarea>
	 	 				</td>
	 	 				<td>
		  					<span onclick='decision_delete_row_MagicSchema_faq(this);' class='delet-row-MagicSchema-faq' style='background-image: url(".$MagicSchema->MagicSchema_faq_plugins_url('assets/img/bin.png').");'>
		  					</span>
	 	 				</td>	
	 	 			  </tr>";
	 	 			  
	 	 }
	}
	echo $output;

 
}
function MagicSchema_not_exist_admin(){
global $MagicSchema;
 $output="<tr>
	  				<td>
	  					<textarea type='text' name='questions[]' class='question-MagicSchema-faq-form' value=''></textarea>
	  				</td>
	  				<td>
	  					<textarea type='text' name='answers[]' class='answer-MagicSchema-faq-form' value=''></textarea>
	  				</td>
	  				<td>
	  					<span onclick='decision_delete_row_MagicSchema_faq(this);' class='delet-row-MagicSchema-faq' style='background-image: url(".$MagicSchema->MagicSchema_faq_plugins_url('assets/img/bin.png').");'>
	  					</span>
	  				</td>
	  	 </tr>";
	echo $output;
}
function header_admin_theme_MagicSchema(){
	 $output="
	 <section>
	 <table id='table-MagicSchema-faq'><thead>
	  		<tr><th>questions</th><th>answers</th>
	  			<th class='minus-faq'></th></tr>
	  		</thead>
	  		<tbody>";
	 echo $output;
}
function footer_admin_theme_MagicSchema(){
	 $output="</tbody>
	 </table>
	 <span id='add-row-faq' onclick='button_add_row_MagicSchema_faq(this);'>add MagicSchema FAQ +</span> 
  	</section>";
  	echo $output;
}
// shotrcode [MS-FAQ title='']
function MagicSchema_display($atts="title"){
 
		$a = shortcode_atts( array(
	      'title' => 'Frequently Asked Questions'
	   ), $atts );
		$output="";
	 
	    // Check if we're inside the main loop in a single post page.
	    if (   in_the_loop() && is_main_query() ) {
	    	 
	    	$mgicFAQ_base_meta =  get_post_meta(get_the_ID(),'MagicSchema_base_meta',TRUE);
	    	if ($mgicFAQ_base_meta) {
			$i=0;
			$count=count($mgicFAQ_base_meta);

			$output.='	 <div class="container-mg" id="container-mg"><div class="accordion-mg">';
			$output.='<h3>'.$a['title'].'</h3>';
			 	 foreach ($mgicFAQ_base_meta as $filds)
			 	 {
			 	 	 $output.='<div class="accordion-item">';
			 	 	 $output.='<h4>'.esc_attr($filds[0]).'</h4>';
			 	 	 $output.='<div class="content-mg"><p>'.esc_attr($filds[1]).'</p></div>';
	 	  			 $output.='</div>';
			 	 }
		    $output.='</div></div>' ;

			}
			// one display  
			MagicSchemaData::$display=false;
	    	return  $output ;
	    }else{
	     	return ;

	    }
 
}
add_shortcode( 'MS-FAQ', 'MagicSchema_display' ,10 );
function MagicSchema($content=""){ 
 
  $output="";
    // Check if we're inside the main loop in a single post page.
    if (  in_the_loop() && is_main_query() ) {
    	 
    	$mgicFAQ_base_meta =  get_post_meta(get_the_ID(),'MagicSchema_base_meta',TRUE);
    	if ($mgicFAQ_base_meta) {
		$i=0;
		$count=count($mgicFAQ_base_meta);
		$output.='<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[';
		 	 foreach ($mgicFAQ_base_meta as $filds)
		 	 {
		 	 	 $output.='{"@type":"Question","name":"'.esc_attr($filds[0]).'","acceptedAnswer":{"@type":"Answer","text":"'.esc_attr($filds[1]).'"}}';
		 	 	 if(++$i !== $count){
		 	 	 	$output.=",";
		 	 	 }		  
		 	 }
	    $output.=']}</script>';
		}
	 
	    // display in site (one display)
		if(MagicSchemaData::$display==true)
		{

		    $display_faq=do_shortcode("[MS-FAQ]" , 99);
 
			$output=$display_faq.$output; 
		}
 
		 
    	return   $content.$output ;
    }else{
     	return $content;

    }
  
 
}
add_filter( 'the_content', 'MagicSchema' ,99 );

 
?>