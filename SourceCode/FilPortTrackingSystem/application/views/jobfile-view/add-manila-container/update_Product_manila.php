<div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
    <div class="modal-header" style="background-color:#eee">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Commodity(s)</h4>
    </div>

    <div class="modal-body">

    	<!-- Products PLATE WINDOW-->
				  	<div id="table-updateProduct-mnla" class="product-mnla-update">

				  			<div class="form-group">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-updateProduct-mnla form-control input-sm" id="jbfl" disabled>
							</div>

							<div class="form-group">
								<label>Product Name</label><i style="color:red;">*</i>
								<div class="get_my_products"></div>
								 <select class="prodname-updateProduct-mnila form-control input-sm">
								  <?php foreach ($products as $row) {?>

								 	  <?php echo "<option> ".stripslashes($row->ProductName)."</option>"; ?>
	
								 <?php }?>
								 </select>
								<i class="prodname-msg-updateProduct-mnila" style="color:red;"></i>
							</div>

							<div class="form-group ">	
								<label>Container Number</label>
                					<select class="container-updateProduct-manila-get form-control input-sm">


                					</select>
							</div>
					</div>

    </div>

	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger save_container">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>


<script>

$(document).ready(function(){

	$(document).on('click','.btn-update-product',function(){

		
		var jobfile_mnla = $(".jobfile_mnila_update_product").val();

		$(".jobfile-updateProduct-mnla").val(jobfile_mnla);
		

		 var product_value = $(this).closest('tr').children('td:eq(2)').text();
		 var product= $(this).closest('tr').children('td:eq(3)').text();
		 var container = $(this).closest('tr').children('td:eq(4)').text();

		 $('.prodname-updateProduct-mnila').prepend("<option value='"+product_value+"' selected>"+product+"</option>");

				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_updated_container_product');?>",
				  		data: { jobfile:jobfile_mnla
				  		}
					})
			  		.done(function(data) {
				  				$('.container-updateProduct-manila-get').html(data);
								$('.container-updateProduct-manila-get').prepend("<option value='' selected>"+container+"</option>");
					});


		

	});
});
	

</script>