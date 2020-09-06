<?php
include_once 'Employee.php';
include_once 'EmployeeManager.php';

$employeeManager = new EmployeeManager('data.json');
$employees = $employeeManager->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        background-color: aliceblue;
    }
    table, td, tr, th {
        border: 1px solid black;
    }
</style>
<body>
    <a href="add.php">Thêm mới</a>
    <table cellspacing="0px" align="center">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
        </tr>
        <?php
        if (empty($employees)):
        ?>
        <tr>
        <td>Nodata</td>
        </tr>
        <?php else:?>
        <?php foreach ($employees as $key=>$employee):?>
        <tr>
            <td><?php echo ++$key?></td>
            <td><?php echo $employee->name?></td>
            <td><?php echo $employee->age?></td>
            <td><?php echo $employee->address?></td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
    </table>
</body>
</html>

