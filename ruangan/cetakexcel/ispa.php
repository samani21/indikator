<?php
// Load file koneksi.php
include "../../PHPExcel/koneksi.php";
// Load plugin PHPExcel nya
require_once '../../PHPExcel/PHPExcel.php';
// Panggil class PHPExcel nya
$excel = new PHPExcel();
// Settingan awal file excel
$excel->getProperties()->setCreator('My Notes Code')
             ->setLastModifiedBy('My Notes Code')
             ->setTitle("Data Indikator")
             ->setSubject("Data Indikator")
             ->setDescription("Laporan Data Indikator")
             ->setKeywords("Data Indikator");
// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
  'font' => array('bold' => true), // Set font nya jadi bold
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);
// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
  'alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);
$excel->setActiveSheetIndex(0)->setCellValue('B1', "RUANGAN ISPA"); 
$excel->getActiveSheet()->mergeCells('B1:J1');
$excel->getActiveSheet()->mergeCells('E2:H2');
$excel->getActiveSheet()->mergeCells('B2:B3');
$excel->getActiveSheet()->mergeCells('C2:C3');
$excel->getActiveSheet()->mergeCells('D2:D3');
$excel->getActiveSheet()->mergeCells('I2:I3'); 
$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); 
$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); 
$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

$excel->setActiveSheetIndex(0)->setCellValue('E2', "Capaian");
$excel->setActiveSheetIndex(0)->setCellValue('B2', "NO"); 
$excel->setActiveSheetIndex(0)->setCellValue('C2', "Indikator");
$excel->setActiveSheetIndex(0)->setCellValue('D2', "Target");
$excel->setActiveSheetIndex(0)->setCellValue('E2', "Capaian");
$excel->setActiveSheetIndex(0)->setCellValue('E3', "JUN"); 
$excel->setActiveSheetIndex(0)->setCellValue('F3', "JUL"); 
$excel->setActiveSheetIndex(0)->setCellValue('G3', "AGT");
$excel->setActiveSheetIndex(0)->setCellValue('H3', "SEP");
$excel->setActiveSheetIndex(0)->setCellValue('I2', "RERATA"); 
$excel->getActiveSheet()->getStyle('B2:B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C2:C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D2:D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E2:H2')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I2:I3')->applyFromArray($style_col);

$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

$sql = $pdo ->prepare("SELECT * FROM `tb_indikator` WHERE ruangan LIKE 'Ruangan ispa'");
$sql->execute(); 
$no = 1; 
$numrow = 4; 
while($data = $sql->fetch()){
  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $no);
  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['indikator']);
  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['target']."%");
  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['jun']."%");
  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['jul']."%");
  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['agt']."%");
  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['sep']."%");
  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['rata']."%");
  
  
  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
  
  $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
  
  $no++; 
  $numrow++; 
}

$excel->getActiveSheet()->getColumnDimension('B')->setWidth(5); 
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(100); 
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); 
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10); 

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data ruangan ispa.xlsx"'); 
header('Cache-Control: max-age=0');
$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>