<?php

include_once 'Model/StudentModel.php';
$studentModel = new StudentModel();

if(isset($_POST['subNew'])) 
{
    if(empty($_POST['']) || empty($_POST['']) || empty($_POST['']))
    {
        $pesan = 'Kolom Tidak Boleh Kosong';
    }
    else 
    {
        $nama = $_POST['name'];
        $nis = $_POST['nis'];
        $hexaCard = $_POST['hexCard'];
        $status = 'student';
        $IDcard = $hexaCard;
        $IDcard2 = substr($hexaCard, 6,2).substr($hexaCard, 4,2).substr($hexaCard,2,2).substr($hexaCard, 0,2);

        $saveNewStudent = $studentModel->insertAccesssHeader($nis, $nama, $status, $IDcard, $IDcard2);
        if($saveNewStudent > 0)
        {
            header("location: ?url=StudentNew&Msg=Pendaftaran ".$nama." Berhasil NEW");
        }
        else 
        {
            $pesan = 'SQL saveNewStudent Gagal';
        }
    }
}
else 
{

}

include_once 'View/StudentNew.php';
?>
