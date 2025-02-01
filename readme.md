Problem 
-   WHO API, konsep yang saya pakai sepertinya salah, yang berhasil hanya Ketika input id penyakit/gejala, kalau search gejala belum bisa, jadi saat rekam medis sepertinya yang saya buat keliru. karena ketika buka platform who, itu sudah masuk ke icd-11.

Install Aplikasi Untuk Local
-	https://github.com/AlliesProject/simawi.git
-	Clone github diatas
-	Buat nama database simrs_test di phpmyadmin kalian
-   masuk ke terminal/cmd dan ketikkan "php index.php migrate" untuk migrate tabel

Deskripsi Aplikasi
-	akses via online : http://alliesproject.my.id/
-   Login terdapat 2, admin & doctor
-	Email : admin@gmail.com
-	Pass : admin123
-	Email : doctor@gmail.com
-	Pass : doctor123
-	Saat admin login terdapat 4 menu
-	Dashboard, user, pasien, registrasi
-	Saat doctor login terdapat 2 menu
-	Dashboard, rekam medis

1. Dashboard
-	Terdapat grafik jumlah penyakit terbanyak dan total pasien
-	Dashboard admin & doctor isinya sama

2. User
-	Terdapat 3 button, tambah, edit, delete
-	Saat tambah data, email tidak boleh sama, jika ada yang sama tidak bisa disimpan

3. Pasien
-	Terdapat 3 button, tambah, edit, delete
-	Saat simpan data, nik tidak boleh sama.

4. Registrasi
-	Ini untuk registrasi pasien, jika ada pasien baru, maka input di data pasien, jika sudah input di registrasi untuk hari ini
-	Pasien tidak bisa registrasi 2x di hari yang sama
-	Saat tambah registrasi hanya memilih pasien & doctor, tetapi saat insert ke table patient_history, yang ke isi hanya ID, RecordNumber, DateVisit, RegisteredBy, ConsultationBy, isDone, yang lain akan null dan akan terupdate saat dokter sudah diagnose.

5. Rekam Medis
-	Rekam medis ini di akses oleh dokter
-	Data diambil dari registrasi
-	Status diambil dari field isDone, jika 0 maka pending, jika 1 maka Done
-	Jika pending action diagnose ber icon pencil, itu di klik akan menginput diagnose
-	ICD-10 Code harus input code diagnose nya, maka name icd-10 nya akan muncul, diambil dari api.
-	jika simpan maka akan update table patient_history, dan isDone berubah menjadi 1
-	dan button diagnose warna biru bisa diklik, dan akan tampil seperti ini

6. API Endpoint Pasien
-	url : (http://alliesproject.my.id//api/patient)
-	jika berdasarkan id bisa dengan
-	url : (http://alliesproject.my.id//api/patient/1)


*** untuk penjelasan beserta gambar bisa di cek di README.docx