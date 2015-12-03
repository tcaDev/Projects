<!-- Get Header -->
<?php $this->load->view('header/header'); ?>
<!-- End Header -->

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

					<span color:red;>Search filter &raquo;</span></a></p>

					<p class="collapse pull-left" id="viewdetails">

						<label class="checkbox-inline"><input type="checkbox" value="">Jobfile</label>

						<label class="checkbox-inline"><input type="checkbox" value="">Container no.</label>

						<label class="checkbox-inline"><input type="checkbox" value="">Consignee</label>

					</p>

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