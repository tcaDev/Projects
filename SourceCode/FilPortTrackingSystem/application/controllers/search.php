<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Search extends CI_Controller {



   public function __construct()

       {

            parent::__construct();

            $this->load->model('User');

       }



		function index(){

			$search = $this->input->get('search');

			$data['result']=$this->User->search_global($search);

			$searchme= $data['result'];

		

			if(isset($search)){

	

							echo '<table class="table table-striped">

							<tr>

								<td>JobFileId</td>

								<td>Broker</td>

								<td>Consignee</td>

							</tr>



							<tr>';

			

					foreach ($searchme as $row) {

					/*		if (count($friendActivity) > 0) {

								   echo '<td>' . $row->JobFileId . '</td>';

								}*/

					   echo '<td>' . $row->JobFileId . '</td>';

					   echo '<td>' .$row->Consignee . '</td>';

					   echo '<td>' .$row->FirstName." ".$row->FirstName." ".$row->LastName . '</td>';

					  

					}



					  echo '</tr>';



					echo '</table>';



			}else{

					echo "NO result";

			}





		}


	function get_broker(){

    echo '		<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Broker Information</h4>
				        </div>
				        <div class="modal-body">
				            <input type="hidden" name="broker_id" value="" class="broker_id form-control"/>
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>First Name</label>
					               <input type="text" name="broker_fname" value="" class="broker_fname form-control"/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Middle Name</label>
					               <input type="text"   name="broker_mname" value="" class="broker_mname form-control"/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Last Name</label>
					               <input type="text"   name="broker_lname"  value="" class="broker_lname form-control"/>
					            </div>
					        </div>
					         <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Address</label>
					               <input type="text"   name="broker_address" value="" class="broker_address form-control"/>
					            </div>
					        </div>
					         <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Contact No.</label>
					               <input type="text"   name="broker_contact" value="" class="broker_contact form-control"/>
					            </div>
					        </div>


					        ' ?>
					        <script>
					          	
					     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
					     var FirstName    = $(this).closest('tr').children('td:eq(1)').text();
					     var MiddleName      = $(this).closest('tr').children('td:eq(2)').text();
					     var LastName    = $(this).closest('tr').children('td:eq(3)').text();

					     	$('.broker_id').val(id);
					     	$('.broker_fname').val(FirstName);
   					


					           /*  if(<?php echo $status?>==1){
				     				 $('.activate').prop('checked', true);
				  					  }else{
				  	  					     $('.deactivate').prop('checked', true);
				  						  }*/

					        </script>
							<div class="col-lg-12">
					        	<label>Status: </label>
						        <div class="radio">
								  <label><input type="radio" name="status_broker" class="activate  " value="1">activated</label>
								</div>
								 <div class="radio">
								   <label><input type="radio"name="status_broker" class="deactivate " value="0">deactivated</label>
								 </div>
					        </div>
					        <?php echo'
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class=" update_broker pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>      
				 </div>'; ?>

	<script>
				$('.update_broker').click(function(){

				var id= $('.broker_id').val();
				var fname = $('.broker_fname').val();
				var mname = $('.broker_mname').val();
 				var lname = $('.broker_lname').val();
				var addr = $('.broker_address').val();
 				var c = $('.broker_contact').val();
 				var status = $("[name='status_broker']").val();
 				
 				

				$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Update/update_broker');?>",
			  		data: { broker_id:id,
			  			    broker_fname:fname,
			  			    broker_mname:mname,
			  			    broker_lname:lname,
			  			    broker_address:addr,
			  			    broker_contact:c,
			  			    status_broker:status



			  		}
				})
		  		.done(function(data) {
		   		 	    $.alert({
								    title: 'Alert!',
								    content: 'Data has been Updated!',
								    confirm: function(){
								   	 location.hash="broker";
          							 location.reload();
								    }
								});
				});
		});
	</script>



