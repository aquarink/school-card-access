<?php

include_once 'Model/StudentModel.php';
$studentModel = new StudentModel();

if(isset($_POST['subCheckHexa'])) 
{
    if(empty($_POST['hexaCard'])) 
    {
        $pesan = 'Kolom Tidak boleh Kosong';
    }
    else
    {
        $hexaCard = $_POST['hexaCard'];
        $check = $studentModel->checkHexa($hexaCard);

        if($check > 0) 
        {
            $pesan = 'Data Sudah Terdaftar Di Gate Database';
        }
        else
        {
            header("location: ?url=StudentInputNis&HexaCard=".$hexaCard);
        }
    }
}
else 
{
    //
}

include_once 'View/StudentCheck.php';
?>
