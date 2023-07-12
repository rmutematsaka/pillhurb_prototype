    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item my-1">
            <a class="nav-link" aria-current="page" href="#">
              <i class="bi bi-person"></i> 
              <?php echo $session_user;?>
            </a>
          </li>
		  <?php if($session_user_role == 1){ ?>
          <li class="nav-item my-1">
            <a class="nav-link active" aria-current="page" href="<?php echo url_for('/dashboard.php');?>">
              <i class="bi bi-speedometer2"></i> 
              Dashboard
            </a>
          </li>
		  <?php } ?>
		  <?php if($session_user_role != 3){ ?>
          <li class="nav-item my-1 d-none">
            <a class="nav-link" href="<?php echo url_for('app/app_bdc/?mode=pmode');?>">
			  <i class="bi bi-coin"></i> 
              Bureau de Change
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('app/app_loans/');?>">
              <i class="bi bi-cash-coin"></i> 
              Loans
            </a>
          </li>
          <li class="nav-item my-1 d-none">
            <a class="nav-link" href="<?php echo url_for('app/app_cc/');?>">
              <i class="bi bi-clipboard-pulse"></i> 
              Currency Converter
            </a>
          </li>
		  <?php } ?>
          <li class="nav-item my-1 d-none">
            <a class="nav-link" href="<?php echo url_for('/reports.php');?>">
              <i class="bi bi-card-checklist"></i> 
              Reports
            </a>
          </li>
		  <?php if($session_user_role == 1){ ?>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('app/app_loans/types.php');?>">
              <i class="bi bi-journals"></i> 
              Loan Types
            </a>
          </li>          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('app/app_loans/plan.php');?>">
              <i class="bi bi-book"></i> 
              Loan Plan
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('/app/app_loans/collateral.php');?>">
              <i class="bi bi-boxes"></i> 
              Collateral
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('/app/app_loans/customers.php');?>">
              <i class="bi bi-person-vcard"></i> 
              Customers
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('app/app_loans/search_to_pay.php');?>">
              <i class="bi bi-credit-card"></i> 
              Payments
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('app/global/users.php');?>">
              <i class="bi bi-people"></i> 
              Users
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('app/global/branches.php');?>">
              <i class="bi bi-geo"></i> 
              Branches
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link" href="<?php echo url_for('/settings.php');?>">
              <i class="bi bi-sliders"></i> 
              Settings
            </a>
          </li>
		  <?php } ?>
        </ul>
      </div>
    </nav>