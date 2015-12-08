


<head>
	<script type="text/javascript" src="<?php echo base_url('resources/js/filter.js'); ?>"></script>
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
			        		<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#taba')" />
			        	</div>
			        	<div id="taba">
			        	<table style="background-color:#fff;" class="table table-bordered table-autosort">
							<tbody>
								<tr>
									<th>Consignee Name</th>
									<th>Address</th>
									<th>Country</th>
									<th>Office Number</th>
									<th  class="table-autofilter">Status</th>
								</tr>
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
									echo "Activated";	
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
			        		<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#tabb')" />
			        	</div>
			        	<div id="tabb">
			        		<table style="background-color:#fff;" class="table table-bordered table-autosort" >
								<tbody>
									<tr>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Address</th>
										<th>Country</th>
										<th>Contact No</th>
										<th>Status</th>
									</tr>
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
			        	<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#tabc')" />
			        	</div>
			        	<div id="tabc">
			        		<table style="background-color:#fff;" class="table table-bordered table-autosort" >
								<tbody>
									<tr>
										<th>Shipper Name</th>
										<th>Address</th>
										<th>Country</th>
									</tr>
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
			        	 	<input class="btn btn-default pull-right" type="button" value="Print This" onclick="PrintElem('#tabd')" />
			        	</div>
			        	<div id="tabd">
			        		<table style="background-color:#fff;" class="table table-bordered table-autosort" >
								<tbody>
									<tr>
										<th>Shipper Name</th>
										<th>Vessel Name</th>
									</tr>
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

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
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

