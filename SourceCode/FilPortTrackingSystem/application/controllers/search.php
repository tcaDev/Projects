
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
			$data['result']=$this->User->get_jobfile_manila();
			$searchme= $data['result'];
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
  	 $message = 'Failed to Add, Data already exists!';
  	
  	}
  if($failed=='update_failed'){
  	$message = 'Failed to Update, Data already exists!';
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

   function consigneecon(){

   	$cons=$this->input->post('cons');
   	$info = $this->User->consigneecon($cons);

   	
   	
   	    echo '	    <div class="mycontent" >  	
   	    			<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content" style="width:120%;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Consignee Contacts Information</h4>
				        </div>
				        <div class="modal-body" >
		        		<div style="overflow-x:auto;">			
						<table class="table table-bordered table_consignee">
					    <thead>
					      <tr>
					        <th>FirstName</th>
					        <th>MiddleName</th>
					        <th>LastName</th>
					        <th>Contact Number</th>
					        <th>Email Address</th>
					        <th colspan="2">Update</th>
					      </tr>
					    </thead>
					    <tbody>';
					    if($info==null){
					    	echo '<tr>
					    		 <center><td style="color:red">No Contacts Yet </td></center>
					    		</tr>';
					    }
					    $i=0;
					    foreach ($info as $row) {
					    	$i++;
					    	      echo     '<tr style="cursor:pointer;" class="values_content">
					    		    <td  class="hidden">'.stripslashes($row->ConsigneeContactId).'</td>
					    		     <td  class="hidden">'.$i.'</td>
							        <td contenteditable="true">'.stripslashes($row->FirstName).'</td>
							        <td contenteditable="true">'.stripslashes($row->MiddleName).'</td>
							        <td contenteditable="true">'.stripslashes($row->LastName).'</td>       
							        <td contenteditable="true">'.stripslashes($row->ContactNo1).'</td>
							        <td contenteditable="true">'.stripslashes( $row->ContactNo2). '</td>
							        <td><button class="btn update_contacts_consignee" type="button"  data-toggle="modal" data-target=""><span class="fa fa-floppy-o data-toggle="modal" data-target="#myModal""></span></button>
							  			<button class="btn delete_contacts_consignee"><span class="glyphicon glyphicon-trash"></span></button></td>						        
					     		 </tr>';
					    } ?>
					     </tbody>
					  </table>
					  </div>

					    <?php
					echo   '
			   	 		
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
				        </div>
				      </div> 
				   </div>        
				 </div>'

				 ;?>
		<script>
		$('.update_contacts_consignee').click(function(){
					var cid    = $(this).closest('tr').children('td:eq(0)').text();
					var fname    = $(this).closest('tr').children('td:eq(2)').text();
					var mname    = $(this).closest('tr').children('td:eq(3)').text();
					var lname    = $(this).closest('tr').children('td:eq(4)').text();
					var c1    = $(this).closest('tr').children('td:eq(5)').text();
					var c2    = $(this).closest('tr').children('td:eq(6)').text();
						
				$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Update/update_consigneecon');?>",
			  		data: { c_id:cid,
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
		$('.delete_contacts_consignee').click(function(){
			  var delete_id = $(this).closest('tr').children('td:eq(0)').text();


                                  $.confirm({
                                    title: 'Delete the information?',
                                    content: 'You have 6 seconds to make a choice',
                                    autoClose: 'cancel|6000',
                                    confirmButton: 'Yes',
                                    confirmButtonClass: 'btn-info',
                                    cancelButton: 'No',
                                    confirm: function () {            
               						
						
									


                                        $.post( "<?php echo base_url('Delete_datas/del_consignee_con');?>", 
                                        	{ 
                                        	  id:delete_id
                                        	})
										  .done(function( data ) {
	
										    $.alert({
													    title: 'Alert!',
													    content: 'Data has been deleted!',
													    confirm: function(){
					  									   /*$('#modal_shippercontacts').html(data); */
		   												 $('.close').click();	
		   												
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
   function shippercon(){

   	$cons=$this->input->post('cons');
   	$info = $this->User->shippercons($cons);

   	
   	
   	    echo '	    <div class="mycontent" >  	
   	    			<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content" style="width:120%;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Shipper Contacts Information</h4>
				        </div>
				        <div class="modal-body">
		        		<div style="overflow-x:auto;">	
						<table class="table table-bordered table_consignee">
					    <thead>
					      <tr>
					        <th>FirstName</th>
					        <th>MiddleName</th>
					        <th>LastName</th>
					        <th>Contact Number</th>
					        <th>Email Address</th>
					        <th colspan="2">Update</th>
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
					    		    <td  class="hidden">'.stripslashes($row->ShipperContactId).'</td>
					    		     <td  class="hidden">'.$i.'</td>
							        <td contenteditable="true">'.stripslashes($row->FirstName).'</td>
							        <td contenteditable="true">'.stripslashes($row->MiddleName).'</td>
							        <td contenteditable="true">'.stripslashes($row->LastName).'</td>       
							        <td contenteditable="true">'.stripslashes($row->ContactNo1).'</td>
							        <td contenteditable="true">'.stripslashes($row->ContactNo2). '</td>
							        <td><button class="update_contacts" type="button"  data-toggle="modal" data-target="#modal_update_shipercontacts"><span class="fa fa-floppy-o data-toggle="modal" data-target="#myModal""></span></button>
							  			<button class="delete_contacts"><span class="glyphicon glyphicon-trash"></span></button></td>						        
					     		 </tr>';
					    } ?>
					     </tbody>
					  </table>
					  </div>

						<?php
						echo'
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
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
					  									   /*$('#modal_shippercontacts').html(data); */
		   												 $('.close').click();	
		   												
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

//no longer in use 
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
					            	<label>Contact Number</label>
					               <input type="text" value=""  class="no_contact form-control"/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Email Address</label>
					               <input type="text" value="" class="no1_contact form-control"/>
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


  
		echo '      <table class="table fixed_headers table-bordered" id="table_broker">
					    <thead>
					      <tr>
				
					        <th>Full Name<span class="glyphicon glyphicon-sort"></span></th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					         <th>Town/City/Province</th>
					         <th>Country</th>
					        <th>Contact Number</th>
					        <th>Email Address</th>
					        <th>Status</th>
					        <th colspan="2">Update</th>
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
					        <td>'.stripslashes($row->FirstName.' '.$row->MiddleName.' '.$row->LastName).'</td>
					        <td>'.stripslashes($row->HouseBuildingNoStreet).'</td>
					        <td>'.stripslashes($row->BarangarOrVillage).'</td>
					        <td>'.stripslashes($row->TownOrCityProvince).'</td>
					        <td>'.stripslashes($row->Country).'</td>
					        <td>'.stripslashes($row->ContactNo1).'</td>
					        <td>'.stripslashes($row->ContactNo2).'</td>
					        <td>'.$stat .'</td>
						    <td  class="hidden">'. $mystat .'</td>
						    <td  class="hidden">'. $row->CountryId .'</td>
						    <td class="hidden">'.$row->FirstName.' </td>
						    <td class="hidden">'.$row->MiddleName.' </td>
						    <td class="hidden">'.$row->LastName.' </td>		
					         <td><button type="button" class="btn get_broker_datas" data-toggle="modal" data-target="#modal_update_broker"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        
					      
					      </tr>';}
					      ?>
					    </tbody>
					  </table>


 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
<script src="<?php echo base_url('resources/js/get_datas.js');?>"></script>
<script src="<?php echo base_url('resources/js/replacejscss.js');?>"></script>
   <script src="<?php echo base_url('resources/js/jquery.tablesorter.min.js');?>"></script>
  <link href="<?php echo base_url('resources/css/tabl_sort.css');?>" rel="stylesheet" />
<script>
	$(document).ready(function() { 
        $("#table_broker").tablesorter();}); 
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
    	echo '      <table class="table table-bordered" id="table_shipper">
					    <thead>
					      <tr>

					        <th>Shipper Name</th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					        <th>Town/City/Province</th>
					         <th>Country</th>
					        <th>Shipper Contacts</th>
					        <th>Status</th>
					        <th colspan="2">Update</th>
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

					  echo  '<tr>
					  	    <td class="hidden">'.stripslashes($row->ShipperId).'</td>
					  	    <td>'.stripslashes($row->ShipperName).'</td>
					  	    <td>'.stripslashes($row->HouseBuildingNoStreet).'</td>
					  	    <td>'.stripslashes($row->BarangarOrVillage).'</td>
					  	    <td>'.stripslashes($row->TownOrCityProvince).'</td>
					  	    <td>'.stripslashes($row->Country).'</td>
					  	    <td class="hidden">'.$row->CountryId.'</td>
					        <td><button type="button" class="btn  contac" data-toggle="modal" data-target="#modal_shippercontacts">Edit</button>   
					       					  <button type="button" class="btn add_contact" data-toggle="modal" data-target="#modal_add_shippercontacts">Add</button> 
					       	<td>'.$stat .'</td>
						    <td  class="hidden">'. $mystat .'</td>  				   
					        <td><button type="button" class="btn get__shipper_datas" data-toggle="modal" data-target="#modal_update_shipper"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					      
					      </tr>';}

					     ?>

					    </tbody>
					  </table>



 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
 <script src="<?php echo base_url('resources/js/jquery.tablesorter.min.js');?>"></script>
 <link href="<?php echo base_url('resources/css/tabl_sort.css');?>" rel="stylesheet" />
 <script>
	$(document).ready(function() { 
        $("#table_shipper").tablesorter();}); 
 </script>
	
				<script>

					

				
				$('.add_contact').click(function(){
				  var id= $(this).closest('tr').children('td:eq(0)').text();
				  $('.shipper_id').val(id);


				});

				 $('.get__shipper_datas').click(function(){
			     var id     	    = $(this).closest('tr').children('td:eq(0)').text();
			     var name   	    = $(this).closest('tr').children('td:eq(1)').text();
			     var hosno          = $(this).closest('tr').children('td:eq(2)').text();
			     var vil            = $(this).closest('tr').children('td:eq(3)').text();
			     var city           = $(this).closest('tr').children('td:eq(4)').text();
			     var country        = $(this).closest('tr').children('td:eq(5)').text();
			     var countryid      = $(this).closest('tr').children('td:eq(6)').text();
			     var stat    	    = $(this).closest('tr').children('td:eq(10)').text();

			     $('.ship_id').val(id);
			     $('.shipper_name').val(name);
			     $('.hbno').val(hosno);
			     $('.vilage').val(vil);
			      $('.city').val(city);

			      if(stat==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }

			     if(id!=0){
			  	  	$.ajax({
						  method: "POST",
					 	  url:"<?php echo base_url('Login_user/select_country');?>",
					  	  data: { countryid:id,
					  		  conname:country 	  		  
					  		}
						})
						  .done(function(data) {
					  		$('.change_select').html(data);
					      
					}); 
				 }
			   

			 	
			 });

		 

	$('.contac').click(function(){
			var con    = $(this).closest('tr').children('td:eq(0)').text();

						$.ajax({
					  method: "POST",
					  url:"<?php echo base_url('Search/shippercon/');?>",
					  data: { cons:con}
					})
					  .done(function(data) {
					   $('#modal_shippercontacts').html(data);
					  });
	});


	 $('.get_vessels_of_shipp').click(function(){
	  var id    = $(this).closest('tr').children('td:eq(0)').text();
	 	  $.ajax({
					  method: "POST",
					  url: "<?php echo base_url('Search/vessel_shipper');?>",
					  data: { id:id}
					})
					  .done(function(data) {
					   $('#modal_vessels').html(data);
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


	  echo '	      <table class="table table-bordered" id = "table_vessel">
					    <thead>
					      <tr>
					        <th>Shipping Line ID</th>
					        <th>Shipping Line Name</th>
					        <th>Address</th>
					        <th>Office Number</th>
					        <th>Status</th>
					        <th colspan="2">Update</th>
					      </tr>
					    </thead>
					    <tbody>' ?>
					    <?php 
					    $i=0;
					    foreach ($vessel as $row) {
					    $i++;
					    if($i==1){
					    $cid= $row->CarrierId;
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
					    echo  '<tr>
							        <td>'.stripslashes($row->CarrierId).'</td>
							        <td>'.stripslashes($row->CarrierName).'</td>    
							        <td>'.stripslashes($row->Address).'</td>
							        <td>'.stripslashes($row->OfficeNo).'</td>  
							        <td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_vessels" data-toggle="modal" data-target="#modal_update_vessel"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        
					    	  </tr>';}

?>
					    </tbody>
					  </table>

<script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
 <script src="<?php echo base_url('resources/js/jquery.tablesorter.min.js');?>"></script>
 <link href="<?php echo base_url('resources/css/tabl_sort.css');?>" rel="stylesheet" />
 <script>
	$(document).ready(function() { 
        $("#table_vessel").tablesorter();}); 
 </script>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
			<script>
	 	 $('.update_vessels').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var vessel    	  = $(this).closest('tr').children('td:eq(1)').text();
			     var ves_address  = $(this).closest('tr').children('td:eq(2)').text();
    		     var ves_no    	  = $(this).closest('tr').children('td:eq(3)').text();
			     var status    	  = $(this).closest('tr').children('td:eq(4)').text();
			      $('.vessel_id').val(id);
			      $('.vessel_name').val(vessel);
			   //   $('.vesno').val(vesno);
			      $('.address_carrier').val(ves_address);
			      $('.number_carrier').val(ves_no);
			      if(status=="activated"){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	  $('.deactivate').prop('checked', true);
			  	  }
		
			 });
			</script>
	<?php
	}


/////////////////////////////////
//  REIN ADDED
/////////////////////////////////

function search_hauler(){

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
 
	$id = $this->input->post('CarrierId');
	   if(isset($id)){
	        $haulers = $this->User->search_hauler($id);
	   }else{
	   	 $haulers  =  $this->User->findlimit_hauler($item_per_page,$page_position);	
	   } 	
	echo '<table class="table table-bordered" id ="table_hauler">
		    <thead>
		      <tr>
		      	<th>Hauler ID</th>
		        <th>Hauler/Truck Name</th>
		         <th>Address</th>
		         <th>Tin</th>
		        <th>Status</th>
		        <th colspan="2">Update</th>
		      </tr>
		    </thead>
		  <tbody>' ?>
				    <?php 
					    $i=0;
					    foreach ($haulers as $row) {
					    $i++;
					    if($i==1){
					    $cid= $row->HaulerOrTruckId;
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
					    echo  '<tr>
							        <td>'.stripslashes($row->HaulerOrTruckId).'</td>
							        <td>'.stripslashes($row->HaulerOrTruck).'</td>
							        <td>'.stripslashes($row->Address).'</td>
							        <td>'.stripslashes($row->TIN).'</td>
							      	<td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_hauler" data-toggle="modal" data-target="#modal_update_hauler"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							       
					    	  </tr>';}

?>
    </tbody>
</table>
<script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
 <script src="<?php echo base_url('resources/js/jquery.tablesorter.min.js');?>"></script>
 <link href="<?php echo base_url('resources/css/tabl_sort.css');?>" rel="stylesheet" />
 <script>
	$(document).ready(function() { 
        $("#table_hauler").tablesorter();}); 
 </script>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	

	<script>
	 	 $('.update_hauler').click(function(){
			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var haulers   	  = $(this).closest('tr').children('td:eq(1)').text();
			     var tin 		  = $(this).closest('tr').children('td:eq(3)').text();
			     var address   	  = $(this).closest('tr').children('td:eq(2)').text();
			     var status   	  = $(this).closest('tr').children('td:eq(5)').text();
			      $('.hauler_id').val(id);
			      $('.hauler_name').val(haulers);
			      $('.hauler_address').val(address);
			      $('.hauler_tin').val(tin);

			      if(status==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	  $('.deactivate').prop('checked', true);
			  	  }
			 });
	</script>
	<?php
	}



function search_forward(){
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
 
	$id = $this->input->post('forward_id');
	   if(isset($id)){
	        $forward = $this->User->search_forward($id);
	   }else{
	   	 $forward  =  $this->User->findlimit_forward($item_per_page,$page_position);	
	   } 	
	echo '<table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Forwarder Name</th>
		        <th>Status</th>
		        <th colspan="2">Update</th>
		      </tr>
		    </thead>
		  <tbody>' ?>
				    <?php 
					    $i=0;
					    foreach ($forward as $row) {
					    $i++;
					    if($i==1){
					    $cid= $row->ForwarderWarehouseId;
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
					    echo  '<tr>
							        <td class="hidden">'.stripslashes($row->ForwarderWarehouseId).'</td>
							        <td>'.stripslashes($row->ForwarderWarehouseName).'</td>
							        <td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_forwards" data-toggle="modal" data-target="#modal_update_forward"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        
					    	  </tr>';}


?>
    </tbody>
</table>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	

	<script>
	 	 $('.update_forwards').click(function(){
			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var forward   	  = $(this).closest('tr').children('td:eq(1)').text();
			     var status   	  = $(this).closest('tr').children('td:eq(3)').text();
			      $('.forward_ids').val(id);
			      $('.forward_names').val(forward);

			      if(status==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	  $('.deactivate').prop('checked', true);
			  	  }
			 });
	</script>
	<?php
	}




  function search_legend(){
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
 
	$id = $this->input->post('legend_id');
	   if(isset($id)){
	        $legend = $this->User->search_legend($id);
	   }else{
	   	 $legend  =  $this->User->findlimit_legend($item_per_page,$page_position);	
	   } 	
	echo '<table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Status Name</th>
		        <th>Description Name</th>
		        <th>Font/Background</th>
		        <th class="hidden">Color</th>
		        <th>Status</th>
		        <th colspan="2">Update</th>
		      </tr>
		    </thead>
		  <tbody>' ?>
		    <?php 
			    $i=0;
			    foreach ($legend as $row) {
			    $i++;
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

    			$pick =$row->IsBackground;
    			if($pick==0){
		        	$pick1= '<td style="color:'.$row->ColorCode.';"><strong>Font</strong></td>';
		        	$pick2= '<td class="hidden">'.$row->ColorCode.'</td>';
		        }else{
		        	$pick1 ='<td style="background-color:'.$row->ColorCode.';">Background</td>';
		        	$pick2= '<td class="hidden">'.$row->ColorCode.'</td>';
		        }

			    if($i==1){
			    $cid= $row->StatusId;
			    }
			    echo '<tr>
				        <td class="hidden">'.stripslashes($row->StatusId).'</td>
				        <td>'.stripslashes($row->StatusName).'</td>
				        <td>'.stripslashes($row->Description).'</td>
				        '.$pick1.'
				        '.$pick2.'
				         <td>'.$stat .'</td>
						 <td  class="hidden">'. $mystat .'</td> 
				         <td><button type="button" class="btn update_legend" data-toggle="modal" data-target="#modal_update_legend"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
				        
			    	  </tr>';}?>
    </tbody>
</table>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	

	<script>
	 	 $('.update_legend').click(function(){
			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var status   	  = $(this).closest('tr').children('td:eq(1)').text();
			     var descr 		  = $(this).closest('tr').children('td:eq(2)').text();
			     var color   	  = $(this).closest('tr').children('td:eq(4)').text();
			     /*var bground   	  = $(this).closest('tr').children('td:eq()').text();*/
			     var stat   	  = $(this).closest('tr').children('td:eq(6)').text();

			     /*alert(status);*/


			      $('.legend_id').val(id);
			      $('.legend_status').val(status);
			      $('.legend_descrip').val(descr);
			      $('.legend_color').val(color);
			      $('.legend_backg').val(bground);

			      if(stat==1){
			      $('.activate').attr('checked', 'checked');
			  	  }else{
			  	  	  $('.deactivate').attr('checked', 'checked');
			  	  }
			 });
	</script>
	<?php
	}

	function vessel_shipper(){

	$id=$this->input->post('id');
   	$info = $this->User->vessel_shipper($id);

   	
   	
   	    echo '	    <div class="mycontent" >  	
   	    			<div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Vessels Under Shipper</h4>
				        </div>
				        <div class="modal-body">
		        		
						<table class="table  table-bordered">
					    <thead>
					      <tr>
					        <th>Vessels</th>
					        <th>Plate No.</th>		  
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
							        <td style="text-align:left;">'.stripslashes($row->Vesselname).'</td>
							        <td style="text-align:left;">'.stripslashes($row->VesselNo).'</td>

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
				 </div>';

				 



	}

function search_product(){

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
 
	$id = $this->input->post('product_id');
   if(isset($id)){
           $vessel = $this->User->search_product($id);
   }else{
   	 $vessel  =  $this->User->findlimit_product($item_per_page,$page_position);	
   } 	


	  echo '	      <table class="table table-bordered" id ="table_product">
					    <thead>
					      <tr>
					        <th>Commodity ID</th>
					        <th>Commodity</th>
					        <th>Status</th>
					        <th colspan="2">Update</th>
					      </tr>
					    </thead>
					    <tbody>' ?>
					    <?php 
					    $i=0;
					    foreach ($vessel as $row) {
					    $i++;
					    if($i==1){
					    $cid= $row->ProductId;
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
					    echo  '<tr>
							        <td>'.stripslashes($row->ProductId).'</td>
							        <td>'.stripslashes($row->ProductName).'</td>      
							        <td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_product" data-toggle="modal" data-target="#modal_update_products"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        
					    	  </tr>';}

?>
					    </tbody>
					  </table>
  <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
 <script src="<?php echo base_url('resources/js/jquery.tablesorter.min.js');?>"></script>
 <link href="<?php echo base_url('resources/css/tabl_sort.css');?>" rel="stylesheet" />
 <script>
	$(document).ready(function() { 
        $("#table_product").tablesorter();}); 
 </script>


 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	
			<script>


	 	 $('.update_product').click(function(){

			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var product      = $(this).closest('tr').children('td:eq(1)').text();
			     var status    	  = $(this).closest('tr').children('td:eq(3)').text();
			      $('.prod_id').val(id);
			      $('.prod_name').val(product);
			      if(status==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	  $('.deactivate').prop('checked', true);
			  	  }
		
			 });
			</script>
	<?php
	}


}
?>