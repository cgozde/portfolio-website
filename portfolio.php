<?php
session_start();
include("connection.php");

$query = "SELECT * FROM projeler";
$result = mysqli_query($baglanti, $query);

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemre Gözde Uyar | Portfolio</title>
    <link rel="stylesheet" href="portfolio.css">
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
            <a href="portfolio.php" class="active">Portfolyo</a>
            <a href="contact.php">İletişim</a>
            <?php if (isset($_SESSION['kullanici_adi'])): ?>
                <a href="profile.php">Profil</a>
            <?php else: ?>
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
    <?php while ($proje = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <h2><?php echo htmlspecialchars($proje['proje_adi']); ?></h2>
                <p><?php echo htmlspecialchars($proje['proje_aciklamasi']); ?></p>
                <div class="card-buttons">
                    <a href="<?php echo htmlspecialchars($proje['github_link']); ?>" target="_blank">
                        <button>Kaynak Koda Git</button>
                    </a>
                    <?php if (isset($_SESSION['kullanici_adi'])): ?>
                        <form action="delete_project.php" method="POST" onsubmit="return confirm('Bu projeyi silmek istediğinizden emin misiniz?');">
                            <input type="hidden" name="id" value="<?php echo $proje['id']; ?>">
                            <button type="submit" style="background: none; border: none;">
                                <img src="images/icons8-bin-16.png" alt="Delete" width="16" height="16">
                            </button>
                        </form>
                    <?php endif; ?>
                  
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
