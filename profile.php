<?php
include ("connection.php"); // Veritabanı bağlantı dosyasını dahil eder.

session_start(); // Oturumu başlatır veya mevcut oturumu devam ettirir.

if (isset($_POST["btnSubmit"])) // Form gönderildiğinde işlemleri yapar
{
    $project_name = $_POST["projectName"]; // Formdan gelen proje adı
    $project_desc = $_POST["projectDescription"]; // Formdan gelen proje açıklaması
    $project_link = $_POST["githubLink"]; // Formdan gelen GitHub proje linki

    // SQL sorgusu: Projeler tablosuna yeni proje ekler
    $add_project = "INSERT INTO projeler (proje_adi, proje_aciklamasi, github_link) VALUES ('$project_name', '$project_desc', '$project_link')";

    $eklendi = mysqli_query($baglanti, $add_project); // Sorguyu çalıştırır

    if($eklendi)
    {
        echo '<div class="message-container"><div class="success-message">Proje eklendi!</div></div>'; // Başarılı mesajı
    }
    else
    {
        echo '<div class="message-container"><div class="error-message">Proje eklenirken hata oluştu!</div></div>'; // Hata mesajı
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sayfası</title>
    <link rel="stylesheet" href="profile.css"> <!-- Profil sayfası için CSS dosyasını bağlar -->
</head>
<body>
    <header class="header">
        <!-- Logo bağlantısı -->
        <a href="#" class="logo">Cemre.</a>
        <!-- Navigasyon bar -->
        <nav class="navbar">
            <!-- Navigasyon linkleri -->
            <a href="index.php">Anasayfa</a>
            <a href="about.php">Hakkımda</a>
            <a href="portfolio.php" >Portfolyo</a>
            <a href="contact.php">İletişim</a>
            <?php if (isset($_SESSION['kullanici_adi'])): ?> <!-- Kullanıcı oturum açmışsa -->
                <a href="logout.php" class="logout-btn">Çıkış</a>
            <?php else: ?> <!-- Oturum açmamışsa -->
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>
    <?php if (isset($_SESSION["kullanici_adi"])): ?> <!-- Kullanıcı oturum açmışsa -->
        <h1 class="welcome-message">Hoş Geldin <?php echo $_SESSION["kullanici_adi"]; ?>.</h1>
    <?php else: ?> <!-- Oturum açmamışsa -->
        <h1 class="welcome-message">Bu sayfayı görüntüleme yetkiniz yoktur.</h1>
    <?php endif; ?>
    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/> <!-- İletişim görseli -->
        </div>
        <form action="profile.php" method="POST">
            <h3>Proje Ekle</h3>
            <div class="row">
                <div class="column">
                    <div class="form-group">
                        <input type="text" name="projectName" class="form-control" placeholder="Proje Adı" required /> <!-- Proje adı giriş alanı -->
                    </div>
                    <div class="form-group">
                        <input type="url" name="githubLink" class="form-control" placeholder="Proje Linki" required /> <!-- GitHub proje linki giriş alanı -->
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Ekle" /> <!-- Proje ekleme butonu -->
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <textarea name="projectDescription" class="form-control" placeholder="Proje Açıklaması" required></textarea> <!-- Proje açıklaması giriş alanı -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