<?php
	}
   function get_shipper(){
   	$id=$this->input->get('shipper_id');
	$info= $this->User->get_shipper_info($id);

	foreach ($info as $row)
    echo '		<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Shipper Information</h4>
				        </div>
				        <div class="modal-body">
		        	
				            <input type="hidden" name="ship_id" value='.$row->ShipperId.' class="ship_id form-control"/>
							
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Shipper Name</label>
					               <input type="text" name="ship_name" value="'.$row->ShipperName.'" class="shipper_name form-control"/>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="button" class=" add_shipper pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="  btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>      
				 </div>';?>

		<script>

				$('.add_shipper').click(function(){

				var id= $('.ship_id').val();
				var ship_name = $('.shipper_name').val();
 		
				$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Update/update_shipper');?>",
			  		data: { ship_id:id,
			  			    ship_name:ship_name
			  		}
				})
		  		.done(function(data) {
		   		 	    $.alert({
								    title: 'Alert!',
								    content: 'Data has been Updated!',
								    confirm: function(){
								   	 location.hash="shipper";
          							 location.reload();

								    }
								});
				});
		});

		</script>

   <?php
   }

   function shippercon(){

   	$cons=$this->input->post('cons');
   	$info = $this->User->shippercons($cons);

   	
   	
   	    echo '	    <div class="mycontent" >  	
   	    			<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Shipper Contacts Information</h4>
				        </div>
				        <div class="modal-body">
		        						
						<table class="table table-striped table_consignee">
					    <thead>
					      <tr>
					        <th>FirstName</th>
					        <th>MiddleName</th>
					        <th>LastName</th>
					        <th>ContactNo1</th>
					        <th>ContactNo2</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>';
					    if($info==null){
					    	echo '<tr>
					    		 <center><td style="color:red">No Contacts Yet </td></center>
					    		</tr>
					    	';
					    }
					    $i=0;
					    foreach ($info as $row) {
					    	$i++;
					    	      echo     '<tr style="cursor:pointer;" class="values_content">
					    		    <td  class="hidden">'.$row->ShipperContactId.'</td>
					    		     <td  class="hidden">'.$i.'</td>
							        <td contenteditable="true">'.$row->FirstName.'</td>
							        <td contenteditable="true">'.$row->MiddleName.'</td>
							        <td contenteditable="true">'.$row->LastName.'</td>       
							        <td contenteditable="true">'.$row->ContactNo1.'</td>
							        <td contenteditable="true">'. $row->ContactNo2. '</td>
							        <td><button class="update_contacts" type="button"  data-toggle="modal" data-target="#modal_update_shipercontacts"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							  			<button class="delete_contacts"><span class="glyphicon glyphicon-trash"></span></button></td>						        
					     		 </tr>';
					    } ?>
					     </tbody>
					  </table>

					    <?php
					echo   '
			   	 		
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div> 
				   </div>        
				 </div>'

				 ;?>

		
				
		<script>
		$('.update_contacts').click(function(){

   
					var ship_id    = $(this).closest('tr').children('td:eq(0)').text();
					var fname    = $(this).closest('tr').children('td:eq(2)').text();
					var mname    = $(this).closest('tr').children('td:eq(3)').text();
					var lname    = $(this).closest('tr').children('td:eq(4)').text();
					var c1    = $(this).closest('tr').children('td:eq(5)').text();
					var c2    = $(this).closest('tr').children('td:eq(6)').text();
						
				$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Update/update_shippercon');?>",
			  		data: { ship_id:ship_id,
			  			    fname:fname, 
			  			    mname:mname,
			  			    lname:lname,
			  			    c1:c1,
			  			    c2:c2
			  		}
				})
		  		.done(function(data) {
		  			$(this).closest('tr').addClass('.mycolor');
		   		 /* $('#modal_shippercontacts').html(data); 
		   		  $('#modal_shippercontacts').click();*/
		   		 	    $.alert({
								    title: 'Alert!',
								    content: 'Data has been Updated!',
								    confirm: function(){
								    
								    }
								});
				});
		});
		$('.delete_contacts').click(function(){
			  var delete_id = $(this).closest('tr').children('td:eq(0)').text();


        
                                  $.confirm({
                                    title: 'Delete the information?',
                                    content: 'You have 6 seconds to make a choice',
                                    autoClose: 'cancel|6000',
                                    confirmButton: 'Yes',
                                    confirmButtonClass: 'btn-info',
                                    cancelButton: 'No',
                                    confirm: function () {            
               


                                        $.post( "<?php echo base_url('Delete_datas/del_shipper_con');?>", 
                                        	{ 
                                        	  id:delete_id
                                        	})
										  .done(function( data ) {
										
										    $.alert({
													    title: 'Alert!',
													    content: 'Data has been deleted!',
													    confirm: function(){
					  									   $('#modal_shippercontacts').html(data); 
		   												  $('#modal_shippercontacts').click();	
													   
													   }
													});
										    
										  });
                                    },
                                    cancel: function () {
                                       /* alert('Vacation cancelled!');*/
                                    }
                                });
		});
		


		 </script>


   <?php 
   }

   function add_shippercontacts(){

    $id=$this->input->post('shipper_id');

    echo '		<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Add Shipper Contacts</h4>
				        </div>
				        <div class="modal-body">
		       
				            <input type="hidden"  value='.$id.' class="shipper_id form-control"/>
							
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>First Name</label>
					               <input type="text" value="" class="fname_contact form-control" required/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Middle Name</label>
					               <input type="text" value="" class="mname_contact form-control"/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Last Name</label>
					               <input type="text" value="" class="lname_contact form-control"/>
					            </div>
					        </div>

					         <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Contact No.1</label>
					               <input type="text" value="" class="no_contact form-control"/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Contact No.2</label>
					               <input type="text" value="" class="no1_contact form-control"/>
					            </div>
					        </div>

					
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class=" add_contancts pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>      
				 </div>'; ?>


		<script>

			$('.add_contancts').click(function(){
		 var shipper_id    =  $('.shipper_id').val();
		 var fname_contact =  $('.fname_contact').val();
		 var mname_contact =  $('.mname_contact').val();
		 var lname_contact =  $('.lname_contact').val();
		 var no_contact    =  $('.no_contact').val();
		 var no1_contact   =  $('.no1_contact').val();
		

						$.ajax({
					  method: "POST",
					  url: "<?php echo base_url('Add_user/add_shippercon');?>",
					  data: { shipper_id:shipper_id,
					  		  fname_contact:fname_contact,
					  		  mname_contact:mname_contact,
					  		  lname_contact:lname_contact,
					  		  no_contact:no_contact,
							  no1_contact:no1_contact		  		  
					  		}
					})
					  .done(function(data) {
					   $('#modal_add_shippercontacts').html(data);
					  });

		});

		</script>
   <?php }



   function search_consignee(){
   $id = $this->input->post('consignee_id');
   $clients = $this->User->search_consignee($id);

  
		echo	      '<table class="table table-striped table_consignee">
					    <thead>
					      <tr>
					        <th>Consignee Name</th>
					        <th>Address</th>
					        <th>OfficeNumber</th>
					        <th>Status</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>'; ?>
					      
								<?php  
								$i=0;
								foreach ($clients as $row) {
									     	    $i++;
					      	    //for default value
					      	    if($i==1){
					      	    	$cid   = $row->ConsigneeId;
					      	    	$cname = $row->ConsigneeName;
					      	    	$addr  = $row->Address;
					      	    	$date  = $row->DateAdded;
					      		}

					     	    $active= $row->IsActive;
					      		if($active==1){ 
					      		  $stat = 'activated';
					      		  $mystat = '1';
					      		}else{
					      		  $stat = 'deactivated';
					      		  $mystat= '0';
					      		}
					      		if($stat=='activated')
					      		{
					      			$stats = 'deactivated';
					      			$mystats = '0';	
					      		}else{
					      			$stats = 'activated';
					      			$mystats = '1';
					         	}
					         	$number = $row->OfficeNumber;
								
						echo	'<tr style="cursor:pointer;">
					    		    <td   class="hidden">'. $row->ConsigneeId .'</td>
							        <td>'. $row->ConsigneeName .'</td>
							        <td>'. $row->Address .'</td>
							        <td>'. $number .'</td>       
							        <td>'.$stat .'</td>
							        <td   class="hidden">'. $row->DateAdded .'</td>
							        <td   class="hidden">'. $mystat .'</td>
							        <td><button type="button" class="btn update_consignee" data-toggle="modal" data-target="#modal_update_consignee"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							  			<button class="btn delete_consignee"><span class="glyphicon glyphicon-trash"></span></button></td>						        
					     		 </tr>';
					      		 }
					      	echo' </tbody>
					 				 </table>'; ?>

			 <script>
				cid = <?php echo $cid;?>;
				  $('td').click(function(){

		 		  $('tr').removeClass('mycolor').children('td');
		          
		          var cid=$(this).closest('tr').addClass('mycolor').children('td:first').text();

		          var check = $.isNumeric(cid);

		          if(check==false){
		         	$('tr').removeClass('mycolor').children('td');
		         	cid = <?php echo $cid;?>;
/*
		         var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var Consignee    = $(this).closest('tr').children('td:eq(1)').text();
			     var Address      = $(this).closest('tr').children('td:eq(2)').text();
			     var dtupdated    = $(this).closest('tr').children('td:eq(5)').text();
*/

		          }
		         var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var Consignee    = $(this).closest('tr').children('td:eq(1)').text();
			     var Address      = $(this).closest('tr').children('td:eq(2)').text();
			     var num          = $(this).closest('tr').children('td:eq(3)').text();
			     /*var dtupdated    = $(this).closest('tr').children('td:eq(5)').text();*/
  				 var status       = $(this).closest('tr').children('td:eq(6)').text();

			     $('.consignee_id').val(id);
			     $('.consignee_name').val(Consignee);
			     $('.consignee_addr').val(Address);
			     $('.consignee_of').val(num);
			      if(status==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }
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
		     </script>     
					  





<?php
   }


    function search_broker(){
   $id = $this->input->post('broker_id');
   $broker = $this->User->search_broker($id);

  
		echo '      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>First Name</th>
					        <th>Middle Name</th>
					        <th>Last Name</th>
					        <th>Address</th>
					        <th>Contact no.</th>
					        <th>Status</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>'; ?>

					    <?php
					    $i=0;
					    foreach ($broker as $row) {
					    	$i++;
					    	    //for default value
					      	    if($i==1){
					      	    	$cid   = $row->BrokerId;
					      	  
					      		}
					    	  	 $active= $row->IsActive;
					      		if($active==1){ 
					      		  $stat = 'activated';
					      		  $mystat = '1';
					      		}else{
					      		  $stat = 'deactivated';
					      		  $mystat= '0';
					      		}
					      		if($stat=='activated')
					      		{
					      			$stats = 'deactivated';
					      			$mystats = '0';	
					      		}else{
					      			$stats = 'activated';
					      			$mystats = '1';
					         	}
					    
					     echo'
					      <tr>
					      	<td class="hidden">'.$row->BrokerId.'</td>
					        <td>'.$row->FirstName.'</td>
					        <td>'.$row->MiddleName.'</td>
					        <td>'.$row->LastName.'</td>
					        <td>'.$row->Address.'</td>
					        <td>'.$row->Address.'</td>
					        <td>'.$row->ContactNo.'</td>
					        <td>'.$stat .'</td>

					         <td><button type="button" class="btn update_brokers" data-toggle="modal" data-target="#modal_update_broker"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        <button class="btn delete_broker"><span class="glyphicon glyphicon-trash"></span></button></td>
					      
					      </tr>';}

					      ?>
					    </tbody>
					  </table>';

			 <script>
				cid = <?php echo $cid;?>;
				 
				  $('td').click(function(){
		 		  $('tr').removeClass('mycolor').children('td');
		          
		          var cid=$(this).closest('tr').addClass('mycolor').children('td:first').text();
		          var check = $.isNumeric(cid);

		          if(check==false){
		         	$('tr').removeClass('mycolor').children('td');
		         	cid = <?php echo $cid;?>;

	
		          }
		       });

			$('.update_brokers').click(function(){

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
                         

			</script>
   
<?php
	}


function search_shipper(){
	$id = $this->input->post('shipper_id');
    $shipper = $this->User->search_shipper($id);

    	echo '      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Shipper Name</th>
					        <th>Shipper Contacts</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>';?>
					    <?php 
					     $i=0;
					      foreach ($shipper as $row) {	
					      	$i++;
					      	 if($i==1){
					      	    	$cid   = $row->ShipperId;
					      	  
					      		}
					  echo  '<tr>
					  	    <td class="hidden">'.$row->ShipperId.'</td>
					  	    <td>'.$row->ShipperName.'</td>
					        <td class="hidden">'.$row->DateAdded.'</td> 
					        <td><button type="button" class="btn update_shipper contac" data-toggle="modal" data-target="#modal_shippercontacts">View</button>   
					       					   <button type="button" class="btn add_contact" data-toggle="modal" data-target="#modal_add_shippercontacts">Add</button> 
					        <td><button type="button" class="btn add_shipper" data-toggle="modal" data-target="#modal_update_shipper"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        <button class="btn delete_shipper"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>';}
					     ?>
					    </tbody>
					  </table>


				<script>
				cid = <?php echo $cid;?>;
				 
				$('td').click(function(){
		 		  $('tr').removeClass('mycolor').children('td');
		          
		          var cid=$(this).closest('tr').addClass('mycolor').children('td:first').text();
		          var check = $.isNumeric(cid);

		          if(check==false){
		         	$('tr').removeClass('mycolor').children('td');
		         	cid = <?php echo $cid;?>;

	
		          }
		       });

				
				$('.add_contact').click(function(){
				  var id= $(this).closest('tr').children('td:eq(0)').text();
				  $('.shipper_id').val(id);

				});

				 $('.add_shipper').click(function(){
			     var id= $(this).closest('tr').children('td:eq(0)').text();
			     var name= $(this).closest('tr').children('td:eq(1)').text();

			     $('.ship_id').val(id);
			     $('.shipper_name').val(name);
			 	
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



	$('.contac').click(function(){
			var con    = $(this).closest('tr').children('td:eq(0)').text();

						$.ajax({
					  method: "POST",
					  url: "http://localhost/FilPortTrackingSystem/search/shippercon/",
					  data: { cons:con}
					})
					  .done(function(data) {
					   $('#modal_shippercontacts').html(data);
					  });

	});



		       </script>	  


					   <?php
}

	function search_vessel(){
	$id = $this->input->post('vessel_id');
    $vessel = $this->User->search_vessel($id);
	  echo '	      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Vessel Name</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>' ?>; 
					    <?php 
					    $i=0;
					    foreach ($vessel as $row) {
					    $i++;
					    if($i==1){
					    $cid= $row->ShipperVesselId;
					    }
					    echo  '<tr>
							        <td class="hidden">'.$row->ShipperVesselId.'</td>
							        <td>'.$row->Vesselname.'</td>
							         <td><button type="button" class="btn update_vessels" data-toggle="modal" data-target="#modal_update_vessel"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        <button class="btn delete_vessel"><span class="glyphicon glyphicon-trash"></span></button></td>
					    	  </tr>';}
					      ?>
					    </tbody>
					  </table>';


			<script>

		cid = <?php echo $cid;?>;
				 
				$('td').click(function(){
		 		  $('tr').removeClass('mycolor').children('td');
		          
		          var cid=$(this).closest('tr').addClass('mycolor').children('td:first').text();
		          var check = $.isNumeric(cid);

		          if(check==false){
		         	$('tr').removeClass('mycolor').children('td');
		         	cid = <?php echo $cid;?>;

	
		          }
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

		

	 	 $('.update_vessels').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var vessel    	  = $(this).closest('tr').children('td:eq(1)').text();
			      $('.vessel_id').val(id);
			      $('.vessel_name').val(vessel);
	
		
			 });
		


			</script>




	<?php
	}





}
?>