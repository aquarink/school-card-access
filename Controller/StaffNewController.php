<?php

include_once 'Model/StudentModel.php';
$studentModel = new StudentModel();

if(isset($_POST['subNew'])) 
{
    if(empty($_POST['name']) || empty($_POST['nis']) || empty($_POST['hexCard']))
    {
        $pesan = 'Kolom Tidak Boleh Kosong';
    }
    else 
    {
        $nama = $_POST['name'];
        $nis = $_POST['nis'];
        $hexaCard = $_POST['hexCard'];
        $status = 'staff';
        $IDcard = $hexaCard;
        $IDcard2 = substr($hexaCard, 6,2).substr($hexaCard, 4,2).substr($hexaCard,2,2).substr($hexaCard, 0,2);

        $checkDataStatusStaff = $studentModel->CheckdataGateByNikStaff($nik);

        if($checkDataStatusStaff > 0)
        {
            $dropData = $studentModel->deleteAccesssHeaderByNis($nis);
            if($dropData > 0)
            {
                $saveNewStudent = $studentModel->insertAccesssHeader($nis, $nama, $status, $IDcard, $IDcard2);
                if($saveNewStudent > 0)
                {
                    header("location: ?url=StaffNew&Msg=Pendaftaran ".$nama." Berhasil DROP");
                }
                else 
                {
                    $pesan = 'SQL saveNewStudent Gagal';
                }
            }
            else 
            {
                $pesan = 'SQL dropData Gagal';
            }
        }
        else 
        {
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
}
else 
{

}

include_once 'View/StaffNew.php';
?>
