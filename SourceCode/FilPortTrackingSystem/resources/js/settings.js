 $(document).ready(function(){	


			

	 	//for updating the values in pop up start


	  $('.update_broker').click(function(){


	 	var ids 	   =	     $('.broker_id').val();
		var fnames     =	     $('.broker_fname').val();
		var mnames     =	     $('.broker_mname').val();
		var lnames     =	     $('.broker_lname').val();
		var	housenos   =         $('.broker_houseno').val();
		var vils       =	     $('.broker_village').val();
		var citys	   =	 	 $('.broker_city').val();
		var cids       =         $('.broker_countryid').val();
		var c1s		   =     	 $('.broker_c1').val();
		var c2s 	   =	     $('.broker_c2').val();
		var	 statuss   =         $('.status').val();

		

			      if(statuss=='activated'){
			        statuss=1;
			  	  }else{
			  	  	statuss=0;
			  	  }


			 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Update/update_broker/",
					  data: { brokerid:ids,
					  		  fname:fnames,
					  		  mname:mnames,
					  		  lname:lnames,
					  		  houseno:housenos,
					  		  vil:vils,
					  		  city:citys,
					  		  cid:cids,
					  		  c1:c1s,
					  		  c2:c2s,
					  		  status:statuss


					  		  	  		  
					  		}
					})
					  .done(function(data) {
					  	location.hash="broker";
					  	location.reload();
					      
					  }); 
	    });



	 	 $('.update_vessel').click(function(){

	 	  var	  id     = $('.vessel_id').val();
		  var     vessel = $('.vessel_name').val();

			 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Update/update_vessel/",
					  data: { ves_id:id,
					  		  ves_name:vessel
					  		  	  		  
					  		}
					})
					  .done(function(data) {
					  	location.hash="vessel";
					  	location.reload();
					      
					  }); 
	    });


	$('.update_shipper').click(function(){
		  var id     =   $('.shipper_id').val();
		  var  name  =   $('.shipper_name').val();
			 		$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Update/update_shipper/",
					  data: { ship_id:id,
					  		  ship_name:name
					  		  	  		  
					  		}
					})
					  .done(function(data) {
					  	location.hash="shipper";
					  	location.reload();
					      
					  }); 
	 });


	 	 //for updating the values in pop up end

 });

 //for view and edit consignee contact information
 $('.view_consignee_contact').click(function(){
			var consignee_id    = $(this).closest('tr').children('td:eq(0)').text();

						$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/consigneecon/",
					  data: { cons:consignee_id}
					})
					  .done(function(data) {
					   $('#modal_view_consignee_contact').html(data);
					  });

		});
//for adding consignee contact persons
$('.add_consignee_contact').click(function(){
			var consignee_id    = $(this).closest('tr').children('td:eq(0)').text();
			$('.consig_id').val(consignee_id);					  
		});


 $('.delete_consignee').click(function(){
  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
               
                                  $.confirm({
                                    title: 'Delete the information?',
                                    content: 'You have 6 seconds to make a choice',
                                    autoClose: 'cancel|6000',
                                    confirmButton: 'Yes',
                                    confirmButtonClass: 'btn-info',
                                    cancelButton: 'No',
                                    confirm: function () {            
                                   
                                        $.post( "http://localhost/FilPortTrackingSystem/Delete_datas/", 
                                        	{ 
                                        	  id:delete_id
                                        	})
										  .done(function( data ) {
										    $.alert({
													    title: 'Alert!',
													    content: 'Data has been deleted!',
													    confirm: function(){												    
													    }
													});
										    location.reload();
										  });
                                    },
                                    cancel: function () {
                                       /* alert('Vacation cancelled!');*/
                                    }
                                });
                         
 });
/* $('.delete_vessel').click(function(){
  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
   
                                  $.confirm({
                                    title: 'Delete the information?',
                                    content: 'You have 6 seconds to make a choice',
                                    autoClose: 'cancel|6000',
                                    confirmButton: 'Yes',
                                    confirmButtonClass: 'btn-info',
                                    cancelButton: 'No',
                                    confirm: function () {            
                                   
                                        $.post( "http://localhost/FilPortTrackingSystem/Delete_datas/del_vessel", 
                                        	{ 
                                        	  id:delete_id
                                        	})
										  .done(function( data ) {
										    $.alert({
													    title: 'Alert!',
													    content: 'Data has been deleted!',
													    confirm: function(){
													    
													    }
													});
										    location.hash="vessel";
										    location.reload();
										  });
                                    },
                                    cancel: function () {
                                       /* alert('Vacation cancelled!');*/
                               //     }
                               // });
// });*/

/* $('.delete_shipper').click(function(){
  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
   
                                  $.confirm({
                                    title: 'Delete the information?',
                                    content: 'You have 6 seconds to make a choice',
                                    autoClose: 'cancel|6000',
                                    confirmButton: 'Yes',
                                    confirmButtonClass: 'btn-info',
                                    cancelButton: 'No',
                                    confirm: function () {            
                                   
                                        $.post( "http://localhost/FilPortTrackingSystem/Delete_datas/del_shipper/", 
                                        	{ 
                                        	  id:delete_id
                                        	})
										  .done(function( data ) {
										    $.alert({
													    title: 'Alert!',
													    content: 'Data has been deleted!',
													    confirm: function(){
													    
													    }
													});
										    location.hash="shipper";
										    location.reload();
										  });
                                    },
                                    cancel: function () {
                                       /* alert('Vacation cancelled!');*/
                                //    }
                               // });
                         

 //});*/




 	// for shipper tab  functions start
/*		$('.contac').click(function(){
			var con    = $(this).closest('tr').children('td:eq(0)').text();

						$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/shippercon/",
					  data: { cons:con}
					})
					  .done(function(data) {
					   $('#modal_shippercontacts').html(data);
					  });

		});*/
