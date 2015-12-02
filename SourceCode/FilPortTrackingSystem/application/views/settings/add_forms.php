		


				<div class="broker tab-pane" id="broker">
				<div class="broker con-info consig-pos tab-pane"  data-toggle="collapse" data-target=".brokers" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW BROKER</span>
				</div>
				<div class="brokers consig-posbox collapse add_broker tab-pane "></div>
					<div class=" brokers consig-formbox collapse  tab-pane ">
							<form action="<?php //echo base_url('Add_user/add_client/');?>" method="post">
								<div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Broker Name</label>
						                <input type="text" name="cname"class="form-control" placeholder="" required/>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-lg-12">
						            	<label>email-address</label>
						                <input type="text" name="Address" class="form-control" required />
						            </div>
						        </div>
						 
						        <div class="row">
						        	<div class="form-group col-lg-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						        </div>
				   	 		</form>
					</div>	
				</div>
		
				<div class="vessel tab-pane" id="vessel">
					<div class=" vessel con-info consig-pos"  data-toggle="collapse" data-target=".vessels" style="cursor:pointer">
						<span style="cursor:pointer">ADD NEW VESSEL</span>
					</div>
				<div class="vessels consig-posbox collapse "></div>
					<div class="vessels consig-formbox collapse add_vessel">
						<form action="<?php //echo base_url('Add_user/add_client/');?>" method="post">
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Vessel Name</label>
					                <input type="text" name="cname"class="form-control" placeholder="" required/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Shipper ID</label>
					                <input type="text" name="Address" class="form-control" required />
					            </div>
					        </div>
					 
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
					</div>	
				</div>

				<div class="shipper tab-pane"  id="shipper">
				<div class="shipper con-info consig-pos"  data-toggle="collapse" data-target=".shippers" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW SHIPPER</span>
				</div>
					<div class="shippers consig-posbox collapse"></div>
					<div class="shippers consig-formbox collapse">
						<form action="<?php //echo base_url('Add_user/add_client/');?>" method="post">
							<div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Shipper Name</label>
					                <input type="text" name="cname"class="form-control" placeholder="" required/>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-12">
					            	<label>Shipper ID</label>
					                <input type="text" name="Address" class="form-control" required />
					            </div>
					        </div>
					 
					        <div class="row">
					        	<div class="form-group col-lg-12">
					            	<button type="submit" class="pull-right btn btn-default">Submit</button>
					            </div>	
					        </div>
			   	 		</form>
					</div>
				</div>


				<div class="country tab-pane" id="country">
				<div class="country con-info consig-pos" data-toggle="collapse" data-target=".countrys" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW COUNTRY</span>
				</div>
				<div class="countrys consig-posbox collapse "></div>
					<div class="countrys consig-formbox collapse">
							<form action="<?php //echo base_url('Add_user/add_client/');?>" method="post">
								<div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Country Name</label>
						                <input type="text" name="cname"class="form-control" placeholder="" required/>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Coutry Code</label>
						                <input type="text" name="Address" class="form-control" required />
						            </div>
						        </div>
						 
						        <div class="row">
						        	<div class="form-group col-lg-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						        </div>
				   	 		</form>
					</div>
				</div>


				<div class="container tab-pane" id="container">
				<div class="container con-info consig-pos " data-toggle="collapse" data-target=".containers" style="cursor:pointer">
					<span style="cursor:pointer">ADD NEW CONTAINER</span>
				</div>
				<div class="containers consig-posbox  collapse"></div>
					<div class="containers consig-formbox  collapse">
							<form action="<?php //echo base_url('Add_user/add_client/');?>" method="post">
								<div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Shipper Name</label>
						                <input type="text" name="cname"class="form-control" placeholder="" required/>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Shipper ID</label>
						                <input type="text" name="Address" class="form-control" required />
						            </div>
						        </div>
						 
						        <div class="row">
						        	<div class="form-group col-lg-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						        </div>
				   	 		</form>
					</div>
				</div>

				<div class="city tab-pane" id="city">
					<div class="city con-info consig-pos "  data-toggle="collapse" data-target=".citys" style="cursor:pointer">
						<span style="cursor:pointer">ADD NEW CITY</span>
					</div>
				<div class="citys consig-posbox  collapse"></div>
					<div class="citys consig-formbox  collapse">
							<form action="<?php //echo base_url('Add_user/add_client/');?>" method="post">
								<div class="row">
						            <div class="form-group col-lg-12">
						            	<label>City Name</label>
						                <input type="text" name="cname"class="form-control" placeholder="" required/>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-lg-12">
						            	<label>Country Name</label>
						                <input type="text" name="Address" class="form-control" required />
						            </div>
						        </div>
						 
						        <div class="row">
						        	<div class="form-group col-lg-12">
						            	<button type="submit" class="pull-right btn btn-default">Submit</button>
						            </div>	
						        </div>
				   	 		</form>
					</div>	

				</div>