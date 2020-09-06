<?php
include_once 'Employee.php';

class EmployeeManager
{
    public $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    function getDataJson()
    {
        $dataJson = file_get_contents($this->filePath);  //lấy dữ liệu từ file data.json
        return json_decode($dataJson, true);        //chuyen du lieu tu json sang mang
    }

    function saveData($arr)
    {
        $dataJson = json_encode($arr); //chuyen du lieu tu mang sang json
        file_put_contents($this->filePath, $dataJson);  //day du lieu vao file data.json
    }

    function getAll()
    {
        $data = $this->getDataJson();
        $array = [];
        foreach ($data as $key => $item) {
            $employee = new Employee(++$key, $item['name'], $item['age'], $item['address']);
            array_push($array, $employee);
        }
        return $array;

    }

    function add($employee)
    {
        $data = $this->getDataJson();  //lay du lieu dang mang ra
        $arr = [
            'id' => $employee->id,
            'name' => $employee->name,
            'age' => $employee->age,
            'address' => $employee->address
        ];
        array_push($data, $arr);
        $this->saveData($data);
    }

}