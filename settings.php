<?php 
	require_once('functions/initialise.php');
	$pageTitle = 'Settings';
	require_once(SHARED_PATH.'/header.php');
	if(!isset($_GET['save_config'])){
		$_GET['save_config'] = 1;
		$id = $_GET['save_config'];
	}
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-sliders"></i> <?php echo $pageTitle;?></h5>
<!--<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
	<a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-cash-coin"></i> Export</a>
	<a href="#" class="btn btn-sm btn-outline-dark"><i class="bi bi-handbag"></i> Import</a>
  </div>
</div>-->
</div>

<div class="container my-5">
	<!--<h4><i class="bi bi-sliders"></i> <?php echo $pageTitle;?></h4>
	<hr/>-->
	<form id="form-settings" action="" method="POST">
		<input type="hidden" name="config_id" value="<?php echo $id;?>">
		<div class="row">
		<div class="">
			<?php
				require_once(PROJECT_PATH.'/controllers/settings_controller.php');
			?>
		</div>

	<?php 
		$settings = select_all('config');
		foreach($settings as $key=>$setting){
	?>
			
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        General Settings
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">

			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="time" class="form-control" id="floatingOpenTime" name="open_time" value="<?php echo $setting['open_time'];?>">
				<label for="floatingOpenTime">Opening Time</label>
			</div>
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="time" class="form-control" id="floatingCloseTime" name="close_time" value="<?php echo $setting['close_time'];?>">
				<label for="floatingCloseTime">Closing Time</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				  <input class="form-control" type="number" min=0 id="floatingOverdue" name="show_overdue_after" value="<?php echo $setting['show_overdue_after'];?>">
				  <label class="form-check-label" for="floatingOverdue">Show Overdue Transactions After (days)</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<div class="form-check form-switch">
				  <input name="sms_delivery" class="form-check-input" type="checkbox" id="flexSwitchSMS" <?php if($setting['sms_delivery']=='off'){ echo ""; }elseif($setting['sms_delivery']=='on'){ echo "checked"; };?> />
				  <label class="form-check-label" for="flexSwitchSMS">Send Delivery Messages</label>
				</div>
			</div>
			</div>
			
		<div class="row mt-3">
			<div class="form-group col">
				<button class="btn btn-dark" type="submit" name="save_general"><i class="bi bi-save"></i> Apply</button>
			</div>
		</div>
			
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
        Transaction Limits
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">

			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" class="form-control" id="floatingTx" placeholder="Name" name="tx_min_limit" value="<?php echo $setting['tx_min_limit'];?>">
				<label for="floatingName">Minimum Transaction Amount</label>
			</div>
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" class="form-control" id="floatingMonthly" placeholder="Name" name="tx_max_limit" value="<?php echo $setting['tx_max_limit'];?>">
				<label for="floatingName">Maximum Transaction Amount</label>
			</div>
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" class="form-control" id="floatingMonthly" placeholder="Name" name="monthly_limit" value="<?php echo $setting['monthly_limit'];?>">
				<label for="floatingName">Monthly Limit</label>
			</div>
			</div>
			
		<div class="row mt-3">
			<div class="form-group col">
				<button class="btn btn-dark" type="submit" name="save_limits"><i class="bi bi-save"></i> Apply</button>
			</div>
		</div>
			
      </div>
    </div>
  </div>
	<?php } ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
        Currency Settings
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">	
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-cash-coin"></i> <?php echo "Currencies";?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
	<a href="#" class="btn btn-sm btn-outline-dark"><i class="bi bi-plus"></i> Add</a>
  </div>
