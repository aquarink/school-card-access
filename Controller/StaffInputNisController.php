<?php

if(isset($_GET['HexaCard'])) 
{
    include_once 'Model/StudentModel.php';
    $studentModel = new StudentModel();

    if(isset($_POST['subNis'])) 
    {
        if(empty($_POST['nis']) || empty($_POST['hexaCard'])) 
        {
            $pesan = 'Kolom Tidak boleh Kosong';
        }
        else
        {
            $nisCard = $_POST['nis'];
            $hexaCard = $_POST['hexaCard'];

            $checkNisOnGate = $studentModel->checkNisOnGate($nisCard);
            if($checkNisOnGate > 0) 
            {
                $deleteByNis = $studentModel->deleteAccesssHeaderByNis($nisCard);
                if($deleteByNis > 0)
                {
                    $fetchStudentByNis = $studentModel->dataStudentByNis($nisCard);

                    foreach($fetchStudentByNis as $studentByNis)
                    {
                        $IDnama = $studentByNis['no_induk'];
                        $nama = $studentByNis['nama'];
                        $status = 'staff';
                        $IDcard = $hexaCard;
                        $IDcard2 = substr($hexaCard, 6,2).substr($hexaCard, 4,2).substr($hexaCard,2,2).substr($hexaCard, 0,2);
                        
                        $insertAccess = $studentModel->insertAccesssHeader($IDnama, $nama, $status, $IDcard, $IDcard2);

                        if($insertAccess > 0)
                        {
                            header("location: ?url=StaffCheck&Msg=Pendaftaran ".$nama." Berhasil");
                        }
                        else
                        {
                            $pesan = 'SQL insertAccess 1 Gagal';
                        }
                    }
                }
                else
                {
                    $pesan = 'SQL deleteByNis Gagal';
                }
            }
            else
            {
                $checkNisOnStudent = $studentModel->checkNisOnStudent($nisCard);
                if($checkNisOnStudent > 0) 
                {
                    $fetchStudentByNis = $studentModel->dataStudentByNis($nisCard);

                    foreach($fetchStudentByNis as $studentByNis)
                    {
                        $IDnama = $studentByNis['no_induk'];
                        $nama = $studentByNis['nama'];
                        $status = 'student';
                        $IDcard = $hexaCard;
                        $IDcard2 = substr($hexaCard, 6,2).substr($hexaCard, 4,2).substr($hexaCard,2,2).substr($hexaCard, 0,2);
                        
                        $insertAccess = $studentModel->insertAccesssHeader($IDnama, $nama, $status, $IDcard, $IDcard2);

                        if($insertAccess > 0)
                        {
                            header("location: ?url=StudentCheck&Msg=Pendaftaran <u>".$nama."</u> Berhasil");
                        }
                        else
                        {
                            $pesan = 'SQL insertAccess 2 Gagal';
                        }
                    }
                }
                else
                {
                    $pesan = 'Data Tidak Terdaftar Di Database Student';
                }
            }
        }
    }
    else 
    {
        //
    }

    include_once 'View/StudentInputNis.php';
}
else 
{
    header("location: ?url=StudentCheck");   
}
?>
