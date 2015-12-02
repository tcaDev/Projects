 $(document).ready(function(){	
	 $('.update_consignee').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var Consignee    = $(this).closest('tr').children('td:eq(1)').text();
			     var Address      = $(this).closest('tr').children('td:eq(2)').text();
			     var number       = $(this).closest('tr').children('td:eq(3)').text();
			     var status       = $(this).closest('tr').children('td:eq(6)').text();


			      $('.consignee_id').val(id);
			      $('.consignee_name').val(Consignee);
			      $('.consignee_addr').val(Address);
			      $('.consignee_of').val(number);
			      if(status==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }
	 }); 

	 	 $('.update_vessels').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var vessel    	  = $(this).closest('tr').children('td:eq(1)').text();
			      $('.vessel_id').val(id);
			      $('.vessel_name').val(vessel);
	
		
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

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var sname   	  = $(this).closest('tr').children('td:eq(1)').text();
	
			      $('.shipper_id').val(id);
			      $('.shipper_name').val(sname);
			 });


			$('.update_broker').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var FirstName    = $(this).closest('tr').children('td:eq(1)').text();
			     var MiddleName      = $(this).closest('tr').children('td:eq(2)').text();
			     var LastName          = $(this).closest('tr').children('td:eq(3)').text();
			     var Address          = $(this).closest('tr').children('td:eq(4)').text();
			     var ContactNo          = $(this).closest('tr').children('td:eq(5)').text();
  				 var status       = $(this).closest('tr').children('td:eq(6)').text();
	


				 $('.broker_id').val(id);
			     $('.broker_fname').val(FirstName);
			     $('.broker_mname').val(MiddleName);
			     $('.broker_lname').val(LastName);
			     $('.broker_address').val(Address);
			     $('.broker_contact').val(ContactNo);
			     $('.status').val(status);
			      if(status=='activated'){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }

				
			 });
		/*		 $('.update_shipper').click(function(){
			     var id= $(this).closest('tr').children('td:eq(0)').text();
			 		//for default data in pop up modal start
	 		      	$.ajax({
					  method: "GET",
					  url: "http://localhost/FilPortTrackingSystem/search/get_shipper/",
					  data: { shipper_id: id }
					})
					  .done(function( msg ) {
					     $('#modal_update_shipper').html(msg);
					  });
					//for default data in pop up modal end
			 });*/
			 $('.edit_shipper').click(function(){
			     var id= $(this).closest('tr').children('td:eq(0)').text();
			 	 var name= $(this).closest('tr').children('td:eq(1)').text();
			 	$('.ship_id').val(id);
			 	$('.shipper_name').val(name);

			 });


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
 $('.delete_vessel').click(function(){
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
                                    }
                                });
 });

 $('.delete_shipper').click(function(){
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
                                    }
                                });
                         

 });
 $('.delete_broker').click(function(){
  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
        
                                  $.confirm({
                                    title: 'Delete the information?',
                                    content: 'You have 6 seconds to make a choice',
                                    autoClose: 'cancel|6000',
                                    confirmButton: 'Yes',
                                    confirmButtonClass: 'btn-info',
                                    cancelButton: 'No',
                                    confirm: function () {            
                                   
                                        $.post( "http://localhost/FilPortTrackingSystem/Delete_datas/del_broker/", 
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
										    location.hash="broker";
										    location.reload();
										  });
                                    },
                                    cancel: function () {
                                       /* alert('Vacation cancelled!');*/
                                    }
                                });
                         

 });




		$('.contac').click(function(){
			var con    = $(this).closest('tr').children('td:eq(0)').text();

						$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/shippercon/",
					  data: { cons:con}
					})
					  .done(function(data) {
					   $('#modal_shippercontacts').html(data);
					  });

		});

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

		});


		<!--//for autoclick of shipper tab -->

		$(document).ready(function(){
		       if(location.hash=="#shipper"){
		      		  $('#form_shipper').trigger('click');
		      		  location.hash='';

		       }
		       if(location.hash=="#broker"){
		      		  $('#form_broker').trigger('click');
		      		   location.hash='';
		       }
		         if(location.hash=="#vessel"){
		      		  $('#form_vessel').trigger('click');
		      		   location.hash='';
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

	    $('#submit_search').addClass('submit_consignee');
	    $('#submit_search').removeClass('submit_broker');
	    $('#submit_search').removeClass('submit_shipper');
	    $('#submit_search').removeClass('submit_vessel');
	    

		  $.get("http://localhost/FilPortTrackingSystem/View_forms/",function(data){
		  	$('#mycontent').html(data);
		  });
	  });
	    $('#form_broker').click(function(){

	   	$('#search').removeClass('consignee_tab');
	  	$('#search').addClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');

	    $('#submit_search').removeClass('submit_consignee');
	    $('#submit_search').addClass('submit_broker');
	    $('#submit_search').removeClass('submit_shipper');
	    $('#submit_search').removeClass('submit_vessel');


	  	  $.get("http://localhost/FilPortTrackingSystem/View_forms/broker/",function(data){
		  	$('#mycontent').html(data);
		  });	
	  });
	    $('#form_vessel').click(function(){

	    $('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').addClass('vessel_tab');

	    $('#submit_search').removeClass('submit_consignee');
	    $('#submit_search').removeClass('submit_broker');
	    $('#submit_search').removeClass('submit_shipper');
	    $('#submit_search').addClass('submit_vessel');

	  	  $.get("http://localhost/FilPortTrackingSystem/View_forms/vessel/",function(data){
		  	$('#mycontent').html(data);
		  });
	  });
	   $('#form_shipper').click(function(){

	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').addClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');

	    $('#submit_search').removeClass('submit_consignee');
	    $('#submit_search').removeClass('submit_broker');
	    $('#submit_search').addClass('submit_shipper');
	    $('#submit_search').removeClass('submit_vessel');

	  	 $.get("http://localhost/FilPortTrackingSystem/View_forms/shipper/",function(data){
		  	$('#mycontent').html(data);
		  });
	  });   
 });

		

//for searching 

function search(item){
 var consignee =  $('.consignee_tab').val();
 var broker =  $('.broker_tab').val();
 var shipper =  $('.shipper_tab').val();
 var vessel =  $('.vessel_tab').val();
 if(consignee!=undefined){
     search_consignee(consignee);
 }else if(broker!=undefined){
 	search_broker(broker);
  }else if (shipper!=undefined){
  	search_shipper(shipper);
  }else if (vessel!=undefined){
  	search_vessel(vessel);
  }


  else{
  	alert('There is a porblem please reload the page');
  }
}

function search_consignee(consignee){

		 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_consignee/",
					  data: { consignee_id:consignee}
					})
					  .done(function(data) {
					   $('.consignee').html(data);
					      
					  }); 

}
function search_broker(broker){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_broker/",
					  data: { broker_id:broker}
					})
					  .done(function(data) {
					   $('.broker').html(data);
					      
					  }); 


}
function search_shipper(shipper){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_shipper/",
					  data: { shipper_id:shipper}
					})
					  .done(function(data) {
					   $('.shipper').html(data);
					      
					  }); 


}

function search_vessel(vessel){

 		    $.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Search/search_vessel/",
					  data: { vessel_id:vessel}
					})
					  .done(function(data) {
					   $('.vessel').html(data);
					      
					  }); 


}
