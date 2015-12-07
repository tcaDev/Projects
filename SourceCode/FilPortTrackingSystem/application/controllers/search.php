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

function message(){

//for message popup when update  adding data is success/failed start			      		
  
if(isset($_SESSION['success'])){
	$success = $_SESSION['success'];
  	if($success=='success'){
  	 $message_success = 'Data is successfully added!';
  	}
    if($success=='update_success'){
  	$message_success = 'Data is successfully updated!';
    }
	 echo  "<script>
			    $.alert({
							title: 'Alert!',
						    content: '$message_success',
						    confirm: function(){									    
							}
						});
	  </script>";
	  	$this->session->unset_userdata('success');
  }
  if(isset($_SESSION['failed'])){
  	$failed = $_SESSION['failed'];
  	if($failed=='failed'){
  	 $message = 'Failed to add, because the data  is already exists!';
  	
  	}
  if($failed=='update_failed'){
  	$message = 'Failed to update, because the data  is already exists!';
  }
 		echo "<script>
		 		   $.alert({
						title: 'Alert!',
					    content: '$message',
					    confirm: function(){										    
						}
						});
  			</script>";

  	$this->session->unset_userdata('failed');
  }
//for message popup when update  adding data is success/failed start			      		
  

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
					               <input type="text" value="" minlength="7" maxlength="15" class="no_contact form-control"/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Contact No.2</label>
					               <input type="text" value="" minlength="7" maxlength="15" class="no1_contact form-control"/>
					            </div>
					        </div>

					
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class=" add_shipper pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>      
				 </div>'; ?>


		<script>

		$('.add_shipper').click(function(){
			alert('aaaa');
		});

	$('.contacts_shipper').click(function(){
		
		 var shipper_id    =  $('.shipper_id').val();
		 var fname_contact =  $('.fname_contact').val();
		 var mname_contact =  $('.mname_contact').val();
		 var lname_contact =  $('.lname_contact').val();
		 var no_contact    =  $('.no_contact').val();
		 var no1_contact   =  $('.no1_contact').val();
		
		 	alert(fname_contact);
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



  
    function search_broker(){
     $this->message();
       $item_per_page=10;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);
 
 $id = $this->input->post('broker_id');
   if(isset($id)){
     $broker = $this->User->search_broker($id);
   }else{
   	 $broker  =  $this->User->findlimit_broker($item_per_page,$page_position);	
   } 	


  
		echo '      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Full Name</th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					         <th>Town/City/Province</th>
					         <th>Country</th>
					        <th>Contact no1.</th>
					        <th>Contact no2.</th>
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
					        <td>'.$row->FirstName.' '.$row->MiddleName.' '.$row->LastName.'</td>
					        <td>'.$row->HouseBuildingNoStreet.'</td>
					        <td>'.$row->BarangarOrVillage.'</td>
					        <td>'.$row->TownOrCityProvince.'</td>
					        <td>'.$row->Country.'</td>
					        <td>'.$row->ContactNo1.'</td>
					        <td>'.$row->ContactNo2.'</td>
					        <td>'.$stat .'</td>
						    <td  class="hidden">'. $mystat .'</td>
						    <td  class="hidden">'. $row->CountryId .'</td>
						    <td class="hidden">'.$row->FirstName.' </td>
						    <td class="hidden">'.$row->MiddleName.' </td>
						    <td class="hidden">'.$row->LastName.' </td>		
					         <td><button type="button" class="btn get_broker_datas" data-toggle="modal" data-target="#modal_update_broker"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        <button class="btn delete_broker"><span class="glyphicon glyphicon-trash"></span></button></td>
					      
					      </tr>';}
					      ?>
					    </tbody>
					  </table>


 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
<script src="<?php echo base_url('resources/js/get_datas.js');?>"></script>
<script src="<?php echo base_url('resources/js/replacejscss.js');?>"></script>
	<script>
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
  $this->message();
   $item_per_page=10;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);
 
	$id = $this->input->post('shipper_id');
   if(isset($id)){
       $shipper = $this->User->search_shipper($id);
   }else{
   	 $shipper  =  $this->User->findlimit_shipper($item_per_page,$page_position);	
   } 	





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
					        <td><button type="button" class="btn  contac" data-toggle="modal" data-target="#modal_shippercontacts">View</button>   
					       					   <button type="button" class="btn add_contact" data-toggle="modal" data-target="#modal_add_shippercontacts">Add</button> 
					        <td><button type="button" class="btn get__shipper_datas" data-toggle="modal" data-target="#modal_update_shipper"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        <button class="btn delete_shipper"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>';}

					     ?>

					    </tbody>
					  </table>



 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
				<script>

					

				
				$('.add_contact').click(function(){
				  var id= $(this).closest('tr').children('td:eq(0)').text();
				  $('.shipper_id').val(id);


				});

				 $('.get__shipper_datas').click(function(){
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

    $this->message();

   $item_per_page=10;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);
 
	$id = $this->input->post('vessel_id');
   if(isset($id)){
           $vessel = $this->User->search_vessel($id);
   }else{
   	 $vessel  =  $this->User->findlimit_vessel($item_per_page,$page_position);	
   } 	


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



 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
			<script>


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