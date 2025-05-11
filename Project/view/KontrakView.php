<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

interface KontrakView {
    public function tampil();
    public function tambah();
    public function ubah($id);
    public function hapus($id);
}
