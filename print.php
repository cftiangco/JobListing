<?php include 'assets/TCPDF/tcpdf.php'; ?>
<?php include 'config/init.php'; ?>
<?php

/*
//@param orientation,unit,format
$pdf = new TCPDF('P','mm','A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


$pdf->AddPage();
*/

/*
$pdf->Cell(190,20,"this is a sample text",1,1,'C');

$pdf->writeHTMLCell(190,0,'','',
	"<table>
	<tr>
		<th>Name</th>
		<th>Age</th>
	</tr>
	<tr>
		<td>Crimson</td>
		<td>28</td>
	</tr>
	</table>"
	,1,1);
//parameters height,width,text,border,newline,alignment
$pdf->Cell(190,30,"Best Text",1,1,'C');
*/

/*

//@param font-family,font-weight,font-size
$pdf->SetFont('Helvetica','B',14);

//@param width,height,text,border,newLine,text-alignment
$pdf->Cell(190,10,'Datamex College of Saint Adeline',1,1,'C');

$pdf->SetFont('Helvetica','',9);
$pdf->Cell(190,0,'Student List',1,1,'C');

$pdf->SetFont('Helvetica','',9);
$pdf->Cell(20,0,'Class :',1,0);
$pdf->Cell(170,0,'Programming',1,1);
$pdf->Ln();


$pdf->Cell(20,0,'Teacher :',1,0);
$pdf->Cell(170,0,'Mr. Forbile',1,1);
$pdf->Ln(10);

$data = array(
	['name' => 'Crimson','age' => 28],
	['name' => 'Yumi','age' => 3],
	['name' => 'Cristine','age' => 23],
	['name' => 'Trudis','age' => 4],
);

$html = "<table>
			<tr>
				<th>Name</th>
				<th>Age</th>
			</tr>";

foreach ($data as $key => $value) {
	$html .=" 
			<tr>
				<td>" . $value['name'] . "</td>
				<td>". $value['age']."</td>
			</tr>";
}
$html .="
		</table>
		<style>
			table {
				border-collapse:collapse;
			}
			td,th {
				border:1px solid black;
			}
			table tr th {
				font-weight:bold;
				background-color:red;
				color:white;
			}
		</style>
		";
$pdf->writeHTMLCell(190,0,'','',$html,0);

//@param height,width,text,border,newLine
$pdf->MultiCell(190,4,'sampleasdddddddddddddddddddd',1,1);
*/

$job = new Job;

$id = isset($_GET['id']) ? $_GET['id'] : '';

$foundJob = $job->findOne($id);

$pdf = new TCPDF('P','mm','A4');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

$logo = "assets/img/logo.png";

//@param $location,x,y,width,height,type,align,resizable=T(TRUE)
$pdf->Image($logo, 10, 5, 40, 40, 'PNG', '', 'T', false, 300, '', false, false, 1, false, false, false);


$pdf->Ln(15);
$pdf->SetFont('Helvetica','B',20);
$pdf->Cell(190,15,'www.JobListing.ph',0,1,'R');

$pdf->Ln(10);

$date = date('m/d/Y');

//CURRENT DATE
$pdf->Ln(10);
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(190,15,"Date: $date",0,1,'R');


$pdf->Line(0,50,210,50);
//POSITION
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(20,10,'Position',1,0,'C');
$pdf->Cell(170,10,$foundJob->job_title,1,1,'C');

//LOCATION
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(20,10,'Location',1,0,'C');
$pdf->SetFont('Helvetica','',10);
$pdf->MultiCell(170,10,$foundJob->location,1,1);


//NEW LINE
$pdf->Ln(15);

//DESCRIPTION
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(190,0,'Description',1,1,'C');


$pdf->SetFont('Helvetica','',11);
$pdf->MultiCell(190,0,$foundJob->description,1,1);
$pdf->Ln(20);

$pdf->SetFont('Helvetica','B',15);
$pdf->cell(190,0,'Other Details',1,1,'C');

$pdf->SetFont('Helvetica','',11);
$pdf->cell(50,0,$foundJob->company,1,0,'C');
$pdf->cell(140,0,'MyHealth Clinic SM North Edsa',1,1,'C');

$pdf->cell(50,0,'SALARY',1,0,'C');
$pdf->cell(140,0,$foundJob->salary,1,1,'C');

$pdf->cell(50,0,'CONTACT PERSON',1,0,'C');
$pdf->cell(140,0,$foundJob->contact_user,1,1,'C');

$pdf->cell(50,0,'CONTACT #',1,0,'C');
$pdf->cell(140,0,$foundJob->contact_number,1,1,'C');

$pdf->cell(50,0,'EMAIL',1,0,'C');
$pdf->cell(140,0,$foundJob->email_address,1,1,'C');


ob_end_clean();
$pdf->Output('joblisting_job_report');