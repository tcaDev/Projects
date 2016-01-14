<head>
		<script type="text/javascript" src="<?php echo base_url('resources/js/print.js'); ?>"></script>
</head>

<div class="dash-cont">
	<div class="dash-title"><h3>REPORTS</h3></div>
		<!-- <div class="dash-subtitle">
			<ul class="nav nav-pills nav-stacked col-md-2">
			  <li class="active"><a href="#tab_a" data-toggle="pill">Consignee</a></li>
			  <li><a href="#tab_b" data-toggle="pill">Broker</a></li>
			  <li><a href="#tab_c" data-toggle="pill">Shipper</a></li>
			  <!-- <li><a href="#tab_d" data-toggle="pill">Vessel</a></li> -->
		<!-- 	</ul>
		</div> --> 
</div>

		<div class="dash-side" >
			<div class="tab-content">
			        <div class="repcon-table tab-pane active" id="tab_a">		        
			        	<div class="col-md-12 tools-bar" >
			        			<div class="col-md-3 pull-left">
				        			<input type="search" class="form-control light-table-filter" data-table="order-table" placeholder="Enter CONSIGNEE Name"  id="txt-search-consignee"/>
				        		</div>
				        		<div class="col-md-3 pull-left">
									<button type="button" class="btn btn-danger" id="btn-search-consignee"><span class="fa fa-search fa-fw"></span></button>
				        		</div>
			        	</div>
			        	
			        	<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table reports-table" style="cursor:pointer;">
			        		<tr>
			        			<a class="loading-consignee" style="font-size:24px;"></a>
			        			<i class="result-count" style="font-size:24px;"> </i>
			        		</tr>
			        		<tr class="tableRow">

			        		</tr>
						</table>
						</div>	
					</div>
		</div>
	</div>
	 <div class="container">
		<!-- Modal -->
				   <div class="modal fade" id="view-report" role="dialog" data-keyboard="false" data-backdrop="static">
				    <div class="modal-dialog"  style="font-family:Century Gothic;">
				      <!-- Modal content-->
				      <div class="modal-content" style="width:150%;">
				        <div class="modal-header">
				        	<div class="header" style="font-family:Century Gothic;">
				        	<div style="font-size:22px;">
									<span class="pull left"><b>  Jobfile Number </b></span> 
				        			<a id="jfNo"> </a> 
				        	</div>
				        	</div>
				        </div>
				        <div class="modal-body">
				        <div style="overflow-x:auto;">
				        	
				        	<table style="font-family:Century Gothic;font-size:18px;table-layout:fixed;">
				        		<tr >
				        		  <td style="text-align:left;">
				        		  <span class="pull-left">	<b> Shipper   : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        		 	&nbsp;<a id="shipper"> </a>
				        		  </td>
				        		</tr>
				        		<tr>
				        		  <td style="text-align:left;">
				        		   <span class="pull-left"> <b> Consignee  : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        		 	&nbsp;<a id="consignee"> </a> 
				        		  </td>
				        		</tr>
				        		<tr>
				        		  <td style="text-align:left;">
				        		  	 <span class="pull-left"><b>Date Received of other Documents  : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        			&nbsp;<a id="dtRecvdOtherDocs"> </a> 
				        		  </td>
				        		</tr>
				        		<tr>
				        		  <td style="text-align:left;">
				        		  	 <span class="pull-left"><b> HBL#  : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        			&nbsp;<a id="hbl"> </a> 
				        		  </td>
				        		</tr>
				        	</table>
				        	<hr>
		<div class="container-tab" id="tabs">

		  <ul class="nav nav-pills">

		    <li class="active"><a data-toggle="tab" href="#containers">Containers</a></li>

		    <li><a data-toggle="tab" href="#commodities">Commodities</a></li>

		    <li><a data-toggle="tab" href="#status-reports">Status Reports</a></li>

		     <li><a data-toggle="tab" href="#running-charges">Running Charges</a></li>

		  </ul>

		  	<!-- Status Report -->

		  	<div class="tab-content">
		  	
		        <div id="containers" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active">
 					<!-- <h4 style="padding-left: 25px;"> </h4> -->
 					<br>
 					<div style="height: 300px; overflow-y: auto;">
								<table id="tbl-first-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;">
				             		<tr>
				             			<td>
				             				<span class="loadContainers pull-left" style="font-size:18px;"></span>
				             			</td>
				             		</tr>
				                </table>
				     </div>
			    </div>
			 

			  	<!-- Commodity -->

			    <div id="commodities" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade ">
			  		<!-- <h4 style="padding-left: 25px;"> </h4> -->
			  		<br>
				        <div style="height: 300px; overflow-y: auto;">
								<table id="tbl-second-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;">
				             		<tr>
				             			<td>
				             				<span class="loadCommodity pull-left" style="font-size:18px;"></span>
				             			</td>
				             		</tr>
				                </table>
				        </div>
			    </div>

			      <div id="running-charges" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade">
			  		<br>
			  		<h4 style="padding-left: 25px;">Running Charges</h4>
			  		<br>
				       <table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%;text-align:left;">
				       		<tr>
				             	<td>
				             		<span class="loadCharges pull-left" style="font-size:18px;"></span>
				             	</td>
				            </tr>
				       </table>
			  	  </div>

			  	   <div id="status-reports" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade">
			  		<br>
			  		<h4 style="padding-left: 25px;">Status Report</h4>
			  		<br>
				      <table id="tbl-fourth-report-data" class="table table-striped tableOverFlow" style="cursor:pointer;">
				             	<tr>
				             		<td class="loadReports tdOverFlow" style="width:100%;" id="loadReports">
				             			Status reports
				             		</td>
				             	</tr>
				        </table>
			  	    </div>

			  </div>
		    </div>
				        </div>
						</div>
				       <div class="modal-footer">
				       	  <button class="btn btn-default" onclick="PrintElem('#tab-results')">Print</button>
				       	  <!-- <input class="btn btn-default pull-right" type="button" value="Print" onclick="" />	  -->
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				       </div>
				      </div>
				    
			</div> 

			
				            </div>
						</div>
		<!-- End Modal for Details -->
		<div id="tab-results" hidden>	
			<div style="font-family:Century Gothic;">
				<div style="font-size:22px;">
				<span class="pull left"><b>  Jobfile Number </b></span> 
				 <a id="print_jfNo"> </a> 
				</div>
				<table style="font-family:Century Gothic;font-size:18px;width:100%;table-layout:fixed;">
				        		<tr >
				        		  <td style="text-align:left;">
				        		  <span class="pull-left">	<b> Shipper   : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        		 	&nbsp;<a id="print_shipper"> </a>
				        		  </td>
				        		</tr>
				        		<tr>
				        		  <td style="text-align:left;">
				        		   <span class="pull-left"> <b> Consignee  : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        		 	&nbsp;<a id="print_consignee"> </a> 
				        		  </td>
				        		</tr>
				        		<tr>
				        		  <td style="text-align:left;">
				        		  	 <span class="pull-left"><b>Date Received of other Documents  : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        			&nbsp;<a id="print_dtRecvdOtherDocs"> </a> 
				        		  </td>
				        		</tr>
				        		<tr>
				        		  <td style="text-align:left;">
				        		  	 <span class="pull-left"><b>HBL# : </b></span>
				        		  </td>
				        		  <td style="text-align:left;">
				        			&nbsp;<a id="print_hbl"> </a> 
				        		  </td>
				        		</tr>
				</table>
				<br>
				<hr>
				        	<h4>Containers</h4>
								<table id="tbl-first-report-data-print" class="table table-striped table-bordered" style="cursor:pointer;font-size:12px;text-align:center;border:1px solid gray;">
				                </table>
				<br>
				<hr>        	
				        	<h4>Commodity</h4>
				        	<div>
				        	<center>
								<table id="tbl-second-report-data-print" class="table table-striped table-bordered" style="cursor:pointer;width:100%;">
				                </table>
				            </center>
				            </div>
				<br>
				<hr>        	
				        	<h4>Running Charges</h4>
				        	<div>
				        	<center>
								<table id="tbl-third-report-data-print" class="table table-striped table-bordered table-layout:fixed;" style="cursor:pointer;width:100%;text-align:left;">
				      		   </table>
				            </center>
				            </div>
				<br>
				<hr>
							<h4> Status Reports </h4>
						      <table id="tbl-fourth-report-data-print" class="table table-striped tableOverFlow" style="cursor:pointer;">
	    				      </table>
			</div>
		</div>

		<div class="modal fade" id="view-status-report-profile" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				  
				        <div class="modal-header">
				          <div id="title" style="font-size:24px;font-family:Century Gothic;">
				          	 <u><h4> Status Description No:  <b class="stat-no"> </b> </h4></u>
				          </div>
				        </div>
				        <div class="modal-body">
				        	<div id="body" style="font-size:13px;font-family:Century Gothic;">
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
	</div> 
