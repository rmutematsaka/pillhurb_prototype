<div class="table-responsive">
	<table class="table table-responsive table-condensed table-hover table-striped table-bordered">
		<thead>
			<th>#</th>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php $i=1; foreach($senders as $key=>$value){?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $value['customer_code'];?></td>
				<td><?php echo $value['customer_name'] . ' ' . $value['customer_surname'];?></td>
				<td><?php echo $value['customer_address1'] . ', ' . $value['customer_address2'] . ', ' .$value['customer_address3'];?></td>
				<td><?php echo $value['customer_phone'];?></td>
				<td>
					<a href="new_loan.php?s=<?php echo $value['customer_code']; ?>" class="btn btn-dark btn-sm"><i class="bi bi-send"></i></a>
					<a href="<?php echo url_for('app/app_mta/lists/cst_send_list.php');?>?c=<?php echo $value['customer_code']; ?>" class="btn btn-dark btn-sm"><i class="bi bi-list"></i></a>
				</td>
			</tr>
		<?php $i++;} ?>
		</tbody>
	</table>
</div>
