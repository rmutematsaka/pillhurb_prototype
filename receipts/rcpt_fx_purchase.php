<?php 
	require_once('../functions/initialise.php');
	$pageTitle = 'Forex Purchase Receipt';
	require_once(SHARED_PATH.'/header_print.php');
	$table = 'forex_purchase';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
	if(isset($_GET['rcpt'])){
		$receipt = $_GET['rcpt'];
	}
	$sql = "SELECT * FROM forex_purchase
			join user on user.username = forex_purchase.forex_purchase_transaction_agent
			join branch on branch.branch_code = user.admin_branch
			join country on country.country_id = branch.country
			WHERE forex_purchase_id = '$receipt'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$forex_purchases = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
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

<?php foreach($forex_purchases as $key=>$value){ ?>
<div class="container" style="width: 90%;">
<div id="ui-view" data-select2-id="ui-view">
<div>
<div class="card" style="border:0px;">
<!--<div class="card-header">
	<strong>Receipt:</strong> <?php echo $value['forex_purchase_code']; ?>
</div>-->
<div class="card-body">
	<h1 class="h5"><?php echo $pageTitle;?></small></h5>
<div class="row mb-4">
	<div class="col-sm-4">
	<div>
	<strong><?php echo $value['name']; ?></strong>
	</div>
	<div><?php echo $value['identifier']; ?></div>
	<div><?php echo $value['address']; ?></div>
	<div class="format_city"><?php echo $value['city']; ?></div>
	<div><?php echo $value['country_name']; ?></div>
	</div>

	<div class="col-sm-4">
		<div><strong>Receipt:</strong> <?php echo $value['forex_purchase_code']; ?></div>
		<div><strong>Receipted:</strong> <?php echo $value['forex_purchase_timestamp']; ?></div>
		<div><strong>Reprinted:</strong> <?php echo $timestamp; ?></div>
		<div><strong>Teller:</strong> <?php echo $value['forex_purchase_transaction_agent']; ?></div>
		<!--<div>
		<strong>-</strong>
		</div>-->
	</div>
</div>
<div class="row mb-4">
	<div class="col-sm-4">
		<h6 class="mb-1">Customer Details:</h6>
	<div>
	<!--<strong>Sender</strong>-->
	</div>
	<div><?php echo $value['forex_purchase_from_name']; ?></div>
	<div><?php echo $value['forex_purchase_from_id_number']; ?></div>
	<div><?php echo $value['forex_purchase_code']; ?></div>
	<div><?php echo $value['forex_purchase_code']; ?></div>
	</div>

	<!--<div class="col-sm-4">
		<h6 class="mb-3">Details:</h6>
		<div><strong>Receipt:</strong> <?php echo $value['forex_purchase_code']; ?></div>
		<div><?php echo $value['forex_purchase_code']; ?></div>
		<div><?php echo $value['forex_purchase_code']; ?></div>
		<div><?php echo $value['forex_purchase_code']; ?></div>
		<div>
		<strong>-</strong>
		</div>
	</div>-->
</div>
<div class="table-responsive-sm">
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Item</th>
			<th>Description</th>
			<th class="center">Amount Sold</th>
			<th class="center">Amount Paid</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td class="left"><?php echo $value['forex_purchase_from_name']; ?></td>
		<td class="left"><?php echo $value['forex_purchase_comments']; ?></td>
		<td class="text-end"><?php echo $value['forex_purchase_amount_sold']; ?></td>
		<td class="text-end"><?php echo $value['forex_purchase_amount_paid']; ?></td>
	</tr>
	<tr>
		<td colspan=3 class="text-end">
			<strong>Total</strong>
		</td>
		<td class="text-end">
			<strong><?php echo $value['forex_purchase_amount_paid']; ?></strong>
		</td>
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