/*
			$('.add_contact').click(function(){
			var con    = $(this).closest('tr').children('td:eq(0)').text();

						$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/add_shippercontacts/",
					  data: { shipper_id:con}
					})
					  .done(function(data) {
					   $('#modal_add_shippercontacts').html(data);
					  });

		});*/
    	// for shipper tab  functions start


		<!--//for autoclick of shipper tab based on the hash -->

		$(document).ready(function(){
		       if(location.hash=="#shipper"){
		      		  $('#form_shipper').trigger('click');

		      		   	 $.get("http://localhost/FilPortTrackingSystem/View_forms/shipper/",function(data){
		  					$('#mycontent').html(data);
		 				 });

		      		  location.hash='';
		      		  //for searching code start
		      		  $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('shipper_tab');
		      		    //for searching code start

		       }
		       if(location.hash=="#broker"){
		      		  $('#form_broker').trigger('click');

		     		   $.get("http://localhost/FilPortTrackingSystem/View_forms/broker/",function(data){
		 			    	$('#mycontent').html(data);
		 		    	});

		      		   location.hash='';
		      		   //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('broker_tab');
		      		     //for searching code end
		       }
		         if(location.hash=="#vessel"){
		      		  $('#form_vessel').trigger('click');

		      		    $.get("http://localhost/FilPortTrackingSystem/View_forms/vessel/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('vessel_tab');
		      		     //for searching code end
		       }
		         if(location.hash=="#hauler"){
		      		  $('#form_haulers').trigger('click');

		      		    $.get("http://localhost/FilPortTrackingSystem/View_forms/hauler/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('hauler_tab');
		      		     //for searching code end
		       }
		        if(location.hash=="#forward"){
		      		  $('#form_forward').trigger('click');

		      		    $.get("http://localhost/FilPortTrackingSystem/View_forms/forward/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('forward_tab');
		      		     //for searching code end
		       }
       

        });




     


   $(document).ready(function(){
   //consignee

	  $('#form_consignee').click(function(){
	  	//
	  	$('#search').addClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');

 

		  $.get("http://localhost/FilPortTrackingSystem/View_forms/",function(data){
		  	$('#mycontent').html(data);
		  });
	  });
	    $('#form_broker').click(function(){

	   	$('#search').removeClass('consignee_tab');
	  	$('#search').addClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');

	

	  	  $.get("http://localhost/FilPortTrackingSystem/View_forms/broker/",function(data){
		  	$('#mycontent').html(data);
		  });	
	  });
	    $('#form_vessel').click(function(){

	    $('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').addClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');

	  	  $.get("http://localhost/FilPortTrackingSystem/View_forms/vessel/",function(data){
		  	$('#mycontent').html(data);
		  });
	  });
	   $('#form_shipper').click(function(){
          
	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').addClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');

	  	 $.get("http://localhost/FilPortTrackingSystem/View_forms/shipper/",function(data){
		  	$('#mycontent').html(data);
		  		
		  });
	  });   

	$('#form_haulers').click(function(){
          
	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').addClass('hauler_tab');
	    $('#search').removeClass('forward_tab');

	     	 $.get("http://localhost/FilPortTrackingSystem/View_forms/hauler/",function(data){
		  	$('#mycontent').html(data);
		  		
		  });
	 });  


		$('#form_forward').click(function(){
          
	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').addClass('forward_tab');

	     	 $.get("http://localhost/FilPortTrackingSystem/View_forms/forward/",function(data){
		  	$('#mycontent').html(data);
		  		
		  });
	 });  






 });

		


 $('.consignee_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
 });
  $('.broker_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});
 $('.shipper_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});
 $('.vessel_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});
$('.hauler_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});
$('.forward_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});




function search(){
 var consignee =  $('.consignee_tab').val();
 var broker =  $('.broker_tab').val();
 var shipper =  $('.shipper_tab').val();
 var vessel =  $('.vessel_tab').val();
 var hauler =  $('.hauler_tab').val();
 var forward =  $('.forward_tab').val();
 if(consignee!=undefined){
     search_consignee(consignee);
 }else if(broker!=undefined){
 	search_broker(broker);
  }else if (shipper!=undefined){
  	search_shipper(shipper);
  }else if (vessel!=undefined){
  	search_vessel(vessel);
  }else if (hauler!=undefined){
  	search_hauler(hauler);
  }else if (forward!=undefined){
  	search_forward(forward);
  }


  else{
  	alert('There is a porblem please reload the page');
  }
}

function search_consignee(consignee){

		 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Login_user/consignee_content/",
					  data: { consignee_id:consignee}
					})
					  .done(function(data) {
					   $('.consigneepage').html(data);
					      
					  }); 

}
function search_broker(broker){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_broker/",
					  data: { broker_id:broker}
					})
					  .done(function(data) {
					   $('.brokerpage').html(data);
					      
					  }); 


}
function search_shipper(shipper){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_shipper/",
					  data: { shipper_id:shipper}
					})
					  .done(function(data) {
					   $('.shipperpage').html(data);
					      
					  }); 


}

function search_vessel(vessel){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_vessel/",
					  data: { vessel_id:vessel}
					})
					  .done(function(data) {
					   $('.vesselpage').html(data);

					      
					  }); 


}


function search_hauler(hauler){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_hauler/",
					  data: { hauler_id:hauler}
					})
					  .done(function(data) {
					   $('.haulerpage').html(data);

					      
					  }); 


}

function search_forward(forward){


 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_forward/",
					  data: { forward_id:forward}
					})
					  .done(function(data) {
					   $('.forwardpage').html(data);

					      
					  }); 


}


//for searching  end






