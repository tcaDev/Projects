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
   echo '<div class="consignee_existing"> </div>';
	echo 	'<div class="consignees ">
				<button type="button" class="con-info consig-pos btn_add_consignee"  data-toggle="modal" data-target="#consignee" style="cursor:pointer">ADD CONSIGNEE</button>
					<div class="consignees collapse consig-posbox modal fade add_consignee" id="consignee"  role="dialog" data-keyboard="false" data-backdrop="static">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Add New Consignee</h4>
						      </div>
						      <div class="modal-body">
					        
								<form action="'.base_url('Add_user/add_client/').'" method="post">
									<div class="">
							            <div class="form-group col-md-12">
							               <span class="check_consignee col-md-12"> </span>
							                <input type="text" name="cname"class="form-control clear_values_consignee" placeholder="Client Name" onkeyup="check_consignee(this.value)" required/>
							            	</div>
							        </div>
							     	 <div class="">
							            <div class="form-group col-lg-12">
							            <!-- 	<label>HouseBuildingNo/Street</label> -->
							               <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="hbno form-control clear_values_consignee" required/>
							          </div>
							        </div>
							         <div class="">
							            <div class="form-group col-lg-12">
							            	<!-- <label>Barangay/Village</label> -->
							                <input type="text" name="vilage"  placeholder="Barangay/Village" class="vilage form-control clear_values_consignee" required />
							            </div>
							        </div>
							         <div class="">
							            <div class="form-group col-lg-12">
							            	<!-- <label>TownOrCityProvince</label> -->
							                <input type="text" name="city"  placeholder="TownOrCityProvince" class="city form-control clear_values_consignee" required />
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
				                <input type="text" name="OfficeNumber" minlength="7" maxlength="15" class="form-control clear_values_consignee" placeholder="Office Number" required />
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


?>

<script type="text/javascript">
//check if data is alread exists
function check_consignee(consignee){
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('MasterData');?>",
			  	   beforeSend: function() {
							$('.check_consignee').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   				con: consignee
			  	   		 }
	              })
					.done(function(data) {
						 $('.check_consignee').html(data);
					});
}

</script>


<?php
}
 
function broker(){
 $countries=$this->User->countries();
	echo	'<div class="brokers tab-pane">
				<button type="button" class="con-info consig-pos btn_add_broker" data-toggle="modal" data-target="#broker">ADD BROKER</button>

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
						                <input type="text" name="fname" class="form-control broker_fname clear_values_broker" placeholder="First Name" required/>
						            </div>
						        </div>
						       	<div class="col-md-4">
						            <div class="form-group ">
						                <input type="text" name="mname" class="form-control broker_mname clear_values_broker" placeholder="Middle Name"/>
						            </div>
						        </div>
						    	<div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="lname" class="form-control broker_lname clear_values_broker" placeholder="Last Name" required/>
						            </div>
						    	</div>

						    <div class="">
					            <div class="form-group col-lg-12">
					            <!-- 	<label>HouseBuildingNo/Street</label> -->
					             <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="broker_houseno form-control clear_values_broker" required/>
					          </div>
					        </div>
					        <div class="">
					            <div class="form-group col-lg-12">
					            	<!-- <label>Barangay/Village</label> -->
					                <input type="text" name="vilage"  placeholder="Barangay/Village" class="broker_village form-control clear_values_broker" required />
					            </div>
					        </div>
					         <div class="">
					            <div class="form-group col-lg-12">
					            	<!-- <label>TownOrCityProvince</label> -->
					                <input type="text" name="city"  placeholder="TownOrCityProvince" class="broker_city form-control clear_values_broker" required />
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
				                <input type="text" name="c1" minlength="7" class="form-control clear_values_broker" placeholder="Contact Number" required />
				            </div>
				        </div>
				        <div class="">
				            <div class="form-group col-md-12">
				                <input type="text" name="c2" minlength="7" class="form-control clear_values_broker" placeholder="Email Address"  />
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
 					<button type="button" class="con-info consig-pos btn_add_vessel" data-toggle="modal" data-target="#vessels" style="left: 83% !important;width: 15% !important;">ADD SHIPPING LINE/CARRIER</button>


				<div class="vessels consig-posbox modal fade" role="dialog" id="vessels">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">ADD NEW CARRIER</h4>
				      </div>
				      <div class="modal-body" >
						<form action="'.base_url('Add_user/add_carrier/').'" method="post">

					            <div class="form-group col-md-12">
					                <div class="check_carrier"> </div>
					                <input type="text" name="carrier" class="form-control  clear_values_vessel" placeholder="Shipping Line/Carrier" onkeyup="check_carrier(this.value)"required/>
					            </div>
					             <div class="form-group col-md-12">
					                <input type="text" name="address-carrier" class="form-control clear_values_vessel" placeholder="Address" required/>
					            </div>
					             <div class="form-group col-md-12">
					                <input type="text" name="num-carrier" class="form-control clear_values_vessel" placeholder="Office Number" required/>
					            </div>
					  

						       <div class="footer-modal">
						       		<hr>
						           <button type="submit" class="btn btn-default">Submit</button>
						       </div>
			   	 		</form>
			   	 	  </div>
				    </div>	
				   </div>	
				</div>';
?>

<script type="text/javascript">
	
//check if data is alread exists
function check_carrier(carrier){
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('MasterData/carrier');?>",
			  	   beforeSend: function() {
							$('.check_carrier').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   				carrier: carrier
			  	   		 }
	              })
					.done(function(data) {
						 $('.check_carrier').html(data);
					});
}

