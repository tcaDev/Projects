
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
			$search_Type = $this->input->get('searchType');
			$search_From= $this->input->get('searchFrom');
			$displayOutput;
			$displayCount;
			//echo " From " . $search_From;
			
			$data['result']=$this->User->search_global($search,$search_Type,$search_From);
			$searchme= $data['result'];
			/*var_dump($searchme);
			exit;*/
			//echo "teanasdflajkqwer";
			if(isset($search)){
				if(count($searchme) > 0){
					$displayCount = count($searchme) . " result(s) Found";
					$displayOutput = '<table class="table table-striped">';
					if($search_Type == "JobfileID"){
					$displayOutput .= '<tr>
								<th>Carrier Name </th>
								<th>Shipper </th>
								<th>Consignee</th>
								<th>House Bill Lading Number </th>
								<th>Master Bill Lading Number </th>
								<th>Letter Credit From Bank </th>
								<th>Date Sent Final Assessment</th>
								<th>Purchase Order Number</th>
								<th>Date File Entry to BOC</th>
								<th>Registry</th>
								<th>Date Received Notice From Clients</th>
								<th>Date Received of BL</th>
								<th>Date Received of Other Documents</th>
								<th>Broker</th>
								<th>Date Request Budget to GL</th>
								<th>RFP Due Date</th>
								<th>Date Sent Pre Assessment</th>
								<th>Reference Entry Number</th>
								<th>Color Selectivity Name</th>
								<th>Status Name</th>
								<th>Date Paid</th>
							</tr>
						<tr>';
						foreach ($searchme as $row) {
								$displayOutput .=  '<tr>';
								$displayOutput .=  '<td>' .$row->CarrierName . '</td>';
								$displayOutput .=  '<td>' .$row->ShipperName . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->ConsigneeName . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->HouseBillLadingNo . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->MasterBillLadingNo . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->LetterCreditFromBank . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->DateSentFinalAssessment . '</td>';
					        	$displayOutput .=  '<td>' .$row->PurchaseOrderNo . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->DateFileEntryToBOC . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->Registry . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->DateReceivedNoticeFromClients . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->DateReceivedOfBL . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->DateReceivedOfOtherDocs . '</td>';
					   			$displayOutput .=  '<td>' .$row->Broker . '</td>';
					   			$displayOutput .=  '<td>' .$row->DateRequestBudgetToGL . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->RFPDueDate . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->DateSentPreAssessment . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->RefEntryNo . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->ColorSelectivityName . '</td>';
					 	    	if($row->IsBackground == 1){
					 	    		$displayOutput .=  '<td style="background-color:' . $row->ColorCode . ';color:white">' . $row->StatusName . '</td>';
					 	    	}else{
									$displayOutput .=  '<td style="color:' . $row->ColorCode . ';background-color:white">' . $row->StatusName . '</td>';
					 	    	}
					 	    	$displayOutput .=  '<td>' .$row->DatePaid . '</td>';

								$displayOutput .=  '</tr>';	
						}
						
					}
					if($search_Type == "ConsigneeName"){
							$displayOutput .=  '<tr>
								<th>Consignee Name</th>
								<th>House Building No/Street</th>
								<th>Barangay/Village</th>
								<th>Town/City Or Province</th>
								<th>Country ID</th>
								<th>Office Number</th>
								<th>Date Added</th>
								<th>IsActive</th>
								<th>Country</th>
							</tr>
						<tr>';
						foreach ($searchme as $row) {
								$displayOutput .=  '<tr>';
					 	    	$displayOutput .=  '<td>' .$row->ConsigneeName . '</td>';
					   			$displayOutput .=  '<td>' . $row->HouseBuildingNoOrStreet . '</td>';
					   			$displayOutput .=  '<td>' . $row->BarangayOrVillage . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->TownOrCityProvince . '</td>';
					 	    	$displayOutput .=  '<td>' . $row->CountryId . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->OfficeNumber . '</td>';
					 	    	$displayOutput .=  '<td>' . $row->DateAdded . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->IsActive . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->Country . '</td>';
								$displayOutput .=  '</tr>';	
						}			
					}
					if($search_Type == "HaulerOrTruck"){
							$displayOutput .=  '<tr>
								<th>Hauler/Truck</th>
								<th>Is Active</th>
							</tr>
						<tr>';
						foreach ($searchme as $row) {
								$displayOutput .=  '<tr>';
					 	    	$displayOutput .=  '<td>' .$row->HaulerOrTruck . '</td>';
					   			$displayOutput .=  '<td>' . $row->IsActive . '</td>';
								$displayOutput .=  '</tr>';	
						}			
					}
					if($search_Type == "ShipperName" && $search_From == "vw_shipper_full_info"){
							$displayOutput .=  '<tr>
								<th>Shipper Name</th>
								<th>Date Added</th>
								<th>House Building No/Street</th>
								<th>Barangay/Village</th>
								<th>Town/City Or Province</th>
								<th>Country ID</th>
								<th>Is Active</th>
							</tr>
						<tr>';
						foreach ($searchme as $row) {
								$displayOutput .=  '<tr>';
					 	    	$displayOutput .=  '<td>' .$row->ShipperName . '</td>';
					   			$displayOutput .=  '<td>' . $row->DateAdded . '</td>';
					   			$displayOutput .=  '<td>' . $row->HouseBuildingNoStreet . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->BarangarOrVillage . '</td>';
					   			$displayOutput .=  '<td>' . $row->TownOrCityProvince . '</td>';
					   			$displayOutput .=  '<td>' . $row->CountryId . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->IsActive . '</td>';
								$displayOutput .=  '</tr>';	
						}			
					}
					if($search_Type == "CarrierName"){
							$displayOutput .=  '<tr>
								<th>Carrier Name</th>
								<th>Is Active</th>
												</tr>
						<tr>';
						foreach ($searchme as $row) {
								$displayOutput .=  '<tr>';
					 	    	$displayOutput .=  '<td>' .$row->CarrierName . '</td>';
					   			$displayOutput .=  '<td>' . $row->IsActive . '</td>';
								$displayOutput .=  '</tr>';	
						}	
					}		
					if($search_From == "vw_broker_full_info"){
							$displayOutput .=  '<tr>			
								<th>Full Name Name</th>
								<th>House Building/Street Number</th>
								<th>Barangay / Village</th>
								<th>Town/City/Province</th>
								<th>Country ID</th>
								<th>Contact Number 1</th>
								<th>Contact Number 2 </th>
								<th>Is Active</th>
							</tr>
						<tr>';
						foreach ($searchme as $row) {
								$displayOutput .=  '<tr>';
					 	    	$displayOutput .=  '<td>' .$row->LastName . ', ' . $row->FirstName . ' ' . $row->MiddleName . '</td>';
						    	$displayOutput .=  '<td>' . $row->HouseBuildingNoStreet . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->BarangarOrVillage . '</td>';
					   			$displayOutput .=  '<td>' . $row->TownOrCityProvince . '</td>';
					   	    	$displayOutput .=  '<td>' . $row->CountryId . '</td>';
					 	    	$displayOutput .=  '<td>' .$row->ContactNo1 . '</td>';
					   			$displayOutput .=  '<td>' . $row->ContactNo2 . '</td>';
					   			$displayOutput .=  '<td>' . $row->IsActive . '</td>';
								$displayOutput .=  '</tr>';	
						}	
					}			
						$displayOutput .=  '</table>';
				}else{
						$displayOutput =  "No Result(s) Found";
						$displayCount = "0 Result(s) Found";
				}
					
			}else{
					$displayOutput .=  "NO result(s) Found";
					$displayCount = "0 Result(s) Found";
			}
			
			$response = array(
				array(
						"Display" => $displayOutput,
						"OutputCount" => $displayCount
					)
				);

			echo json_encode($response);
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
					        <th>Contact Info.1</th>
					        <th>Contact Info.2</th>
					        <th colspan="2">Action</th>
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
					    		    <td  class="hidden">'.$row->ConsigneeContactId.'</td>
					    		     <td  class="hidden">'.$i.'</td>
							        <td contenteditable="true">'.$row->FirstName.'</td>
							        <td contenteditable="true">'.$row->MiddleName.'</td>
							        <td contenteditable="true">'.$row->LastName.'</td>       
							        <td contenteditable="true">'.$row->ContactNo1.'</td>
							        <td contenteditable="true">'. $row->ContactNo2. '</td>
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
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
					        <th>Contact Info.1</th>
					        <th>Contact Info.2</th>
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
					            	<label>Contact Info.1</label>
					               <input type="text" value=""  class="no_contact form-control"/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Info No.2</label>
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


  
		echo '      <table class="table fixed_headers table-bordered">
					    <thead>
					      <tr>
				
					        <th>Full Name<span class="glyphicon glyphicon-sort"></span></th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					         <th>Town/City/Province</th>
					         <th>Country</th>
					        <th>Contact Info.1</th>
					        <th>Contact Info.2</th>
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
                                   
                                        $.post("http://localhost/FilPortTrackingSystem/Delete_datas/del_broker/", 
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
    	echo '      <table class="table table-bordered">
					    <thead>
					      <tr>

					        <th>Shipper Name</th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					        <th>Town/City/Province</th>
					         <th>Country</th>
					        <th>Shipper Contacts</th>
					        <th>Status</th>
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
					  	    <td class="hidden">'.$row->ShipperId.'</td>
					  	    <td>'.$row->ShipperName.'</td>
					  	    <td>'.$row->HouseBuildingNoStreet.'</td>
					  	    <td>'.$row->BarangarOrVillage.'</td>
					  	    <td>'.$row->TownOrCityProvince.'</td>
					  	    <td>'.$row->Country.'</td>
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
			     $('.hbno').val(id);
			     $('.vilage').val(name);
			      $('.city').val(city);

			      if(stat==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	   $('.deactivate').prop('checked', true);
			  	  }

			     if(id!=0){
			  	  	$.ajax({
						  method: "POST",
					 	  url:"http://localhost/FilPortTrackingSystem/Login_user/select_country",
					  	  data: { countryid:id,
					  		  conname:country 	  		  
					  		}
						})
						  .done(function(data) {
					  		$('.change_select').html(data);
					      
					}); 
				 }
			   

			 	
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
                                   
                                        $.post("http://localhost/FilPortTrackingSystem/Delete_datas/del_shipper/", 
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
					  url:"http://localhost/FilPortTrackingSystem/search/shippercon/",
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
					  url: "http://localhost/FilPortTrackingSystem/search/vessel_shipper/",
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


	  echo '	      <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Shipping Lines ID</th>
					        <th>Shipping Lines Name</th>
					        
					        <th>Status</th>
					        <th colspan="2">Action</th>
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
							        <td>'.$row->CarrierId.'</td>
							        <td>'.$row->CarrierName.'</td>      
							        <td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_vessels" data-toggle="modal" data-target="#modal_update_vessel"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        
					    	  </tr>';}

?>
					    </tbody>
					  </table>



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
			     var vesno    	  = $(this).closest('tr').children('td:eq(2)').text();
			     var status    	  = $(this).closest('tr').children('td:eq(3)').text();
			      $('.vessel_id').val(id);
			      $('.vessel_name').val(vessel);
			      $('.vesno').val(vesno);
			      if(status==1){
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
	echo '<table class="table table-bordered">
		    <thead>
		      <tr>
		      	<th>Hauler ID</th>
		        <th>Hauler/Truck Name</th>
		        <th>Status</th>
		        <th colspan="2">Action</th>
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
							        <td>'.$row->HaulerOrTruckId.'</td>
							        <td>'.$row->HaulerOrTruck.'</td>
							      	<td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_hauler" data-toggle="modal" data-target="#modal_update_hauler"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							       
					    	  </tr>';}

?>
    </tbody>
</table>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	

	<script>
		 $('.delete_haulers').click(function(){
		  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
		      $.confirm({
		        title: 'Delete the information?',
		        content: 'You have 6 seconds to make a choice',
		        autoClose: 'cancel|6000',
		        confirmButton: 'Yes',
		        confirmButtonClass: 'btn-info',
		        cancelButton: 'No',
		        confirm: function () {            
		            $.post("http://localhost/FilPortTrackingSystem/Delete_datas/del_haulers", 
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
					    location.hash="hauler";
					    location.reload();
					  });
		        },
		        cancel: function () {
		           /* alert('Vacation cancelled!');*/
		        }
		    });
			});
	 	 $('.update_hauler').click(function(){
			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var haulers   	  = $(this).closest('tr').children('td:eq(1)').text();
			     var status   	  = $(this).closest('tr').children('td:eq(3)').text();
			      $('.hauler_id').val(id);
			      $('.hauler_name').val(haulers);

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
		        <th colspan="2">Action</th>
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
							        <td class="hidden">'.$row->ForwarderWarehouseId.'</td>
							        <td>'.$row->ForwarderWarehouseName.'</td>
							        <td>'.$stat .'</td>
						    		<td  class="hidden">'. $mystat .'</td>  
							         <td><button type="button" class="btn update_forwards" data-toggle="modal" data-target="#modal_update_forward"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        
					    	  </tr>';}


?>
    </tbody>
</table>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	

	<script>
		 $('.delete_forward').click(function(){
		  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
		      $.confirm({
		        title: 'Delete the information?',
		        content: 'You have 6 seconds to make a choice',
		        autoClose: 'cancel|6000',
		        confirmButton: 'Yes',
		        confirmButtonClass: 'btn-info',
		        cancelButton: 'No',
		        confirm: function () {            
		            $.post("http://localhost/FilPortTrackingSystem/Delete_datas/del_forward", 
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
					    location.hash="forward";
					    location.reload();
					  });
		        },
		        cancel: function () {
		           /* alert('Vacation cancelled!');*/
		        }
		    });
			});
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
		        <th>Status</th>
		        <th colspan="2">Action</th>
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
		        }else{
		        	$pick1 ='<td style="background-color:'.$row->ColorCode.';">Background</td>';
		        }

			    if($i==1){
			    $cid= $row->StatusId;
			    }
			    echo '<tr>
				        <td class="hidden">'.$row->StatusId.'</td>
				        <td>'.$row->StatusName.'</td>
				        <td>'.$row->Description.'</td>
				        '.$pick1.'
				         <td>'.$stat .'</td>
						 <td  class="hidden">'. $mystat .'</td> 
				         <td><button type="button" class="btn update_legend" data-toggle="modal" data-target="#modal_update_legend"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
				        
			    	  </tr>';}?>
    </tbody>
</table>

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>	

	<script>
		 $('.delete_legend').click(function(){
		  var delete_id = $(this).closest('tr').children('td:eq(0)').text();
		      $.confirm({
		        title: 'Delete the information?',
		        content: 'You have 6 seconds to make a choice',
		        autoClose: 'cancel|6000',
		        confirmButton: 'Yes',
		        confirmButtonClass: 'btn-info',
		        cancelButton: 'No',
		        confirm: function () {            
		            $.post("http://localhost/FilPortTrackingSystem/Delete_datas/del_legend", 
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
					    location.hash="legend";
					    location.reload();
					  });
		        },
		        cancel: function () {
		           /* alert('Vacation cancelled!');*/
		        }
		    });
			});
	 	 $('.update_legend').click(function(){
			     var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var status   	  = $(this).closest('tr').children('td:eq(1)').text();
			     var descr 		  = $(this).closest('tr').children('td:eq(2)').text();
			     var color   	  = $(this).closest('tr').children('td:eq(3)').text();
			     var bground   	  = $(this).closest('tr').children('td:eq(4)').text();
			     var stat   	  = $(this).closest('tr').children('td:eq(5)').text();

			     /*alert(status);*/


			      $('.legend_id').val(id);
			      $('.legend_status').val(status);
			      $('.legend_descrip').val(descr);
			      $('.legend_color').val(color);
			      $('.legend_backg').val(bground);

			      if(stat==1){
			      $('.activate').prop('checked', true);
			  	  }else{
			  	  	  $('.deactivate').prop('checked', true);
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
							        <td style="text-align:left;">'.$row->Vesselname.'</td>
							        <td style="text-align:left;">'.$row->VesselNo.'</td>

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


}
?>