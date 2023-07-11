<div class="table-responsive">
	<table class="table table-responsive table-condensed table-bordered table-hover">
		<tbody>
			<?php
			foreach($nok as $key=>$value){ ?>
				<input type="hidden" name="nok_code" value="<?php echo $value["nok_code"];?>"/>
				<tr>
					<th width="20%">Name</th>
					<td><?php echo $value["nok_name"].' '.$value["nok_surname"];?></td>
				</tr>
				<tr>
					<th width="20%">nok ID</th>
					<td><?php echo $value["nok_code"];?></td>
				</tr>
				<tr>
					<th width="20%">National ID No</th>
					<td><?php echo $value["nok_nat_id"];?></td>
				</tr>
				<tr>
					<th width="20%">Address</th>
					<td><?php echo $value['nok_address1'].', '.$value['nok_address2'].', '.$value['nok_address3'].', '.$value['nok_country'];?></td>
				</tr>
			<?php	
			}
			?>
		</tbody>
	</table>
</div>

