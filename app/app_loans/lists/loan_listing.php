<div class="table-responsive">
	<table class="table table-responsive table-condensed table-hover table-striped table-bordered">
		<thead>
			<th>#</th>
			<th>Customer ID</th>
			<th>Customer Code</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php $i=1; foreach($loans as $key=>$loan){?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $loan['reference'];?></td>
				<td><?php echo $loan['customer_code'];?></td>
				<td>
					<a href="payments.php?p=<?php echo $loan['reference']; ?>" class="btn btn-dark btn-sm"><i class="bi bi-send"></i></a>
					<a href="<?php echo url_for('app/app_mta/lists/cst_send_list.php');?>?c=<?php echo $loan['customer_code']; ?>" class="btn btn-dark btn-sm"><i class="bi bi-list"></i></a>
				</td>
			</tr>
		<?php $i++;} ?>
		</tbody>
	</table>
</div>
