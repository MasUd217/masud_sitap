<?php 

	require 'fpdf.php';

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,10,'INFORMASI TAGIHAN PELANGGAN',1,1,'C');
    $pdf->Cell(120,6,'Detail Tagihan pelanggan',1,0,'C',0);
    $pdf->Cell(70,6,'Keterangan',1,0,'C',0);
	

    include 'config.php';

    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM kwitansi ORDER BY id DESC");
    $row = mysqli_fetch_array($sql);

        $pdf->Cell(120,6,'Detail Tagihan pelanggan',1,0,'C',0);
        $pdf->Cell(70,6,'Keterangan',1,0,'C',0);

    $pdf->Output('invoice-pelanggan.pdf','I');

 ?>

 