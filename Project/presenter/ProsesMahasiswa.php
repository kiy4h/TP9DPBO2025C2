<?php

include ("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter {
    private $tabelmahasiswa;
    private $data = [];

    public function __construct() {
        // Konstruktor
        try {
            $db_host              = "localhost";                                                    // host
            $db_user              = "root";                                                         // user
            $db_password          = "";                                                             // password
            $db_name              = "mvp_php";                                                      // nama basis data
            $this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
            $this->data           = [];                                                             // instansi list untuk data Mahasiswa
        } catch (Exception $e) {
            echo "yah error " . $e->getMessage();
        }
    }

    public function prosesDataMahasiswa() {
        try {
            // mengambil data di tabel Mahasiswa
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->getMahasiswa();

            while ($row = $this->tabelmahasiswa->getResult()) {
                                                       // ambil hasil query
                $mahasiswa = new Mahasiswa();          // instansiasi objek mahasiswa untuk setiap data mahasiswa
                $mahasiswa->setId($row['id']);         // mengisi id
                $mahasiswa->setNim($row['nim']);       // mengisi nim
                $mahasiswa->setNama($row['nama']);     // mengisi nama
                $mahasiswa->setTempat($row['tempat']); // mengisi tempat
                $mahasiswa->setTl($row['tl']);         // mengisi tl
                $mahasiswa->setGender($row['gender']); // mengisi gender
                $mahasiswa->setEmail($row['email']);   // mengisi email
                $mahasiswa->setTelepon($row['telp']);  // mengisi telepon

                $this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
            }
            // Tutup koneksi
            $this->tabelmahasiswa->close();
        } catch (Exception $e) {
            // memproses error
            echo "yah error part 2 " . $e->getMessage();
        }
    }

    public function getDataMahasiswaById($id) {
        try {
            // Kosongkan data lama
            $this->data = [];

            // Buka koneksi
            $this->tabelmahasiswa->open();

            // Ambil data mahasiswa berdasarkan ID
            $this->tabelmahasiswa->getMahasiswaById($id);

            while ($row = $this->tabelmahasiswa->getResult()) {
                                                       // ambil hasil query
                $mahasiswa = new Mahasiswa();          // instansiasi objek mahasiswa
                $mahasiswa->setId($row['id']);         // mengisi id
                $mahasiswa->setNim($row['nim']);       // mengisi nim
                $mahasiswa->setNama($row['nama']);     // mengisi nama
                $mahasiswa->setTempat($row['tempat']); // mengisi tempat
                $mahasiswa->setTl($row['tl']);         // mengisi tl
                $mahasiswa->setGender($row['gender']); // mengisi gender
                $mahasiswa->setEmail($row['email']);   // mengisi email
                $mahasiswa->setTelepon($row['telp']);  // mengisi telepon

                $this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
            }

            // Tutup koneksi
            $this->tabelmahasiswa->close();

            return $this->data;
        } catch (Exception $e) {
            // memproses error
            echo "Error: " . $e->getMessage();
        }
    }

    public function addDataMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp) {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
            $this->tabelmahasiswa->close();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp) {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
            $this->tabelmahasiswa->close();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteDataMahasiswa($id) {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->deleteMahasiswa($id);
            $this->tabelmahasiswa->close();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getId($i) {
        // mengembalikan id mahasiswa dengan indeks ke i
        return $this->data[$i]->getId();
    }
    public function getNim($i) {
        // mengembalikan nim mahasiswa dengan indeks ke i
        return $this->data[$i]->getNim();
    }
    public function getNama($i) {
        // mengembalikan nama mahasiswa dengan indeks ke i
        return $this->data[$i]->getNama();
    }
    public function getTempat($i) {
        // mengembalikan tempat mahasiswa dengan indeks ke i
        return $this->data[$i]->getTempat();
    }
    public function getTl($i) {
        // mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
        return $this->data[$i]->getTl();
    }
    public function getGender($i) {
        // mengembalikan gender mahasiswa dengan indeks ke i
        return $this->data[$i]->getGender();
    }
    public function getEmail($i) {
        // mengembalikan email mahasiswa dengan indeks ke i
        return $this->data[$i]->getEmail();
    }
    public function getTelepon($i) {
        // mengembalikan telepon mahasiswa dengan indeks ke i
        return $this->data[$i]->getTelepon();
    }
    public function getSize() {
        return sizeof($this->data);
    }
}
