<?php

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

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
    $kime = "cemreuyar0@gmail.com";
    $konu = "Portfolyo'dan Mesaj Var!";
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

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cemreuyar0@gmail.com'; // Gmail SMTP kullanıcı adı
        $mail->Password = 'ywlg hdwn xtve ijms'; // Gmail SMTP parola
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('cemreuyar0@gmail.com', 'Cemre Gözde Uyar');
        $mail->addAddress($kime);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $konu;
        $mail->Body    = $mesajIcerik;

        // E-posta gönderme işlemi
        $mail->send();
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
    <link rel="stylesheet" href="contact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <header class="header">
            <a href="#" class="logo">Cemre.</a>
    
            <nav class="navbar">
                <a href="index.php" >Anasayfa</a>
                <a href="about.php">Hakkımda</a>
                <a href="portfolio.php">Portfolyo</a>
                <a href="contact.php" class="active">İletişim</a>
                <?php if (isset($_SESSION['kullanici_adi'])): ?>
                  <a href="profile.php">Profil</a>
                <?php else: ?>
                  <a href="login.php">Giriş</a>
                <?php endif; ?>
            </nav>
        </header>
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
                <input type="text" placeholder="İsim *" name="isim"  />
            <input type="email" placeholder="Email *" name="email"/>
                  <input type="text" placeholder="İş" name="is"/>
                  <input type="phone" placeholder="Telefon" name="telefon"/>
                <textarea rows="4" placeholder="Mesaj" name="mesaj"></textarea>
                  <button type="submit" name="gonder">Gönder</button>
              </form>
            </div>
          </div>
        </div>
      </div>
</body>
</html>