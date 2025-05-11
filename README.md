# Janji
Saya Zakiyah Hasanah dengan NIM 2305274 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

# Desain Program
Program ini memungkinkan pengguna untuk melakukan operasi create, read, update, dan delete terhadap tabel mahasiswa.

## Database
Database dari project ini hanya berisi satu tabel (`mahasiswa`) dengan atribut:

- `id` int(11) NOT NULL AUTO_INCREMENT,
- `nim` varchar(100) NOT NULL,
- `nama` varchar(100) NOT NULL,
- `tempat` varchar(100) NOT NULL,
- `tl` varchar(100) NOT NULL,
- `gender` varchar(10) NOT NULL,
- `email` varchar(100) NOT NULL,
- `telp` varchar(100) NOT NULL,

Ini sama persis dengan file original yang diberikan oleh asprak, tidak ada perubahan apapun yang dilakukan.

## Perubahan yang Dilakukan

Kolom email dan telepon yang sudah ada pada database sekarang tampil pada view.
- tambah setter dan getter dari atribut email dan telepon pada Mahasiswa.class.php
- pada presenter, tambahkan fungsi getEmail dan getTelepon (interface KontakPresenter dan class ProsesMahasiswa).

Fitur create, edit, dan delete ditambahkan sesuai spesifikasi soal. Ini dicapai dengan melakukan:
- tambah fungsi addMahasiswa, updateMahasiswa, dan deleteMahasiswa pada model (class TabelMahasiswa). fungsi ini akan dipanggil dari presenter (class ProsesMahasiswa).
- modifikasi index.php untuk menghandle aksi dan id sesuai dengan URL menggunakan $_GET['value']. perlu diingat bahwa aksi ubah dan hapus memerlukan id, sedangkan tambah dan tampil tidak perlu.
- pada presenter, buat fungsi untuk add update dan delete data mahasiswa.  (interface KontakPresenter dan class ProsesMahasiswa).
- pada template, tambahkan file HTML untuk form tambah dan ubah/edit mahasiswa. 
- pada view, tambahkan fungsi `tambah()`, `ubah($id)`, dan `hapus($id)` (interface KontakView dan class TampilMahasiswa). Panggil fungsi presenter untuk add, edit, delete (`$this->prosesmahasiswa->updateDataMahasiswa(...)`). Pada fungsi-fungsi tambah dan ubah, gunakan template yang dibuat pada poin sebelumnya. Untuk fungsi hapus, tidak perlu template karena langsung redirect ke index sudah cukup. Popup konfirmasi akan dihandle oleh fungsi tampil() pada view.

# Penjelasan Alur

Pada aplikasi ini, pengguna dapat melakukan operasi CRUD (*Create, Read, Update, Delete*) pada tabel `mahasiswa`.

Tersedia tiga jenis halaman utama:

1. **Halaman Tabel**  
   Menampilkan daftar data dalam bentuk tabel. Pada halaman ini:
   > Tersedia tombol "Add" untuk menambahkan data baru.<br>
   > Setiap baris data memiliki tombol "Edit" dan "Delete".

2. **Halaman Form Tambah Data**  
   Halaman ini menampilkan form input untuk menambahkan entitas baru.
   > Form ini berisi input sesuai dengan atribut yang dibutuhkan oleh masing-masing entitas.

3. **Halaman Form Edit Data**  
   Sebenarnya merupakan tampilan yang sama dengan halaman tambah, namun digunakan untuk mengedit data yang sudah ada.
   > Data yang sudah ada akan dimuat terlebih dahulu ke dalam form untuk diedit.

### Konfirmasi Penghapusan

Ketika pengguna ingin menghapus suatu data, project ini akan meminta konfirmasi terlebih dahulu untuk menghindari penghapusan yang tidak disengaja.

## Cara Instalasi

Untuk menjalankan aplikasi ini secara lokal, lakukan langkah-langkah berikut:

1. **Aktifkan Web Server dan MySQL**  
   Pastikan Anda telah menyalakan server lokal seperti XAMPP atau Laragon dan MySQL sudah berjalan.

2. **Buat Database Kosong**  
   Masuk ke MySQL dan buat database baru bernama `mvp_php`.

3. **Import Struktur dan Data Awal**  
   Jalankan perintah berikut di terminal:
   ```bash
   mysql -u myusername -p mypassword mvp_php < "path/to/mvp_php.sql"
   ```
4. Jalankan server php dan buka linknya
   ```bash
   php -S localhost:3000
   ```

# Dokumentasi


https://github.com/user-attachments/assets/414c4f3a-6cdd-42a2-8e5c-ab05b788c5ea

