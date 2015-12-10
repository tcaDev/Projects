  <fieldset >
    <legend align="left">Legend :</legend>
			<div style="overflow-x:auto;">
				<div class="container-fluid">
					<div class="row">
						<table style="font-size: 83%;">
							<?php
								foreach ($status as $row) {
								$status = $row->IsBackground;
								   if($status==0){	?>
							<tr>
							<td  colspan="4" style="color: <?php echo $row->ColorCode; ?>;border: 2px solid #fff;"><?php echo $row->StatusName; ?></td>
							<?php }else{?>
							<td  colspan="4" style="background-color: <?php echo $row->ColorCode; ?>;border: 2px solid #fff;"><?php echo $row->StatusName; ?></td>
							<?php }?>
								<td style="padding-left:5px; text-align: left;border: 1px solid #fff;"><?php echo $row->Description; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
  </fieldset>