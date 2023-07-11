<?php 
	require_once('functions/initialise.php');
	$pageTitle = 'Reports';
	require_once(SHARED_PATH.'/header.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-clipboard"></i> <?php echo $pageTitle;?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
	<a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-cash-coin"></i> Export</a>
	<a href="#" class="btn btn-sm btn-outline-dark"><i class="bi bi-handbag"></i> Import</a>
  </div>
</div>
</div>

<div class="container my-5">
  <form class="" target="_WINDOW" method="POST">
	<div class="row">
		<div class="col">
			<input type="hidden" name="session_user" value="<?php echo $session_user;?>"/>
			<input type="hidden" name="session_user_role" value="<?php echo $session_user_role;?>"/>
		<label for="reportType" class="">Report Type: </label>
			<select id="reportSelector" class="form-control" name="rep_table" required>
				<option value="" hidden>-- Select --</option>
				<!--<option value disabled>——————————————————————————</option>-->
				<optgroup label="Remittances">
					<option class="download" value="rpt_mta_remittance">Domestic Remittances</option>
					<option class="preview" value="rpt_branch">Branch Report</option>
					<optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Consolidated">
						<option class="preview" value="rep_vault">&nbsp;&nbsp;&nbsp;&nbsp; Vault</option>
					</optgroup>
				</optgroup>
				<!--<option value disabled>——————————————————————————</option>-->
				<optgroup label="Bureau de Change">
					<option class="download" value="rpt_fx_sale">Forex Sales</option>
					<option class="download" value="rpt_fx_purchase">Forex Purchases</option>
				</optgroup>
				<!--<option value disabled>——————————————————————————</option>-->
				<optgroup label="Customers">
					<option class="download" value="rpt_customers">Customers</option>
				</optgroup>
			</select>
		</div>
		<div class="col">
		<label for="from" class="">From: </label>
			<input class="form-control" type="date" name="rep_from" required/>
		</div>
		<div class="col">
		<label for="to" class="">To: </label>
			<input class="form-control" type="date" name="rep_to" required/>
		</div>	
	</div>
	<div class="row mt-5">
	<div class="col">
		<button formaction="reports/export.php" class="btn btn-outline-dark download box" type="submit" name="export_report" value="Preview" style="display:block;"><i class="bi bi-eyeglasses"></i> Preview</button>
	</div>
	</div>
	
	
	<div class="col-md-12">
		<hr/>
		
		<div id="rpt_branch" class="branches" style="display:none;height:320px;overflow:auto;margin-bottom:10px;border-bottom:1px solid #aaa;">
		<table id="tbl-users" class="table table-striped table-hover table-condensed table-bordered">
			<thead>
				<th>Branch Code</th>
				<th>Branch Name</th>
			</thead>
			<tbody>
			<?php
				if($session_user_role == 1){
					$sql = "SELECT * FROM branch";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$branches = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
				foreach($branches as $key=>$value){
					?>
						<tr>
							<td><input type="radio" id="<?php echo $value['branch_id'];?>" name="selectAgent" value="<?php echo $value['branch_code'];?>" checked> <?php echo $value['branch_code'];?></td>
							<td><label for="<?php echo $value['branch_id'];?>"><?php echo $value['name'].' | '.$value['identifier'];?></label></td>
						</tr>
					
			<?php	}
				}
			?>
			</tbody>
		</table>
		</div>
	</div>
</form>
</div>		
<?php require_once(SHARED_PATH.'/footer.php');?>