</script>

<?php

}

function hauler(){
	echo	'<div class="brokers tab-pane">
				<button type="button" class="con-info consig-pos btn_add_hauler" data-toggle="modal" data-target="#broker" style="left: 84% !important;width: 14% !important;">ADD HAULER/TRUCKER</button>

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
						                <div class="check_hauler"> </div>
						                <input type="text" name="hauler_name"class="form-control clear_values_hauler" placeholder="Hauler Name" 
						                 onkeyup="check_hauler(this.value)" required/>
						            </div>
						        </div>
						        <div class=" col-md-12">
						            <div class="form-group ">
						                <input type="text" name="hauler_address"class="form-control clear_values_hauler" placeholder="Hauler Address" required/>
						            </div>
						        </div>
						        <div class=" col-md-12">
						            <div class="form-group ">
						                <input type="text" name="hauler_tin"class="form-control clear_values_hauler"  maxlength="15" placeholder="Hauler TIN" required/>
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

?>


<script type="text/javascript">
	
//check if data is alread exists
function check_hauler(hauler){
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('MasterData/hauler');?>",
			  	   beforeSend: function() {
							$('.check_hauler').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   				hauler: hauler
			  	   		 }
	              })
					.done(function(data) {
						 $('.check_hauler').html(data);
					});
}

</script>





<?php
}

function shipper(){
 $countries = $this->User->countries();
echo '<div class="consignee_existing"> </div>';
echo'			<div class="shippers tab-pane">
				<button type="button" class="con-info consig-pos btn_add_shipper" data-toggle="modal" data-target="#shipper">ADD SHIPPER</button>

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
						                <div class="check_shipper"> </div>
						                <input type="text" name="shipper" class="form-control clear_values_shipper" placeholder="Shipper Name" onkeyup="check_shipper(this.value)"required/>
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="hbno" class="form-control clear_values_shipper" placeholder="HouseBuildingNo/Street" required/>
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="vil" class="form-control clear_values_shipper" placeholder="Barangay/Village" required/>
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-12">
						                <input type="text" name="city" class="form-control clear_values_shipper" placeholder="Town/City/Province" required/>
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
		</div>';?>

<script type="text/javascript">
//check if data is alread exists
function check_shipper(shipper){
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('MasterData/shipper');?>",
			  	   beforeSend: function() {
							$('.check_shipper').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   				shipper: shipper
			  	   		 }
	              })
					.done(function(data) {
						 $('.check_shipper').html(data);
					});
}

</script>


<?php
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
						                <input type="text" name="con1" minlength="7" maxlength="15" class="form-control" placeholder="Contact Number" required/>
						            </div>
						        </div>

						       	<div class="col-md-6">
						            <div class="form-group ">
						                <input type="text" name="con2" minlength="7" maxlength="15" class="form-control" placeholder="Email Address"/>
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
		<button type="button" class="con-info consig-pos btn_add_legend" data-toggle="modal" data-target="#forward">ADD LEGEND</button>

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
			                <input type="text" name="legend" class="form-control clear_values_legend" placeholder="Status Name" required />
			            </div>
			        </div>

			        <div class="">
			            <div class="form-group col-md-12">
			                <input type="text" name="descrip" class="form-control clear_values_legend" placeholder="Description Name" required />
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

function product(){
	echo	'<div class="prod tab-pane">
				<button type="button" class="con-info consig-pos btn_add_product" data-toggle="modal" data-target="#product">ADD COMMODITY</button>

					<div class="products consig-posbox modal fade" id="product" role="dialog">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">ADD NEW COMMODITY</h4>
					      </div>
					      <div class="modal-body">

							<form action=" '.base_url('Add_user/add_product/').'" method="post">
								<div class=" col-md-12">
						            <div class="form-group ">
						                <div class="check_commodity"> </div>
						                <input type="text" name="product_name"class="form-control clear_values_product" placeholder="Commodity Name" onkeyup="check_commodity(this.value)" required/>
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

?>
<script type="text/javascript">
	
//check if data is alread exists
function check_commodity(commodity){
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('MasterData/commodity');?>",
			  	   beforeSend: function() {
							$('.check_commodity').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   				commodity: commodity
			  	   		 }
	              })
					.done(function(data) {
						 $('.check_commodity').html(data);
					});
}

</script>


<?php
}


}




?>