<h1> Câu trả lời sai</h1>
<a href="https://vongquaymayman.one/">click chơi để nhận thưởng</a>
<?php
require_once('../models/connect.php');
require('../Classes/PHPExcel.php');

if (isset($_POST['btnExport'])) {
    $objExcel = new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('DSThiSinh');

    $rowCount = 1;
    $sheet->setCellValue('A' . $rowCount, 'STT');
    $sheet->setCellValue('B' . $rowCount, 'Tên');
    $sheet->setCellValue('C' . $rowCount, 'SĐT');
    $sheet->setCellValue('D' . $rowCount, 'Email');
    $sheet->setCellValue('E' . $rowCount, 'Nghành học quan tâm');
    $sheet->setCellValue('F' . $rowCount, 'Ngày-Giờ');
    $sql1 = "SELECT * FROM users";
    $result1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_array($result1)) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $rowCount);
        $sheet->setCellValue('B' . $rowCount, $row['name']);
        $sheet->setCellValue('C' . $rowCount, $row['phone']);
        $sheet->setCellValue('D' . $rowCount, $row['email']);
        $sheet->setCellValue('E' . $rowCount, $row['majors']);
        $sheet->setCellValue('F' . $rowCount, $row['date']);
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'export.xlsx';
    $objWriter->save($filename);



    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($filename));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');

    readfile($filename);
    exit();;
}
?>