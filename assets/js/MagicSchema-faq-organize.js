// generate element with attribute
function GSF_createel(el="",attr=[],value=[]){
	var GSF_create_element= document.createElement(el);
	 if(attr !== undefined || attr.length != 0){
		for(var ic=0;ic<attr.length;ic++)
		{
		  GSF_create_element.setAttribute(attr[ic],value[ic]);
		}
	 }
	 
	return GSF_create_element;
}
 
 
function row_MagicSchema_faq_modal(){
        var input_class_faq=['question-MagicSchema-faq-form','answer-MagicSchema-faq-form'];
        var input_name_faq=['questions[]','answers[]'];
     		// tr
		var T_TR=GSF_createel("TR",[],[]);

		var T_TD;var INPUT_FaQ; 
		for(var tbi=0;tbi<input_class_faq.length+1;tbi++)
		{
 
		  // td
		  T_TD=GSF_createel("TD",[],[]);
		  if (tbi<input_class_faq.length) {
 		  //input questions 
 		  INPUT_FaQ=GSF_createel("TEXTAREA",['type','class','name'],['text',input_class_faq[tbi],input_name_faq[tbi]]);
 		  T_TD.appendChild(INPUT_FaQ);
		  }else{
 		  //span delete
 		  var SP_delete=GSF_createel("SPAN",['onclick','class'],['decision_delete_row_MagicSchema_faq(this);','delet-row-MagicSchema-faq']);
 		  SP_delete.style.backgroundImage ="url('"+path_host_adress+"assets/img/bin.png')"; 	
 		  T_TD.appendChild(SP_delete);	  	
		  }
 
 		  //span delete
 		  var SP_delete=GSF_createel("SPAN",['onclick','class'],['decision_delete_row_faq(this);','fa fa-minus']);
 

		  T_TR.appendChild(T_TD);
 
		  // alert(tbi);
		}
		return T_TR;
}