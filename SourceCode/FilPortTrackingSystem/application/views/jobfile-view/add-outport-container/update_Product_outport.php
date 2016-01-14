<div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
    <div class="modal-header" style="background-color:#eee">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Commodity(s)</h4>
    </div>

    <div class="modal-body">

    	<!-- Products PLATE WINDOW-->
				  	<div id="table-updateProduct-outport" class="product-outport-update">

				  			<div class="form-group">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-updateProduct-outport form-control input-sm" id="jbfl" disabled>
							</div>

							<div class="form-group">
								<label>Product Name</label><i style="color:red;">*</i>
								<div class="get_my_products"></div>
								 <select class="prodname-updateProduct-outport form-control input-sm">
								 <option value="0" selected></option>
								  <?php foreach ($products as $row) {?>

								 	  <?php echo "<option value=".stripslashes($row->ProductId).">".stripslashes($row->ProductName)."</option>"; ?>
	
								 <?php }?>
								 </select>
								<i class="prodname-msg-updateProduct-outport" style="color:red;"></i>
							</div>

							<div class="form-group container-updateProduct-outport-gets ">	
								<label>Container Number</label>
                					<select class="container-updateProduct-outport-get form-control input-sm">


                					</select>
							</div>
					</div>

    </div>

	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger update_comodity-outport">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>


<script>
var prodconid_outport;
var prodid_outport;
var cbc_outport;
$(document).ready(function(){

	$(document).on('click','.btn-update-product-outport',function(){

		
		var jobfile_outport = $(".jobfile_outport_update_product").val();

		$(".jobfile-updateProduct-outport").val(jobfile_outport);
		

		 var product_value = $(this).closest('tr').children('td:eq(2)').text();
		 var product= $(this).closest('tr').children('td:eq(3)').text();
		 var container = $(this).closest('tr').children('td:eq(4)').text();
        var productsbycontainerid = $(this).closest('tr').children('td:eq(5)').text();


        
        prodconid_outport= productsbycontainerid;

	
        
		 $(".prodname-updateProduct-outport option").filter(function() {
		    return this.text == product; 
		}).attr('selected', 'selected');

		


				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_updated_container_product');?>",
				  		data: { jobfile:jobfile_outport
				  		}
					})
			  		.done(function(data) {
				  				$('.container-updateProduct-outport-get').html(data);
				  				 $(".container-updateProduct-outport-get option").filter(function() {
								    return this.text == container; 
								}).attr('selected', 'selected');
								
					});


		

	});

	$(document).on('click','.update_comodity-outport',function(){
		var   cbc = $('.container-updateProduct-outport-gets select option:selected').val();
		var   prodid = $('.prodname-updateProduct-outport').val();
		var   jbfl = $('.jobfile-updateProduct-outport').val();

		  /*	alert("prodconid" + prodconid_outport + " " + "cbc" + " " +cbc + " " + prodid );
		  		*/
		  				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_manila_update/product');?>",
				  		data: { prodconid:prodconid_outport,
				  			     prodid  :prodid,
				  			     cbcid   :cbc,
				  			     jbfl    :jbfl
				  		}
					})
			  		.done(function(data) {
				             $.alert({
				        		title: 'Success!',
				        		content: data,
				        		confirm: function(){
									 $('#updateProduct-outport').modal('hide');
				        			 $('#viewgoods-outport').modal('hide');
				        	    }
				   			   });
								
					});
	});
});
	

</script>