<?php
 $idcte=$_GET['idcte'];
 $idmarca=$_GET['idmarca'];
 $orden=$_GET['orden'];
 $identificador=$_GET['identificador'];
 $idcte=filter_var($idcte,FILTER_VALIDATE_INT);

require_once  __DIR__ . '../../vendor/autoload.php' ;
include_once('../../registro.php');
$query = new Registro();
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
//Monarch walmart
if($idmarca==42 and $identificador==1){
    $rs = $query->Consultar("*","cat_etiquetas","ID_CLIENTE=${idcte} AND ID_MARCA=${idmarca} AND IDENTIFICADOR=${identificador} AND hijo=1","");

    $rs2=$query->Consultar("*","cat_etiquetas CE, etiquetas ET","CE.ID_CAT_ETIQUETA=ET.ID_CAT_ETIQUETA AND CE.IDENTIFICADOR=${identificador}","");
    //$num=$rs->num_rows();
    $helper = new Sample();
    if ($helper->isCli()) {
        $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

        return;
    }
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    //Indice de la columna
    $letra=[];
    $cont=1;
    for($i=65; $i<=90; $i++) {  
        $letra[$cont] = chr($i).'1'; 
    }
    // Set document properties
    $spreadsheet->getProperties()->setCreator('Sistemas')
        ->setLastModifiedBy('Sistemas')
        ->setTitle('Walmart')
        ->setSubject('');
        $contador=1;
        $arreglo[]=[];
    while(!$rs->EOF){
        $contador++;
        $cont++;
        //echo $valores[$contador];
        /*$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$contador,$rs->fields['NOMBRE'] );*/
        $arreglo[$contador]=$rs->fields['NOMBRE'];
        // echo $rs->fields['NOMBRE'];
        
        $rs->MoveNext();
    }
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $arreglo,
            NULL,
            'A1'
        );
    /*$num=mysqli_num_rows($rs2);*/
    $contador2=1;
    while(!$rs2->EOF){
        $contador2++;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$contador2,$rs2->fields['CAMPO1'] )
        ->setCellValue('C'.$contador2,$rs2->fields['CAMPO2'] )
        ->setCellValue('D'.$contador2,$rs2->fields['CAMPO3'] )
        ->setCellValue('E'.$contador2,$rs2->fields['CAMPO4'] )
        ->setCellValue('F'.$contador2,$rs2->fields['CAMPO5'] )
        ->setCellValue('G'.$contador2,$rs2->fields['CAMPO6'] )
        ->setCellValue('H'.$contador2,$rs2->fields['CAMPO7'] )
        ->setCellValue('I'.$contador2,$rs2->fields['CAMPO8'] )
        ->setCellValue('J'.$contador2,$rs2->fields['CAMPO9'] )
        ->setCellValue('K'.$contador2,$rs2->fields['CAMPO10'] )
        ->setCellValue('L'.$contador2,$rs2->fields['CAMPO11'] )
        ->setCellValue('M'.$contador2,$rs2->fields['CAMPO12'] )
        ->setCellValue('N'.$contador2,$rs2->fields['CAMPO13'] )
        ->setCellValue('O'.$contador2,$rs2->fields['CAMPO14'] )
        ->setCellValue('P'.$contador2,$rs2->fields['CAMPO15'] );

        $rs2->MoveNext();
    }
    // Add some data

    // Miscellaneous glyphs, UTF-8
    //$spreadsheet->setActiveSheetIndex(0)
        //->setCellValue('A4', 'Miscellaneous glyphs')
        //->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Walmart');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Walmart monarch.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}else if($idmarca==42 and $identificador==2){//Precio Walmart
    $rs = $query->Consultar("*","cat_etiquetas","ID_CLIENTE=${idcte} AND ID_MARCA=${idmarca} AND IDENTIFICADOR=${identificador} AND hijo=1","");

    $rs2=$query->Consultar("*","cat_etiquetas CE, etiquetas ET","CE.ID_CAT_ETIQUETA=ET.ID_CAT_ETIQUETA AND CE.IDENTIFICADOR=${identificador}","");
    //$num=$rs->num_rows();
    $helper = new Sample();
    if ($helper->isCli()) {
        $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

        return;
    }
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    //Indice de la columna
    $letra=[];
    $cont=1;
    for($i=65; $i<=90; $i++) {  
        $letra[$cont] = chr($i).'1'; 
    }
    // Set document properties
    $spreadsheet->getProperties()->setCreator('Sistemas')
        ->setLastModifiedBy('Sistemas')
        ->setTitle('Walmart')
        ->setSubject('');
        $contador=1;
        $arreglo[]=[];
    while(!$rs->EOF){
        $contador++;
        $cont++;
        //echo $valores[$contador];
        /*$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$contador,$rs->fields['NOMBRE'] );*/
        $arreglo[$contador]=$rs->fields['NOMBRE'];
        // echo $rs->fields['NOMBRE'];
        
        $rs->MoveNext();
    }
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $arreglo,
            NULL,
            'A1'
        );
    /*$num=mysqli_num_rows($rs2);*/
    $contador2=1;
    while(!$rs2->EOF){
        $contador2++;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$contador2,$rs2->fields['CAMPO1'] )
        ->setCellValue('C'.$contador2,$rs2->fields['CAMPO2'] )
        ->setCellValue('D'.$contador2,$rs2->fields['CAMPO3'] )
        ->setCellValue('E'.$contador2,$rs2->fields['CAMPO4'] )
        ->setCellValue('F'.$contador2,$rs2->fields['CAMPO5'] )
        ->setCellValue('G'.$contador2,$rs2->fields['CAMPO6'] )
        ->setCellValue('H'.$contador2,$rs2->fields['CAMPO7'] )
        ->setCellValue('I'.$contador2,$rs2->fields['CAMPO8'] )
        ->setCellValue('J'.$contador2,$rs2->fields['CAMPO9'] )
        ->setCellValue('K'.$contador2,$rs2->fields['CAMPO10'] )
        ->setCellValue('L'.$contador2,$rs2->fields['CAMPO11'] )
        ->setCellValue('M'.$contador2,$rs2->fields['CAMPO12'] )
        ->setCellValue('N'.$contador2,$rs2->fields['CAMPO13'] )
        ->setCellValue('O'.$contador2,$rs2->fields['CAMPO14'] )
        ->setCellValue('P'.$contador2,$rs2->fields['CAMPO15'] );

        $rs2->MoveNext();
    }
    // Add some data

    // Miscellaneous glyphs, UTF-8
    //$spreadsheet->setActiveSheetIndex(0)
        //->setCellValue('A4', 'Miscellaneous glyphs')
        //->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Walmart');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Walmartprecio.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}