<?php
session_start(); // Oturumu başlatır veya mevcut oturumu devam ettirir.

$_SESSION = array(); // $_SESSION değişkenini boş bir dizi olarak ayarlar, mevcut oturum verilerini siler.
session_destroy(); // Mevcut oturumu sonlandırır ve tüm oturum verilerini siler.

header("location:login.php"); // Tarayıcıya yönlendirme başlığını gönderir, kullanıcıyı login.php sayfasına yönlendirir.
exit(); // Kodun daha fazla işlenmesini engeller, scriptin burada sonlandığını belirtir.
?>
