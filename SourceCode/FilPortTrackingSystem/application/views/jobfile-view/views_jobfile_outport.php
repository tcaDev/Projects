 <script>
  var content_outport    = "<?php echo base_url('Pagination/pagination_outport')?>";
  var total_outport_page     =  "<?php echo $count_total_outport_page; ?>";
 </script>


 		<!--For  pagination start -->		
		<script type="text/javascript">
	$('.sea_outport_tab').click(function(){
		 jbfl='';
		 search_outport(jbfl);
		
				$(document).ready(function() {
				    $(".outport_pagination").load(content_outport);  //initial page number to load
				    $(".out_pages").bootpag({
				        total:total_outport_page, // total number of pages
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
				        $('.outport_pagination').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
				        $(".outport_pagination").load(content_outport, {'page':num});
				    	
				    });
				});
    });


       </script>

<div class="row">
		<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_outport">Search:</label>

					  
					  	<input type="hidden" class="outport_total">
					         <div class="input-group">
     						   <input type="text" class="form-control" id="search_outport" placeholder="Search for...">
     						     <span class="input-group-btn">
      						     <button class="btn btn-default search_outport_jobfile" type="button"><span class="fa fa-search fa-fw"></span></button>
						      </span>
						   </div>
			 		</div>

				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 pull-right" style="padding: 20px;">

					<div class="row">

						<!-- Update -->

					<!-- Trigger the modal with a button -->
			  <!-- Modal -->

					   <div class="modal fade" id="myModal-2-1" role="dialog" data-backdrop="static" data-keyboard="false">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->


					      	<?php $this->load->view('jobfile-view/views_jobfile_outport_updateData'); ?>

					      
					    </div>

					  </div> 



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					<button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-2-2" style="margin-right: 10px;"><span class="fa fa-plus fa-fw"></span> Add Data</button>

					  <!-- Modal -->

						   <div class="modal fade" id="myModal-2-2" role="dialog" data-backdrop="static" data-keyboard="false">

					    <div class="modal-dialog">

					      <!-- Modal content-->

					      <?php $this->load->view('jobfile-view/views_jobfile_outport_addData'); ?>				      

					    </div>

					  </div> 

					</div>

				</div>

			 </div>

				



			<div class="wrapper" style= "overflow-y:auto;height:485px;width:100%;position:relative;">
				<div class="job-outport outport_pagination"></div>
			 </div>
			 <div class="out_pages"></div>
		  	</div>
		 </div>


<!--pop up for viewvessels start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewvessels-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Vessels</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_vessels_outport"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_outport_update_vessel hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

		<!--pop up for goods start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewgoods-outport"  data-backdrop="static" data-keyboard="false"role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Commodity</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_products_outport"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_outport_update_product hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

				<!--pop up for Status Report -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="statrepo-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Status Report</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_status_outport"> </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>	


		<!--pop up for containers start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewcontainers-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog" style="width: 65%;">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Containers</h4>
				        </div>
				        <div class="modal-body">
				        	<div style='overflow-x:auto;'>	
				            	<div class="list_conts_outport"> </div>
				            </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_outport_update hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

			<!--pop up for Running Charges start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="runchar-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Running Charges</h4>
				          <h2 style="font-size:18px;font-family:Segoe UI"><b> Jobfile No: </b> <span class="jbNo-outport"> </span> </h2>
				        </div>
				        <div class="modal-body">
				            <div class="list_charges_outport"> </div>

				        </div>
				        <div class="footer-modal">
				        <hr>
				        	<button type="button" class="btn btn-danger update_charges-outport-qwerty">Update</button>

				        	<button type="button" class="btn btn-danger update_charges-outport" disabled>Save</button>

				          <button type="button" class="btn btn-danger btn-close-outport" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>
<script>
   //for update charges

