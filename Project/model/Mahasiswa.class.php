<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang menggambarkan detail sebuah mahasiswa dengan atribut-atributnya
class Mahasiswa {
    public $id     = '';
    public $nim    = '';
    public $nama   = '';
    public $tempat = '';
    public $tl     = '';
    public $gender = '';
    public $email  = ''; // Tambahan atribut email
    public $telp   = ''; // Tambahan atribut telepon

    public function __construct($id = '', $nim = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $telp = '') {
        $this->id     = $id;
        $this->nim    = $nim;
        $this->nama   = $nama;
        $this->tempat = $tempat;
        $this->tl     = $tl;
        $this->gender = $gender;
        $this->email  = $email;
        $this->telp   = $telp;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setNim($nim) {
        $this->nim = $nim;
    }
    public function setNama($nama) {
        $this->nama = $nama;
    }
    public function setTempat($tempat) {
        $this->tempat = $tempat;
    }
    public function setTl($tl) {
        $this->tl = $tl;
    }
    public function setGender($gender) {
        $this->gender = $gender;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setTelepon($telp) {
        $this->telp = $telp;
    }

    public function getId() {
        return $this->id;
    }
    public function getNim() {
        return $this->nim;
    }
    public function getNama() {
        return $this->nama;
    }
    public function getTempat() {
        return $this->tempat;
    }
    public function getTl() {
        return $this->tl;
    }
    public function getGender() {
        return $this->gender;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getTelepon() {
        return $this->telp;
    }
}
