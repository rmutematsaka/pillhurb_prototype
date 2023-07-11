<?php 
	require_once('../functions/initialise.php');
	$pageTitle = 'Forex Purchases Report';
	require_once(SHARED_PATH.'/header_print.php');
	$table = 'forex_purchase';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
	
	//$forex_purchases = select_all_report_range($table,["forex_purchase_registered_date"=>$rep_from,"forex_purchase_status"=>$rep_to]);
	$sql = "SELECT * FROM forex_purchase 
			WHERE forex_purchase_timestamp between '$rep_from' AND '$rep_to'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$forex_purchases = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><?php echo $pageTitle;?> | <small><?php echo $_POST['rep_from'];?> to <?php echo $_POST['rep_to'];?></small></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
		<button type="button" class="btn btn-outline-dark btn-sm d-print-none" onclick="javascript:window.print();" data-abc="true">
		  <i class="bi bi-printer"></i> Print
		</button>
		<button type="button" class="btn btn-outline-dark btn-sm d-print-none" onclick="javascript:window.close();" data-abc="true">
		  <i class="bi bi-x-circle"></i> Close
		</button>
  </div>
</div>
</div>
<div class="container">
<div class="row">
  <div class="table-responsive">
	<table id="" class="table table-striped table-sm table-bordered">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Purchase Code</th>
		  <th scope="col">Name</th>
		  <th scope="col">National ID</th>
		  <th scope="col">Sold</th>
		  <th scope="col">Paid</th>
		  <th scope="col">Date</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			foreach($forex_purchases as $key=>$value){
		?>
		<tr>
		  <td><?php echo $key+1; ?></td>
		  <td><?php echo $value['forex_purchase_code']; ?></td>
		  <td><?php echo $value['forex_purchase_from_name']; ?></td>
		  <td><?php echo $value['forex_purchase_from_id_number']; ?></td>
		  <td>
			<?php echo $value['settlement_mode']; ?> <?php echo $value['forex_purchase_amount_sold']; ?><br/>
		  </td>
		  <td>
			<?php echo $value['payment_mode']; ?> <?php echo $value['forex_purchase_amount_paid']; ?><br/>
		  </td>
		  <td><?php echo strip_timestamp($value['forex_purchase_timestamp']); ?></td>
		</tr>
		<?php } ?> 
	  </tbody>
	</table>
  </div>
</div>
</div>