<?php 	
require ('fpdf.php');
	/**
	* 
	*/
	class pageOrd 
	{
		
		public function page($values = [])
		{
			//print_r($values);die();
			
    		$pdf=new FPDF();
			$pdf->SetTitle('Réclamation',true);
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(250,1,iconv('UTF-8', 'ISO-8859-2', 'Fiche Réclamation'),0,1,'C');
			$pdf->ln(4);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(40,1,iconv('UTF-8', 'ISO-8859-2', "Date :".date('Y-m-d')),0,0,'L');



			$pdf->Output('I','Réclamation.pdf',true);
		}
	}


 ?>