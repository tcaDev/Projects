 	//for getting the value to pop up modal in settings
				 $('.get_consignee_datas').click(function(){

			     var id 		 				  = $(this).closest('tr').children('td:eq(0)').text();
			     var Consignee    				  = $(this).closest('tr').children('td:eq(1)').text();
			     var House                        = $(this).closest('tr').children('td:eq(2)').text();
			     var vilage   				      = $(this).closest('tr').children('td:eq(3)').text();
			     var city   				      = $(this).closest('tr').children('td:eq(4)').text();
			     var Country   				      = $(this).closest('tr').children('td:eq(5)').text();
			     var number     			      = $(this).closest('tr').children('td:eq(6)').text();
			     var stat     			          = $(this).closest('tr').children('td:eq(8)').text();
			     var country_ids 			      = $(this).closest('tr').children('td:eq(9)').text();

			      $('.consignee_id').val(id);
			      $('.consignee_name').val(Consignee);
			      $('.hbno').val(House);
			      $('.vilage').val(vilage);
			      $('.city').val(city);
			      $('.country').val(Country);
			      $('.consignee_of').val(number);

			   /*   ('.change_select').html()*/

			      if(stat==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }
			  	  	

				$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Login_user/select_country",
					  data: { countryid:country_ids,
					  		  conname:Country 	  		  
					  		}
					})
					  .done(function(data) {
					  	$('.change_select').html(data);
					      
				}); 

	 }); 

 				$('.get_broker_datas').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var houseno      = $(this).closest('tr').children('td:eq(2)').text();
			     var village      = $(this).closest('tr').children('td:eq(3)').text();
			     var city         = $(this).closest('tr').children('td:eq(4)').text();
			     var Country      = $(this).closest('tr').children('td:eq(5)').text();
			     var ContactNo1   = $(this).closest('tr').children('td:eq(6)').text();
  				 var ContactNo2   = $(this).closest('tr').children('td:eq(7)').text();      
	            
	             var status      = $(this).closest('tr').children('td:eq(8)').text();
			     var cid         = $(this).closest('tr').children('td:eq(10)').text();
			     var fname       = $(this).closest('tr').children('td:eq(11)').text();
			     var mname 		 = $(this).closest('tr').children('td:eq(12)').text();
  				 var lname 		 = $(this).closest('tr').children('td:eq(13)').text();
	
  				 
  				


				 $('.broker_id').val(id);
			     $('.broker_fname').val(fname);
			     $('.broker_mname').val(mname);
			     $('.broker_lname').val(lname);
			     $('.broker_houseno').val(houseno);
			     $('.broker_village').val(village);
				 $('.broker_city').val(city);

				 $('.broker_countryid').val(cid);
			     $('.broker_country').val(Country);
			     $('.broker_c1').val(ContactNo1);
			     $('.broker_c2').val(ContactNo2);

			      $('.status').val(status);
			      if(status=='activated'){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }


			  	  		$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/Login_user/select_country",
					  data: { countryid:cid,
					  		  conname:Country 	  		  
					  		}
					})
					  .done(function(data) {
					  	$('.change_select').html(data);
					      
				}); 


				
		   });

	 	 $('.get_vessel_datas').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var vessel    	  = $(this).closest('tr').children('td:eq(1)').text();
			      $('.vessel_id').val(id);
			      $('.vessel_name').val(vessel);

	      });




         	 $('.get_shipper_datas').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var sname   	  = $(this).closest('tr').children('td:eq(1)').text();
	
			      $('.shipper_id').val(id);
			      $('.shipper_name').val(sname);
			 });
	
		//for get in the value to pop up modal end	


	