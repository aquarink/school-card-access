<?php

if(isset($_GET['Hexa'])) 
{
    include_once 'Model/StudentModel.php';
    $studentModel = new StudentModel();

    $hex1 = $_GET['Hexa'];
    $fetchSiblingByHex1 = $studentModel->dataSiblingByHex1($hex1);

    if(empty($fetchSiblingByHex1))
    {
        $pesan = 'Data Sibling Tidak Ditemukan';
    }
    else 
    {
        //print_r($fetchSiblingByHex1);
        foreach($fetchSiblingByHex1 as $sibling)
        {
            $hexSibling = $sibling['IDcard2'];
            
        }
    }

    include_once 'View/SiblingList.php';
}
else 
{
    header("location: ?url=ParentCheck");   
}
?>
