<?php 
	require_once('functions/initialise.php');
	$pageTitle = 'Dashboard';
	require_once(SHARED_PATH.'/header.php');
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
	
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h5"><i class="bi bi-speedometer2"></i> <?php echo $pageTitle;?></h5>
	<!--<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group me-2">
			<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
			<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
		</div>
		<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
			<span data-feather="calendar"></span>
			This week
		</button>
	</div>-->
</div>
	<div class="row">
		<div class="col">
			<div class="card-body stats btn-primary">
				<h4><a class="text-white" href="<?php echo url_for('/app/app_loans/');?>"><i class="bi bi-folder-plus"></i> New</a></h4>
				<h5><?php echo count(select_all('loan_list',["status"=>0]));?></h5>
				<p>Total number of new loans pending review</p>
			</div>
		</div>
		<div class="col">
			<div class="card-body stats btn-dark">
				<h4><a class="text-white" href="<?php echo url_for('/app/app_loans/');?>"><i class="bi bi-check2-square"></i> Confirmed</a></h4>
				<h5><?php echo count(select_all('loan_list',["status"=>1]));?></h5>
				<p>Total number of approved loans pending release</p>
			</div>
		</div>
		<div class="col">
			<div class="card-body stats btn-danger">
				<h4><a class="text-white" href="<?php echo url_for('app/global/users.php');?>"><i class="bi bi-exclamation-triangle"></i> Arrears</a></h4>
				<h5><?php echo count(select_all('user'));?></h5>
				<p>Number of loans in arrears across all branches</p>
			</div>
		</div>
		<div class="col">
			<div class="card-body stats btn-greyish">
				<h4><a class="text-white" href="<?php echo url_for('app/global/branches.php');?>"><i class="bi bi-geo"></i> Branches</a></h4>
				<h5><?php echo count(select_all('branch'));?></h5>
				<p>Total number of branches in the system</p>
			</div>
		</div>
	</div>
    <!--<canvas class="my-4 w-100" id="myChart" width="900" height="100"></canvas>-->
	
	
      <div class="row mt-5">
	  <div class="col">
		<?php require_once(PROJECT_PATH.'/charts/bar.php');?>
	  </div>
	  <div class="col">
		<?php //require_once(PROJECT_PATH.'/charts/pie.php');?>
	  </div>
	  
      <!--<div class="row mt-5">
      <h4>Section title</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>-->
      </div>
<?php require_once(SHARED_PATH.'/footer.php');?>
