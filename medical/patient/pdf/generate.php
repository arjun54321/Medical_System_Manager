<?php
//include connection file 
require('fpdf.php');

 
// Page footer

  $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
      $sql = "SELECT * FROM patient_database ";
        $retval = mysqli_query($db , $sql );
        if(! $retval )
        {
            die('Could not get data: ' . mysqli_error());
         }
$username=$_GET['username'];
$display_heading = array('id'=> 'ID','name'=> 'Name','username'=> 'UserName', 'email'=> 'Email', 'gender'=> 'Gender','date'=> 'Date of Birth', 'specialist'=> 'Speacialist','query'=> 'Query', 'prescription'=> 'Prescription');
 
$result = mysqli_query($db, "SELECT * FROM appointment") or die("database error:". mysqli_error($db));
$header = mysqli_query($db, "SHOW columns FROM appointment");

$pdf = new FPDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',20);
//$pdf->Write(5,'REPORT');
$pdf->SetTopMargin(20);
$pdf->Cell(190,0,'PATIENT REPORT',0,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetTitle('REPORT');
$pdf->Ln(30);

foreach($result as $column) {
	$pdf->Ln();
	
	//$pdf->Write(5,$column);
			foreach($header as $heading) {
				//$pdf->Write(5,$heading['Field']);
				//$pdf->Ln(25);
				if($column['username']==$username){
					//$pdf->SetLeftMargin(100);
					
					if($heading['Field']=='name'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['name'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='username'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['username'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='email'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['email'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='gender'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['gender'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='date'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['date'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='specialist'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['specialist'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='query'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['query'],1);
						$pdf->Ln(25);
					}
					if($heading['Field']=='prescription'){
						$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
						$pdf->Cell(150,12,$column['prescription'],1);
						$pdf->Ln(25);
					}
					
				}
			}
	}
 $pdf->Output();
?>