
		<div class="con-shiptxt">
		  <ul class="nav nav-pills pull-left">
		    <li class="active"><a data-toggle="pill" href=".consignee"  id="form_consignee">Consignee</a></li>
		    <li><a data-toggle="tab" href=".broker" 					id="form_broker">Broker</a></li>
		     <li><a data-toggle="tab" href=".shipper"					id="form_shipper">Shipper</a></li>
		    <li><a data-toggle="tab" href=".vessel"						id="form_vessel">Vessel</a></li>
		
<!-- 		    <li><a data-toggle="tab" href=".shippercon"			    id="form_shipper_contacts">Shipper Contacts</a></li> -->
		  </ul>
		 	<div class="input-group col-md-6 pull-right" style="width: 27%;">
	            <input type="text" class="form-control consignee_tab"    id="search" placeholder="Search" />
	            <span class="input-group-btn">
	                <button class="btn" type="button"  onclick="search()" class="submit_consignee" id="submit_search">
	                    <span class=" glyphicon glyphicon-search"></span>
	                </button>
	            </span>
	        </div>
		</div>
            <div class="con-ship tab-content">  
                  <div class="consignee tab-pane fade in active">
			      <table class="table table-striped table_consignee">
					    <thead>
					      <tr>
					        <th>Consignee Name</th>
					        <th>Address</th>
					        <th>OfficeNumber</th>
					        <th>Status</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>
					      	<?php 
					         $i=0;
					      		foreach ($clients as $row) {
					      	    $i++;
					      	    //for default value
					      	    if($i==1){
					      	    	$cid   = $row->ConsigneeId;
					      	    	$cname = $row->ConsigneeName;
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
	
					   echo     '<tr style="cursor:pointer;">
					    		    <td   class="hidden">'. $row->ConsigneeId .'</td>
							        <td>'. $row->ConsigneeName .'</td>
							        <td>'. $number .'</td>       
							        <td>'.$stat .'</td>
							        <td   class="hidden">'. $row->DateAdded .'</td>
							        <td   class="hidden">'. $mystat .'</td>
							        <td><button type="button" class="btn get_consignee_datas" data-toggle="modal" data-target="#modal_update_consignee"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							  			<button class="btn delete_consignee"><span class="glyphicon glyphicon-trash"></span></button></td>						        
					     		 </tr>';
					      		}

					      ?>
					    <!--   <td><button class="btn update_consignee"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button></td> -->
					    </tbody>
					  </table>
			    </div>
			    <div class="tab-pane fade broker">
			      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Full Name</th>
					        <th>Address</th>
					        <th>Contact no1.</th>
					        <th>Contact no2.</th>
					        <th>Status</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>

					    <?php
					    foreach ($lbroker as $row) {
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
					      	<td >'.$row->FirstName.' '.$row->MiddleName.' '.$row->LastName.' </td>
					        <td class="hidden">'.$row->FirstName.'</td>
					        <td class="hidden">'.$row->MiddleName.'</td>
					        <td class="hidden">'.$row->LastName.'</td>
					        <td>'.$row->FirstName.'</td>
					        <td>'.$stat .'</td>

					         <td><button type="button" class="btn get_broker_datas" data-toggle="modal" data-target="#modal_update_broker"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        <button class="btn delete_broker"><span class="glyphicon glyphicon-trash"></span></button></td>
					      
					      
					      </tr>';}

					      ?>
					    </tbody>
					  </table>
			    </div>
			    <div  class="vessel tab-pane fade">
			      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Vessel Name</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php 
					    foreach ($lvessel as $row) {
					    echo  '<tr>
							        <td class="hidden">'.$row->ShipperVesselId.'</td>
							        <td>'.$row->Vesselname.'</td>
							         <td><button type="button" class="btn get_vessel_datas" data-toggle="modal" data-target="#modal_update_vessel"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							        <button class="btn delete_vessel"><span class="glyphicon glyphicon-trash"></span></button></td>
					    	  </tr>';}
					      ?>
					    </tbody>
					  </table>
			    </div>
			    <div  class="tab-pane fade shipper">
			      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Shipper Name</th>
					        <th>Shipper Contacts</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php 
					     $count=0;
					      foreach ($lshipper as $row) {	
					  echo  '<tr>
					  	    <td class="hidden">'.$row->ShipperId.'</td>
					  	    <td>'.$row->ShipperName.'</td>
					        <td class="hidden">'.$row->DateAdded.'</td> 
					        <td><button type="button" class="btn  contac" data-toggle="modal" data-target="#modal_shippercontacts">View</button>   
					       	<button type="button" class="btn add_contact" data-toggle="modal" data-target="#modal_add_shippercontacts">Add</button> 
					        <td><button type="button" class="btn get_shipper_datas" data-toggle="modal" data-target="#modal_update_shipper"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
					        <button class="btn delete_shipper"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>';}
					     ?>
					    </tbody>
					  </table>
			    </div>
			    <div class="container tab-pane fade">
			      <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Vessel ID</th>
					        <th>Container Desc</th>
					        <th>container Size</th>
					        <th colspan="2">Action</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>
					        	<select><option>option1</option></select>
					        </td>
					        <td>Doe</td>
					        <td>123</td>
					        <td><button class="btn update"><span class="glyphicon glyphicon-edit"></span></button>
					        <button class="btn update"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					    </tbody>
					  </table>
			    </div>
			  </div>
			</div>
			

			<div class="" id="mycontent">
				<div class="consignees ">
				<div class="con-info consig-pos  tab-pane " data-toggle="collapse" data-target="#consignee"  style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW CONSIGNEE</span>
				</div>
					<div class="consignees collapse consig-posbox add_consignee" id="consignee">
						<form action="<?php echo base_url('Add_user/add_client/');?>" method="post">
							<div class="">
					            <div class="form-group col-lg-12">          	
					                <input type="text" name="cname"class="form-control" placeholder="Client Name" required/>
					            </div>
					        </div>
					        <div class="">
					            <div class="form-group col-md-2">
					                <input type="text" name="Address" class="form-control" placeholder="St." required />
					            </div>

					       		<div class="form-group col-md-5">
					                <input type="text" name="Address" class="form-control" placeholder="Baranggay or Village" required />
					            </div>

					           	<div class="form-group col-md-5">
					                <input type="text" name="Address" class="form-control" placeholder="Town or Province" required />
					            </div>
					        </div>
					    	<div class="">
					            <div class="form-group col-md-12">
					                <select class="form-control">
					                	<option disabled selected>Select Country</option>
					              		<option>country</option>
					                </select>
					            </div>
					        </div>

					        <div class="">
					            <div class="form-group col-lg-12">       	
					                <input type="text" name="OfficeNumber" minlength="7" maxlength="15" class="form-control" placeholder="Office Number" required />
					            </div>
					        </div>
					        <div class="">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
					</div>
				</div>	
			</div>

				<!--For Pop up update -->
				  <!-- Modal -->
				  <div class="modal fade" id="modal_update_consignee" role="dialog">
				    <div class="modal-dialog">  
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Consignee Information</h4>
				        </div>
				        <div class="modal-body">			          
				         <form action="<?php echo base_url('Update/update_consignee/');?>" method="post">
				          	  <input type="hidden" name="consig_id"      class="consignee_id" />
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Client Name</label>
					               <input type="text"   name="consig_name"  class="consignee_name form-control"/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Address</label>
					               <input type="text"   name="consig_addr"  class="consignee_addr form-control"/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>OfficeNumber</label>
					                <input type="text" name="consig_ofnum" minlength="7" maxlength="15"  class="consignee_of form-control" required />
					            </div>
					        </div>
					        <div class="col-lg-12">
					        	<label>Status: </label>
						        <div class="radio">
								  <label><input type="radio" name="status" class="activate" value="1">activated</label>
								</div>
								 <div class="radio">
								   <label><input type="radio"  class="deactivate" name="status" value="0">deactivated</label>
								 </div>
					        </div>
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>


				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>

				  				  <!-- Modal FOr vessel
				  				  -->
				  <div class="modal fade" id="modal_update_vessel" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Vessel Information</h4>
				        </div>
				        <div class="modal-body">
				          	  <input type="hidden" name="ves_id"      class="vessel_id" />
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Vessel Name</label>
					               <input type="text"   name="ves_name"  class="vessel_name form-control"/>
					            </div>
					        </div>
					  
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="button" class="update_vessel pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			
				        </div>

				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>



				   <!-- Modal For Shipper-->
			 <div class="modal fade" id="modal_update_shipper" role="dialog">
				  <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Shipper Information</h4>
				        </div>
				        <div class="modal-body">
		        	
				            <input type="hidden" name="ship_id" value='' class="ship_id form-control"/>
							
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Shipper Name</label>
					               <input type="text" name="ship_name" value="" class="shipper_name form-control"/>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="button" class=" update_shipper pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="  btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>      
				 </div>
			</div>

				  	<!-- Modal FOr broker-->
		<div class="modal fade" id="modal_update_broker" role="dialog">
				  <div class="modal-dialog">
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
					               <input type="text"   name="broker_contact" minlength="7" maxlength="15" value="" class="broker_contact form-control"/>
					            </div>
					        </div>

					        <div class="col-lg-12">
					        	<label>Status: </label>
						        <div class="radio">
								  <label><input type="radio" name="status_broker" class="activate  " value="1">activated</label>
								</div>
								 <div class="radio">
								   <label><input type="radio"name="status_broker" class="deactivate " value="0">deactivated</label>
								 </div>
					        </div>
					         <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="button" class="update_broker pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
						</div>
						 <div class="modal-footer">
				          <button type="button " class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
					</div>
				</div>
		</div>

				  	  	<!-- Modal FOr shippercontacts-->
				  <div class="modal fade" id="modal_shippercontacts" role="dialog">


				  </div>

				    	  	<!-- Modal FOr add_shippercontacts-->
			<div class="modal fade" id="modal_add_shippercontacts" role="dialog">
				  <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Add Shipper Contacts</h4>
				        </div>
				        <div class="modal-body">
		       
				            <input type="hidden"  value="" class="shipper_id form-control"/>
							
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
					               <input type="text" value="" minlength="7" maxlength="15"  class="no1_contact form-control"/>
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
				 </div>'
			</div>

 
 		<script>
		//for highlight and getting the data

				 cid = <?php echo $cid;?>;
				 
				  $('td').click(function(){
		 		  $('tr').removeClass('mycolor').children('td');
		          
		          var cid=$(this).closest('tr').addClass('mycolor').children('td:first').text();
		          var check = $.isNumeric(cid);

		          if(check==false){
		         	$('tr').removeClass('mycolor').children('td');
		         	cid = <?php echo $cid;?>;

		          }
	/*	         var id 		  = $(this).closest('tr').children('td:eq(0)').text();
			     var Consignee    = $(this).closest('tr').children('td:eq(1)').text();
			     var Address      = $(this).closest('tr').children('td:eq(2)').text();
			     var dtupdated    = $(this).closest('tr').children('td:eq(5)').text();*/

		           });
		</script>


 <script src="<?php echo base_url('resources/js/settings.js');?>"></script>


</body>
</html>

<style>
.mycolor{

	 background-color: #66FF99 !important;
}
</style>


          
