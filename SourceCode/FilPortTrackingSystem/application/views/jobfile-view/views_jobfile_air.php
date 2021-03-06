 <script>
  var content_air           = "<?php echo base_url('Pagination/pagination_air')?>";
  var content_air_search    = "<?php echo base_url('Pagination/search_paging_air')?>";
  var content_air_search_color    = "<?php echo base_url('Pagination/search_paging_color_air')?>";
  var total_air_page        =  "<?php echo $count_total_air_page; ?>";
 </script>


 		<!--For  pagination start -->		
		<script type="text/javascript">
		$('.air_freight_tab').click(function(){
			jbfl='';
           search_airs(jbfl);

				$(document).ready(function() {
				    $(".air_pagination").load(content_air);  //initial page number to load
				    $(".air_pages").bootpag({
				        total:total_air_page, // total number of pages
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
				         $('.air_pagination').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
				        $(".air_pagination").load(content_air, {'page':num});
				    });
				});
        });


       </script>

<div class="row">
	<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 		  	<label for="search_air">Search:</label>

				  			<div class="input-group">
     						   <input type="text" class="form-control" id="search_air" placeholder="Search for...">
     						     <span class="input-group-btn">
      						     <button class="btn btn-default search_air_jobfile" type="button"><span class="fa fa-search fa-fw"></span></button>
						      </span>
						   </div>
			 		</div>

				</div>

					<div class="col-lg-4 col-md-4 col-sm-4">
					   <label>Color Stages:</label>
						<select id="color_select_a"class="selectpicker form-control color_select_a " name="color_select_a" width="250" style="width: 250px" >
						       <option disabled selected>Select Color Stages</option>
						        <option value="Select All">Select All</option>
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

					  <div class="modal fade" id="myModal-3-1" role="dialog" data-backdrop="static" data-keyboard="false">

					    <div class="modal-dialog"> 
					    

					      <!-- Modal content-->

					     <?php $this->load->view('jobfile-view/views_jobfile_air_updateData'); ?>


					    </div>

					  </div> 



					  <!-- Add -->

					<!-- Trigger the modal with a button -->
				  <?php if($roleair[0] == '1'){ ?>
					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-3-2" style="margin-right: 10px;"><span class="fa fa-plus fa-fw"></span> Add Data</button>
				<?php }else{} ?>



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-3-2" role="dialog" data-backdrop="static" data-keyboard="false">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					        <?php $this->load->view('jobfile-view/views_jobfile_air_addData'); ?>

					      

					    </div>

					  </div> 	

					</div>

				</div>

			 </div>

				


			 <?php if($roleair[2] == '4'){ ?>
				 <div class="wrapper " style= "overflow-y:auto; height :485px; width:100%;position:relative;">
					   <div class="job-air  air_pagination"></div>
				 </div>
			<?php }else{?>
				<div class="wrapper " style= "overflow-y:auto; height :485px; width:100%;position:relative;">
					 <div class="panel panel-default " >
                      <div class="panel-heading"><span class="fa fa-exclamation-triangle fa-fw" style="color:#A8A8A8"></span></div>
                      <div class="panel-body">
                        <h2 style="font-weight: 900;color: #909090 ;">Sorry!  </h2>
                         <span style="color:#A8A8A8"><h4>But it seems you don't have permission to view this area.</h4></span> 
                      </div>
                    </div>
				 </div>
			<?php }?>
				 <div class="air_pages"></div>
 				 <div class="air_pages_search"></div>
	 		     <div class="air_pages_search_color"></div>
 				 
		  	</div>

		  </div>



