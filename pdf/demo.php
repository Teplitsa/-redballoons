<?php


  require_once( "fpdf.php" );

  // Начало конфигурации

  $textColour = array( 0, 0, 0 );
  $headerColour = array( 100, 100, 100 );
  $tableHeaderTopTextColour = array( 255, 255, 255 );
  $tableHeaderTopFillColour = array( 125, 152, 179 );
  $tableHeaderTopProductTextColour = array( 0, 0, 0 );
  $tableHeaderTopProductFillColour = array( 143, 173, 204 );
  $tableHeaderLeftTextColour = array( 99, 42, 57 );
  $tableHeaderLeftFillColour = array( 184, 207, 229 );
  $tableBorderColour = array( 50, 50, 50 );
  $tableRowFillColour = array( 213, 170, 170 );
  $reportName = "2009 Widget Sales Report";
  $reportNameYPos = 160;
  $logoFile = "widget-company-logo.png";
  $logoXPos = 0;
  $logoYPos = 0;
  $logoWidth = 3266;
  $columnLabels = array( "Q1", "Q2", "Q3", "Q4" );
  $rowLabels = array( "SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget" );
  $chartXPos = 20;
  $chartYPos = 250;
  $chartWidth = 160;
  $chartHeight = 80;
  $chartXLabel = "Product";
  $chartYLabel = "2009 Sales";
  $chartYStep = 20000;

  $chartColours = array(
                    array( 255, 100, 100 ),
                    array( 100, 255, 100 ),
                    array( 100, 100, 255 ),
                    array( 255, 255, 100 ),
                  );

  $data = array(
            array( 9940, 10100, 9490, 11730 ),
            array( 19310, 21140, 20560, 22590 ),
            array( 25110, 26260, 25210, 28370 ),
            array( 27650, 24550, 30040, 31980 ),
          );

  // Конец конфигурации


  function clear_pdf_files() {

    $dir = opendir('/home/c/cb68433/public_html/pdf_files');
    $count = 0;
    while($file = readdir($dir)){
        if($file == '.' || $file == '..' || is_dir('/home/c/cb68433/public_html/pdf_files' . $file)){
            continue;
        }
        $count++;
    }


    if($count >= 10){
      if ($handle = opendir('/home/c/cb68433/public_html/pdf_files')) {
          while (false !== ($file = readdir($handle))) { 
              if ($file != "." && $file != "..") { 
                  unlink('/home/c/cb68433/public_html/pdf_files/' . $file); 
                  // if(unlink('/home/c/cb68433/public_html/pdf_files' . $file)) { echo "Файл удален"; } else { echo "Ошибка при удалении файла"; }
                  // $filename = '/home/c/cb68433/public_html/pdf_files/' . $file;

                  // echo "11";

              } 
          }
          closedir($handle); 
      }  
    }
  }


  clear_pdf_files();


  function GeneratePDF($file, $timest){
    $pdf = new FPDF( 'L', 'mm', array(700,900) );
    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
    



        /*  первая страница */
        $pdf->AddPage();
        $pdf->Image( "RBpasport-1.jpg", $logoXPos, $logoYPos, $logoWidth );
        /* end первая страница */

    $pdf->AddPage();
    $pdf->Image( $file, $logoXPos, $logoYPos, $logoWidth );

        /*  третья страница */
        $pdf->AddPage();
        $pdf->Image( "RBpasport-3.jpg", $logoXPos, $logoYPos, $logoWidth );
        /* end третья страница */


    $filename="/home/c/cb68433/public_html/pdf_files/test" . $timest . ".pdf";
    $pdf->Output($filename,'F');
    // $pdf->Output( "report.pdf", "I" );

    $stringa = "string";

    return true;
  }

  



?>