</body>
<script>
 var jbNo;
 var statusData;
	$('#btn-search-consignee').on('click',function(){
		var txt = $('#txt-search-consignee').val();

		  $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/get_consignee_status_report');?>",
						beforeSend: function(){
							$('.loading-consignee').html('<a class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</a>');
							$('.reports-table').html('<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table reports-table"><tr><a class="loading-consignee" style="font-size:24px;"></a><i class="result-count" style="font-size:24px;"> </i></tr><tr class="tableRow"></tr></table>');
							$('.result-count').html('<i class="result-count" style="font-size:24px;"> </i>');
						},
				  		data: { 
				  			consignee_name:txt,
				  		}
					})
			  		.done(function(consignee_data) {
			  			var result = JSON.parse(consignee_data);
				  		$('.reports-table').html(result[0].disp);
				  		$('.result-count').html(result[0].result_count);
				  		$('.loading-consignee').html('<a class="loading-consignee" style="font-size:24px;"> </a>');
					});
		   });
		
		$(document).on('dblclick','.tableRow',function(){
			$('#tbl-first-report-data').html('<table id="tbl-first-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadContainers pull-left" style="font-size:18px;"></span></td></tr></table>');
			$('#tbl-second-report-data').html('<table id="tbl-second-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadCommodity pull-left" style="font-size:18px;"></span></td></tr></table>');
			$('#tbl-third-report-data').html('<table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadCharges pull-left" style="font-size:18px;"></span></td></tr></table>');
			$('#tbl-fourth-report-data').html('<table id="tbl-fourth-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadReports pull-left" style="font-size:18px;"></span></td></tr></table>');
			/*Reload Data on View*/
			$('#tbl-first-report-data-print').html('<table id="tbl-first-report-data-print" class="table table-striped table-bordered" style="cursor:pointer;width:100%;"></table>');
			$('#tbl-second-report-data-print').html('<table id="tbl-second-report-data-print" class="table table-striped table-bordered" style="cursor:pointer;width:100%;"></table>');
			$('#tbl-third-report-data-print').html('<table id="tbl-third-report-data-print" class="table table-striped table-bordered" style="cursor:pointer;width:100%;"></table>');
			$('#tbl-fourth-report-data-print').html('<table id="tbl-fourth-report-data-print" class="table table-striped table-bordered" style="cursor:pointer;width:100%;"></table>');
			/*Reload Data on Print*/
			jbNo = $(this).closest('tr').children('td:eq(0)').text();
			$('#jfNo').html($(this).closest('tr').children('td:eq(0)').text())
			$('#consignee').html($(this).closest('tr').children('td:eq(2)').text())
			$('#shipper').html($(this).closest('tr').children('td:eq(1)').text())
			$('#dtRecvdOtherDocs').html($(this).closest('tr').children('td:eq(4)').text())
			$('#hbl').html($(this).closest('tr').children('td:eq(3)').text())

			$('#print_jfNo').html($(this).closest('tr').children('td:eq(0)').text())
			$('#print_consignee').html($(this).closest('tr').children('td:eq(2)').text())
			$('#print_shipper').html($(this).closest('tr').children('td:eq(1)').text())
			$('#print_dtRecvdOtherDocs').html($(this).closest('tr').children('td:eq(4)').text())
			$('#print_hbl').html($(this).closest('tr').children('td:eq(3)').text())

			$('#view-report').modal('show');
			 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/get_containers_report');?>",
						beforeSend: function(){
							$('.loadContainers').html('<a class="loadContainers"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Containers...</a>');
						},
				  		data: { 
				  			id:jbNo,
				  		}
					})
			  		.done(function(report_container_data){
			  			$('#tbl-first-report-data').html(report_container_data);
			  			$('#tbl-first-report-data-print').html(report_container_data);
				});
			  $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/report_get_products');?>",
						beforeSend: function(){
							$('.loadCommodity').html('<a class="loadCommodity"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Containers...</a>');
						},
				  		data: { 
				  			id:jbNo,
				  		}
					})
			  		.done(function(report_container_data){
			  			$('#tbl-second-report-data').html(report_container_data);
			  			$('#tbl-second-report-data-print').html(report_container_data);
				});
			   $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/report_get_running_charges');?>",
						beforeSend: function(){
							$('.loadCharges').html('<a class="loadContainers"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Charges...</a>');
						},
				  		data: { 
				  			id:jbNo,
				  		}
					})
			  		.done(function(report_container_data){
			  			$('#tbl-third-report-data').html(report_container_data);
			  			$('#tbl-third-report-data-print').html(report_container_data);
				});
			  	 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/global_status_report');?>",
						beforeSend: function() {
							$('.loadReports').html('<a class="loadContainers"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Reports...</a>');
 					  	},
				  		data: { 
				  			id:jbNo,
				  		}
					})
			  		.done(function(data) {
				  		$('#tbl-fourth-report-data').html(data);
				  		statusData = data.replace(/\\n/g,'<br>');
				  	//	alert(statusData);
			  			$('#tbl-fourth-report-data-print').html(statusData);

				 });


		   });
			$(document).on('dblclick','#loadReports',function(){
				var pre_txt = $(this).closest('tr').children('td:eq(1)').text();
				var dispTxt = pre_txt.replace(/\\n/g,'<br>');
				$('.txt-desc').html(dispTxt);
				$('.stat-no').html($(this).closest('tr').children('td:eq(0)').text());
				$('#view-report').modal('hide');
				$('#view-status-report-profile').modal('show');
			});

			$("#view-status-report-profile").on('hide.bs.modal', function () {
            	$('#view-report').modal('show');
   			 });

			$(document).on('keydown','#txt-search-consignee',function(e){
				 if (e.keyCode == 13){
			   	  $('#btn-search-consignee').click();
			    }
			});

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
</html>

