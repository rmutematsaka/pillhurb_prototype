<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="<?php echo "$icon"?>"></i> <?php echo $pageTitle;?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
	<a href="<?php echo url_for('app/app_loans/search_customer.php');?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-cash-coin"></i> New Loan</a>
		<?php if($pageTitle=='Payments'){ ?>
		<a href="<?php echo url_for('app/app_loans/customers.php');?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-cash-coin"></i> Payments</a>
		<?php } ?>
		<?php if($pageTitle=='Loan Plans'){ ?>
		<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropPlan">
		  <i class="bi bi-file-earmark-plus"></i> Add Plan
		</button>
		<?php } ?>
		<?php if($pageTitle=='Loan Types'){ ?>
		<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropType">
		  <i class="bi bi-file-earmark-plus"></i> Add Type
		</button>
		<?php } ?>
  </div>
  <!--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
	<span data-feather="calendar"></span>
	This week
  </button>-->
</div>
</div>
