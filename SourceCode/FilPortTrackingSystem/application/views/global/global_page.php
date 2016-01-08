
	<div class="gl-filter">
		<div class="gl-filtitle">
			<h1>Search</h1>
		</div>
		<div class="input-group col-lg-12">
            <!-- <input type="text" class="search-query form-control" id="txtGlobalSearch" placeholder="Search" onkeyup="search(this.value)"/> -->
            <label for="search-global">Please Key in Keyword for Search:  </label>
            <input type="search" class="form-control input-sm light-table-filter" data-table="order-table-search-global" id="search-global" onkeyup="search(this.value)" >
        </div>
		<br>
		<button class="btn btn-danger col-lg-4 pull-right" type="submit" id="btnSearch">

		<span class=" glyphicon glyphicon-search"></span>

		</button>

	</div>

	<div class="gl-container">
		<p id="lblResultDetails"> </p>
	 <span id="result">
	 	<span class="result-manager"></span>
	 	<h3 style="font-family:Century Gothic">
	 		Double Click on the Result(s) to View.
	 	</h3>
	 	<table class="table table_manila table-bordered table-condensed order-table-search-global" style="width:100%;cursor:pointer" id="tbl-global-search" hidden>
				        <thead>
				             <tr style="cursor:w-resize ;">

								          <th > JobfileNumber </th>

								          <th >Color Stages</th>

								          <th > Consignee </th>
										 
								         <th > Shipper </th>

								          <th> Status Report </th>
										   
							 </tr>
				          </thead>
				          <tbody>
				        				<?php $i= 0; foreach ($manila as $row) {
				        					$i++;

				        					$pick =$row->IsBackground;
							    			if($pick==0){
									        	$pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
									        }else{
									        	$pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
									        }

				        				?>
				            <tr id="<?php echo $row->JobFileNo; ?>" class="tableRow">		
				            			  <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
								          <?php echo $pick1 ;?>
								          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
								          <td><?php echo stripslashes($row->ShipperName); ?></td>
								          <td>
								          		<button type="button" class="btn btn-StatusReport btn-info reports" data-toggle="modal" data-target="#statrepo"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          </td>
								       	 <?php } ?>
							</tr>
				        </tbody>
		</table>
	 </span>
	 	
	 </div>
	 <div class="container">
		<!-- Modal -->
				  <div class="modal fade" id="view-jobfile-profile" role="dialog" data-keyboard="false" data-backdrop="static">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <div id="title" style="font-size:24px;font-family:Century Gothic;">
				          	<b>Jobfile Number : <a id="jfNo"> </a> </b>
				          </div>
				        </div>
				        <div class="modal-body">
				        	<div id="body" style="font-size:13px;font-family:Century Gothic;">
				        	<table class="table table-hover table-striped">
				        		<tr>
				        			<td>
				        				Consignee <span class="pull-right">:</span>
				        			</td>
				        			<td>
										<span class="pull-left"><a class="consignee"> </a></span>
				        			</td>
				        		</tr>
				        		<tr>
				        			<td>
				        				 Shipper <span class="pull-right">:</span>
				        			<td>
										<span class="pull-left"><a class="shipper"> </a></span>
				        			</td>
				        		</tr>
				        		<tr>
				        			<td>
				        				 Color Stage <span class="pull-right">:</span>
				        			<td class="color">
										<b><center><b class="color-stages"> </b></center><b>
				        			</td>
				        		</tr>
				        		<tr>
				        			<td>
				        				<span class="pull-right">:</span>
				        			<td class="color-description">
										<span class="pull-left"><a class="legend-description"> </a></span>
				        			</td>
				        		</tr>
				        	</table>
				        	<hr>
		<div class="container-tab" id="tabs">

		  <ul class="nav nav-pills">

		    <li class="active"><a data-toggle="tab" href="#commodity">Commodities</a></li>

		    <li><a data-toggle="tab" href="#status-reports">Status Reports</a></li>

		  </ul>

		  	<!-- Status Report -->

		  	<div class="tab-content">
		  	
		      <div id="status-reports" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade">
 					<!-- <h4 style="padding-left: 25px;"> </h4> -->
 					<u><h5 style="font-family:Century Gothic">Double Click on the Status Report to View Content.</h5></u>
				          <div style="overflow-x:auto;">
				              <table id="tbl-status-reports" class="table table-striped tableOverFlow" style="cursor:pointer;">
				             	<tr>
				             		<td class="loadReports tdOverFlow" style="width:100%;" id="loadReports">
				             			Status reports
				             		</td>
				             	</tr>
				             </table>
				            </div>
				       	 </div>
			 

			  	<!-- Commodity -->

			  <div id="commodity" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active">
			  		<!-- <h4 style="padding-left: 25px;"> </h4> -->
			  		<br>
				         <div style="overflow-x:auto;">
				              <table id="tbl-commodities" class="table table-striped tableOverFlow">
				             	<tr>
				             		<td class="loadCommodities tdOverFlow">
				             			Commodities
				             		</td>
				             	</tr>
				             </table>
				            </div>
				       	 </div>
			  </div>
			</div>
		 </div>
				</div>
				       <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
	</div> 
	<!-- End Modal for Details -->
	<div class="modal fade" id="view-status-report-profile" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				  
				        <div class="modal-header">
				          <div id="title" style="font-size:24px;font-family:Century Gothic;">
				          	<b>Jobfile Number : <a id="jfNo_2"> </a> </b>
				          </div>
				        </div>
				        <div class="modal-body">
				        	<div id="body" style="font-size:13px;font-family:Century Gothic;">
							 <u><h4> Status Description No:  <b class="stat-no"> </b> </h4></u>
							
							<div style="overflow-x:auto;">
								<table style="tableOverFlow;table-layout:fixed;back-ground-color:#d1d1e0;">
									<tr>
										<td style="text-align:left;">
										  <p class="txt-desc"></p>
										</td>
									</tr>
								</table>
							</div>
							</div>
						</div>
				       <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				       </div>

				 	  </div>
				    </div>
				 </div>
	</div> 