<!--pop up for goods start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewgoods-air"  data-backdrop="static" data-keyboard="false"role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content"  style="width:180%;right:40%;padding: 10px; ">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Commodity</h4>
				          <h2 style="font-size:18px;font-family:Segoe UI"><b> Jobfile No: </b> <span class="jbNo-air"> </span> </h2>
				        </div>
				        <div class="modal-body">

				        	<div style='overflow-x:auto;'>	
				            	<div class="list_products_air"> </div>
				            </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_air_update_product hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

	<!--pop up for Status Report -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="statrepo-air" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Status Report</h4>
				          <h2 style="font-size:18px;font-family:Segoe UI"><b> Jobfile No: </b> <span class="jbNo-air"> </span> </h2>
				        </div>
				        <div class="modal-body">
				            <div class="list_status_air"> </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>	

			<!--pop up for Running Charges start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="runchar-air" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Running Charges</h4>
				          <h2 style="font-size:18px;font-family:Segoe UI"><b> Jobfile No: </b> <span class="jbNo-air"> </span> </h2>
				        </div>
				        <div class="modal-body">

				            <div class="list_charges_air"> </div>


				        </div>
				        <div class="footer-modal">
				        <hr>
				        <?php if($roleair[1] == '2'){ ?> 
				        	<button type="button" class="btn btn-danger update_charges-air-qwerty">Update</button>

				        	<button type="button" class="btn btn-danger update_charges-air" disabled>Save</button>
				        <?php }else{}?>
				          <button type="button" class="btn btn-danger btn-close-air" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>


	<script>
			$(document).on('click','.update_charges-air-qwerty',function(){
					$('#runchar-air .lodge_airs').removeAttr('disabled');
					$('#runchar-air .break_airs').removeAttr('disabled');
				    $('#runchar-air .bad-cargo_airs').removeAttr('disabled');
					$('#runchar-air .storage_airs').removeAttr('disabled');
					$('#runchar-air .VCRC_airs').removeAttr('disabled');
					$('#runchar-air .CNI_airs').removeAttr('disabled');
				    $('#runchar-air .CNIU_airs').removeAttr('disabled');
				    $('#runchar-air .otherfee_airs').removeAttr('disabled');

					$('.update_charges-air').removeAttr('disabled');
					$(this).attr('disabled','disabled');
			});

		$(document).on('click','.btn-close-air',function(){
					$('#runchar-air .update_charges-air-qwerty').removeAttr('disabled');
					$('#runchar-air .update_charges-air').attr('disabled','disabled');
			});

		//check  if num or not
              $(document).on('keypress','.checkDec-air',function (e) {
					  if(event.which < 46
					    || event.which > 59) {
					        event.preventDefault();
					    } // prevent if not number/dot

					    if(event.which == 46
					    && $(this).val().indexOf('.') != -1) {
					        event.preventDefault();
					    } // prevent if already dot

               });
	</script>



 <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-air" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-air-product/add_Product_air'); ?>
				      	
				    </div>
				 </div>

			 <!--Add Report when Adding New Container  -->
		
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-air" tabindex="-1" data-replace="true"  style="display: none;" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-air-product/add_Report_air'); ?>
				      	
				    </div>
				 </div>


			 <!--Update product  -->
				  <!-- Modal -->
				  <div class="modal fade" id="updateProduct-air" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-air-product/update_Product_air'); ?>
				      	
				    </div>
				 </div>




<script>


/*add New jobfile*/
	 var myBackup_jobfile_air = $('#myModal-3-2').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#myModal-3-2',function() {
        $('#myModal-3-2').modal('hide').remove();
        var myClone_jobfile_air = myBackup_jobfile_air.clone();
        $('body').append(myClone_jobfile_air);
        i=0;
    }); 


    /*add New jobfile*/
	 var myBackup_product_air = $('#addProduct-air').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addProduct-air',function() {
        $('#addProduct-air').modal('hide').remove();
        var myClone_product_air = myBackup_product_air.clone();
        $('body').append(myClone_product_air);
        
    }); 

    /*add New jobfile*/
	 var myBackup_report_air = $('#addReport-air').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addReport-air',function() {
        $('#addReport-air').modal('hide').remove();
        var myClone_report_air = myBackup_report_air.clone();
        $('body').append(myClone_report_air);
        
    }); 


var jbfl;

 $(document).on('change',' .checkDec-air',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var newInp = inp.replace(/,/g,'');
 		var holders = newInp.toString().split('.');
 		var n = newInp.indexOf('.');
 		if(n < 0){
 			holders[0] =  numeral(holders[0]).format('0,0.00');
 			$('#runchar-air #' + holder).val(holders.join('.'));
 		}else{
 			holders[0] =  numeral(holders[0]).format('0,0');
 			holders[1] =  numeral("0." + holders[1]).format('.000');
 			$('#runchar-air #' + holder).val(holders.join(''));
 		}
 		if(inp.trim() == ""){
 			$('#runchar-air #' + holder).val('0.00');
 		}
 });
 $(document).on('click','.btn-Goods-air',function(){
   		$('.list_products_air').html('<div class="list_products_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });	

   $(document).on('click','.btn-StatusReport-air',function(){
   		$('.list_status_air').html('<div class="list_status_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });

       $(document).on('click','.runchar-air',function(){

   		$('.list_charges_air').html('<div class="list_charges_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Charges </div>');

   });


  $('.view_goods-air').click(function(){
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		   
  				$.ajax({
                    method: "POST",
                      url: "<?php echo base_url('Job/get_goods_air');?>",
                    data: { id:jobfileno,
                    		
                    }
                })
                .done(function(data) {
                	
                    $('.list_products_air').html(data);
                });
        });


     /*View Reports*/
        $('.reports-air').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();

	 		  $.ajax({
                            method: "POST",
                              url: "<?php echo base_url('Job/status_report_air');?>",
                            data: { id:jobfileno,
                            }
                        })
                        .done(function(data) {
                                $('.list_status_air').html(data);
                        });
        });


         /*View Charges*/
        $('.view_charges-air').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		jbfl = jobfileno;

	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_charges_air');?>",
                                    data: { 
                                    	id:jbfl,
                                    }
                                })
                                .done(function(data) {

                                    $('.list_charges_air').html(data);

                                });
        });


