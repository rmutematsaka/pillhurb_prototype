<?php
	require_once('../../../functions/initialise.php');
	$pageTitle = 'Money Transfer';
	$subTitle = 'Send Money';
	include(SHARED_PATH.'header.php');
	if(isset($_GET['s']) && isset($_GET['t'])){
		$sender = $_GET['s'];
		$reference = $_GET['t'];
	}
	$give_access_to = [ADMIN,AGENT];
	redirect_to($session_user_role,$give_access_to);	
?>

<?php include('../includes/mt_btns.php');?>


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

<div class="container-fluid">
<div id="ui-view" data-select2-id="ui-view">
<div>
<div class="card">
<div class="card-header"><strong>Receipt:</strong> RCT_0000000001
<a class="btn btn-sm btn-secondary float-end mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
<i class="fa fa-print"></i> Print</a>
<a class="btn btn-sm btn-info float-end mr-1 d-print-none" href="#" data-abc="true">
<i class="fa fa-save"></i> Save</a>
</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-4">
<h6 class="mb-3">From:</h6>
<div>
<strong>Sender</strong>
</div>
<div>-</div>
<div>-</div>
<div>-</div>
<div>-</div>
</div>
<div class="col-sm-4">
<h6 class="mb-3">To:</h6>
<div>
<strong>-</strong>
</div>
<div>-</div>
<div>-</div>
<div>-</div>
<div>-</div>
</div>
<div class="col-sm-4">
<h6 class="mb-3">Details:</h6>
<div><strong>Receipt:</strong> RCT_0000000001
</div>
<div>-</div>
<div>-</div>
<div>-</div>
<div>
<strong>-</strong>
</div>
</div>
</div>
<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th>Description</th>
<th class="center">Amount</th>
<th class="right">Charges</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">1</td>
<td class="left">Sender to</td>
<td class="left">MTA Send money transaction</td>
<td class="center">-</td>
<td class="right">-</td>
<td class="right">-</td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-7 col-sm-6">Short notes about transaction</div>
<div class="col-lg-5 col-sm-6 ml-auto">
<table class="table table-clear">
<tbody>
<tr>
<td class="left">
<strong>Subtotal</strong>
</td>
<td class="right">$ -</td>
</tr>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>$ -</strong>
</td>
</tr>
</tbody>
</table>
<!--<a class="btn btn-success" href="#" data-abc="true">
<i class="fa fa-usd"></i> Proceed to Payment</a>-->
</div>
</div>
</div>
</div>
</div>
</div>
</div> 