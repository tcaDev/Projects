	<div class="gl-filter">
		<div class="gl-filtitle">
			<h1>Filters</h1>
		</div>

	<h4>Type:</h4>
		<select class="form-control">
			<option>Jobfile</option>
			<option>Shipper</option>
			<option>Broker</option>
		</select><br>

	<h4>Limit:</h4>	
<!-- 			<?php //for ($x = 1; $x <= 10; $x++) {
			?> -->
		<select class="form-control">
<!-- 				<?php// echo "<option> $x </option>"; }?> -->
				<option>1</option>
				<option>2</option>
		</select><br>

	<h4>Date Created:</h4>
		<h6>From:</h6>
		<input class="form-control" type="date"> 
		<h6>To:</h6>
		<input class="form-control" type="date">
	</div>

	<div class="gl-bar">

		<div class="input-group col-lg-12">

            <input type="text" class="  search-query form-control" placeholder="Search" onkeyup="search(this.value)" />

            <span class="input-group-btn">

                <button class="btn" type="submit">

                    <span class=" glyphicon glyphicon-search"></span>

                </button>

            </span>

        </div>

    	<p><a class="btn pull-left" data-toggle="collapse" data-target="#viewdetails">

	</div>
		<div class="gl-container">
		 <span id="result"></span>
		</div>
	</div>
</body>
</html>

<script>

			function search(searchme) {

					if(searchme.length==0){

							$('table').remove();

						return;

					}else{

						$('table').remove();

	 						$.ajax

								 	({

								 		type: "GET",

								 		url: "<?php echo base_url('search');?>",

								 		data: {search:searchme},

								 		success: function(res)

								 		{

								 		$( "#result" ).html(res);



										}



							});

						}

			}

	</script>