$(document).ready(function(){


   $(document).on('click','.btn-Container-outport',function(){
   		$('.list_conts_outport').html('<div class="list_conts_outport"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Containers </div>');
   });
    $(document).on('click','.btn-Goods-outport',function(){
   		$('.list_products_outport').html('<div class="list_products_outport"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });
     $(document).on('click','.btn-Vessel-outport',function(){
   		$('.list_vessels_outport').html('<div class="list_vessels_outport"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Vessels </div>');
   });
      $(document).on('click','.btn-StatusReport-outport',function(){
   		$('.list_status_outport').html('<div class="list_status_outport"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });
       $(document).on('click','.runchar-outport',function(){
   		$('.list_charges_outport').html('<div class="list_charges_outport"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Charges </div>');
   });

var jbfl_outport;
	$(document).on('click','.runchar-outport',function(){
			var jobfile = $(this).closest('tr').children('td:eq(2)').text();
			jbfl_outport = jobfile;
			$('.jbNo-outport').html(' <span class="jbNo-outport">' + jbfl_outport + '</span> ');
	});

	$(document).on('click','.btn-close-outport',function(){
			$('.update_charges-outport-qwerty').removeAttr('disabled');
			$('.update_charges-outport').attr('disabled','disabled');
	});

	$(document).on('click','.update_charges-outport-qwerty',function(){
			$('#runchar-outport .lodge_update').removeAttr('disabled');
			$('#runchar-outport .cont-deposit').removeAttr('disabled');
			$('#runchar-outport .thc-charges').removeAttr('disabled');
			$('#runchar-outport .arrastre').removeAttr('disabled');
			$('#runchar-outport .wharfage').removeAttr('disabled');
			$('#runchar-outport .weight').removeAttr('disabled');
			$('#runchar-outport .del').removeAttr('disabled');
			$('#runchar-outport .dispatch').removeAttr('disabled');
			$('#runchar-outport .storage').removeAttr('disabled');
			$('#runchar-outport .demurrage').removeAttr('disabled');
			$('#runchar-outport .detention').removeAttr('disabled');			
			$('#runchar-outport .EIC').removeAttr('disabled');
			$('#runchar-outport .bai-app').removeAttr('disabled');
			$('#runchar-outport .bai-inspect').removeAttr('disabled');
			$('#runchar-outport .sra-app').removeAttr('disabled');
			$('#runchar-outport .sra-inspect').removeAttr('disabled');
			$('#runchar-outport .bad-cargo').removeAttr('disabled');
			$('#runchar-outport .bpi').removeAttr('disabled');
			$('#runchar-outport .reefer').removeAttr('disabled');
			$('#runchar-outport .otherfee').removeAttr('disabled');

			$('.update_charges-outport').removeAttr('disabled');
			$(this).attr('disabled','disabled');
	});

//check  if num or not
              $(document).on('keypress','.checkDec',function (e) {
					  if(event.which < 46
					    || event.which > 59) {
					        event.preventDefault();
					    } // prevent if not number/dot

					    if(event.which == 46
					    && $(this).val().indexOf('.') != -1) {
					        event.preventDefault();
					    } // prevent if already dot

               });

   $(document).on('click','.update_charges-outport',function(){
     var lodge        = $('#runchar-outport .lodge_update').val().replace(/,/g,'');
     var cont_deposit = $('#runchar-outport .cont-deposit').val().replace(/,/g,'');
     var thc_charges  = $('#runchar-outport .thc-charges').val().replace(/,/g,'');
     var arrastre     = $('#runchar-outport .arrastre').val().replace(/,/g,'');
     var wharfage     = $('#runchar-outport .wharfage').val().replace(/,/g,'');
     var weight       = $('#runchar-outport .weight').val().replace(/,/g,'');
     var del          = $('#runchar-outport .del').val().replace(/,/g,'');
     var dispatch     = $('#runchar-outport .dispatch').val().replace(/,/g,'');
     var storage      = $('#runchar-outport .storage').val().replace(/,/g,'');
     var demurrage    = $('#runchar-outport .demurrage').val().replace(/,/g,'');
     var detention    = $('#runchar-outport .detention').val().replace(/,/g,'');
     var eic 		  = $('#runchar-outport .EIC').val().replace(/,/g,'');
     var bai_app 	  = $('#runchar-outport .bai-app').val().replace(/,/g,'');
     var bai_inspect  = $('#runchar-outport .bai-inspect').val().replace(/,/g,'');
     var sra_app 	  = $('#runchar-outport .sra-app').val().replace(/,/g,'');
     var sra_inspect  = $('#runchar-outport .sra-inspect').val().replace(/,/g,'');
     var bad_cargo    = $('#runchar-outport .bad-cargo').val().replace(/,/g,'');
     var bpi  = $('#runchar-outport .bpi').val().replace(/,/g,'');
     var reefer    = $('#runchar-outport .reefer').val().replace(/,/g,'');
     var otherfee    = $('#runchar-outport .otherfee').val().replace(/,/g,'');

		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job/jobfile_add_charge');?>",
	 		       beforeSend: function() {
					 	  dia_running_charges =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-pulse',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating Running Charges',
				   			});
 					  },
			  	   data: {
			  	   	           jbfl   		:jbfl_outport,
			  	   			   lodge        :lodge,
			                   cont_deposit :cont_deposit,   
			                   thc_charges  :thc_charges,
			                   wharfage     :wharfage,
			                   arrastre     :arrastre,
			                   weight	    :weight,
			                   del			:del,
			                   dispatch     :dispatch,
			                   storage      :storage,
			                   demurrage    :demurrage,
			                   detention    :detention,
			                   eic          :eic,
			                   bai_app      :bai_app,
			                   bai_inspect  :bai_inspect,
			                   sra_app      :sra_app,
			                   sra_inspect  :sra_inspect,
			                   bad_cargo    :bad_cargo,
			                   bpi 			: bpi,
			                   reefer 		: reefer,
			                   otherfee 	: otherfee

			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Running Charges Updated!',
				        		confirm: function(){
									dia_running_charges.close();
									$('.update_charges-outport-qwerty').removeAttr('disabled');
									$('.update_charges-outport').attr('disabled','disabled');
				        			$('#runchar-outport').modal('hide');
				        	    }
				   			   });
	    		    })
  });
 $(document).on('change',' .checkDec',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var newInp = inp.replace(/,/g,'');
 		var holders = newInp.toString().split('.');
 		var n = newInp.indexOf('.');
 		if(n < 0){
 			holders[0] =  numeral(holders[0]).format('0,0.00');
 			$('#runchar-outport #' + holder).val(holders.join('.'));
 		}else{
 			holders[0] =  numeral(holders[0]).format('0,0');
 			holders[1] =  numeral("0." + holders[1]).format('.000');
 			$('#runchar-outport #' + holder).val(holders.join(''));
 		}
 		if(inp.trim() == ""){
 			$('#runchar-outport #' + holder).val('0.00');
 		}
 	});
 });
  
   </script>
                        
                <!--Add Container Outport -->

                          <!-- Modal -->
                          <div class="modal fade" id="addContainer-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" >

                              <!-- Modal content-->
                                <?php $this->load->view('jobfile-view/add-outport-container/add_Container_outport'); ?>

                            </div>
                         </div>

                <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-outport-container/add_Product_outport'); ?>
				      	
				    </div>
				 </div>

				<!--Add Vessel when Adding New vessel  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addVessel-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-outport-container/add_Vessel_outport'); ?>
				      	
				    </div>
				 </div>

			 <!--Add Report when Adding New Container  -->
		
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-outport" tabindex="-1" data-replace="true"  style="display: none;" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-outport-container/add_Report_outport'); ?>
				      	
				    </div>
				 </div>