</body>
</html>

<script>
		$(document).ready(function(){

		});

		var jbID;
					
			$('.tableRow').on('dblclick',function(){
				$('#tbl-status-reports').html('<table id="tbl-status-reports" class="table table-striped tableOverFlow" style="width:100%;cursor:pointer;"><tr><td class="loadReports"></td></tr></table>');
				$('#tbl-commodities').html('<table id="tbl-commodities" class="table table-striped tableOverFlow"><tr><td class="loadCommodities"></td></tr></table>');
				$('#jfNo').html($(this).attr('id'));
				$('.consignee').html($(this).closest('tr').children('td:eq(2)').text());
				$('.shipper').html($(this).closest('tr').children('td:eq(3)').text());
				var color = $(this).closest('tr').children('td:eq(1)').attr('style');
				var color_desc = $(this).closest('tr').children('td:eq(1)').text();
				$('.color').attr('style',color);
				$('.color-stages').html($(this).closest('tr').children('td:eq(1)').text());
				var ids = $(this).attr('id');
				jbID = ids;

				  $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/get_legend_desc');?>",
						beforeSend: function(){
							$('.legend-description').html('<a class="legend-description"><i class="fa fa-spinner fa-spin"></i>Please Wait...</a>');
						},
				  		data: { 
				  			colors:color_desc,
				  		}
					})
			  		.done(function(color_data) {
				  		$('.legend-description').html(color_data);
					});
				
				 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/global_status_report');?>",
						beforeSend: function() {
							$('.loadReports').html('<td class="loadReports" style="font-size:15px;"> <i class="fa fa-spinner fa-spin"></i>Loading Status Report(s) </td>');
 					  	},
				  		data: { 
				  			id:ids,
				  		}
					})
			  		.done(function(data) {
				  		$('#tbl-status-reports').html(data);
					});

			  	 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/global_get_products');?>",
						beforeSend: function() {
							$('.loadCommodities').html('<td class="loadCommodities" style="font-size:15px;"> <i class="fa fa-spinner fa-spin"></i>Loading Commodities </td>');
 					  	},
				  		data: { id:ids,}
					})
			  		.done(function(data) {
				  			$('#tbl-commodities').html(data);
					});


				$('#view-jobfile-profile').modal('show');
			});

			$('#btnSearch').on('click',function(){
				var searchVal = $('#search-global').val();
				if($('#search-global').val() == ""){
					$("#tbl-global-search").hide();
				}else{
					$("#tbl-global-search").show();
				}
			});

			$(document).on('dblclick','#loadReports',function(){
				var pre_txt = $(this).closest('tr').children('td:eq(1)').text();
				var dispTxt = pre_txt.replace(/\\n/g,'<br>');
				$('.txt-desc').html(dispTxt);
				$('.stat-no').html($(this).closest('tr').children('td:eq(0)').text());
				$('#jfNo_2').html(jbID);
				$('#view-jobfile-profile').modal('hide');
				$('#view-status-report-profile').modal('show');
			});

			$("#view-status-report-profile").on('hide.bs.modal', function () {
            	$('#view-jobfile-profile').modal('show');
   			 });


			function search(searchme){
				$("#tbl-global-search").hide();
			}
			
	</script>

	<style>
	 .tableOverFlow{
	 	width: 100%;
	 }

	 .tdOverFlow{
	 	 max-width: 0;
   		 overflow: hidden;
    	 text-overflow: ellipsis;
    	 white-space: nowrap;
    	 text-align: left !important; 
	 }
	</style>