//air search
$('.search_air_jobfile').click(function(){
 jbfl =  $('#search_air').val();
  search_airs(jbfl);
});

//trigger on key enter
$(document).on('keydown','#search_air',function(e){
			 if (e.keyCode == 13){
   	  	  $('.search_air_jobfile').click();
		  	 }
});

function search_airs(jbfl){

    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Pagination/pagination_air');?>",
			  	   beforeSend: function() {
							$('.job-air').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   	           jobfile  :jbfl
			  	   		 }
	              })
					.done(function(data) {
						$('.job-air').html(data);
						 defaults='Select Color Stages';
     					 $("select#color_select_a").val(defaults);
						$('.air_pages').empty();
						$('.air_pages_search_color').empty();
						

									$.get(link + "/Pagination/select_temp/",function(data_ko){

							   	 var dt =  data_ko.trim();
		      		   	 			  $(".air_pages_search").bootpag({
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
						                    $('.job-air').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
						                    $(".job-air").load(content_air_search, {'page':num});
						                  
						                });
		 						 });
	  		    });
    
}
</script>


<script>
$(function(){
   $('.color_select_a').change(function(){
       var color = $('select[name="color_select_a"]').val();
       if(color=='Select All'){
       	  var jbfl='';
          search_airs(jbfl);
       }else{
          color_select_air(color);
   	   }

   });	
});
function color_select_air(color){

    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Pagination/pagination_air');?>",
			  	   beforeSend: function() {
							$('.job-air').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   	           color_stages  :color
			  	   		 }
	              })
					.done(function(data) {
						$('.job-air').html(data);
						$('.air_pages').empty();
					    $('.air_pages_search').empty();
						

									$.get(link + "/Pagination/select_temp/",function(data_ko){

							   	 var dt =  data_ko.trim();
		      		   	 			  $(".air_pages_search_color").bootpag({
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
						                    $('.job-air').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
						                    $(".job-air").load(content_air_search_color, {'page':num});
						                  
						                });
		 						 });
	  		    });
    
}	


</script>






<script>
   $(document).on('click','.update_charges-air',function(){

     var lodge        = $('#runchar-air .lodge_airs').val().replace(/,/g,'');
     var break_airs   = $('#runchar-air .break_airs').val().replace(/,/g,'');
     var bad_cargo    = $('#runchar-air .bad-cargo_airs').val().replace(/,/g,'');
     var storage      = $('#runchar-air .storage_airs').val().replace(/,/g,'');
     var vrc          = $('#runchar-air .VCRC_airs').val().replace(/,/g,'');
     var cni           = $('#runchar-air .CNI_airs').val().replace(/,/g,'');
     var cniu          = $('#runchar-air .CNIU_airs').val().replace(/,/g,'');
     var otherfee          = $('#runchar-air .otherfee_airs').val().replace(/,/g,'');
   
		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job_air_update/jobfile_add_charge_air');?>",
	 		       beforeSend: function() {
					 	  dia_running_charges =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating Running Charges',
				   			});
 					  },
			  	   data: {
			  	   	           jbfl   		:jbfl,
			  	   			   lodge        :lodge,
			  	   			   break_airs   :break_airs,
			  	   			   bad_cargo    :bad_cargo,
			  	   			   storage      :storage,
			  	   			   vrc          :vrc,
			  	   			   cni          :cni,
			  	   			   cniu         :cniu,
			  	   			   otherfee 	:otherfee
			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Running Charges Updated!',
				        		confirm: function(){
									dia_running_charges.close();
									$('#runchar-air .update_charges-air-qwerty').removeAttr('disabled');
									$('#runchar-air .update_charges-air').attr('disabled','disabled');
				        			$('#runchar-air').modal('hide');
				        	    }
				   			   });
	    		    })

  });


</script>

<!--for reports update -->
<div class="modal fade " id="updateReport-air" role="dialog">
    <div class="modal-dialog modal-lg">		      
		<?php $this->load->view('jobfile-view/add-air-product/update_Report_air'); ?>
    </div>
 </div>

