

<div class="dash-cont">
	<div class="dash-title"><h1>Search</h1></div>
		<div class="dash-subtitle">
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration:none;font-weight:600;">
						        <span class="hvr-icon-forward"> Jobfile Transaction </span></a>
						      </h4>
						      	<div class="input-group col-lg-12" style="padding-bottom: 5px;">
						            <!-- <input type="text" class="search-query form-control" id="txtGlobalSearch" placeholder="Search" onkeyup="search(this.value)"/> -->
						            <label for="search-global" style="font-size:12px;">Search:  </label>
						            <input type="search" class="form-control input-sm light-table-filter" data-table="order-table-search-global" id="search-global" onkeyup="getText(this.value)" placeholder ="" >
						        <button class="btn btn-danger col-lg-4 pull-right" type="submit" id="btnSearch" style="top: 5px;">
									<span class="fa fa-search"></span>
									
								</button>
						        </div>
						        
						    </div>

						    <div id="collapse1" class="panel-collapse" style="padding:5px">
						    <label for="search-global" style="font-size:12px;">From:  </label>
						         <ul class="nav nav-pills nav-data">
									  <li  value="4" style="display:block;width:100%;" class="active"><a href="#tab_c" data-toggle="pill">All</a></li>
									  <li  value="1" style="display:block;width:100%;"><a href="#tab_a" data-toggle="pill">Sea Freight Manila</a></li>
									  <li  value="2" style="display:block;width:100%;"><a href="#tab_b" data-toggle="pill">Sea Freight Outport</a></li>
									  <li  value="3" style="display:block;width:100%;"><a href="#tab_c" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>
						</div>
		</div>
</div>
	

	<div class="gl-container">
		<p id="lblResultDetails"> </p>
	 <span id="result">
	 	<span class="result-manager"></span>
	 	<h3 style="font-family:Century Gothic">
	 		Double Click on the Result(s) to View.
	 	</h3>
	 	<i class="result-count" style="font-size:24px;"> </i>
	 	<a class="loading-consignee"></a>
		 	<div class="report_header" style="width:100%;overflow-y:auto;position:relative;height:440px;">
			 	 <table class="table table_manila table-bordered table-condensed order-table-search-global" style="width:100%;cursor:pointer" id="tbl-global-search">
				 </table>
			</div>
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
			 	<hidden class="conName" id="<?php echo stripslashes($jobfiles); ?>"></hidden>
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
							 <u><h4> Date Added :  <b class="stat-no"> </b> </h4></u>
							
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
		var mon_Type = 4;
		var jbID;
		var searchItem;
		var defUser;
		$(document).ready(function(){
			getSearchItem();
			search();
			if(defUser == ""){	
				$("#search-global").attr('placeholder','Jobfile No / Shipper Name / Consignee ');
			}else{
				$("#search-global").attr('placeholder','Jobfile No / Shipper Name');
			}
		});

		function getSearchItem(){
			var item = $('.conName').attr('id');
			if(item.trim() == ""){
				searchItem = $('#search-global').val();
				defUser = '';
			}else{
				searchItem = item;
				defUser = item;
			}	
		}

		function search(){
			var direct;
				getSearchItem();
				if(defUser != ""){
					direct = "<?php echo base_url('Job_reports/get_jobfile_global_search_consignee');?>";
				}else{
					direct = "<?php echo base_url('Job/get_jobfile_global_search');?>";
				}
			 	$.ajax({
				  		method: "POST",
						url: direct,
						beforeSend: function(){
							$('.loading-consignee').html('<a class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</a>');
							$('#tbl-global-search').html('<table class="table table_manila table-bordered table-condensed order-table-search-global" style="width:100%;cursor:pointer" id="tbl-global-search"></table>');
							$('.result-count').html('<i class="result-count" style="font-size:24px;"> </i>');
						},
				  		data: { 
				  			search  : searchItem,
				  			monType : mon_Type
				  		}
					})
			  		.done(function(consignee_data) {
			  			var result = JSON.parse(consignee_data);
			  			$('#tbl-global-search').html(result[0].disp);
			  			$('.loading-consignee').html('<a class="loading-consignee"></a>');
					});
		}
			$(document).on('dblclick','.tableRow',function(){
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
				  			monType: mon_Type
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
				  		data: { 
				  			id:ids,
				  			monType: mon_Type
				  		}
					})
			  		.done(function(data) {
				  			$('#tbl-commodities').html(data);
					});


				$('#view-jobfile-profile').modal('show');
			});

			$('#btnSearch').on('click',function(){
				if(defUser == ""){
					search();
				}else{
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

			$(document).on('keydown','#search-global',function(e){
				 if (e.keyCode == 13){
				 	if($('.conName').attr('id') == ""){
				 		 $('#btnSearch').click();
					}
			  	 }
			});

			$(document).on('click','.nav-data li',function(){
				mon_Type = $('.nav-data .active').val();
			   	search();
			});
			
			function getText(a){
				if(a.trim() == ""){
					$("#btnSearch").click();
				}
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