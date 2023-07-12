<div class="table-responsive">
	<table class="table table-responsive table-condensed table-bordered table-hover">
		<thead>
			<th>Category</th>
			<th>Item</th>
			<th>Make</th>
			<th>Serial</th>
			<th>Market Value</th>
			<th>Forced Value</th>
		</thead>
		<tbody>
			<?php
			foreach($collateral as $key=>$value){ ?>
				<input type="hidden" name="collateral_code" value="<?php echo $value["collateral_code"];?>"/>
				<tr>
					<td><?php echo collateral_category($value["category"]);?></td>
					<td><?php echo $value['type']."<br/>"; ?></td>
					<td><?php echo $value['brand']." ".$value['make_model']." ".$value['reg_no']; ?></td>
					<td><?php echo $value['chassis_serial']; ?></td>
					<td><?php echo $value['market_value']; ?></td>
					<td><?php echo $value['forced_sale_value']; ?></td>
				</tr>
			<?php	
			}
			?>
		</tbody>
	</table>
</div>


