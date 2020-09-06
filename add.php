<?php
include_once 'Employee.php';
include_once 'EmployeeManager.php';
?>
<form method="post">
    <input type="text" name="id" required placeholder="id">
    <input type="text" name="name" required placeholder="name">
    <input type="text" name="age"  required placeholder="age">
    <input type="text" name="address" required placeholder="address">
    <input type="submit" value="ADD">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
   $employeeManager = new EmployeeManager('data.json');
   $employee = new Employee($id, $name, $age, $address);
   $employeeManager->add($employee);
   header('location:index.php');
}


?>