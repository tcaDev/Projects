<head>
		<script type="text/javascript" src="<?php echo base_url('resources/js/print.js'); ?>"></script>
</head>

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
				        		<input class="btn btn-default pull-right" type="button" value="Print" onclick="PrintElem('#taba')" />	 
				        		<div class="col-md-3 pull-right">
								  <select type="search" class="form-control select-table-filter" data-table="order-table">
								    <option value="">All Status</option>  
								    <option value="Active">Active</option>  
								    <option value="Deactivated">Deactivated</option>  
								  <select>
								</div>   
			        	</div>
			        	<div id="taba">
			        	<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table">
							<thead style="background-color:#D2D2D2; border: 1px solid black;">
								<tr>
									<th style="border: 1px solid gray;">Consignee Name</th>
									<th style="border: 1px solid gray;">Address</th>
									<th style="border: 1px solid gray;">Country</th>
									<th style="border: 1px solid gray;">Office Number</th>
									<th style="border: 1px solid gray;">Status</th>
								</tr>
							</thead>	
							<tbody  style=" border: 1px solid black;">	
			        		<?php
								foreach ($consignee as $row) {
								$consigname = $row->ConsigneeName;
								$conaddn = $row->HouseBuildingNoOrStreet;
								$conaddb = $row->BarangayOrVillage;
								$conaddt = $row->TownOrCityProvince;
								$concountry = $row->Country;
								$conoffice = $row->OfficeNumber;
								$conact = $row->IsActive; ?>


								<tr><td style="border: 1px solid gray; text-align:left;"><?php echo $consigname; ?></td>
									<td style=" border: 1px solid gray; text-align:left;">
										<?php echo $conaddn; ?>
										<?php echo $conaddb; ?>
										<?php echo $conaddt; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php echo $concountry; ?></td>	
									<td style="border: 1px solid gray; text-align:left;"><?php echo $conoffice; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php if($conact=='1'){
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
			        		<input class="btn btn-default pull-right" type="button" value="Print" onclick="PrintElem('#tabb')" />	 
			        		<div class="col-md-3 pull-right">
							  <select type="search" class="form-control select-table-filter" data-table="order-table1">
							    <option value="">All Status</option>  
							    <option value="Active">Active</option>  
							    <option value="Deactivated">Deactivated</option>  
							  <select>
							</div>
			        	</div>
			        	<div id="tabb">
			        		<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table1" >
								<thead style="background-color:#D2D2D2; border: 1px solid black;">
									<tr>
										<th style="border: 1px solid gray;">First Name</th>
										<th style="border: 1px solid gray;">Middle Name</th>
										<th style="border: 1px solid gray;">Last Name</th>
										<th style="border: 1px solid gray;">Address</th>
										<th style="border: 1px solid gray;">Country</th>
										<th style="border: 1px solid gray;">Contact No</th>
										<th style="border: 1px solid gray;">Status</th>
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

									<tr><td style="border: 1px solid gray; text-align:left;"><?php echo $bname; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php echo $bmname; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php echo $blname; ?></td>
									<td style="border: 1px solid gray; text-align:left;">
										<?php echo $brnaddb; ?>
										<?php echo $braddb; ?>
										<?php echo $braddt; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php echo $brcountry; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php echo $brcont; ?>
									<?php echo $brcontt; ?>
									</td>
									<td style="border: 1px solid gray; text-align:left;"><?php if($brstat=='1'){
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
				        		<input class="btn btn-default pull-right" type="button" value="Print" onclick="PrintElem('#tabc')" />
				        	<div class="col-md-3 pull-right">
							  <select type="search" class="form-control select-table-filter" data-table="order-table2">
							    <option value="">All Status</option>  
							    <option value="Active">Active</option>  
							    <option value="Deactivated">Deactivated</option>  
							  <select>
							</div>	 
			        	</div>
			        	<div id="tabc">
			        		<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table2" >
								<thead style="background-color:#D2D2D2; border: 1px solid black;">
									<tr>
										<th style="border: 1px solid gray;">Shipper Name</th>
										<th style="border: 1px solid gray;">Address</th>
										<th style="border: 1px solid gray;">Country</th>
										<th style="border: 1px solid gray;">Status</th>
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
										$shstat = $row->IsActive;
										?>
									<tr><td style="border: 1px solid gray; text-align:left;"><?php echo $sname; ?></td>
									<td style="border: 1px solid gray; text-align:left;">
										<?php echo $shnaddb; ?>
										<?php echo $shaddb; ?>
										<?php echo $shaddt; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php echo $shcountry; ?></td>
									<td style="border: 1px solid gray; text-align:left;"><?php if($shstat=='1'){
									echo "Active";	
									}else{
									echo "Deactivated";
									}

									?></td>	
									</tr>
									<?php } ?>
								</tbody>
							</table>			
						</div>
			        </div>

			        <div class="tab-pane" id="tab_d">
			        	<div class="col-md-12 tools-bar" >
		        	 		<div class="col-md-3 pull-left">
			        			<input type="search" class="form-control light-table-filter" data-table="order-table3" placeholder="Search List" />
			        		</div>
			        		<input class="btn btn-default pull-right" type="button" value="Print" onclick="PrintElem('#tabd')" />	 
			        	</div>
			        	<div id="tabd">
			        		<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table3" >
								<thead style="background-color:#D2D2D2; border: 1px solid black;">
									<tr>
										<th style="border: 1px solid gray;">Shipper Name</th>
										<th style="border: 1px solid gray;">Vessel Name</th>
									</tr>
								</thead>	
								<tbody>	
								<?php  
									foreach ($vessel as $row) {
										$shname = $row->ShipperName;
										$vname = $row->Vesselname;
								?>	
								<tr><td style="border: 1px solid gray; text-align:left;"><?php echo $shname; ?></td>
								<td style="border: 1px solid gray; text-align:left;"><?php echo $vname; ?></td></tr>
								<?php } ?>
							</tbody>
						</table>		
			        </div>
			      </div>  
			</div><!-- tab content -->
		</div>
	</div>
</body>

</html>

