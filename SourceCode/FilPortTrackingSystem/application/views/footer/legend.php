  <fieldset >
    <legend align="left">Legend For Color Stages:</legend>
			<div style="overflow-x:auto;">
				<div class="container-fluid">
					<div class="row">
						<table style=" font-size: 83%;">
							<?php
								foreach ($status as $row) {
								$status = $row->IsBackground;
								   if($status==0){	?>
							<tr>
							<th colspan="4" style="color: <?php echo $row->ColorCode; ?>; background-color:#fff; border: 2px solid #fff;"><?php echo $row->StatusName; ?></th>
							<?php }else{?>
							<th colspan="4" style="color:#000; background-color: <?php echo $row->ColorCode; ?>;border: 2px solid #fff;"><?php echo $row->StatusName; ?></th>
							<?php }?>
								<td style="padding-left:5px; text-align: left;border: 1px solid #fff;"><?php echo $row->Description; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
  </fieldset>