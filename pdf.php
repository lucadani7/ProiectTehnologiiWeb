<?php
    require_once('tcpdf/library/tcpdf.php');
    class MYPDF extends TCPDF {

        // Load table data from file
        public function LoadData() {
            // Read file lines
            $conn = mysqli_connect('localhost', 'gabi', '12345', 'users');
            if(!$conn){
                die('error: ' . mysqli_connect_error());
            }

            $sql = 'SELECT nume, prenume, calorii, exercitii FROM utilizatori ORDER BY calorii DESC LIMIT 10';    
            $result = mysqli_query($conn, $sql);
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($conn);
            return $users;
        }

        // Colored table
        public function ColoredTable($header,$data) {
            // Colors, line width and bold font
            $this->SetFillColor(31, 40, 51);
            $this->SetTextColor(255);
            $this->SetDrawColor(0, 0, 0);
            $this->SetLineWidth(0.3);
            $this->SetFont('', 'B');
            // Header
            $w = array(40, 35, 40);
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = 0;
            foreach($data as $row) {
                $this->Cell($w[0], 6, $row['nume'] . $row['prenume'], 'LR', 0, 'C', $fill);
                $this->Cell($w[1], 6, number_format($row['calorii']), 'LR', 0, 'C', $fill);
                $this->Cell($w[2], 6, number_format($row['exercitii']), 'LR', 0, 'C', $fill);
                $this->Ln();
                $fill=!$fill;
            }
            $this->Cell(array_sum($w), 0, '', 'T');
        }
    }

    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Workout Generator');
    $pdf->SetTitle('Top useri');
    $pdf->SetSubject('Top useri');

    // set default header data
    $pdf->SetHeaderData(null, null, 'Workout Generator', null);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // set font
    $pdf->SetFont('helvetica', '', 12);

    // add a page
    $pdf->AddPage();

    // column titles
    $header = array('Nume', 'Scor', 'Nr exercitii');

    // data loading
    $data = $pdf->LoadData();

    // print colored table
    $pdf->ColoredTable($header, $data);

    // close and output PDF document
    $pdf->Output('Workout Generator', 'I');
?>