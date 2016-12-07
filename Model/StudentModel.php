<?php

require_once 'Koneksi.php';

class StudentModel {

  public $panggilKoneksi;

  function __construct() {
    $bukaKoneksi = new Koneksi();
    $this->panggilKoneksi = $bukaKoneksi->KoneksiDatabase();
    return $this->panggilKoneksi;
  }

  public function insertAccesssHeader($IDnama, $nama, $status, $IDcard, $IDcard2) {
    $query = $this->panggilKoneksi->prepare("INSERT INTO aksesheader (IDnama, nama, status, IDcard, IDcard2) VALUES(?,?,?,?,?)");
    $data = array($IDnama, $nama, $status, $IDcard, $IDcard2);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function updateAccesssHeader($IDnama, $nama, $status, $IDcard, $IDcard2, $recordID) {
    $query = $this->panggilKoneksi->prepare("UPDATE aksesheader SET IDnama = ?, nama = ?, status = ?, IDcard = ?, IDcard2 = ? WHERE recordID = ?");
    $data = array($IDnama, $nama, $status, $IDcard, $IDcard2, $recordID);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function deleteAccesssHeaderByNis($nis) {
    $query = $this->panggilKoneksi->prepare("DELETE FROM aksesheader WHERE IDnama = ?");
    $data = array($nis);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function checkHexa($hexaCard) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDcard = ?");
    $data = array($hexaCard);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function dataStudentByHexa($hexaCard) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDcard = ?");
    $data = array($hexaCard);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }

  public function checkNisOnGate($nis) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDnama = ?");
    $data = array($nis);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function dataGateByNis($nis) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDnama = ?");
    $data = array($nis);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }

  public function dataGateByHex($hex) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDcard = ?");
    $data = array($hex);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }

  public function CheckdataGateByNikStaff($nik) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDnama = ? AND status = 'staff'");
    $data = array($nik);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function dataGateByHexStaff($hex) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesheader WHERE IDcard = ?");
    $data = array($hex);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }

  public function checkNisOnStudent($nis) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM student_by_pebri WHERE no_induk = ?");
    $data = array($nis);
    $query->execute($data);
    $result = $query->rowCount();
    return $result;
  }

  public function dataStudentByNis($nis) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM student_by_pebri WHERE no_induk = ?");
    $data = array($nis);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }

  public function dataSiblingByHex1($hex1) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesdetail WHERE IDcard = ?");
    $data = array($hex1);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }

  public function dataAccessDetailByNis($hexa) {
    $query = $this->panggilKoneksi->prepare("SELECT * FROM aksesdetail WHERE IDcard = ?");
    $data = array($hexa);
    $query->execute($data);
    $result = $query->fetchAll();
    return $result;
  }
}
