<?php
include ("connection.php"); // Bağlantı dosyasını dahil eder

// Kullanıcı zaten oturum açmışsa profil sayfasına yönlendirir
if (isset($_SESSION['kullanici_adi'])) {
    header("Location: profile.php");
    exit();
}

// Kayıt formu gönderildiğinde işlemleri gerçekleştirir
if(isset($_POST["kaydet"]))
{
    // POST verilerini alır
	$name=$_POST["kullaniciadi"];
	$email=$_POST["email"];
	$password=$_POST["parola"];

    // Veritabanına kullanıcı bilgilerini ekler
	$ekle="INSERT INTO kullanicilar (kullanici_adi, email, parola) VALUES ('$name','$email','$password')";

	$calistirekle = mysqli_query($baglanti, $ekle); // SQL komutunu çalıştırır

    // Ekleme başarılı ise başarılı mesajını gösterir, değilse hata mesajını gösterir
	if($calistirekle)
	{
		echo '<div class="message-container"><div class="success-message">Kullanıcı kaydı başarıyla oluşturuldu!</div></div>';
	}
	else {
		echo '<div class="message-container"><div class="error-message">Kullanıcı kaydı başarısız!</div></div>';
	}

	mysqli_close($baglanti); // Veritabanı bağlantısını kapatır
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cemre Gözde Uyar | Portfolio</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Cemre.</a>

        <nav class="navbar">
            <a href="index.php">Anasayfa</a>
            <a href="about.php">Hakkımda</a>
            <a href="portfolio.php">Portfolyo</a>
            <a href="contact.php">İletişim</a>
			<?php if (isset($_SESSION['kullanici_adi'])): ?> <!-- Oturum açmışsa profil bağlantısı, değilse giriş bağlantısı -->
                <a href="profile.php">Profil</a>
            <?php else: ?>
                <a href="login.php">Giriş</a>
            <?php endif; ?>
        </nav>
    </header>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="login.php" method="POST">
					<label for="chk" aria-hidden="true">Kayıt ol</label>
					<input type="text" name="kullaniciadi" placeholder="Kullanıcı adı" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="parola" placeholder="Şifre" required="">
					<button type="submit" name="kaydet">Kayıt ol</button>
				</form>
			</div>

			<div class="login">
				<form action="giris.php" method="POST">
					<label for="chk" aria-hidden="true">Giriş yap</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="parola" placeholder="Şifre" required="">
					<button type="submit" name="giris">Giriş yap</button>
				</form>
			</div>
	</div>
</body>
</html>