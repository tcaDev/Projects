  <fieldset >
    <legend align="left" style="font-size:12px;">Legend For Color Stages:</legend>
			<div class="legend-body-font" style="overflow-x:auto;font-size:12px;line-height: 1.6875;">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<?php
							foreach ($status as $row) {
							$status = $row->IsBackground;
						    if($status==0){	?>
							    <div>
							    	<div class="col-lg-1 col-md-1 col-sm-1" style="color:<?php echo $row->ColorCode; ?>;">
										<span><?php echo $row->StatusName; ?></span>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-5 " >
										<?php echo $row->Description; ?>
									</div>
							    </div>
									<?php }else{?>
								<div>
									<div class="col-lg-1 col-md-1 col-sm-1" style="background-color: <?php echo $row->ColorCode; ?>;">
										<span><?php echo $row->StatusName; ?></span>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-5 " >
										<?php echo $row->Description; ?>
									</div>	
								</div>
																	
								<?php }?>
									
							<?php } ?>
						
						</div>
					</div>
				</div>
			</div>
  </fieldset>
  <style>

  </style>

