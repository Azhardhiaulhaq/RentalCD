# Rental CD API

RentalCD adalah sebuah API yang berfungsi untuk membantu pemilik toko RentalCD. Owner dari toko dapat memasukkan CD baru maupun mengupdate data kuantitas dari CD yang sudah ada. Sementara customer, dapat meminjam CD dan mengembalikan CD.

## Cara Penggunaan

1. Clone Repository ini ke local

2. Kemudian masuk ke folder RentalCD

> cd RentalCD

3. Lakukan Migrasi Database dengan mengetikkan

> php artisan make:migration create_user_table


4. Jalankan seeding dari Database (Untuk mengisi Table yang telah dibuat)

> php artisan db:seed --force

5. Jalankan API dengan cara :

> php -S localhost:8000 -t ./public

6. Untuk perintah apa saja yang dapat dijalankan di API ini, dapat melihat blueprint API yang dapat diakses pada tautan berikut :

https://app.swaggerhub.com/apis-docs/Azhardhiaulhaq/RentalCD/1.0.0

## Author

Moch. Azhar Dhiaulhaq
Institut Teknologi Bandung

