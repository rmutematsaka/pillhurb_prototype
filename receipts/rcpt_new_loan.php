<?php 
	require_once('../functions/initialise.php');
	$pageTitle = 'New Loan Receipt';
	require_once(SHARED_PATH.'/header_print.php');
	$table = 'loan_list';
	$give_access_to = [ADMIN,AGENT,ACCOUNTANT];
	redirect_to($session_user_role,$give_access_to);
	if(isset($_GET['rcpt'])){
		$receipt = $_GET['rcpt'];
	}
	$sql = "SELECT * FROM loan_list
			WHERE loan_list.id = '$receipt'";
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
		<a type="button" class="btn btn-outline-dark btn-sm" href="<?php echo url_for('/app/app_loans/');?>" data-abc="true">
		  <i class="bi bi-x-circle"></i> Close
		</a>
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
	<strong></strong>
	</div>
	<div></div>
	<div></div>
	<div class="format_city"></div>
	<div></div>
	</div>

	<div class="col-sm-6">
		<div class="text-end"><strong>Receipt:</strong> <?php echo 'RCPT_'.str_pad($value['id'],10,0,STR_PAD_LEFT); ?></div>
		<div class="text-end"><strong>Receipted:</strong> <?php echo $value['date_created']; ?></div>
		<div class="text-end"><strong>Reprinted:</strong> <?php echo $timestamp; ?></div>
		<div class="text-end"><strong>Teller:</strong> <?php echo $value['created_by']; ?></div>
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
			//$data = ["customer_code"=>$value['dom_sender_id']];
			//$sender = select_all('customer',$data);
		//foreach($sender as $key => $person){
		?>
		<input type="hidden" name="dom_sender_id" value=""/>
		<tr>
			<th width="20%">Name</th>
			<td></td>
		</tr>
		<tr>
			<th width="20%">National ID No</th>
			<td></td>
		</tr>
		<tr>
			<th width="20%">Address</th>
			<td></td>
		</tr>
		<?php //} ?>
	</tbody>
</table>
</div>
<div class="table-responsive-sm">
<table class="table table-striped">
	<thead>
		<tr>
			<th colspan=2>Collateral Details</th>
		</tr>
	</thead>
	<tbody>
		Collateral details here
	</tbody>
</table>
</div>
<div class="table-responsive-sm mt-0" style="width: 50%;float: right;">
<table class="table table-stripeds">
	<tbody>
		Loan Repayment details here
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