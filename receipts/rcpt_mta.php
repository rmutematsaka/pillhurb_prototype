<?php 
	require_once('../functions/initialise.php');
	$pageTitle = 'Money Transfer Receipt';
	require_once(SHARED_PATH.'/header_print.php');
	$table = 'dom_remittance';
	$give_access_to = [ADMIN,AGENT,ACCOUNTANT];
	redirect_to($session_user_role,$give_access_to);
	if(isset($_GET['rcpt'])){
		$receipt = $_GET['rcpt'];
	}
	$sql = "SELECT * FROM dom_remittance
			join user on user.username = dom_remittance.dom_remittance_open_agent
			join branch on branch.branch_code = dom_remittance.dom_remittance_open_branch
			join country on country.country_id = branch.country
			WHERE dom_remittance_id = '$receipt'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$transfers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom d-print-none">
<h1 class="h5"><?php echo $pageTitle;?></small></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
		<button type="button" class="btn btn-outline-dark btn-sm" onclick="javascript:window.print();" data-abc="true">
		  <i class="bi bi-printer"></i> Print
		</button>
		<button type="button" class="btn btn-outline-dark btn-sm" onclick="javascript:window.close();" data-abc="true">
		  <i class="bi bi-x-circle"></i> Close
		</button>
  </div>
</div>
</div>

<style>
.card {
margin-bottom: 1.5rem
}
.card {
position: relative;
display: -ms-flexbox;
display: flex;
-ms-flex-direction: column;
flex-direction: column;
min-width: 0;
word-wrap: break-word;
background-color: #fff;
background-clip: border-box;
border: 1px solid #c8ced3;
border-radius: .25rem
}
.card-header:first-child {
border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}
.card-header {
padding: .75rem 1.25rem;
margin-bottom: 0;
background-color: #f0f3f5;
border-bottom: 1px solid #c8ced3
}
</style>

<?php foreach($transfers as $key=>$value){ ?>
<div class="container">
<div id="ui-view" data-select2-id="ui-view">
<div>
<div class="card" style="border:0px;">
<!--<div class="card-header">
	<strong>Receipt:</strong> <?php echo $value['mta_']; ?>
</div>-->
<div class="card-body">
		<h4 class="mb-3 text-center"><?php echo $pageTitle;?></h4><hr/>
<div class="row mb-4">
	<div class="col-sm-6">
	<div>
	<strong><?php echo $value['name']; ?></strong>
	</div>
	<div><?php echo $value['identifier']; ?></div>
	<div><?php echo $value['address']; ?></div>
	<div class="format_city"><?php echo $value['city']; ?></div>
	<div><?php echo $value['country_name']; ?></div>
	</div>

	<div class="col-sm-6">
		<div class="text-end"><strong>Receipt:</strong> <?php echo 'MTA_'.str_pad($value['dom_remittance_id'],10,0,STR_PAD_LEFT); ?></div>
		<div class="text-end"><strong>Receipted:</strong> <?php echo $value['dom_remittance_open_timestamp']; ?></div>
		<div class="text-end"><strong>Reprinted:</strong> <?php echo $timestamp; ?></div>
		<div class="text-end"><strong>Teller:</strong> <?php echo $value['dom_remittance_open_agent']; ?></div>
		<!--<div>
		<strong>-</strong>
		</div>-->
	</div>
</div>
<div class="row mb-4">
	<div class="col-sm-4">
		<h6 class="mb-1">Transaction Details:</h6>
	</div>

</div>
<div class="table-responsive-sm">
<table class="table table-striped">
	<thead>
		<tr>
			<th colspan=2>Sender Details</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$data = ["customer_code"=>$value['dom_sender_id']];
			$sender = select_all('customer',$data);
		foreach($sender as $key => $person){
		?>
		<input type="hidden" name="dom_sender_id" value="<?php echo $person["customer_code"];?>"/>
		<tr>
			<th width="20%">Name</th>
			<td><?php echo $person['customer_name']. ' ' . $person['customer_surname'];?></td>
		</tr>
		<tr>
			<th width="20%">National ID No</th>
			<td><?php echo $person['customer_nat_id'];?></td>
		</tr>
		<tr>
			<th width="20%">Address</th>
			<td><?php echo $person['customer_address1'].', '.$person['customer_address2'].', '.$person['customer_address3'];?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<div class="table-responsive-sm">
<table class="table table-striped">
	<thead>
		<tr>
			<th colspan=2>Receiver Details</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$data = ["customer_code"=>$value['dom_receiver_id']];
			$receivers = select_all('customer',$data);
		foreach($receivers as $key => $receiver){
		?>
		<input type="hidden" name="dom_sender_id" value="<?php echo $receiver["customer_code"];?>"/>
		<tr>
			<th width="20%">Name</th>
			<td><?php echo $receiver['customer_name']. ' ' . $receiver['customer_surname'];?></td>
		</tr>
		<tr>
			<th width="20%">National ID No</th>
			<td><?php echo $receiver['customer_nat_id'];?></td>
		</tr>
		<tr>
			<th width="20%">Address</th>
			<td><?php echo $receiver['customer_address1'].', '.$receiver['customer_address2'].', '.$receiver['customer_address3'];?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<div class="table-responsive-sm mt-0" style="width: 50%;float: right;">
<table class="table table-stripeds">
	<tbody>
		<tr>
			<th>Reference No.</th>
			<td class="text-end"><?php echo $value['dom_transfer_code'];?></td>
		</tr>
		<tr>
			<th>Amount Sent</th>
			<td class="text-end"><?php echo $value['dom_transfer_currency'].' '.$value['dom_transfer_amount'];?></td>
		</tr>
		<tr>
			<th>Charges</th>
			<td class="text-end"><?php echo $value['dom_transfer_currency'].' '. number_format($value['dom_transfer_charge']+$value['dom_transfer_diff']+$value['bank_type_charge'],2);?></td>
		</tr>
		<tr>
			<th>Total</th>
			<td class="text-end"><?php echo $value['dom_transfer_currency'].' '. number_format($value['dom_transfer_amount']+$value['dom_transfer_charge']+$value['dom_transfer_diff']+$value['bank_type_charge'],2);?></td>
		</tr>
	</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-7 col-sm-6"></div>
<div class="col-lg-5 col-sm-6 ml-auto">
<!--<a class="btn btn-success" href="#" data-abc="true">
<i class="fa fa-usd"></i> Proceed to Payment</a>-->
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
<?php } ?>