function escapeTags( str ) {
  return String( str )
           .replace( /&/g, '&amp;' )
           .replace( /"/g, '&quot;' )
           .replace( /'/g, '&#39;' )
           .replace( /</g, '&lt;' )
           .replace( />/g, '&gt;' );
}


$(document).ready(function(){

$("#password").prop('disabled', true);	
$("#cambiopwd").prop('checked', false);	



$("[name='users']").click(function() {	

$("#password").prop('disabled', true);	
$("#cambiopwd").prop('checked', false);
										
								$.ajax({
  							url: "ajax/LoadDataUser.php",
  							data: { id: $( this ).attr('id') },
  							type: "GET",
  							dataType: 'json',
  							context: document.body
							}).done(function(risp) {
  								//alert(risp);
  							
  								$("#userid").val(risp[0].user_id);
  								$("#username").val(risp[0].user_name);
  								$("#password").val(risp[0].user_password_hash);
  								$("#email").val(risp[0].user_email);
  								$("#active").val(risp[0].user_active);
								$("#upload").val(risp[0].upload);  								
  								$("#role").val(risp[0].user_role);
  								
				
								var array = risp[0].sedi_abilitate.split(","); 		
								
								$('[id="itemsede"]').each(function () {
   							  		$(this).prop('checked', false);
									}); 						
  								
								$.each(  array , function( i, l ){
  									//alert( "Index #" + i + ": " + l );

									$('[id="itemsede"]').each(function () {
   							  		$(this).val() == l ? $(this).prop('checked', true) : null ;
   							  		//alert($(this).val());
									});   									
  									
								}); 
								
								


							});

						
								

});



$("#btnSalva").click(function() {	

							//alert($('$fcid').val());

									$.ajax({
  							url: "ajax/InsUpdateDataUser.php",
  							data: $('#formaddmodutente').serialize(),
  							type: "GET",
  							context: document.body
							}).done(function(risp) {
								
  								$('#addmodutente').modal('hide');
  								location.reload();
							});  	

	
});	
	


$("#cambiopwd").click(function() {	
             
             if ($(this).prop('checked')) {
             	   $("#password").val('');
             		$("#password").prop('disabled', false);
             		$("#password").focus();
             	} else {
             		$("#password").prop('disabled', true);
             		}

});	


	
});