</div>
</div>		<table id="tbl-currencies" class="table table-responsive table-condensed table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th width="3%">#</th>
					<th width="15%">Currency</th>
					<th>Buying</th>
					<th>Selling</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 1;
					$currencies = select_all('currency');
					foreach($currencies as $key=>$currency){
				?>
				<tr>
					<td width="3%"><?php echo $count;?></td>
					<td width="15%"><?php echo $currency['currency_code'];?></td>
					<td class="text-end"><?php echo number_format($currency['currency_buying_rate'],2);?></td>
					<td class="text-end"><?php echo number_format($currency['currency_selling_rate'],2);?></td>
					<td width="10%"><button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEditCurrency<?php echo $currency['currency_id'];?>"><i class="bi bi-pencil-square"></i></button></td>
				</tr>
				<?php $count++; } ?>
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>	
<?php foreach($currencies as $key=>$currency){?>
<!-- Modal -->
<div class="modal fade" id="staticBackdropEditCurrency<?php echo $currency['currency_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="settings.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropType">Edit <?php echo $currency['currency_code'];?> Exchange Rate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<input type="hidden" name="currency_id" class="form-control" value="<?php echo $currency['currency_id'];?>">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "currency_buying_rate" class="form-control" id="floatingAmountSold" value="<?php echo $currency['currency_buying_rate'];?>">
				<label for="floatingAmountSold"><?php echo $currency['currency_code'];?> Buying:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "currency_selling_rate" class="form-control" id="floatingAmountSold" value="<?php echo $currency['currency_selling_rate'];?>">
				<label for="floatingAmountSold"><?php echo $currency['currency_code'];?> Selling:</label>
			</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="save_currencies" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>
<?php } ?>			
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
        Country Settings
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
	<form id="form-users" action="" method="POST">
      <div class="table-responsive">
        <table id="tbl-countries" class="table table-striped table-sm table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Abberviation</th>
              <th scope="col">Prefix</th>
              <th scope="col">Commission</th>
              <th scope="col">Status</th>
              <th scope="col" width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
			<?php 
				$countries = select_all('country');
				foreach($countries as $key=>$country){
			?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $country['country_name']; ?></td>
              <td><?php echo $country['country_iso3']; ?></td>
              <td><?php echo $country['country_code']; ?></td>
              <td><?php echo $country['commission_rate'] . '%'; ?></td>
              <td>
				<?php 
					if($country['country_status'] == 0){
						echo "Active";
					}else{
						echo "Inactive";
					}
				?>
			  </td>
              <td>
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropCountry<?php echo $country['country_id'];?>">
				  <i class="bi bi-pencil"></i>
				</button>
			  </td>
            </tr>
				<?php } ?>
			
			
          </tbody>
        </table>
      </div>
	</form>

      </div>
    </div>
  </div>
</div>
		</div>
		
	</form>
</div>
<?php require_once(SHARED_PATH.'/footer.php');?>
			<?php foreach($countries as $key=>$country){ ?>
<!-- Modal -->
<div class="modal fade" id="staticBackdropCountry<?php echo $country['country_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropType">Edit Status | <?php echo $country['country_name'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
			<input type="hidden" name="country_id" value="<?php echo $country['country_id'];?>">
				<select name = "commission_rate" class="form-control">
					<option value="" selected hidden><?php if(isset($country['commission_rate'])){echo $country['commission_rate'];}?></option>
					<option value="1.00">1.00%</option>
					<option value="2.00">2.00%</option>
					<option value="3.00">3.00%</option>
					<option value="4.00">4.00%</option>
					<option value="5.00">5.00%</option>
					<option value="6.00">6.00%</option>
					<option value="7.00">7.00%</option>
					<option value="8.00">8.00%</option>
					<option value="9.00">9.00%</option>
					<option value="10.00">10.00%</option>
				</select>
				<label for="floatingAmountSold">Commission:</label>
			</div>
			</div>
		</div>		
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
			<input type="hidden" name="country_id" value="<?php echo $country['country_id'];?>">
				<select name = "country_status" class="form-control">
					<option value="" selected hidden><?php if(isset($country['country_status'])){if($country['country_status']==0){echo "Active";}else{echo "Inactive";}}?></option>
					<option value="0">Active</option>
					<option value="1">Inactive</option>
				</select>
				<label for="floatingAmountSold">Status:</label>
			</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="edit_country_status" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>
			<?php } ?> 
