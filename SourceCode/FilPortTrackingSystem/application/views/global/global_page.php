
	<div class="gl-filter">
		<div class="gl-filtitle">
			<h1>Search</h1>
		</div>
		<div class="input-group col-lg-12">
            <!-- <input type="text" class="search-query form-control" id="txtGlobalSearch" placeholder="Search" onkeyup="search(this.value)"/> -->
            <input type="search" class="form-control input-sm light-table-filter" data-table="order-table-search-global" id="search-global" onkeyup="search()" >
        </div>

	<h4>Type:</h4>
		<select class="form-control" id="cboType">
			<option>JobFile</option>
			<option>Consignee</option>
			<option>Hauler/Truck</option>
			<option>Shipper</option>
			<option>Carrier</option>
			<option>Broker</option>
		</select><br>

		<button class="btn btn-danger col-lg-4 pull-right" type="submit">

		<span class=" glyphicon glyphicon-search"></span>

		</button>

	</div>

	<div class="gl-container">
		<p id="lblResultDetails"> </p>
	 <span id="result">
	 	<table class="table table_manila table-bordered table-condensed order-table-search-global" style="width:100%;" id="tbl-global-search">
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
				  <div class="modal fade" id="view-jobfile-profile" role="dialog">
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
										<span class="pull-left"><a class="color-stages"> </a></span>
				        			</td>
				        		</tr>
				        	</table><br>
				        	 
				        	 <h4 style="padding-left: 50px;"> Status Reports </h4>
				            
				             <table>
				             	<tr>
				             		<td>
				             			<h5 style="padding-left: 65px;"> Status Reports </h5>
				             		</td>
				             	</tr>
				             </table>

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

				
			$('.tableRow').on('dblclick',function(){
				//alert($(this).attr('id'));
				$('#jfNo').html($(this).attr('id'));
				$('.consignee').html($(this).closest('tr').children('td:eq(2)').text());
				$('.shipper').html($(this).closest('tr').children('td:eq(3)').text());
				var color = $(this).closest('tr').children('td:eq(1)').attr('style');
				$('.color').attr('style',color);
				$('.color-stages').html($(this).closest('tr').children('td:eq(1)').text());
				$('#view-jobfile-profile').modal('show');

			});

	</script>