
<style>
.mycolor{

	 background-color: #66FF99 !important;
}
</style>

 <script>
  var content_consignee    = "<?php echo base_url('Login_user/consignee_content')?>";
  var total_consignee      =  "<?php echo $consignee_total; ?>";
  var content_broker       = "<?php echo base_url('Search/search_broker')?>";
  var total_broker         =  "<?php echo $broker_total; ?>";
  var content_shipper      = "<?php echo base_url('Search/search_shipper')?>";
  var total_shipper        =  "<?php echo $shipper_total; ?>";
  var content_vessel       = "<?php echo base_url('Search/search_vessel')?>";
  var total_vessel         =  "<?php echo $vessel_total; ?>";
  var content_hauler       = "<?php echo base_url('Search/search_hauler')?>";
  var total_hauler         =  "<?php echo $hauler_total;  ?>";
/*  var content_forward      = "<?php echo base_url('Search/search_forward')?>";
  var total_forward        =  "<?php echo $forward_total; ?>";*/
  var content_legend       = "<?php echo base_url('Search/search_legend')?>";
  var total_legend         =  "<?php echo $legend_total; ?>";
  var content_product       = "<?php echo base_url('Search/search_product')?>";
  var total_product         =  "<?php echo $product_total; ?>";

 </script>

		
		<!--For  pagination start -->		
		<script type="text/javascript">
				$(document).ready(function() {
				    $(".consigneepage").load(content_consignee);  //initial page number to load
				    $(".pagination_consignee").bootpag({
				        total:total_consignee, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".consigneepage").load(content_consignee, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    	
				    });
				});

				$(document).ready(function() {
				    $(".brokerpage").load(content_broker);  //initial page number to load
				    $(".pagination_broker").bootpag({
				        total:total_broker, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".brokerpage").load(content_broker, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    	
				    });
			
			});

			 $(document).ready(function() {
				    $(".shipperpage").load(content_shipper);  //initial page number to load
				    $(".pagination_shipper").bootpag({
				        total:total_shipper, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".shipperpage").load(content_shipper, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    });
			
			});

		 $(document).ready(function() {
				    $(".vesselpage").load(content_vessel);  //initial page number to load
				    $(".pagination_vessel").bootpag({
				        total:total_vessel, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".vesselpage").load(content_vessel, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    	
				    });
			
			});
			
				 $(document).ready(function() {
				    $(".haulerpage").load(content_hauler);  //initial page number to load
				    $(".pagination_hauler").bootpag({
				        total:total_hauler, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".haulerpage").load(content_hauler, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    	
				    });
			
			});

				
			$(document).ready(function() {
				    $(".legendpage").load(content_legend);  //initial page number to load
				    $(".pagination_legend").bootpag({
				        total:total_legend, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".legendpage").load(content_legend, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    	
				    });
			
			});


			$(document).ready(function() {
				    $(".prodpage").load(content_product);  //initial page number to load
				    $(".pagination_prod").bootpag({
				        total:total_product, // total number of pages
				        page: 1, //initial page
				        maxVisible: 5, //maximum visible links
					    leaps: true,
					    firstLastUse: true,
					    first: 'First',
					    last: 'Last',
					    prev: 'Previous',
					    next: 'Next',
					    wrapClass: 'pagination',
					    activeClass: 'active',
					    disabledClass: 'disabled',
					    nextClass: 'next',
					    prevClass: 'prev',
					    lastClass: 'last',
					    firstClass: 'first'
				    }).on("page", function(e, num){
				        e.preventDefault();
				        location.hash=num;
				       // $(".loading-div").show(); //show loading element
				        //$("#gallery").append('<center><div class="loading-div"><image src="assets/lib/lightbox/images/loading.gif"></div></center>');
				        $(".prodpage").load(content_product, {'page':num});
				        //$(".loading-div").hide(); //show loading element
				    	
				    });
			
			});

		</script>
	     <!--For  pagination end -->

			<div class="con-shiptxt col-lg-12">
				<div class="col-lg-10">
					<ul class="nav nav-pills pull-left">
				    <li class="active"><a data-toggle="pill" href=".consignee"  id="form_consignee">Consignee</a></li>
				    <li><a data-toggle="tab" href=".broker" 					id="form_broker">Broker</a></li>
				    <li><a data-toggle="tab" href=".shipper"					id="form_shipper">Shipper</a></li>
				    <li><a data-toggle="tab" href=".vessel"						id="form_vessel">Shipping Line/Carrier</a></li>
				    <li><a data-toggle="tab" href=".haulers"					id="form_haulers">Hauler/Trucker</a></li>
				    <li class="hidden"><a data-toggle="tab" href=".forward"		id="form_forward">Forwarder</a></li>
				    <li><a data-toggle="tab" href=".prod"				    	id="form_product">Commodity</a></li>
				    <li><a data-toggle="tab" href=".legendss"				    id="form_legend">Legend</a></li>
			
		<!-- 		    <li><a data-toggle="tab" href=".shippercon"			    id="form_shipper_contacts">Shipper Contacts</a></li> -->
				  </ul>
				</div>
				  <div class="col-lg-2">
				  	<div class="input-group pull-right">
			            <input type="text" class="form-control consignee_tab"    id="search" placeholder="Search" />
			            <span class="input-group-btn">
			                <button class="btn" type="button"  onclick="search()" class="submit_consignee" id="submit_search">
			                    <span class=" glyphicon glyphicon-search"></span>
			                </button>
			            </span>
			        </div>
			      </div>  
		    </div>

            <div class="con-ship tab-content"> 
               <!--FOr consignee data view  start--> 
                  <div class="consignee tab-pane fade in active"> 
                  <div class="pagination_consignee pull-right"></div>
                  <div class="consigneepage" > </div>
                  </div>
			    <!--FOr consignee data view  end-->

			    <!--FOr BROKER data view  start--> 
			    <div class="tab-pane fade broker">
			      <div class="pagination_broker pull-right"> </div>
			      <div class="brokerpage"> </div>
			    </div>
			     <!--FOr BROKER data view  END-->

			      <!--FOr vessel data view  start--> 
			    <div  class="vessel tab-pane fade">
			      <div class="pagination_vessel pull-right"> </div>
			 	  <div class="vesselpage"> </div>
			    </div>
			       <!--FOr vessel data view  end--> 

				 <!--FOr Hauler data view  start--> 
			    <div  class="haulers tab-pane fade">
			      <div class="pagination_hauler pull-right"> </div>
			 	  <div class="haulerpage"> </div>
			    </div>
			       <!--FOr Hauler data view  end--> 

			      <!--FOr forward data view  start--> 
			    <div  class="forward tab-pane fade">
			      <div class="pagination_forward pull-right"> </div>
			 	  <div class="forwardpage"> </div>
			    </div>
			       <!--FOr forward data view  end--> 


			    <!--FOr legend data view  start--> 
			    <div  class="legendss tab-pane fade">
			      <div class="pagination_legend pull-right"> </div>
			 	  <div class="legendpage"> </div>
			    </div>
			       <!--FOr legend data view  end--> 

			    <!--FOr Products data view  start--> 
			    <div  class="prod tab-pane fade">
			      <div class="pagination_prod pull-right"> </div>
			 	  <div class="prodpage"> </div>
			    </div>
			       <!--FOr Products data view  end--> 


		        <!--FOr shipper data view  start--> 
			    <div  class="tab-pane fade shipper">
			      <div class="pagination_shipper pull-right"> </div>
				  <div class="shipperpage"> </div>
			    </div>
			     <!--FOr shipper data view  end-->

			  </div>
		</div>	

			<div class="" id="mycontent">
				<div class="consignees ">
				<button type="button" class="con-info consig-pos " data-toggle="modal" data-target="#consignee">ADD CONSIGNEE</button>

					<div class="consignees collapse modal fade consig-posbox add_consignee" id="consignee">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">ADD NEW CONSIGNEE</h4>
					      </div>
					      <div class="modal-body">
						<form action="<?php echo base_url('Add_user/add_client/');?>" method="post">
							<div class="">
					            <div class="form-group col-lg-12">          	
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
					        </div>
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
		      	<div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>

				<!--For Pop up update -->
		 <!-- Modal  for Consignee start-->
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
					               <input type="text"   name="consig_name"  class="consignee_name form-control" required/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>HouseBuildingNo/Street</label>
					               <input type="text"   name="hbno"  class="hbno form-control" required/>
					            </div>
					        </div>
					         <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Barangay/Village</label>
					                <input type="text" name="vilage"   class="vilage form-control" required />
					            </div>
					        </div>
					         <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>TownOrCityProvince</label>
					                <input type="text" name="city"   class="city form-control" required />
					            </div>
					        </div>
					         <div class="row">
					            <div class="form-group col-lg-12 " >
					            	<label>Countries</label>
					                <!-- <input type="text" name="country"   class="country form-control" required /> -->
					           		<div class="change_select">
					         		    <select name="country" class="form-control">
					           			   <?php 
					           			     foreach($countries as $row)
					           			      echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 
					           			    ?>
					           		   </select>  			
					           		</div>
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
					        	<div class="modal-footer form-group col-lg-12">
					        		<button type="submit" class="btn btn-default">Submit</button>
					        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
					            </div>	
					        </div>
			   	 		</form>


				        </div>
				      </div>
				    </div>
				  </div>

				   <!--pop up for viewing/editing  contacts start -->
				   		  <div class="modal fade" id="modal_view_consignee_contact" role="dialog"></div>
				   <!--pop up for viewing/editing end -->

		  <!-- Modal FOr adding consignee contacts start-->
			<div class="modal fade" id="modal_add_consignee_contact" role="dialog">
				  <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Add Consignee Contacts</h4>
				        </div>
				        <div class="modal-body">
		       		<?php echo form_open('Add_user/add_consigneecon');?>
				            <input type="hidden" name="consig_id" value="" class="consig_id form-control"/>
							
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>First Name</label>
					               <input type="text" name="fname_contact" value="" class="fname_contact form-control" required/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Middle Name</label>
					               <input type="text" name="mname_contact" value="" class="mname_contact form-control"/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Last Name</label>
					               <input type="text" name="lname_contact" value="" class="lname_contact form-control" required/>
					            </div>
					        </div>

					         <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Contact Number</label>
					               <input type="text" name="no_contact1" value=""  class="no_contact form-control" required/>
					            </div>
					        </div>

					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Email Address</label>
					               <input type="text" name="no_contact2"  value="" class="no1_contact form-control" />
					            </div>
					        </div>

					
					        <div class="row">
					        	<div class="modal-footer form-group col-lg-12">
					        		<button type="submit" class="btn btn-default">Submit</button>
					        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
					            </div>	
					        </div>
			   	 	<?php echo form_close();?>
				        </div>
				        <div class="">

				        </div>
				      </div>      
				 </div>
			</div>
		<!-- Modal FOr adding consignee contacts end-->


		<!-- Modal  for Consignee end-->





				  				  <!-- Modal FOr vessel
				  				  -->
				  <div class="modal fade" id="modal_update_vessel" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Shipping Line/ Carrier Information</h4>
				        </div>
				        <div class="modal-body">
				       <?php echo form_open('Update/update_vessel/');?>
				          	  <input type="hidden" name="ves_id"      class="vessel_id" />
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Shipping Line/ Carrier</label>
					               <input type="text"   name="ves_name"  class="vessel_name form-control" />
					            </div>

					            <div class="form-group col-lg-12">
					            	<label>Address</label>
					               <input type="text"   name="address_carrier"  class="address_carrier form-control" />
					            </div>
					            <div class="form-group col-lg-12">
					            	<label>Office Number</label>
					               <input type="text"   name="number_carrier"  class="number_carrier form-control" />
					            </div>
					        </div>
					        <div class="col-lg-12">
					        	<label>Status: </label>
						        <div class="radio">
								  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
								</div>
								 <div class="radio">
								   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
								 </div>
					        </div>
					  
					        <div class="row">
					        	<div class="modal-footer form-group col-lg-12">
					        		<button type="submit" class="btn btn-default">Submit</button>
					        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
					            </div>	
					        </div>
					 <?php echo form_close();?>
				        </div>
				     
				        <div class="">
				          
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
		        	<?php echo  form_open('Update/update_shipper/'); ?>
				            <input type="hidden" name="ship_id" value='' class="ship_id form-control"/>
							
							<div class="">
					            <div class="form-group col-lg-12">
					            	<label>Shipper Name</label>
					               <input type="text" name="ship_name" placeholder="Shipper Name" value="" class="shipper_name form-control" required/>
					            </div>
					        </div>
					 		<div class="">
					           <div class="form-group col-lg-12">
					            	<label>HouseBuildingNo/Street</label>
					               <input type="text"   name="hbno" placeholder="HouseBuildingNo/Street" class="hbno form-control"/>
					          </div>
					        </div>
					         <div class="">
					            <div class="form-group col-lg-12">
					            	<label>Barangay/Village</label>
					                <input type="text" name="vilage"  placeholder="Barangay/Village" class="vilage form-control" required />
					            </div>
					        </div>
					         <div class="">
					            <div class="form-group col-lg-12">
					            	<label>TownOrCityProvince</label>
					                <input type="text" name="city"  placeholder="TownOrCityProvince" class="city form-control" required />
					            </div>
					         </div>
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
					        <div class="col-lg-12">
					        	<label>Status: </label>
						        <div class="radio">
								  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
								</div>
								 <div class="radio">
								   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
								 </div>
					        </div>
					        <div class="row">
					        	<div class="modal-footer form-group col-lg-12">
					        		<button type="submit" class="btn btn-default">Submit</button>
					        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
					            </div>	
					        </div>
			   	    </form>
				        </div>
				        <div class="">
				          
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
				        <?php echo form_open('Update/update_broker');?>
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
					            	<label>HouseBuildingNo</label>
					               <input type="text"   name="houseno" value="" class="broker_houseno form-control"/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Barangay/Village</label>
					               <input type="text"   name="village" value="" class="broker_village form-control"/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Town/City/Province</label>
					               <input type="text"   name="city" value="" class="broker_city form-control"/>
					            </div>
					       </div>
					 
					        <input type="text"   name="countryid" value="" class=" hidden broker_countryid form-control"/>
					        
					       <div class="row">
					          <div class="form-group col-lg-12 change_select" >
					            	<label>Countries</label>
					              <!--   <input type="text" name="country"   class="broker_country form-control" required /> -->
					           		<div class="change_select">
					           		   <select name="country" class="form-control">
					           			   <?php 
					           			    foreach($countries as $row)
					           			     echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 
					           			    ?>
					           			</select>
					           		 </div>
					            </div>
					       </div>
					       <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Contact Number</label>
					               <input type="text"   name="c1" value="" class="broker_c1 form-control"/>
					            </div>
					       </div>
					       <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Email Address</label>
					               <input type="text"   name="c2" value="" class="broker_c2 form-control"/>
					            </div>
					       </div>
					   
					        <div class="col-lg-12">
					        	<label>Status: </label>
						        <div class="radio">
								  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
								</div>
								 <div class="radio">
								   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
								 </div>
					        </div>
					         <div class="row">
					        	<div class="modal-footer form-group col-lg-12">
					        		<button type="submit" class="btn btn-default">Submit</button>
					        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
					            </div>	
					        </div>
					     </form>
						</div>
						 <div class="">
				          
				        </div>
					</div>
				</div>
		</div>

	<!-- Modal FOr shippercontacts-->
	  <div class="modal fade" id="modal_shippercontacts" role="dialog">
	  </div>

	  	  <!-- Modal FOr vessels under shippers-->
	  <div class="modal fade" id="modal_vessels" role="dialog">
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
       		<?php echo form_open('Add_user/add_shippercon');?>
		            <input type="hidden" name="shipper_id" value="" class="shipper_id form-control"/>
					
					<div class="row">
			            <div class="form-group col-lg-12">
			            	<label>First Name</label>
			               <input type="text" name="fname_contact" value="" class="fname_contact form-control" required/>
			            </div>
			        </div>

			        <div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Middle Name</label>
			               <input type="text" name="mname_contact" value="" class="mname_contact form-control"/>
			            </div>
			        </div>

			        <div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Last Name</label>
			               <input type="text" name="lname_contact" value="" class="lname_contact form-control" required/>
			            </div>
			        </div>

			         <div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Contact Number</label>
			               <input type="text" name="no_contact1" value="" class="no_contact form-control" required/>
			            </div>
			        </div>

			        <div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Email Address</label>
			               <input type="text" name="no_contact2"  value="" class="no1_contact form-control"/>
			            </div>
			        </div>


			
			        <div class="row">
			        	<div class="modal-footer form-group col-lg-12">
			        		<button type="submit" class="btn btn-default">Submit</button>
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
			            </div>	
			        </div>
	   	 	<?php echo form_close();?>
		        </div>
		        <div class="">
		        </div>
		      </div>      
		 </div>'
	</div>



	<!--Modal for updating haulers -->
  		
	  <div class="modal fade" id="modal_update_hauler" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Hauler Information</h4>
	        </div>
	        <div class="modal-body">
	       <?php echo form_open('Update/update_hauler/');?>
	          	  <input type="hidden" name="hauler_id"      class="hauler_id" />
				<div class="row">
		            <div class="form-group col-lg-12">
		            	<label>Hauler /Trucker</label>
		               <input type="text"   name="hauler_name"  class="hauler_name form-control" required/>
		            </div>
		            <div class="form-group col-lg-12">
		            	<label>Address</label>
		               <input type="text"   name="hauler_address"  class="hauler_address form-control" required/>
		            </div>
		            <div class="form-group col-lg-12">
		            	<label>TIN</label>
		               <input type="text"   name="hauler_tin" maxlength="15" class="hauler_tin form-control" required/>
		            </div>
		        </div>
		        <div class="col-lg-12">
		        	<label>Status: </label>
			        <div class="radio">
					  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
					</div>
					 <div class="radio">
					   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
					 </div>
		        </div>
		        <div class="row">
		        	<div class="modal-footer form-group col-lg-12">
		        		<button type="submit" class="btn btn-default">Submit</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
		            </div>	
		        </div>
		 <?php echo form_close();?>
	        </div>
	        <div class="">
	        </div>
	      </div>
	    </div>
	  </div>


		<div class="modal fade" id="modal_update_forward" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Forward Information</h4>
		        </div>
		        <div class="modal-body">
		       <?php echo form_open('Update/update_forward/');?>
		          	  <input type="hidden" name="forward_id"      class="forward_ids" />
					<div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Forwarder Warehouse Name</label>
			               <input type="text"   name="forward_name"  class="forward_names form-control" required/>
			            </div>
			        </div>
			        <div class="col-lg-12">
			        	<label>Status: </label>
				        <div class="radio">
						  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
						</div>
						 <div class="radio">
						   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
						 </div>
			        </div>
			        <div class="row">
			        	<div class="modal-footer form-group col-lg-12">
			        		<button type="submit" class="btn btn-default">Submit</button>
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
			            </div>	
			        </div>
			 	<?php echo form_close();?>
		        </div>
		        <div class="">
		        </div>
		      </div>
		    </div>
	    </div>


	    <div class="modal fade" id="modal_update_legend" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Legend Information</h4>
		        </div>
		        <div class="modal-body">
		       		<?php echo form_open('Update/update_legend/');?>
		          	<input type="hidden" name="legend_id"      class="legend_id" />
					<div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Status Name</label>
			               <input type="text"   name="name"  class="legend_status form-control" required/>
			            </div>
			        </div>
			        <div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Description Name</label>
			               <input type="text"   name="legend_descrip"  class="legend_descrip form-control" required/>
			            </div>
			        </div>
			        <div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Choose Color</label>
			               <input type="color"   name="legend_color"  class="legend_color form-control" required/>
			                <label class="radio-inline">
						      <input type="radio"  name="legend_bacg" class="legend_bacg" value="0">Font
						    </label>
						    <label class="radio-inline">
						      <input type="radio"  name="legend_bacg" class="legend_bacg" value="1">Background
						    </label>
			            </div>
			        </div>
			        <div class="col-lg-12">
			        	<label>Status: </label>
				        <div class="radio">
						  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
						</div>
						 <div class="radio">
						   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
						 </div>
			        </div>
			        <div class="row">
			        	<div class="modal-footer form-group col-lg-12">
			        		<button type="submit" class="btn btn-default">Submit</button>
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
			            </div>	
			        </div>
			 <?php echo form_close();?>
		        </div>
		     
		        <div class="">
		        </div>
		      </div>
		    </div>
	    </div>


		<!--Modal for updating products -->
		<div class="modal fade" id="modal_update_products" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Commodity Information</h4>
		        </div>
		        <div class="modal-body">
		       <?php echo form_open('Update/update_products/');?>
		          	  <input type="hidden" name="prod_id"      class="prod_id" />
					<div class="row">
			            <div class="form-group col-lg-12">
			            	<label>Commodity Name</label>
			               <input type="text"   name="prod_name"  class="prod_name form-control" required/>
			            </div>
			        </div>
			        <div class="col-lg-12">
			        	<label>Status: </label>
				        <div class="radio">
						  <label><input type="radio" name="status" class="activate  " value="1">activated</label>
						</div>
						 <div class="radio">
						   <label><input type="radio"name="status" class="deactivate " value="0">deactivated</label>
						 </div>
			        </div>
			        <div class="row">
			        	<div class="modal-footer form-group col-lg-12">
			        		<button type="submit" class="btn btn-default">Submit</button>
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
			            </div>	
			        </div>
			 <?php echo form_close();?>
		        </div>
		        <div class="">
		        </div>
		      </div>
		    </div>
		</div>

		<div class="modal fade" id="modal_update_container" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Container Information</h4>
					        </div>
					        <div class="modal-body">
					       		<?php echo form_open('Update/update_container/');?>
					          	<input type="hidden" name="container_id"      class="container_id" />
								<div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Container No.</label>
						               <input type="text"   name="con"  class="con form-control" required/>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Container Description</label>
						               <input type="text"  name="con_descrip"  class="con_descrip form-control" required/>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Container Size</label>
						               <input type="text" name="con_size"  class="con_size form-control" required/>
						            
						            </div>
						        </div>
						        <div class="row">
						        	<div class="modal-footer form-group col-lg-12">
						        		<button type="submit" class="btn btn-default">Submit</button>
						        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
						            </div>	
						        </div>
						 	<?php echo form_close();?>
					        </div>
					     
					        <div class="">
				      </div>
			      </div>
			  </div>
		</div>