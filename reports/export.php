<?php
	if(isset($_POST['export_report'])){
		$session_user_role = $_POST['session_user_role'];
		$rep_table = $_POST['rep_table'];
		$rep_from = $_POST['rep_from'] . ' 00:00:00';
		$rep_to = $_POST['rep_to'] . ' 23:59:59';		
		
		$url = $_SERVER['HTTP_REFERER'];
		
		if($session_user_role == 1){
			if($rep_from <= $rep_to){
				switch($rep_table){
					case 'rpt_customers':
						require_once('rpt_customers.php');
					break;
					case 'rpt_fx_purchase':
						require_once('rpt_fx_purchase.php');
					break;
					case 'rpt_fx_sale':
						require_once('rpt_fx_sale.php');
					break;
					case 'rpt_mta_remittance':
						require_once('rpt_mta_remittance.php');
					break;
					case 'rpt_branch':
						$selected_branch = $_POST['selectAgent'];
						require_once('rpt_branch.php');
					break;
					default:
						header( "refresh:3;url=reports.php" );
						echo "Could not retrieve report!<p/>
								Redirecting...";
				}
			}else{
				echo "<script>if(alert('Please review your dates!')){location.href='../reports.php';}</script>";
				header('refresh:0; url='.$url);
			}
		}
	}

?>
