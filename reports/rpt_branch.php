<?php 
	require_once('../functions/initialise.php');
	$pageTitle = 'Individual Branch Report';
	require_once(SHARED_PATH.'/header_print.php');
	$table = 'dom_remittance';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);

	$sql = "SELECT * FROM $table 
			WHERE dom_remittance_open_timestamp between '$rep_from' AND '$rep_to'
			and dom_remittance_open_branch = '$selected_branch'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$transactions = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
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
		  <th scope="col">Reference</th>
		  <th scope="col">Sender</th>
		  <th scope="col">Receiver</th>
		  <th scope="col">Amount</th>
		  <th scope="col">Account</th>
		  <th scope="col">Bank</th>
		  <th scope="col">Teller</th>
		  <th scope="col">Date</th>
		  <th scope="col">Status</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			foreach($transactions as $key=>$value){
		?>
		<tr>
		  <td><?php echo $key+1; ?></td>
		  <td><?php echo $value['dom_transfer_code']; ?></td>
		  <td><?php echo $value['dom_sender_id']; ?></td>
		  <td><?php echo $value['dom_receiver_id']; ?></td>
		  <td class="text-end">
			<?php 
			switch($value['dom_transfer_currency']){
				case 'RAND':
					echo 'R';
				break;
				case 'USD':
					echo 'USD$';
				break;
			}
		  ?> <?php echo number_format($value['dom_transfer_amount']+$value['dom_transfer_charge']+$value['dom_transfer_diff']+$value['bank_type_charge'],2); ?><br/>
		  </td>
		  <td>
			<?php echo $value['vault_code']; ?><br/>
		  </td>
		  <td><?php echo $value['bank_account_type']; ?></td>
		  <td><?php echo $value['dom_remittance_open_agent']; ?></td>
		  <td><?php echo $value['dom_remittance_open_timestamp']; ?></td>
		  <td><?php 
			switch($value['dom_remittance_status']){
				case 0:
					echo 'Open';
				break;
				case 1:
					echo 'Closed';
				break;
			}
		  ?></td>
		</tr>
		<?php } ?> 
	  </tbody>
	</table>
  </div>
</div>
</div>