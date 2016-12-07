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
            $fetchGate = $studentModel->dataGateByHex($hexaCard);
            foreach($fetchGate as $gateByHex)
            {
                header("location: ?url=SiblingList&Hexa=".$gateByHex['IDcard']);                
            }
        }
        else
        {
            header("location: ?url=ParentInputNis&HexaCard=".$hexaCard);
        }
    }
}
else 
{
    //
}

include_once 'View/ParentCheck.php';
?>
