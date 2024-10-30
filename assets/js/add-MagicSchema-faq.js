 //i=inside modal add row for answer and questions
 var i_modal_add_FAQ={

     add_row:function(){
        return row_MagicSchema_faq_modal();
     },add_modal_delete_row:function(iam_row){
        var box_delete_row = GSF_createel("DIV",['class'],['decision-deleted-row-MagicSchema-faq']);

        var text_delete_row = GSF_createel("SPAN");
        var textnode_text = document.createTextNode("are you sure ?");
        text_delete_row.appendChild(textnode_text);

        var yes_delete_row = GSF_createel("SPAN",['onclick'],['delete_row_MagicSchema_faq(this)']);
        var textnode_yes = document.createTextNode("yes");
        yes_delete_row.appendChild(textnode_yes);

        var no_delete_row = GSF_createel("SPAN",['onclick'],['cancel_delete_row_MagicSchema_faq(this)']);
        var textnode_no = document.createTextNode("no");
            no_delete_row.appendChild(textnode_no);
        
        box_delete_row.appendChild(text_delete_row);
        box_delete_row.appendChild(no_delete_row);
        box_delete_row.appendChild(yes_delete_row);
        iam_row.insertAdjacentHTML('afterend', box_delete_row.outerHTML);
      }

 }
// buttton 
 function button_add_row_MagicSchema_faq(element){ 
 
  var table_modal_MagicSchema_faq=document.querySelectorAll('#table-MagicSchema-faq')[0];
  if (table_modal_MagicSchema_faq) {
     var table_faq_tbody=table_modal_MagicSchema_faq.querySelectorAll('tbody')[0];
     if (table_faq_tbody) {
         table_faq_tbody.appendChild(i_modal_add_FAQ.add_row());
     }
  }
 
 }
 function decision_delete_row_MagicSchema_faq(element){
      var paternt=element.parentNode;
      var decision_exist=paternt.querySelectorAll('div')[0];
      if (decision_exist) {

      }else{
        i_modal_add_FAQ.add_modal_delete_row(element);
      }
 

 }
 function delete_row_MagicSchema_faq(event)
 {
  // var input_exist=document.querySelectorAll('.question-MagicSchema-faq-form');
  // if (input_exist.length>1) {
    var paternt=event.parentNode;
    var grandfather=paternt.parentNode;
    var ancestor=grandfather.parentNode;
    ancestor.outerHTML="";
  // }
 } 
 function cancel_delete_row_MagicSchema_faq(event)
 {
  var paternt=event.parentNode;
  paternt.outerHTML="";
 }
 
  