<div class="dash-cont">
	<div class="dash-title"><h3>REPORTS</h3></div>
		<div class="dash-subtitle">
			<ul class="nav nav-pills nav-stacked col-md-2">
			  <li class="active"><a href="#tab_a" data-toggle="pill">Consignee</a></li>
			  <li><a href="#tab_b" data-toggle="pill">Broker</a></li>
			  <li><a href="#tab_c" data-toggle="pill">Shipper</a></li>
			  <li><a href="#tab_d" data-toggle="pill">Vessel</a></li>
			</ul>
		</div>
</div>

		<div class="dash-side" >
			<div class="tab-content">
			        <div class="repcon-table tab-pane active" id="tab_a">			        
			        	<div class="col-md-12 tools-bar" >
			        			<div class="col-md-3 pull-left">
				        			<input type="search" class="form-control light-table-filter" data-table="order-table" placeholder="Search List" />
				        		</div>
				        		<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#taba')" />	 
				        		<div class="col-md-3 pull-right">
								  <select type="search" class="form-control select-table-filter" data-table="order-table">
								    <option value="">All Status</option>  
								    <option value="Active">Active</option>  
								    <option value="Deactivated">Deactivated</option>  
								  <select>
								</div>   
			        	</div>
			        	<div id="taba">
			        	<table style="background-color:#fff;" class="table table-bordered order-table">
							<thead>
								<tr>
									<th>Consignee Name</th>
									<th>Address</th>
									<th>Country</th>
									<th>Office Number</th>
									<th>Status</th>
								</tr>
							</thead>	
							<tbody>	
			        		<?php
								foreach ($consignee as $row) {
								$consigname = $row->ConsigneeName;
								$conaddn = $row->HouseBuildingNoOrStreet;
								$conaddb = $row->BarangayOrVillage;
								$conaddt = $row->TownOrCityProvince;
								$concountry = $row->Country;
								$conoffice = $row->OfficeNumber;
								$conact = $row->IsActive; ?>


								<tr><td style="text-align:left;"><?php echo $consigname; ?></td>
									<td style="text-align:left;">
										<?php echo $conaddn; ?>
										<?php echo $conaddb; ?>
										<?php echo $conaddt; ?></td>
									<td style="text-align:left;"><?php echo $concountry; ?></td>	
									<td style="text-align:left;"><?php echo $conoffice; ?></td>
									<td style="text-align:left;"><?php if($conact=='1'){
									echo "Active";	
									}else{
									echo "Deactivated";
									}

									?>
									</td>	
								</tr>

							<?php }?>
								
								</tbody>
							</table>
						</div>	
					</div>

			        <div class="tab-pane" id="tab_b">
						<div class="col-md-12 tools-bar" >
		        			<div class="col-md-3 pull-left">
			        			<input type="search" class="form-control light-table-filter" data-table="order-table1" placeholder="Search List" />
			        		</div>
			        		<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#taba')" />	 
			        		<div class="col-md-3 pull-right">
							  <select type="search" class="form-control select-table-filter" data-table="order-table1">
							    <option value="">All Status</option>  
							    <option value="Active">Active</option>  
							    <option value="Deactivated">Deactivated</option>  
							  <select>
							</div>
			        	</div>
			        	<div id="tabb">
			        		<table style="background-color:#fff;" class="table table-bordered order-table1" >
								<thead>
									<tr>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Address</th>
										<th>Country</th>
										<th>Contact No</th>
										<th>Status</th>
									</tr>
								</thead>	
								<tbody>	
								<?php  
									foreach ($broker as $row) {
										$bname = $row->FirstName;
										$bmname = $row->MiddleName;
										$blname = $row->LastName;
										$brnaddb = $row->HouseBuildingNoStreet;
										$braddb = $row->BarangarOrVillage;
										$braddt = $row->TownOrCityProvince;
										$brcountry = $row->Country;
										$brcont = $row->ContactNo1;
										$brcontt = $row->ContactNo2;
										$brstat = $row->IsActive; ?>

									<tr><td style="text-align:left;"><?php echo $bname; ?></td>
									<td style="text-align:left;"><?php echo $bmname; ?></td>
									<td style="text-align:left;"><?php echo $blname; ?></td>
									<td style="text-align:left;">
										<?php echo $brnaddb; ?>
										<?php echo $braddb; ?>
										<?php echo $braddt; ?></td>
									<td style="text-align:left;"><?php echo $brcountry; ?></td>
									<td style="text-align:left;"><?php echo $brcont; ?>
									<?php echo $brcontt; ?>
									</td>
									<td style="text-align:left;"><?php if($brstat=='1'){
									echo "Activated";	
									}else{
									echo "Deactivated";
									}

									?>
									</td>	
									</tr>	

								<?php } ?>

								</tbody>
							</table>	
			        	</div>
			        </div>

			        <div class="tab-pane" id="tab_c">
			        	<div class="col-md-12 tools-bar" >
			        			<div class="col-md-3 pull-left">
				        			<input type="search" class="form-control light-table-filter" data-table="order-table2" placeholder="Search List" />
				        		</div>
				        		<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#taba')" />	 
			        	</div>
			        	<div id="tabc">
			        		<table style="background-color:#fff;" class="table table-bordered order-table2" >
								<thead>
									<tr>
										<th>Shipper Name</th>
										<th>Address</th>
										<th>Country</th>
									</tr>
								</thead>	
								<tbody>	
								<?php  
									foreach ($shipper as $row) {
										$sname = $row->ShipperName;
										$shnaddb = $row->HouseBuildingNoStreet;
										$shaddb = $row->BarangarOrVillage;
										$shaddt = $row->TownOrCityProvince;
										$shcountry = $row->Country;
										?>
									<tr><td style="text-align:left;"><?php echo $sname; ?></td>
									<td style="text-align:left;">
										<?php echo $shnaddb; ?>
										<?php echo $shaddb; ?>
										<?php echo $shaddt; ?></td>
									<td style="text-align:left;"><?php echo $shcountry; ?></td>	
									</tr>
									<?php } ?>
								</tbody>
							</table>			
						</div>
			        </div>

			        <div class="tab-pane" id="tab_d">
			        	<div class="col-md-12 tools-bar" >
		        	 		<div class="col-md-3 pull-left">
			        			<input type="search" class="form-control light-table-filter" data-table="order-table3" placeholder="Filter List" />
			        		</div>
			        		<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#taba')" />	 
			        	</div>
			        	<div id="tabd">
			        		<table style="background-color:#fff;" class="table table-bordered order-table3" >
								<thead>
									<tr>
										<th>Shipper Name</th>
										<th>Vessel Name</th>
									</tr>
								</thead>	
								<tbody>	
								<?php  
									foreach ($vessel as $row) {
										$shname = $row->ShipperName;
										$vname = $row->Vesselname;
								?>	
								<tr><td style="text-align:left;"><?php echo $shname; ?></td>
								<td style="text-align:left;"><?php echo $vname; ?></td></tr>
								<?php } ?>
							</tbody>
						</table>		
			        </div>
			      </div>  
			</div><!-- tab content -->
		</div>
	</div>