<!-- Update Modals -->

			<!--Update Container  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateContainer-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-outport-container/update_Container_outport'); ?>
					      	
					    </div>
					 </div>

			<!--Update product  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateProduct-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-outport-container/update_Product_outport'); ?>
					      	
					    </div>
					 </div>

			<!--Update Vessel  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateVessel-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-outport-container/update_Vessel_outport'); ?>
					      	
					    </div>
					 </div>
      
<script>
$('.search_outport_jobfile').click(function(){
 var jbfl = $('#search_outport').val();
 search_outport(jbfl);
});

//trigger on key enter
$(document).on('keydown','#search_outport',function(e){
			 if (e.keyCode == 13){
   	  	  $('.search_outport_jobfile').click();
		  	 }
});
	//for search
	function search_outport(jbfl){

    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Pagination/pagination_outport');?>",
			  	   beforeSend: function() {
							$('.job-outport').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   			   montype  		   :2,
			  	   	           jobfile   		   :jbfl
			  	   		 }
	              })
					.done(function(data) {
						$('.job-outport').html(data);
	  		    });
    }
</script>

<!--for reports update -->
<div class="modal fade " id="updateReport-outport" role="dialog">
    <div class="modal-dialog modal-lg">		      
		<?php $this->load->view('jobfile-view/add-outport-container/update_Report_outport'); ?>
    </div>
 </div>



