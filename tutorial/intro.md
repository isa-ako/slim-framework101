## Sekedar Perkenalan

Cara paling mudah menggunakan template slimstart ini adalah download (atau clone) dan letakkan di htdocs, selanjutnya kita bisa memanggilnya melalui url `http://localhost/hello/nama-anda-sendiri`.

Dalam skala paling sederhana Slim hanya berperan sebagai operator yang menerima request `ServerRequestInterface` dari Browser Client serta mengirimkan response `ResponseInterface` pada pengguna dengan menggunakan aturan eksekusi pada Middleware yang didaftarkan.

Langkah sederhana penggunaan slimframework adalah sebagai berikut:

1. Pertama kali adalah me-load semua library yang ada pada vendor.
2. Selanjutnya inisialisasi `Slim\App` dan disimpan pada variabel.
3. Deklarasikan router dengan menggunakan perintah routing Slim.
4. Panggil fungsi `run()` dari Slim.

Semua router harus dipanggil setelah inisialisasi `Slim\App` dan sebelum pemanggilan fungsi `run()`.

Pada tahap inisialisasi `Slim\App` kita juga dapat menambahkan konfigurasi tertentu seperti penampilan pesan kesalahan dan variabel konfigurasi yang akan digunakan pada seluruh aplikasi. Format penambahan konfigurasi adalah sebagai berikut:

```
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);

$app = new \Slim\App($c);
```