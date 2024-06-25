<?php

// Veritabanı bağlantısı dahil ediliyor
include ("connection.php");

// Oturum başlatılıyor
session_start();

// Eğer form gönderildiyse (btnSubmit butonuna tıklandığında)
if (isset($_POST["btnSubmit"])) 
{
    // Formdan gönderilen veriler alınıyor
    $project_name = $_POST["projectName"];
    $project_desc = $_POST["projectDescription"];
    $project_link = $_POST["githubLink"];

    // Veritabanına ekleme sorgusu hazırlanıyor
    $add_project = "INSERT INTO projeler (proje_adi, proje_aciklamasi, github_link) VALUES ('$project_name', '$project_desc', '$project_link')";

    // Sorgu veritabanına gönderiliyor
    $eklendi = mysqli_query($baglanti, $add_project);

    // Eğer ekleme başarılıysa başarı mesajı gösteriliyor
    if($eklendi)
    {
        echo '<div class="message-container"><div class="success-message">Proje eklendi!</div></div>';
    }
    // Eğer ekleme sırasında hata oluşursa hata mesajı gösteriliyor
    else{
        echo '<div class="message-container"><div class="error-message">Proje eklenirken hata oluştu!</div></div>';
    }
} 
// Eğer form gönderilmediyse oturum açmamış kullanıcı mesajı gösteriliyor
else {
    echo '<div class="message-container"><div class="error-message">Oturum açmış bir kullanıcı bulunamadı!</div></div>';
}
?>

