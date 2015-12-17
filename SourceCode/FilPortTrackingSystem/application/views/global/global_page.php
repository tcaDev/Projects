
	<div class="gl-filter">
		<div class="gl-filtitle">
			<h1>Search</h1>
		</div>
		<div class="input-group col-lg-12">

            <input type="text" class="search-query form-control" id="txtGlobalSearch" placeholder="Search" onkeyup="search(this.value)"/>

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
	 <span id="result"></span>
	 	
	 </div>
</body>
</html>

<script>
var filter;
var filter_Type;
var search_name;
var search_from;
			function disable_filter(){
				document.getElementById("cboType").disabled = true;
			}

			function enable_filter(){
				document.getElementById("cboType").disabled = false;
			}
			function getFilters(){
					$('#lblResultDetails').html("<p></p>");
					filter = $('#cboType :selected').text();
					if(filter == "JobFile"){
						filter_Type = "JobfileID";
						search_from = "vw_JobFile"
					}else if(filter == "Consignee"){
						filter_Type = "ConsigneeName";
						search_from = "vw_consignee_full_info";
					}else if(filter == "Hauler/Truck"){
						filter_Type = "HaulerOrTruck";
						search_from = "HaulerOrTruck";
					}else if(filter == "Shipper"){
						filter_Type = "ShipperName";
						search_from = "vw_shipper_full_info";
					}else if(filter == "Carrier"){
						filter_Type = "CarrierName";
						search_from = "Carrier";
					}else if(filter == "Broker"){
						filter_Type = "CONCAT(FirstName,' ',MiddleName,' ',LastName)";
						search_from = "vw_broker_full_info";
					}
			}

			function searchItem(){
				$('table').remove();
				//alert(search_from + "  " + filter_Type + " " + search_name);
				$.ajax({
						type: "GET",
						url: "<?php echo base_url('search');?>",
						data: {
			 				search:search_name,
							searchType:filter_Type,
							searchFrom:search_from 
							  },
						success: function(res)
							  {
								var displayDetails = JSON.parse(res);	
								$( "#result" ).html(displayDetails[0].Display);
								$('#lblResultDetails').html("<p>" + displayDetails[0].OutputCount + "</p>");
							 }
				});			
			}

			$('#cboType').on('change',function(){
					getFilters();
					searchItem();
			});

			function search(searchme) {
				if(searchme.length==0){
							$('table').remove();
							$('#lblResultDetails').html("<p></p>");
							disable_filter();				
							return;
					}else{
						enable_filter();
						getFilters();
						search_name = searchme;
						searchItem();
					}
			}

	</script>