</body>

<script type="text/javascript">
		(function(document) {
			'use strict';

			var LightTableFilter = (function(Arr) {

				var _input;
		    var _select;

				function _onInputEvent(e) {
					_input = e.target;
					var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
					Arr.forEach.call(tables, function(table) {
						Arr.forEach.call(table.tBodies, function(tbody) {
							Arr.forEach.call(tbody.rows, _filter);
						});
					});
				}
		    
				function _onSelectEvent(e) {
					_select = e.target;
					var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
					Arr.forEach.call(tables, function(table) {
						Arr.forEach.call(table.tBodies, function(tbody) {
							Arr.forEach.call(tbody.rows, _filterSelect);
						});
					});
				}

				function _filter(row) {
		      
					var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
					row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

				}
		    
				function _filterSelect(row) {
		     
					var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
					row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

				}

				return {
					init: function() {
						var inputs = document.getElementsByClassName('light-table-filter');
						var selects = document.getElementsByClassName('select-table-filter');
						Arr.forEach.call(inputs, function(input) {
							input.oninput = _onInputEvent;
						});
						Arr.forEach.call(selects, function(select) {
		         select.onchange  = _onSelectEvent;
						});
					}
				};
			})(Array.prototype);

			document.addEventListener('readystatechange', function() {
				if (document.readyState === 'complete') {
					LightTableFilter.init();
				}
			});

		})(document);

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Filport Document', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Filport Document</title>');
       // mywindow.document.write('<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
</html>

