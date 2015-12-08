  <fieldset >
    <legend align="left">Legend :</legend>

			<div class="row" style="padding-bottom: 10px;">

				<div class="col-lg-10 col-md-10 col-sm-10 " >

					<div class="row">
						<table style="font-size: 90%;">
							<?php
								foreach ($status as $row) {
								$status = $row->StatusName;
								   if($status=='Red Font'){	?>
							<tr>
							<td  colspan="4" style="color: <?php echo $row->ColorCode; ?>;"><?php echo $row->StatusName; ?></td>
							<?php }else{?>
							<td  colspan="4" style="background-color: <?php echo $row->ColorCode; ?>;"><?php echo $row->StatusName; ?></td>
							<?php }?>
								<td style="padding-left:5px; text-align: left;"><?php echo $row->Description; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>

			</div>
		
  </fieldset>