<?php

require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('C1','CERO');
$sheet->setCellValue('D1','MODELO');
$sheet->setCellValue('E1','MODEL');
$sheet->setCellValue('F1','CODIGOS');
$sheet->setCellValue('H1','COMP');
$sheet->setCellValue('I1','COMP2');
$sheet->setCellValue('J1','COMP3');
$sheet->setCellValue('K1','COMP4');
$sheet->setCellValue('L1','TALLAS');
$sheet->setCellValue('M1','CANTIDAD');

$writer = new Xls($spreadsheet);
$writer->save('wALLMARTpr.xls');