<?php
session_start(); // Oturumu başlatır veya mevcut oturumu devam ettirir.
include("connection.php"); // Veritabanı bağlantı dosyasını dahil eder.

$query = "SELECT * FROM projeler"; // Tüm projeleri seçmek için SQL sorgusu
$result = mysqli_query($baglanti, $query); // SQL sorgusunu çalıştırır ve sonucu alır
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemre Gözde Uyar | Portfolio</title>
    <link rel="stylesheet" href="portfolio.css"> <!-- Portföy sayfası için CSS dosyasını bağlar -->
</head>
<body>
    <header class="header">
        <!-- Logo bağlantısı -->
        <a href="#" class="logo">Cemre.</a>
        <!-- Navigasyon bar -->
        <nav class="navbar">
            <!-- Navigasyon linkleri -->
            <a href="index.php" >Anasayfa</a>
            <a href="about.php">Hakkımda</a>
            <a href="portfolio.php" class="active">Portfolyo</a> <!-- Aktif sayfa işareti -->
            <a href="contact.php">İletişim</a>
            <?php if (isset($_SESSION['kullanici_adi'])): ?> <!-- Oturum açılmışsa -->
                <a href="profile.php">Profil</a>
            <?php else: ?> <!-- Oturum açılmamışsa -->
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
    <?php while ($proje = mysqli_fetch_assoc($result)): ?> <!-- Tüm projeler için döngü başlatır -->
            <div class="card">
                <h2><?php echo htmlspecialchars($proje['proje_adi']); ?></h2> <!-- Proje adını güvenli bir şekilde yazdırır -->
                <p><?php echo htmlspecialchars($proje['proje_aciklamasi']); ?></p> <!-- Proje açıklamasını güvenli bir şekilde yazdırır -->
                <div class="card-buttons">
                    <a href="<?php echo htmlspecialchars($proje['github_link']); ?>" target="_blank">
                        <button>Kaynak Koda Git</button> <!-- GitHub linkine yönlendiren buton -->
                    </a>
                    <?php if (isset($_SESSION['kullanici_adi']) && $_SESSION['kullanici_adi'] === 'admin'): ?> <!-- Oturum açılmışsa ve kullanıcı admin ise -->
                        <form action="delete_project.php" method="POST" onsubmit="return confirm('Bu projeyi silmek istediğinizden emin misiniz?');">
                            <input type="hidden" name="id" value="<?php echo $proje['id']; ?>"> <!-- Proje ID'sini gizli bir şekilde formda gönderir -->
                            <button type="submit" style="background: none; border: none;">
                                <img src="images/icons8-bin-16.png" alt="Delete" width="16" height="16"> <!-- Projeyi sil butonu -->
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?> <!-- Tüm projeler için döngü sonlandırır -->
    </div>
</body>
</html>

