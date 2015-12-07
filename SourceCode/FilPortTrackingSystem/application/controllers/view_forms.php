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
				<div class="con-info consig-pos "  data-toggle="collapse" data-target="#consignee" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW CONSIGNEE</span>
				</div>
					<div class="consignees collapse consig-posbox add_consignee" id="consignee">
						<form action="'.base_url('add_user/add_client/').'" method="post">
							<div class="">
					            <div class="form-group col-md-12">
					                <input type="text" name="cname"class="form-control" placeholder="Client Name" required/>
					            </div>
					        </div>
					     	 <div class="">
					            <div class="form-group col-lg-12">
					            <!-- 	<label>HouseBuildingNo/Street</label> -->
					               <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="hbno form-control"/>
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
					            	<label>Countries</label>
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
					</div>
				</div>';

/*echo form_close();*/

}
 
function broker(){
 $countries=$this->User->countries();
	echo	'<div class="brokers tab-pane">
				<div class="con-info consig-pos tab-pane" data-toggle="collapse" data-target="#broker"  style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW BROKER</span>
				</div>
					<div class="brokers consig consig-posbox collapse posbox" id="broker">
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
					             <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="broker_houseno form-control"/>
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
					            	<label>Countries</label>
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


				<?php		echo'  <div class="">
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
				</div>';
}

function vessel(){
  $this->load->model('User');
  $drop = $this->User->dropdown_shipper();

 echo '			<div class="vessels">
					<div class="  con-info consig-pos" data-toggle="collapse" data-target="#vessels"  style="cursor:pointer">
						<span style="cursor:pointer">ADD NEW VESSEL</span>
				</div>
				<div class="vessels consig-posbox collapse" id="vessels">
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
				<script type="text/javascript" src="<?php echo base_url('resources/dropdown/jquery.searchabledropdown-1.0.8.min.js'); ?>"></script>	        
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
<script>
$(document).ready(function() {
    $("select.myselect").searchable({
        maxListSize: 10,                       // if list size are less than maxListSize, show them all
        maxMultiMatch: 10,                      // how many matching entries should be displayed
        exactMatch: false,                      // Exact matching on search

        wildcards: true,                        // Support for wildcard characters (*, ?)
        ignoreCase: true,                       // Ignore case sensitivity
        latency: 200,                           // how many millis to wait until starting search
        warnMultiMatch: 'top {0} matches ...',  // string to append to a list of entries cut short by maxMultiMatch
        warnNoMatch: 'no matches ...',          // string to show in the list when no entries match
        zIndex: 'auto'                          // zIndex for elements generated by this plugin
    });
});
</script>

        

					 
		  <?php   echo'     <div class="">
					        	<div class="form-group col-md-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
					</div>	
				</div>';
}

function shipper(){
echo'				<div class="shippers tab-pane">
				<div class=" con-info consig-pos" data-toggle="collapse" data-target="#shipper" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW SHIPPER</span>
				</div>
					<div class="shippers collapse consig-posbox " id="shipper">
						<form action="' .base_url('Add_user/add_shipper/').'" method="post">
							<div class="">
					            <div class="form-group col-md-12">
					                <input type="text" name="shipper" class="form-control" placeholder="Shipper Name" required/>
					            </div>
					        </div>
					        <div class="col-md-12">
						            <div class="form-group ">
						              <label>Shipper Contacts</label>
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
						                <input type="text" name="con1"class="form-control" minlength="7" maxlength="15"  placeholder="Contact no.1" required/>
						            </div>
						        </div>

						       	<div class="col-md-6">
						            <div class="form-group ">
						                <input type="text" name="con2"class="form-control" minlength="7" maxlength="15"  placeholder="Contact no.2"/>
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

function shippercon(){
echo'				<div class="shippers tab-pane">
				<div class=" con-info consig-pos" data-toggle="collapse" data-target="#shippercon" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW SHIPPER CONTACTS</span>
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
					<div class="  con-info consig-pos"  data-toggle="collapse" data-target="#container" style="cursor:pointer">
						<span style="cursor:pointer" >ADD NEW CONTAINERS</span>
					</div>
						<div class="citys consig-posbox collapse" id="container">
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
						            <div class="form-group col-md-6">
						                <input type="text" name="ncs" class="form-control" placeholder="No of Cartons" required />
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-6">
						                <input type="text" name="tp" class="form-control" placeholder="Trucker Plate No" required />
						            </div>
						        </div>
						        <div class="">
						            <div class="form-group col-md-6">
						                <input type="text" name="tname" class="form-control" placeholder="Trucker Name" required />
						            </div>
						        </div>

						        <div class="">
						        	<div class="form-group col-md-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						        </div>
				   	 		</form>
					</div>	

				</div>

			</div>';


	
}




}
?>