	//table interaction
	$(document).ready( function () {
		$('#tbl-overdue').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-branches').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-users').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-customers').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-loans').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-plans').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-types').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-currencies').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-countries').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
		$('#tbl-breakdown').DataTable({dom: 'Bfrtip',buttons:['copy', 'excel', 'pdf']});
	} );

	//Show or hide branches option
	$(function() {
		$('#reportSelector').change(function(){
			$('.branches').css("display","none");
			$('#' + $(this).val()).css("display","block");
		});
	});
	
	//autocalculate charges and total on input
	$('.prc').on('input',function(){
		var totalSum,totalCharged,penalty,ceilingCharge,repayment = 0;
		var msg='Waiting';
		var plan = $('#loan_plan').val();
		var type = $('#loan_type').val();
		var penalty_rate = 5;//hardcoded for now, requires to be picked from settings module
		var interest_rate = 20;//hardcoded for now, requires to be picked from settings module
		$('.prc').each(function(){
			var inputVal = $(this).val();
				if($.isNumeric(inputVal)){
					if(plan != '' && type != ''){
						$('#msg').hide();
						totalSum = (interest_rate * parseFloat(inputVal))/100 + parseFloat(inputVal);
						totalSum = parseFloat(totalSum).toFixed(2);
						repayment = parseFloat(totalSum/plan).toFixed(2);
						penalty = parseFloat(((totalSum*penalty_rate)/100)/plan).toFixed(2);
					}else{
						$('#msg').text('Please fill in Loan Plan and Loan Type details before proceeding').addClass("bg-warning");
					}
				}
		});
		$('#loan_repayment_total').val(totalSum);
		$('#loan_repayment_amount').val(repayment);
		$('#loan_penalty_amount').val(penalty);
	});

	$("#currencyToCollect").on("click",function(){
		var currencySubmitted = $('#currencySubmitted').val();
		var currencyToCollect = $('#currencyToCollect').val();
		var currencyGiven = $('#currencySubmitted :selected').text();
		var receiverCollects = $('#currencyToCollect :selected').text();
		var dom_transfer_amount = $('#dom_transfer_amount').val();
		var amountToCollect = 0;
		
		amountToCollect = parseFloat((dom_transfer_amount * currencyToCollect)/currencySubmitted).toFixed(2);
		$('#amountToCollect').val(amountToCollect);
		$('#dom_transfer_currency').val(currencyGiven);
		$('#currency_to_collect').val(receiverCollects);
	});