<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include ("KontrakView.php");
include ("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView {
    private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    public function __construct() {
        //konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    public function tampil() {
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $data = null;

        //semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
			<td>
				<a href='index.php?aksi=ubah&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
				<a href='index.php?aksi=hapus&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
			</td>
			</tr>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin_list.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    public function tambah() {
        // Jika ada form yang disubmit
        if (isset($_POST['submit'])) {
            // Mengambil data dari form
            $nim    = $_POST['nim'];
            $nama   = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tl     = $_POST['tl'];
            $gender = $_POST['gender'];
            $email  = $_POST['email'];
            $telp   = $_POST['telp'];

            // Memanggil method untuk menambah data mahasiswa
            $result = $this->prosesmahasiswa->addDataMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);

            if ($result) {
                // Redirect ke halaman utama
                header("Location: index.php");
            } else {
                // Jika gagal, tampilkan pesan error
                echo "Gagal menambah data mahasiswa";
            }
        } else {
            // Jika tidak ada form yang disubmit, tampilkan form tambah
            $this->tpl = new Template("templates/skin_tambah.html");
            $this->tpl->write();
        }
    }

    public function ubah($id) {
        // Jika ada form yang disubmit
        if (isset($_POST['submit'])) {
            // Mengambil data dari form
            $nim    = $_POST['nim'];
            $nama   = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tl     = $_POST['tl'];
            $gender = $_POST['gender'];
            $email  = $_POST['email'];
            $telp   = $_POST['telp'];

            // Memanggil method untuk mengubah data mahasiswa
            $result = $this->prosesmahasiswa->updateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);

            if ($result) {
                // Redirect ke halaman utama
                header("Location: index.php");
            } else {
                // Jika gagal, tampilkan pesan error
                echo "Gagal mengubah data mahasiswa";
            }
        } else {
            // Jika tidak ada form yang disubmit, tampilkan form ubah
            $this->prosesmahasiswa->getDataMahasiswaById($id);

            if ($this->prosesmahasiswa->getSize() > 0) {
                $this->tpl = new Template("templates/skin_ubah.html");

                // Mengisi nilai form dengan data mahasiswa yang diambil
                $this->tpl->replace("DATA_ID", $id);
                $this->tpl->replace("DATA_NIM", $this->prosesmahasiswa->getNim(0));
                $this->tpl->replace("DATA_NAMA", $this->prosesmahasiswa->getNama(0));
                $this->tpl->replace("DATA_TEMPAT", $this->prosesmahasiswa->getTempat(0));
                $this->tpl->replace("DATA_TL", $this->prosesmahasiswa->getTl(0));

                // Handle radio button gender
                $gender = $this->prosesmahasiswa->getGender(0);
                if ($gender == "Laki-laki") {
                    $this->tpl->replace("CHECKED_LAKI", "checked");
                    $this->tpl->replace("CHECKED_PEREMPUAN", "");
                } else {
                    $this->tpl->replace("CHECKED_LAKI", "");
                    $this->tpl->replace("CHECKED_PEREMPUAN", "checked");
                }

                $this->tpl->replace("DATA_EMAIL", $this->prosesmahasiswa->getEmail(0));
                $this->tpl->replace("DATA_TELEPON", $this->prosesmahasiswa->getTelepon(0));

                $this->tpl->write();
            } else {
                echo "Data mahasiswa tidak ditemukan";
            }
        }
    }

    public function hapus($id) {
        // Memanggil method untuk menghapus data mahasiswa
        $result = $this->prosesmahasiswa->deleteDataMahasiswa($id);

        if ($result) {
            // Redirect ke halaman utama
            header("Location: index.php");
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Gagal menghapus data mahasiswa";
        }
    }
}
