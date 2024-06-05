<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemre Gözde Uyar | Portfolio</title>
    <link rel="stylesheet" href="index.css">
    <!-- Boxicons kütüphanesini bağlar -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <!-- Logo bağlantısı -->
        <a href="#" class="logo">Cemre.</a>
        <!-- Navigasyon bar -->
        <nav class="navbar">
            <!-- Navigasyon linkleri -->
            <a href="index.php" class="active">Anasayfa</a>
            <a href="about.php">Hakkımda</a>
            <a href="portfolio.php">Portfolyo</a>
            <a href="contact.php">İletişim</a>
            <?php if (isset($_SESSION['kullanici_adi'])): ?>
                <a href="profile.php">Profil</a>
            <?php else: ?>
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="home">
        <!-- Sosyal Medya İkonları -->
        <div class="home-sci">
            <a href="https://www.instagram.com/cemreuyar0?igsh=cjF0Y3ZjOXA3bmNs&utm_source=qr"><i class='bx bxl-instagram'></i></a>
            <a href="https://www.linkedin.com/in/cemre-g%C3%B6zde-uyar-4b4385200/" target="_blank"><i class='bx bxl-linkedin'></i></a>
            <a href="https://github.com/cgozde"><i class='bx bxl-github' ></i></a>
        </div>

        <!--İsim ve Açıklama-->
        <div class="home-content">
            <h1>Hoş geldiniz.</h1>
            <h3>Ben, Cemre Gözde Uyar.</h3>
            <p>Doğuş Üniversitesi'nde Yazılım Mühendisliği okuyan bir öğrenciyim. Python, Java ve C gibi dillerde çeşitli projelerle kendimi geliştirdim. Portföyümde web geliştirme projeleri, mobil uygulamalar ve açık kaynak katkılarımı bulabilirsiniz. Projelerimi keşfedin ve işbirliği veya daha fazla bilgi için benimle iletişime geçin.</p>
            <!-- İletişim butonu -->
            <a href="contact.php" class="btn">İletişime Geç</a>
            <!-- Daha fazlası butonu -->
            <a href="about.php" class="btn2">Daha Fazlası</a>
        </div>
        <!--Fotoğraf-->
        <div class="home-img">
            <div class="glowing-circle">
                <span></span>
                <span></span>
                <div class="image">
                    <img src="images/girl-smile-NOBG.png" alt="">
                </div>
            </div>
        </div>
    </section>
</body>
</html>