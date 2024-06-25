<?php
require 'PHPMailer/src/PHPMailer.php'; // PHPMailer sınıf dosyasını dahil eder
require 'PHPMailer/src/Exception.php'; // PHPMailer istisna sınıfını dahil eder
require 'PHPMailer/src/SMTP.php'; // PHPMailer SMTP sınıfını dahil eder

use PHPMailer\PHPMailer\PHPMailer; // PHPMailer kullanımını başlatır
use PHPMailer\PHPMailer\Exception; // PHPMailer istisna kullanımını başlatır

session_start(); // Oturumu başlatır

if (isset($_POST["gonder"])) {
    // Form alanlarının değerlerini alalım
    $isim = $_POST["isim"];
    $email = $_POST["email"];
    $is = $_POST["is"];
    $telefon = $_POST["telefon"];
    $mesaj = $_POST["mesaj"];

    // Form doğrulama: Boş alanları kontrol edelim
    if (empty($isim) || empty($email) || empty($mesaj)) {
        echo '<div class="message-container"><div class="error-message">Lütfen tüm zorunlu alanları doldurun.</div></div>';
        exit; // Hata durumunda işlemi sonlandıralım
    }

    // E-posta gönderme işlemleri
    $kime = "cemreuyar0@gmail.com"; // E-postanın gönderileceği adres
    $konu = "Portfolyo'dan Mesaj Var!"; // E-posta konusu
    $mesajIcerik = "
    <html>
      <head>
        <title>Portfolyo'dan Mesaj Var!</title>
      </head>
      <body>
        <p>$isim aşağıdaki bilgiler ile size mesaj gönderdi.</p>
        <p><b>İsim: </b>$isim</p>
        <p><b>İş: </b>$is</p>
        <p><b>Email: </b>$email</p>
        <p><b>Telefon: </b>$telefon</p>
        <p><b>Mesaj: </b>$mesaj</p>
      </body>
    </html>";

    $mail = new PHPMailer(true); // PHPMailer nesnesini oluşturur

    try {
        // Server ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP sunucu adresi (örneğin Gmail için)
        $mail->SMTPAuth = true;
        $mail->Username = 'birmail@gmail.com'; // Gmail SMTP kullanıcı adı
        $mail->Password = 'birsifre'; // Gmail SMTP parola
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Güvenli bağlantı türü
        $mail->Port = 587; // SMTP bağlantı noktası

        // Alıcılar
        $mail->setFrom('cemreuyar0@gmail.com', 'Cemre Gözde Uyar'); // Gönderen bilgisi
        $mail->addAddress($kime); // Alıcı e-posta adresi

        // E-posta içeriği
        $mail->isHTML(true); // HTML biçiminde e-posta
        $mail->Subject = $konu; // E-posta konusu
        $mail->Body = $mesajIcerik; // E-posta içeriği

        // E-posta gönderme işlemi
        $mail->send(); // E-postayı gönderir
        echo '<div class="message-container"><div class="success-message">Başarıyla gönderildi. ' . $isim . ', sizinle iletişime geçeceğim.</div></div>';
    } catch (Exception $e) {
        // E-posta gönderme sırasında hata oluşursa
        echo '<div class="message-container"><div class="error-message">Mesaj gönderilemedi. Hata: ', $mail->ErrorInfo, '</div></div>';
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemre Gözde Uyar | Portfolio</title>
    <link rel="stylesheet" href="contact.css"> <!-- İletişim sayfası için CSS dosyasını bağlar -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- Boxicons ikonlarını bağlar -->
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Cemre.</a> <!-- Logo bağlantısı -->
        <nav class="navbar">
            <a href="index.php" >Anasayfa</a>
            <a href="about.php">Hakkımda</a>
            <a href="portfolio.php">Portfolyo</a>
            <a href="contact.php" class="active">İletişim</a> <!-- Aktif sayfa işareti -->
            <?php if (isset($_SESSION['kullanici_adi'])): ?>
                <a href="profile.php">Profil</a>
            <?php else: ?>
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
        <div class="form-container">
          <div class="left-container">
            <div class="left-inner-container">
                <h2>Hadi Sohbet Edelim!</h2>
                <p>Bir sorunuz mu var, bir proje başlatmak mı istiyorsunuz ya da sadece bağlantı kurmak mı istiyorsunuz?</p>
                <br>
                <p>Bana mesaj göndermekten çekinmeyin.</p>
            </div>
          </div>
          <div class="right-container">
            <div class="right-inner-container">
              <form action="contact.php" method="POST">
                <h2 class="lg-view">İletişim</h2>
                <h2 class="sm-view">Hadi Sohbet Edelim!</h2>
                <p>* Zorunlu</p>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <input type="text" placeholder="İsim *" name="isim" required />
                <input type="email" placeholder="Email *" name="email" required />
                <input type="text" placeholder="İş" name="is" />
                <input type="tel" placeholder="Telefon" name="telefon" />
                <textarea rows="4" placeholder="Mesaj" name="mesaj" required></textarea>
                <button type="submit" name="gonder">Gönder</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</body>
</html>

