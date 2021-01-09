Pemira next level
Ini adalah duplikasi dari aplikasi https://pemira.upnvj.ac.id

Requirement
PHP 7.x
Composer (https://getcomposer.org/doc/00-intro.md)
Node JS (https://nodejs.org/en/download)

Cara penggunaan / install
Buka terminal / cmd
Jalankan cd pemira-next-level
Jalankan composer install
Duplikat file .env.example dan rename menjadi .env
Buat database (mysql) baru di PHPMYADMIN atau dari manapun
Buka file .env kemudian cari variable DB_DATABASE dan isi value nya dgn nama database yang kamu buat
Jalankan php artisan key:generate
Jalankan php artisan migrate --seed
Jalankan php artisan serve dan buka localhost:8000 di browser kamu
