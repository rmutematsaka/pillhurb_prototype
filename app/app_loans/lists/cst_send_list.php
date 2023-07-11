<?php 
	require_once('../../../functions/initialise.php');
	$pageTitle = 'Customer Transactions';
	$subTitle = 'Customer Transactions';
	require_once(SHARED_PATH.'/header.php');
	$table = 'dom_remittance';
	if(isset($_GET['c'])){
		$customer = $_GET['c'];
	}
?>
<?php require_once(APP_PATH.'app_mta/includes/mt_btns.php');?>
<div class="container my-5">
	<form id="form-users" action="" method="POST">
		<div class="row">
		<div class="">
			<?php
				require_once(PROJECT_PATH.'/controllers/forex_purchase_controller.php');
			?>
		</div>
      <div class="table-responsive">
        <table id="tbl-users" class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Sender</th>
              <th scope="col">Receiver</th>
              <th scope="col">Reference</th>
              <th scope="col">Currency</th>
              <th scope="col">Amount</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
			<?php 
				$data = ["dom_sender_id"=>$customer];
				$transactions = select_all($table,$data);
				foreach($transactions as $key=>$value){
			?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $value['dom_sender_id']; ?></td>
              <td><?php echo $value['dom_receiver_id']; ?></td>
              <td><?php echo $value['dom_transfer_code']; ?></td>
              <td><?php echo $value['dom_transfer_currency']; ?></td>
              <td><?php echo number_format($value['dom_transfer_amount'],2); ?></td>
              <td><?php echo strip_timestamp($value['dom_remittance_open_timestamp']); ?></td>
              <td><?php echo $value['dom_remittance_status']; ?></td>
            </tr>
			<?php } ?> 
          </tbody>
        </table>
      </div>
		</div>
	</form>
</div>
<?php require_once(SHARED_PATH.'/footer.php');?>
