<?php
require_once('../models/connect.php');
require('../vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

if(isset($_POST['export'])){
    $sheet
    ->setCellValue('A1', 'STT')
    ->setCellValue('B1', 'Tên')
    ->setCellValue('C1', 'SĐT')
    ->setCellValue('D1', 'Email')
    ->setCellValue('E1', 'Nghành học quan tâm')
    ->setCellValue('F1', 'Ngày-Giờ');

// Ghi dữ liệu
$sql1 = "SELECT * FROM users";
$result1 = mysqli_query($conn, $sql1);
$rowCount =2;
while ($row = mysqli_fetch_array($result1)) {
    $sheet->setCellValue('A' . $rowCount, $rowCount-1);
    $sheet->setCellValue('B' . $rowCount, $row['name']);
    $sheet->setCellValue('C' . $rowCount, $row['phone']);
    $sheet->setCellValue('D' . $rowCount, $row['email']);
    $sheet->setCellValue('E' . $rowCount, $row['majors']);
    $sheet->setCellValue('F' . $rowCount, $row['date']);
    $rowCount++;

}

// Xuất file
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setOffice2003Compatibility(true);
$filename=time().".xlsx";
$writer->save($filename);
header("location:".$filename);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewUsers</title>
</head>
<style>
    body {
        margin: unset;
    }

    /* header  */
    .home-header-logo {
        background-color: #014EB9;
        padding: 20px 60px;
    }

    .home-header-logo img {
        width: 220px;
    }

    /* TABLE  */
    th {
        border: 1px solid white;
        border-collapse: collapse;
        background-color: #014EB9;
        color: white;
    }

    table,
    td {
        border: 1px solid white;
        border-collapse: collapse;
    }


    td {
        background-color: #96D4D4;
    }

    .container-table {
        padding: 0px 50px;
    }

    .buttons {
        text-align: center;
        padding-bottom: 20px;
        width: 200px;
    }
    .login-button {
        background-color: #203F7D;
        color: #FEDA00;
        width: 100%;
        font-size: 16px;
        font-weight: 600;
    }
    .login-button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        text-decoration: none;
    }
    .login-button:hover {
        background-color: #203F7D;
        color: #fff;
        width: 100%;
        box-shadow: none;
    }

    .login-button:active {
        box-shadow: 0 0 10px #19d4ca;
    }

</style>

<body>
    <!-- HEADER  -->
    <div>
        <div class="home-header-logo">
            <a href="../index.php"><img src="../public/images/logo-vtc-academy-white-20220812062339.png" alt=""></a>
        </div>
    </div>
    <div class="container-table">
        <div>
            <h1>Danh sách các thí sinh </h1>
        </div>
        <div class="buttons">
            <form  method="POST" >
                <input class="login-button" type="submit" name="export" value="ExportExcel">
            </form>
        </div>
        
            <table style="width:100%">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Ngành quan tâm</th>
                    <th>Ngày-Giờ</th>
                </tr>
                <?php
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                $count = 0;
                while ($kq = mysqli_fetch_assoc($result)) {
                    $count++
                ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $kq['name'] ?></td>
                        <td><?php echo $kq['phone'] ?></td>
                        <td><?php echo $kq['email'] ?></td>
                        <td><?php echo $kq['majors'] ?></td>
                        <td><?php echo $kq['date'] ?></td>
                    </tr>
                <?php
                }

                ?>

            </table>
        </div>
    </div>

</body>

</html>