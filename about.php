<?php
// Oturum başlatılıyor
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemre Gözde Uyar | Portfolio</title>
    <!-- Harici CSS dosyasını ekleme -->
    <link rel="stylesheet" href="about.css">
</head>
<body>
    <header>
        <!-- Ana başlık bölümü -->
        <header class="header">
            <!-- Logo ve profil sayfasına yönlendirme -->
            <a href="profile.php" class="logo">Cemre.</a>
            <!-- Navigasyon bar -->
            <nav class="navbar">
              <!-- Navigasyon linkleri -->
              <a href="index.php" >Anasayfa</a>
              <a href="about.php"class="active">Hakkımda</a>
              <a href="portfolio.php">Portfolyo</a>
              <a href="contact.php">İletişim</a>
              <!-- Kullanıcı giriş yapmışsa profil linki, giriş yapmamışsa giriş linki gösteriliyor -->
              <?php if (isset($_SESSION['kullanici_adi'])): ?>
                <a href="profile.php">Profil</a>
            <?php else: ?>
                <a href="login.php">Giriş</a>
            <?php endif; ?>
            </nav>
        </header>
    </header>
    <!-- Ana görsel bölümü -->
    <div class="ultimateImg">
        <!-- Hakkımda sayfasındaki ana görsel -->
        <img class="mainImg" src="images/foto1.jpg">
      </div>
      <!-- Metin ve açıklama bölümü -->
      <div class="allText bottomText">
        <!-- Hakkımda başlık metni -->
        <p class="text-blk headingText">
          Hakkımda
        </p>
        <!-- Eğitim bilgileri -->
        <p class="text-blk subHeadingText">
          Doğuş Üniversitesi Yazılım Mühendisliği bölümünde 4.sınıf olarak eğitimime devam etmekteyim.
        </p>
        <!-- Yetenekler başlığı -->
        <p class="text-blk description">
          Yetenekler
        </p>
        <!-- Yetenek simgeleri bölümü -->
        <div class="skills">
            <div class="icons8-html-5"></div>
            <div class="icons8-css3"></div>
            <div class="icons8-java"></div>
            <div class="icons8-c-programming"></div>
            <div class="icons8-python"></div>
            <div class="icons8-kotlin"></div>
            <div class="icons8-git"></div>
        </div>
        <!-- Projeleri Gör butonu -->
        <a href="portfolio.php" class="explore">
          Projeleri Gör
        </a>
      </div>
    </div>
  </div>
</body>
</html>
