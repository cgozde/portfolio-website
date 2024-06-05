<?php

include ("connection.php");

session_start();

if (isset($_POST["btnSubmit"])) 
{
        $project_name = $_POST["projectName"];
        $project_desc = $_POST["projectDescription"];
        $project_link = $_POST["githubLink"];


        $add_project = "INSERT INTO projeler (proje_adi, proje_aciklamasi, github_link) VALUES ('$project_name', '$project_desc', '$project_link')";

        $eklendi = mysqli_query($baglanti, $add_project);

        if($eklendi)
        {
            echo '<div class="message-container"><div class="success-message">Proje eklendi!</div></div>';
        }
        else{
            echo '<div class="message-container"><div class="error-message">Proje eklenirken hata oluştu!</div></div>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sayfası</title>
    <link rel="stylesheet" href="profile.css">
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
            <?php if (isset($_SESSION['kullanici_adi'])): ?>
                <a href="logout.php" class="logout-btn">Çıkış</a>
            <?php else: ?>
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>
    <?php if (isset($_SESSION["kullanici_adi"])): ?>
        <h1 class="welcome-message">Hoş Geldin <?php echo $_SESSION["kullanici_adi"]; ?>.</h1>
    <?php else: ?>
        <h1 class="welcome-message">Bu sayfayı görüntüleme yetkiniz yoktur.</h1>
    <?php endif; ?>
    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
        </div>
        <form action="profile.php" method="POST">
            <h3>Proje Ekle</h3>
            <div class="row">
                <div class="column">
                    <div class="form-group">
                        <input type="text" name="projectName" class="form-control" placeholder="Proje Adı" required />
                    </div>
                    <div class="form-group">
                        <input type="url" name="githubLink" class="form-control" placeholder="Proje Linki" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Ekle" />
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <textarea name="projectDescription" class="form-control" placeholder="Proje Açıklaması" required></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

