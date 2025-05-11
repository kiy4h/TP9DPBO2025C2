<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include ("view/TampilMahasiswa.php");

// Membuat objek tampil mahasiswa
$tp = new TampilMahasiswa();

// Mendapatkan aksi dan id dari URL (jika ada)
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
$id   = isset($_GET['id']) ? $_GET['id'] : "";

// Menentukan aksi yang akan dilakukan berdasarkan GET
if ($aksi == "tambah") {
    $data = $tp->tambah();
} else if ($aksi == "ubah") {
    $data = $tp->ubah($id);
} else if ($aksi == "hapus") {
    $data = $tp->hapus($id);
} else {
    $data = $tp->tampil();
}
