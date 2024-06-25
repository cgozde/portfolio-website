<?php

// Veritabanı bağlantı bilgileri
$host = "localhost"; // Veritabanı sunucusu
$kullanici = "root"; // Veritabanı kullanıcı adı
$parola = ""; // Veritabanı parolası
$vt = "login"; // Veritabanı adı

// Veritabanına bağlantı oluşturuluyor
$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);

// Veritabanı bağlantısının karakter seti UTF-8 olarak ayarlanıyor
mysqli_set_charset($baglanti, "UTF8");

?>
