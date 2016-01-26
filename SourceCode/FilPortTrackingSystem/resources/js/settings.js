


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
					  url:  link +"/Update/update_broker/",
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
					  url: link + "/Update/update_vessel/",
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
					  url: link + "/Update/update_shipper/",
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
					  url: link + "/Search/consigneecon/",
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



		<!--//for autoclick of shipper tab based on the hash -->

		$(document).ready(function(){

		       if(location.hash=="#shipper"){
		      		  $('#form_shipper').trigger('click');

		      		   	 $.get(link + "/View_forms/shipper/",function(data){
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

		     		   $.get(link + "/View_forms/broker/",function(data){
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

		      		    $.get(link + "/View_forms/vessel/",function(data){
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

		      		    $.get(link + "/View_forms/hauler/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('hauler_tab');
		      		     //for searching code end
		       }

		       	if(location.hash=="#product"){
		      		  $('#form_product').trigger('click');

		      		    $.get(link +"/View_forms/product/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('product_tab');
		      		     //for searching code end
		       }
		        if(location.hash=="#forward"){
		      		  $('#form_forward').trigger('click');

		      		    $.get(link + "/View_forms/forward/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('forward_tab');
		      		     //for searching code end
		       }

		         if(location.hash=="#legend"){
		      		  $('#form_legend').trigger('click');

		      		    $.get(link + "/View_forms/legend/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('legend_tab');
		      		     //for searching code end
		       }

		         if(location.hash=="#container"){
		      		  $('#form_container').trigger('click');

		      		    $.get(link + "/View_forms/container/",function(data){
		  					$('#mycontent').html(data);
					   });

		      		   location.hash='';
		      		      //for searching code start
		      		   $('#search').removeClass('consignee_tab');
		      		   $('#search').addClass('container_tab');
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
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');
 

		  $.get(link + "/View_forms/",function(data){
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
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');
	

	  	  $.get(link + "/View_forms/broker/",function(data){
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
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');

	  	  $.get(link + "/View_forms/vessel/",function(data){
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
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');

	  	 $.get(link + "/View_forms/shipper/",function(data){
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
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');

	     	 $.get(link + "/View_forms/hauler/",function(data){
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
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');

	     	 $.get(link + "/View_forms/forward/",function(data){
		  	$('#mycontent').html(data);
		  		
		  });
	 });  



	$('#form_legend').click(function(){
          
	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');
	    $('#search').addClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').removeClass('product_tab');


	     	 $.get(link + "/View_forms/legend/",function(data){
		  	$('#mycontent').html(data);
		  		
		  });
	 });

	 	$('#form_container').click(function(){
          
	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');
	    $('#search').removeClass('legend_tab');
	    $('#search').addClass('container_tab');
	    $('#search').removeClass('product_tab');

	     	 $.get(link + "/View_forms/container/",function(data){
		  	$('#mycontent').html(data);
		  		
		  });
	 });    

	$('#form_product').click(function(){
          
	   	$('#search').removeClass('consignee_tab');
	  	$('#search').removeClass('broker_tab');
	    $('#search').removeClass('shipper_tab');
	    $('#search').removeClass('vessel_tab');
	    $('#search').removeClass('hauler_tab');
	    $('#search').removeClass('forward_tab');
	    $('#search').removeClass('legend_tab');
	    $('#search').removeClass('container_tab');
	    $('#search').addClass('product_tab');

	     	 $.get(link + "/View_forms/product/",function(data){
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
$('.legend_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});
$('.container_tab').keydown(function(e){
								    if (e.keyCode == 13) {
								    	search();								    
									}
});

$('.product_tab').keydown(function(e){
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
 var legend =  $('.legend_tab').val();
 var container =  $('.container_tab').val();
 var product =  $('.product_tab').val();

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
  }else if (legend!=undefined){
  	search_legend(legend);
  }else if (container!=undefined){
  	search_container(container);
  }else if (product!=undefined){
  	search_product(product);
  }


  else{
  	alert('There is a problem please reload the page');
  }
}

function search_consignee(consignee){

		 		    $.ajax({
					  method: "POST",
					  url: link + "/Login_user/consignee_content/",
					  data: { consignee_id:consignee}
					})
					  .done(function(data) {
					   $('.consigneepage').html(data);
					      
					  }); 

}
function search_broker(broker){

 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_broker/",
					  data: { broker_id:broker}
					})
					  .done(function(data) {
					   $('.brokerpage').html(data);
					      
					  }); 


}
function search_shipper(shipper){

 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_shipper/",
					  data: { shipper_id:shipper}
					})
					  .done(function(data) {
					   $('.shipperpage').html(data);
					      
					  }); 


}

function search_vessel(vessel){

 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_vessel/",
					  data: { vessel_id:vessel}
					})
					  .done(function(data) {
					   $('.vesselpage').html(data);

					      
					  }); 


}


function search_hauler(hauler){

 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_hauler/",
					  data: { hauler_id:hauler}
					})
					  .done(function(data) {
					   $('.haulerpage').html(data);

					      
					  }); 


}

function search_forward(forward){


 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_forward/",
					  data: { forward_id:forward}
					})
					  .done(function(data) {
					   $('.forwardpage').html(data);

					      
					  }); 


}
function search_legend(legend){


 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_legend/",
					  data: { legend_id:legend}
					})
					  .done(function(data) {
					   $('.legendpage').html(data);

					      
					  }); 


}
function search_container(container){


 		    $.ajax({
					  method: "POST",
					  url: link + "/Search/search_container/",
					  data: { container_id:container}
					})
					  .done(function(data) {
					   $('.containerpage').html(data);

					      
					  }); 


}

function search_product(product){


 		    $.ajax({
					  method: "POST",
					  url:link + "/Search/search_product/",
					  data: { prod_id:product}
					})
					  .done(function(data) {
					   $('.prodpage').html(data);

					      
					  }); 


}


//for searching  end






