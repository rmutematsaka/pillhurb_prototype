<?php
	require_once('../../../functions/initialise.php');
	//include(SHARED_PATH.'header.php');
	require(SHARED_PATH.'/global_vars.php');
	require(PROJECT_PATH.'/fpdf/fpdf.php');
	require_once(SHARED_PATH.'connect.php');
	
	if(isset($_GET['p'])){
		$remittance_number = $_GET['p'];
		$receipt_number = str_pad($remittance_number,10,$str_pad_char,STR_PAD_LEFT);
		$data = ["dom_remittance_id"=>$remittance_number];
		$query = select_all('dom_remittance',["dom_remittance_id"=>$remittance_number]);
		//dd($query);
	}
	
	$document = 'RECEIPT';
	$pdf = new FPDF();
	$pdf->AddPage();
	//set font to arial, bold, 14pt
	$pdf->SetFont('Arial','B',14);

	//Cell(width , height , text , border , end line , [align])

	$pdf->Cell(130 ,5,$app_name,0,0);
	$pdf->Cell(59 ,5,$document,0,1);//end of line

	//set font to arial, regular, 12pt
	$pdf->SetFont('Arial','',10);

	$pdf->Cell(130 ,5,$app_address1,0,0);
	$pdf->Cell(59 ,5,'',0,1);//end of line

	$pdf->Cell(130 ,5,$app_address2.', '.$app_address3,0,0);
	$pdf->Cell(25 ,5,'Date',0,0);
	$pdf->Cell(34 ,5,'['.$timestamp.']',0,1);//end of line

	$pdf->Cell(130 ,5,'Phone '.$app_contact,0,0);
	$pdf->Cell(25 ,5,'Receipt No',0,0);
	$pdf->Cell(34 ,5,'RCPT'.$receipt_number,0,1);//end of line

	$pdf->Cell(130 ,5,'-----',0,0);
	$pdf->Cell(25 ,5,'Customer ID',0,0);
	$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

	//make a dummy empty cell as a vertical spacer
	$pdf->Cell(189 ,10,'',0,1);//end of line

	//billing address
	$pdf->Cell(100 ,5,'Send Money',0,1);//end of line

	//add dummy cell at beginning of each line for indentation
	/*$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'[Name]',0,1);*/

	/*$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'[Company Name]',0,1);

	$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'[Address]',0,1);

	$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'[Phone]',0,1);*/

	//make a dummy empty cell as a vertical spacer
	$pdf->Cell(189 ,10,'',0,1);//end of line


foreach($query as $key=>$value){
	//invoice contents
	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(190 ,5,'Sender Details',1,1);//end of line
	//$pdf->Cell(80 ,5,'Taxable',1,0);
	//$pdf->Cell(30 ,5,'Amount',1,1);//end of line

	$pdf->SetFont('Arial','',10);

	//Numbers are right-aligned so we give 'R' after new line parameter

	$pdf->Cell(80 ,5,'Sender',1,0);
	$pdf->Cell(110 ,5,$value['dom_sender_id'],1,1);
	//$pdf->Cell(30 ,5,'3,250',1,1,'R');//end of line

	$pdf->Cell(80 ,5,'Reference Number',1,0);
	$pdf->Cell(110 ,5,strtoupper($value['dom_transfer_code']),1,01);
	//$pdf->Cell(30 ,5,'1,200',1,1,'R');//end of line

	//$pdf->Cell(80 ,5,'National ID',1,0);
	//$pdf->Cell(80 ,5,$value['dom_transfer_amount'],1,0);
	//$pdf->Cell(30 ,5,'1,000',1,1,'R');//end of line

	//skip a line
	$pdf->Cell(190 ,5,'',1,1);//end of line

	
	//invoice contents
	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(190 ,5,'Receiver Details',1,1);//end of line
	//$pdf->Cell(80 ,5,'Taxable',1,0);
	//$pdf->Cell(30 ,5,'Amount',1,1);//end of line

	$pdf->SetFont('Arial','',10);

	//Numbers are right-aligned so we give 'R' after new line parameter

	$pdf->Cell(80 ,5,'Sender',1,0);
	$pdf->Cell(110 ,5,$value['dom_sender_id'],1,1);
	//$pdf->Cell(30 ,5,'3,250',1,1,'R');//end of line

	$pdf->Cell(80 ,5,'Reference Number',1,0);
	$pdf->Cell(110 ,5,strtoupper($value['dom_transfer_code']),1,01);
	//$pdf->Cell(30 ,5,'1,200',1,1,'R');//end of line

	//$pdf->Cell(80 ,5,'Amount',1,0);
	//$pdf->Cell(110 ,5,$value['dom_transfer_amount'],1,1,'R');
	//$pdf->Cell(30 ,5,'1,000',1,1,'R');//end of line

	//summary
	$pdf->Cell(80 ,5,'',0,0);
	$pdf->Cell(60 ,5,'Amount',0,0);
	$pdf->Cell(20 ,5,$value['dom_transfer_currency'].'$',1,0);
	$pdf->Cell(30 ,5,$value['dom_transfer_amount'],1,1,'R');//end of line

	$pdf->Cell(80 ,5,'',0,0);
	$pdf->Cell(60 ,5,'Charges',0,0);
	$pdf->Cell(20 ,5,$value['dom_transfer_currency'].'$',1,0);
	$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

	//$pdf->Cell(80 ,5,'',0,0);
	//$pdf->Cell(60 ,5,'Tax Rate',0,0);
	//$pdf->Cell(20 ,5,$value['dom_transfer_currency'].'$',1,0);
	//$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

	$pdf->Cell(80 ,5,'',0,0);
	$pdf->Cell(60 ,5,'Total Due',0,0);
	$pdf->Cell(20 ,5,$value['dom_transfer_currency'].'$',1,0);
	$pdf->Cell(30 ,5,number_format($value['dom_transfer_amount'],2),1,1,'R');//end of line
}
	$pdf->Output();
?>