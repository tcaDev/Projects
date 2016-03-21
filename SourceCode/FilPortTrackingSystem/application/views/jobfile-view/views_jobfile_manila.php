





 <script>
  var content_manila    = "<?php echo base_url('Pagination/pagination_manila')?>";
  var total_manila_page     =  "<?php echo $count_total_manila_page; ?>";

 var content_manila_search    = "<?php echo base_url('Pagination/search_paging')?>";
 var content_manila_search_color    = "<?php echo base_url('Pagination/search_paging_color')?>";

  
 </script>


 		<!--For  pagination start -->		
		<script type="text/javascript">
	       	if((location.hash!="#outport")&&(location.hash!="#air")){
		       	
				$(document).ready(function() {
				$('.manila_pagination').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
				    $(".manila_pagination").load(content_manila);  //initial page number to load
				    $(".man_pages").bootpag({
				        total:total_manila_page, // total number of pages
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
				        $('.manila_pagination').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
				        $(".manila_pagination").load(content_manila, {'page':num});
				    	
				    });
				});
            }


       </script>
<div class="row">
		<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_manila">Search:</label>

						  <div class="input-group">
     						 <input type="text" class="form-control" id="search_manila" placeholder="Search for...">
     						  <span class="input-group-btn">
      						     <button class="btn btn-default search_manila_jobfile" type="button"><span class="fa fa-search fa-fw"></span></button>
						      </span>
						   </div>



						<input type="hidden" class="manila_total" value="<?php echo $count_total_manila;?>">
						<input type="hidden" class="manila_total_new">
				
			
			 		</div>	

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4">
				  <label>Color Stages:</label>
					<select class="selectpicker form-control color_select " name="color_select" width="250" style="width: 250px" >
					       <option disabled selected>Select Color Stages</option>
						<?php 
							foreach($status as $row){
								echo '<option value="'.$row->StatusName.'">'.$row->StatusName.'</option>';
						    }?>
					</select>
				</div>



				<div class="col-lg-4 col-md-4 col-sm-4 pull-right" style="padding: 20px;">

					<div class="row">

					<!-- Update -->

					<!-- Trigger the modal with a button -->


					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-1" data-backdrop="static" data-keyboard="false" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					      <?php $this->load->view('jobfile-view/views_jobfile_manila_updateData'); ?>

					      

					    </div>

					  </div>



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md btn-AddData-mnila" data-toggle="modal" href="#myModal-1-2" style="margin-right: 10px;"><span class="fa fa-plus fa-fw"></span> Add Data</button>



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-2" data-backdrop="static" data-keyboard="false">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->
					      
					    	<?php $this->load->view('jobfile-view/views_jobfile_manila_addData'); ?>


					    </div>

					  </div>

					</div>

				</div>

			 </div>
			
				

			  <div class="wrapper" style= "overflow-y:auto;height:485px;width:100%;position:relative;">
				    <div class="job-manila manila_pagination"></div>
			  </div> 
			    <div class="man_pages"></div>
			    <div class="man_pages_search"></div>
			    <div class="man_pages_search_color"></div>
			    
		  	</div>
		</div>


				<!--pop up for viewvessels start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewvessels" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Vessels</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_vessels"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_mnila_update_vessel hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

		<!--pop up for goods start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewgoods"  data-backdrop="static" data-keyboard="false"role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Commodity</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_products"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_mnila_update_product hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

				<!--pop up for Status Report -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="statrepo" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Status Report</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_status"> </div>
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
				  <div class="modal fade" id="viewcontainers" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog" style="width: 65%;">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Containers</h4>
				        </div>
				        <div class="modal-body">
				        	<div style='overflow-x:auto;'>	
				            	<div class="list_conts"> </div>
				            </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_mnila_update hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

			<!--pop up for Running Charges start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="runchar" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Running Charges</h4>
				          	<h2 style="font-size:18px;font-family:Segoe UI"><b> Jobfile No: </b> <span class="jbNo"> </span> </h2>
				        </div>
				        <div class="modal-body">
				            <div class="list_charges"> </div>

				        </div>
				        <div class="footer-modal">
				        <hr>
				       	 <button type="button" class="btn btn-danger qwerty">Update</button>
				        	<button type="button" class="btn btn-danger asd update-charges-mnila" disabled>Save</button>
				          <button type="button" class="btn btn-danger btn-close-mnila" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>
   <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
   <!-- numeral script won't work without net -->
   <script>
   //for update charges



   $(document).on('click','.btn-Container',function(){
   		$('.list_conts').html('<div class="list_conts"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Containers </div>');
   });
    $(document).on('click','.btn-Goods',function(){
   		$('.list_products').html('<div class="list_products"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });
     $(document).on('click','.btn-Vessel',function(){
   		$('.list_vessels').html('<div class="list_vessels"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Vessels </div>');
   });
      $(document).on('click','.btn-StatusReport',function(){
   		$('.list_status').html('<div class="list_status"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });
       $(document).on('click','.runchar',function(){

   		$('.list_charges').html('<div class="list_charges"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Charges </div>');
   });

$(document).ready(function(){
var jbfl;
	$(document).on('click','.runchar',function(){
			var jobfile = $(this).closest('tr').children('td:eq(2)').text();
			jbfl = jobfile;
			$('.jbNo').html(' <span class="jbNo">' + jbfl + '</span> ');
			
	});

	$(document).on('click','.btn-close-mnila',function(){
			$('.qwerty').removeAttr('disabled');
			$('.asd').attr('disabled','disabled');
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

	$(document).on('click','.qwerty',function(){

			$('#runchar .lodge_update').removeAttr('disabled');
			$('#runchar .cont-deposit').removeAttr('disabled');
			$('#runchar .thc-charges').removeAttr('disabled');
			$('#runchar .arrastre').removeAttr('disabled');
			$('#runchar .wharfage').removeAttr('disabled');
			$('#runchar .weight').removeAttr('disabled');
			$('#runchar .del').removeAttr('disabled');
			$('#runchar .dispatch').removeAttr('disabled');
			$('#runchar .storage').removeAttr('disabled');
			$('#runchar .demurrage').removeAttr('disabled');
			$('#runchar .detention').removeAttr('disabled');			
			$('#runchar .EIC').removeAttr('disabled');
			$('#runchar .bai-app').removeAttr('disabled');
			$('#runchar .bai-inspect').removeAttr('disabled');
			$('#runchar .sra-app').removeAttr('disabled');
			$('#runchar .sra-inspect').removeAttr('disabled');
			$('#runchar .bad-cargo').removeAttr('disabled');
			$('#runchar .bpi').removeAttr('disabled');
			$('#runchar .reefer').removeAttr('disabled');
			$('#runchar .otherfee').removeAttr('disabled');

			$('.asd').removeAttr('disabled');
			$(this).attr('disabled','disabled');
	});
   $(document).on('click','.asd',function(){

     var lodge        = $('#runchar .lodge_update').val().replace(/,/g,'');
     var cont_deposit = $('#runchar .cont-deposit').val().replace(/,/g,'');
     var thc_charges  = $('#runchar .thc-charges').val().replace(/,/g,'');
     var arrastre     = $('#runchar .arrastre').val().replace(/,/g,'');
     var wharfage     = $('#runchar .wharfage').val().replace(/,/g,'');
     var weight       = $('#runchar .weight').val().replace(/,/g,'');
     var del          = $('#runchar .del').val().replace(/,/g,'');
     var dispatch     = $('#runchar .dispatch').val().replace(/,/g,'');
     var storage      = $('#runchar .storage').val().replace(/,/g,'');
     var demurrage    = $('#runchar .demurrage').val().replace(/,/g,'');
     var detention    = $('#runchar .detention').val().replace(/,/g,'');
     var eic 		  = $('#runchar .EIC').val().replace(/,/g,'');
     var bai_app 	  = $('#runchar .bai-app').val().replace(/,/g,'');
     var bai_inspect  = $('#runchar .bai-inspect').val().replace(/,/g,'');
     var sra_app 	  = $('#runchar .sra-app').val().replace(/,/g,'');
     var sra_inspect  = $('#runchar .sra-inspect').val().replace(/,/g,'');
     var bad_cargo    = $('#runchar .bad-cargo').val().replace(/,/g,'');
     var bpi  = $('#runchar .bpi').val().replace(/,/g,'');
     var reefer    = $('#runchar .reefer').val().replace(/,/g,'');
     var otherfee    = $('#runchar .otherfee').val().replace(/,/g,'');


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
			  	   	           jbfl   		:jbfl,
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
			                   bpi :bpi,
			                   reefer :reefer,
			                   otherfee : otherfee

			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Running Charges Updated!',
				        		confirm: function(){
									dia_running_charges.close();
									$('.qwerty').removeAttr('disabled');
									$('.asd').attr('disabled','disabled');
				        			$('#runchar').modal('hide');
				        	    }
				   			   });
	    		    })

  });
 });
  $(document).on('change',' .checkDec',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var newInp = inp.replace(/,/g,'');
 		var holders = newInp.toString().split('.');
 		var n = newInp.indexOf('.');
 		if(n < 0){
 			holders[0] =  numeral(holders[0]).format('0,0.00');
 			$('#runchar #' + holder).val(holders.join('.'));
 		}else{
 			holders[0] =  numeral(holders[0]).format('0,0');
 			holders[1] =  numeral("0." + holders[1]).format('.000');
 			$('#runchar #' + holder).val(holders.join(''));
 		}
 		if(inp.trim() == ""){
 			$('#runchar #' + holder).val('0.00');
 		}
 	});
  
   </script>

			<!--Add Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addContainer-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Container_manila'); ?>
				      	
				    </div>
				 </div>

				 <!--Add Vessel when Adding New vessel  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addVessel-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Vessel_manila'); ?>
				      	
				    </div>
				 </div>

				 <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Product_manila'); ?>
				      	
				    </div>
				 </div>

				  <!--Add Report when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-mnla" tabindex="-1" data-replace="true"  style="display: none;" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Report_manila'); ?>
				      	
				    </div>
				 </div>
				  
			
<!-- Update Modals -->

			<!--Update Container  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateContainer-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-manila-container/update_Container_manila'); ?>
					      	
					    </div>
					 </div>

			<!--Update product  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateProduct-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-manila-container/update_Product_manila'); ?>
					      	
					    </div>
					 </div>


			<!--Update Vessel  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateVessel-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-manila-container/update_Vessel_manila'); ?>
					      	
					    </div>
					 </div>
 

<input type="hidden" class="paging" />



<script>

$('.search_manila_jobfile').click(function(){
 var jbfl  = $('#search_manila').val();
  search_manila(jbfl);
});

//trigger on key enter
$(document).on('keydown','#search_manila',function(e){
			 if (e.keyCode == 13){
   	  	  $('.search_manila_jobfile').click();
		  	 }
});

$('.sea_manila_tab').click(function(){
 jbfl='';
 search_manila(jbfl);
});
	//for search
	function search_manila(jbfl){

    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Pagination/pagination_manila');?>",
			  	   beforeSend: function() {
							$('.job-manila').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   			   montype  		   :1,
			  	   	           jobfile   		   :jbfl,
			  	   		 }
	              })
					.done(function(data) {
 					   defaults='Select Color Stages';
     					$("select.color_select").val(defaults);
						$('.job-manila').html(data);
						$('.man_pages').empty();
					    $('.man_pages_search_color').empty();
						

							   $.get(link + "/Pagination/select_temp/",function(data_ko){

							   	 var dt =  data_ko.trim();
		      		   	 			  $(".man_pages_search").bootpag({
						                //    total:total_manila_page, // total number of pages
						                   total:dt,
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
						                    $('.manila_pagination').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
						                    $(".manila_pagination").load(content_manila_search, {'page':num});
						                  
						                });
		 						 });
	



					    });
    }




</script>

<script type="text/javascript">
	
$(function(){
   $('.color_select').change(function(){
       var color = $('select[name="color_select"]').val();
       color_select_manila(color);

   });	
});


function color_select_manila(color){
   		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Pagination/pagination_manila');?>",
			  	   beforeSend: function() {
							$('.job-manila').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   			   montype  		   :1,
			  	   	           color_stages   	   :color,
			  	   		 }
	              })
					.done(function(data) {

						$('.job-manila').html(data);
						$('.man_pages').empty();
						$('.man_pages_search').empty();

							   $.get(link + "/Pagination/select_temp/",function(data_ko){

							   	 var dt =  data_ko.trim();
		      		   	 			  $(".man_pages_search_color").bootpag({
						                //    total:total_manila_page, // total number of pages
						                   total:dt,
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
						                    $('.manila_pagination').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
						                    $(".manila_pagination").load(content_manila_search_color, {'page':num});
						                  
						                });
		 						 });
	



					    });

}


</script>





<script>
$('#select').change(function(){
  if($(this).val() == 'A'){ 
    $("select").css('background-color', 'white');
  }
    if($(this).val() == 'B'){
    $("select").css('background-color', 'red');
  }
    if($(this).val() == 'C'){
    $("select").css('background-color', 'yellow');
  }
    if($(this).val() == 'D'){
    $("select").css('background-color', 'green');
  }

  if($(this).val() == 'E'){
    $("select").css('background-color', 'pink');
  }
});

</script>


<!--table sorting -->



<!---JOBFILE MODALSSS-->

<div class="modal fade" id="jobfiles" role="dialog">
    <div class="modal-dialog">		      
		<?php $this->load->view('jobfile-view/views_jobfiledata_manila'); ?>
    </div>
 </div>


<!--for reports update -->
<div class="modal fade " id="updateReport-mnla" role="dialog">
    <div class="modal-dialog modal-lg">		      
		<?php $this->load->view('jobfile-view/add-manila-container/update_Report_manila'); ?>
    </div>
 </div>






