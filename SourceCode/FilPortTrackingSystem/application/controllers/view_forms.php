<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class view_forms extends CI_Controller {

   public function __construct()
       {
            parent::__construct();
            $this->load->helper('html');
            $this->load->model('User'); 
            $this->load->library('form_validation');

       }

function index(){
/*echo validation_errors();
echo form_open('form');*/

$countries=$this->User->countries();
	echo 	'<div class="consignees ">
				<button type="button" class="con-info consig-pos "  data-toggle="modal" data-target="#consignee" style="cursor:pointer">ADD CONSIGNEE</button>
					<div class="consignees collapse consig-posbox modal fade add_consignee" id="consignee"  role="dialog">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Add New Consignee</h4>
						      </div>
						      <div class="modal-body">
					        
								<form action="'.base_url('add_user/add_client/').'" method="post">
									<div class="">
							            <div class="form-group col-md-12">
							                <input type="text" name="cname"class="form-control" placeholder="Client Name" required/>
							            </div>
							        </div>
							     	 <div class="">
							            <div class="form-group col-lg-12">
							            <!-- 	<label>HouseBuildingNo/Street</label> -->
							               <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="hbno form-control" required/>
							          </div>
							        </div>
							         <div class="">
							            <div class="form-group col-lg-12">
							            	<!-- <label>Barangay/Village</label> -->
							                <input type="text" name="vilage"  placeholder="Barangay/Village" class="vilage form-control" required />
							            </div>
							        </div>
							         <div class="">
							            <div class="form-group col-lg-12">
							            	<!-- <label>TownOrCityProvince</label> -->
							                <input type="text" name="city"  placeholder="TownOrCityProvince" class="city form-control" required />
							            </div>
							        </div>'?>

						          <div class="">
						            <div class="form-group col-lg-12 " >
						            	<label>Country</label>
						                <!-- <input type="text" name="country"   class="country form-control" required /> -->
						           		<div class="change_select" >
						           			<select name="country" class="form-control">
						           			<?php 
						           			  foreach($countries as $row)
						           			   echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 
						           			?>
						           			</select>
						           		</div>
						            </div>
						        </div>
		<?php	echo	 '<div class="">
				            <div class="form-group col-md-12">
				                <input type="text" name="OfficeNumber" minlength="7" maxlength="15" class="form-control" placeholder="Office Number" required />
				            </div>
				        </div>
				        <div class="">
				        	<div class="form-group col-md-12">
				            	<button type="submit" class="pull-right btn btn-default">Submit</button>
				            </div>	
				        </div>
		   	 		</form>
			      <div class="modal-footer">
			      </div>
			    </div>
			  </div>';

/*echo form_close();*/

}
 
function broker(){
 $countries=$this->User->countries();
	echo	'<div class="brokers tab-pane">
				<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#broker">ADD BROKER</button>

					<div class="brokers modal fade consig consig-posbox collapse posbox" id="broker">
						<div class="modal-dialog">
							<div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">ADD BROKER</h4>
						      </div>
						      <div class="modal-body">

								<form action=" '.base_url('Add_user/add_broker/').'" method="post">
								<div class=" col-md-8">
						            <div class="form-group ">
						                <input type="text" name="fname"class="form-control broker_fname" placeholder="First Name" required/>
						            </div>
						        </div>
						       	<div class="col-md-4">
						            <div class="form-group ">
						                <input type="text" name="mname"class="form-control broker_mname" placeholder="Middle Name"/>
						            </div>
						        </div>
						    	<div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="lname"class="form-control broker_lname" placeholder="Last Name" required/>
						            </div>
						    	</div>

						    <div class="">
					            <div class="form-group col-lg-12">
					            <!-- 	<label>HouseBuildingNo/Street</label> -->
					             <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="broker_houseno form-control" required/>
					          </div>
					        </div>
					        <div class="">
					            <div class="form-group col-lg-12">
					            	<!-- <label>Barangay/Village</label> -->
					                <input type="text" name="vilage"  placeholder="Barangay/Village" class="broker_village form-control" required />
					            </div>
					        </div>
					         <div class="">
					            <div class="form-group col-lg-12">
					            	<!-- <label>TownOrCityProvince</label> -->
					                <input type="text" name="city"  placeholder="TownOrCityProvince" class="broker_city form-control" required />
					            </div>
					         </div>'?>

					              <div class="">
					            <div class="form-group col-lg-12 " >
					            	<label>Country</label>
					                <!-- <input type="text" name="country"   class="country form-control" required /> -->
					           		<div class="change_select" >
					           			<select name="country" class="form-control">
					           			<?php 
					           			  foreach($countries as $row)
					           			   echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 

					           			?>
					           			</select>
					           		</div>
					            </div>
					        </div>
		<?php	echo'  <div class="">
				            <div class="form-group col-md-12">
				                <input type="text" name="c1" minlength="7" maxlength="15" class="form-control" placeholder="Contact No1" required />
				            </div>
				        </div>
				        <div class="">
				            <div class="form-group col-md-12">
				                <input type="text" name="c2" minlength="7" maxlength="15" class="form-control" placeholder="Contact No2"  />
				            </div>
				        </div>
				 
				        <div class="">
				        	<div class="form-group col-md-12">
				            	<button type="submit" class="pull-right btn btn-default">Submit</button>
				            </div>	
				        </div>
		   	 		</form>
	   	 	      </div>
			      <div class="modal-footer">
	
			      </div>
			    </div>	
			</div>	
		</div>';
}

function vessel(){
  $this->load->model('User');
  $drop = $this->User->dropdown_shipper();

 echo '			<div class="vessels">
 					<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#vessels">ADD VESSEL</button>


				<div class="vessels consig-posbox modal fade" role="dialog" id="vessels">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">ADD NEW VESSEL</h4>
				      </div>
				      <div class="modal-body">
						<form action="'.base_url('Add_user/add_vessel/').'" method="post">
							<div class="">
					            <div class="form-group col-md-12">
					                <input type="text" name="vessels" class="form-control" placeholder="Vessel Name" required/>
					            </div>
					        </div>
					        <div class="">
					            <div class="form-group col-md-12">
					                <input type="text" name="vesno" class="form-control" placeholder="Vessel No." required/>
					            </div>
					        </div>
					        ';?>
					        
				   

					        <div class="">
					            <div class="form-group  col-md-12 myselect">
					            	<label style="margin-left: 10px;"> Shipper : </label>
					               <select name="shipper" class="form-control">
					            	<?php  foreach($drop as $row){  ?> 
					                <option value="<?php echo $row->ShipperId ?>">
					                <?php echo $row->ShipperName ?>
					                </option> 
					             <?php }?>
					               </select>
					            </div>
					        </div>
	
						 
		  <?php   echo'     <div class="">
					        	<div class="form-group col-md-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
						<div class="modal-footer">
				      </div>	
					</div>	
				</div>';
}

function hauler(){
	echo	'<div class="brokers tab-pane">
				<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#broker">ADD HAULERS</button>

					<div class="brokers consig-posbox modal fade" id="broker" role="dialog">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">ADD NEW HAULERS</h4>
					      </div>
					      <div class="modal-body">

							<form action=" '.base_url('Add_user/add_hauler/').'" method="post">
								<div class=" col-md-12">
						            <div class="form-group ">
						                <input type="text" name="hauler_name"class="form-control " placeholder="Hauler Name" required/>
						            </div>
						        </div>
						 
						        <div class="">
						        	<div class="form-group col-md-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						        </div>
				   	 		</form>
				   	 		</div>
				   	 		<div class="modal-footer">
				
					      </div>
					    </div>
					</div>	
				</div>';
}

function shipper(){
 $countries = $this->User->countries();
echo'			<div class="shippers tab-pane">
				<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#shipper">ADD SHIPPER</button>

					<div class="shippers collapse consig-posbox modal fade" id="shipper"  role="dialog">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">ADD NEW SHIPPER</h4>
						      </div>
						      <div class="modal-body">
							<form action="' .base_url('Add_user/add_shipper/').'" method="post">
								<div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="shipper" class="form-control" placeholder="Shipper Name" required/>
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="hbno" class="form-control" placeholder="HouseBuildingNo/Street" required/>
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="vil" class="form-control" placeholder="Barangay/Village" required/>
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="city" class="form-control" placeholder="Town/City/Province" required/>
						            </div>
						        </div>
						   	    <div class="">
						            <div class="form-group col-lg-12 " >
						            	<label>Country</label>
						                <!-- <input type="text" name="country"   class="country form-control" required /> -->
						           		<div class="change_select" >
						           			<select name="country" class="form-control">';?>
						           			<?php 
						           			  foreach($countries as $row)
						           			   echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 
						           			?><?php echo'
						           			</select>
						           		</div>
						            </div>
						        </div>
						        <div class="">
						        	<div class="form-group col-md-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						       </div>
			   	 			</form>
						</div>
			      	<div class="modal-footer">
			      </div>
			    </div>
			</div>
		</div>';
}

function shippercon(){
echo'				<div class="shippers tab-pane">
				<div class=" con-info consig-pos" data-toggle="collapse" data-target="#shippercon" style="cursor:pointer">
					<span style="cursor:pointer">ADD SHIPPER CONTACTS</span>
				</div>
					<div class="shippers consig-posbox collapse" id="shippercon">
					
						<form action="' .base_url('Add_user/add_shippercon/').'" method="post">
								<div class="col-md-12">
						            <div class="form-group ">
						                <input type="text" name="fname"class="form-control" placeholder="First Name" required/>
						            </div>
						        </div>

						       	<div class=" col-md-4">
						            <div class="form-group ">
						                <input type="text" name="mname"class="form-control" placeholder="Middle Name"/>
						            </div>
						        </div>


						       	<div class=" col-md-8">
						            <div class="form-group">
						                <input type="text" name="lname"class="form-control" placeholder="Last Name" required/>
						            </div>
						        </div>

						        <div class=" col-md-6">
						            <div class="form-group ">
						                <input type="text" name="con1" minlength="7" maxlength="15" class="form-control" placeholder="Contact no.1" required/>
						            </div>
						        </div>

						       	<div class="col-md-6">
						            <div class="form-group ">
						                <input type="text" name="con2" minlength="7" maxlength="15" class="form-control" placeholder="Contact no.2"/>
						            </div>
						        </div>
					 
					        <div class="">
					        	<div class="form-group col-md-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
					</div>
				</div>';
}
 
function container(){

echo '			
	<div class="containers tab-pane">
		<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#container">ADD CONTAINERS</button>

		   <div class="citys consig-posbox collapse modal fade" id="container" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">ADD NEW CONTAINERS</h4>
			      </div>
			      <div class="modal-body">

				<form action="' .base_url('Add_user/add_container/').'" method="post">
				<div class="">
		            <div class="form-group col-md-4">
		                <input type="text" name="cno"class="form-control" placeholder="Container No" required/>
		            </div>
		        </div>
		        <div class="">
		            <div class="form-group col-md-12">
		                <input type="text" name="cd" class="form-control" placeholder="Container Description" required />
		            </div>
		        </div>
		        <div class="">
		            <div class="form-group col-md-6">
		                <input type="text" name="cs" class="form-control" placeholder="Container Size" required />
		            </div>
		        </div>

		        <div class="">
		        	<div class="form-group col-md-12">
		            	<button type="submit" class="pull-right btn btn-default">Submit</button>
		            </div>	
		        </div>
   	 		</form>
		      <div class="modal-footer">
		      </div>
		    </div>
		</div>	

	</div>

</div>';
}

function forward(){

echo '			
	<div class="forwards tab-pane">
		<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#forward">ADD FOWARDER</button>

		   <div class="forward consig-posbox modal fade" role="dialog" id="forward">
		   	<div class="modal-dialog">
		      <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">ADD NEW FOWARDER</h4>
			      </div>
			      <div class="modal-body">
					<form action="' .base_url('Add_user/add_forward/').'" method="post">
				        <div class="">
				            <div class="form-group col-md-12">
				                <input type="text" name="forward" class="form-control" placeholder="Forwarder Name" required />
				            </div>
				        </div>
			        <div class="">
			        	<div class="form-group col-md-12">
			            	<button type="submit" class="pull-right btn btn-default">Submit</button>
			            </div>	
			        </div>
	   	 		</form>
	 		  <div class="modal-footer">
	      </div>
	    </div>
	</div>	
</div>
</div>';
}


function legend(){

echo '			
	<div class="forwards tab-pane">
		<button type="button" class="con-info consig-pos" data-toggle="modal" data-target="#forward">ADD Legend</button>

		   <div class="forward consig-posbox modal fade" role="dialog" id="forward">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">ADD Legend</h4>
			      </div>
			      <div class="modal-body">

					<form action="' .base_url('Add_user/add_legend/').'" method="post">
			
			        <div class="">
			            <div class="form-group col-md-12">
			                <input type="text" name="legend" class="form-control" placeholder="Status Name" required />
			            </div>
			        </div>

			        <div class="">
			            <div class="form-group col-md-12">
			                <input type="text" name="descrip" class="form-control" placeholder="Description Name" required />
			            </div>
			        </div>

		        <div class="">
		         	 <label class="color-lg-2">Choose Color</label> 
		            <div class="form-group col-md-12">
		                <input type="color" name="color" class="form-control" placeholder="color" value="#ff0000" required />
		                    <label class="radio-inline">
						      <input type="radio" value="" name="backg">Font
						    </label>
						    <label class="radio-inline">
						      <input type="radio" value="1" name="backg">Background
						    </label>
		            </div>
		        </div>
		  
		        <div class="">
		        	<div class="form-group col-md-12">
		            	<button type="submit" class="pull-right btn btn-default">Submit</button>
		            </div>	
		        </div>
   	 		</form>
	   	 	<div class="modal-footer">

	      </div>
		</div>	

	</div>

</div>';
}




}
?>