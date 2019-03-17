<?php
session_start();

require('fpdf.php');
include("connectDB_2.php");
$user_id=$_SESSION['id2'];
$user_firstname=$_SESSION['firstname2'];
$user_lastname=$_SESSION['lastname2'];
$user_roll = $_SESSION['roll2'];
$user_dept = $_SESSION['dept'];
$user_yr =$_SESSION['yr'];
$user_sem = $_SESSION['sem'];



class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('ruetlogo.jpg',10,6,25);
    // Arial bold 15
    $this->SetFont('Arial','B',19);
    // Move to the right
    $this->Cell(82);
    // Title
    $this->Cell(50,10,'Rajshahi University of Engineering & Technology',0,1,'C');
    // Line break
    $this->Ln(20);
	$this->Cell(32);
	$this->SetFont('Arial','B',17);
	$string = 'Money Receipt - RUET Account Section';
	 $this->Cell(130,10,$string,1,1,'C');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$date=$_SESSION['date'];
$pdf->Ln(5);
$pdf->Cell(30,10,'Name : ',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(50,10,$user_firstname." ".$user_lastname);
$pdf->Ln(10);
$pdf->Cell(30,10,'Roll : ',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(50,10,$user_roll);
$pdf->Ln(10);
$pdf->Cell(30,10,'Semester : ',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(70,10,$user_yr." year  ".$user_sem." semester");
$pdf->Ln(10);
$pdf->Cell(30,10,'Payment time:',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(50,10,$date);

$pdf->Ln(20);
$pdf->Cell(7);
$pdf->Cell(45,9,'Account Name',1,0,'C');
$pdf->Cell(40,9,'Account Number',1,0,'C');
$pdf->Cell(60,9,'Payment Topic',1,0,'C');
$pdf->Cell(35,9,'Amount',1,0,'C');
$total=0;
$count=0;

$query="select * from memo where dateTime='$date'";
$query_run = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($query_run)) {
	$count=$count+9;
	$fee = $row['Topic'];
	$Amount = $row['Amount'];
	$Account_Name = $row['Account_Name'];
	$Account_Number = $row['Account_Number'];
	$total=$total + $Amount;
	$pdf->Ln();
	$pdf->Cell(7);
	$pdf->Cell(45,9,$Account_Name,1,0,'C');
	$pdf->Cell(40,9,$Account_Number,1,0,'C');
	$pdf->Cell(60,9,$fee,1,0,'C');
	$pdf->Cell(35,9,$Amount,1,0,'C');
}
$pdf->Ln();

$pdf->Cell(7);
$pdf->Cell(145,9,'Total                         ',1,0,'R');
$pdf->Cell(35,9,$total,1,0,'C');
$pdf->Ln(30);
$pdf->Ln();
$count=$count+143;
$pdf->Image('as.png',42,$count,25);
$pdf->Image('bm.png',135,$count,25);
$pdf->Ln();
$pdf->Cell(27);
$pdf->Cell(40,9,'Account Section',1,0,'C');
$pdf->Cell(50);
$pdf->Cell(40,9,'Bank Manager',1,0,'C');

$pdf->Output();

?>