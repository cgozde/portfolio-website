<?php
session_start(); // Oturumu başlatır

// Bağlantı dosyasını dahil eder
include("connection.php");

// Form gönderildiğinde
if(isset($_POST["giris"]))
{
    $email=$_POST["email"]; // Formdan gelen e-posta adresini alır
    $password=$_POST["parola"]; // Formdan gelen parolayı alır
}

// Eğer e-posta ve parola boş değilse devam eder
if(!empty($email) && !empty($password))
{
    // Veritabanından kullanıcıyı seçer
    $secim = "SELECT * FROM kullanicilar WHERE email = '$email'";
    $calistir = mysqli_query($baglanti, $secim); // Sorguyu çalıştırır
    $kayitsayisi = mysqli_num_rows($calistir); // Sonuç kümesindeki kayıt sayısını alır

    // Eğer kullanıcı bulunduysa
    if($kayitsayisi > 0)
    {
        // İlgili kaydı alır
        $ilgilikayit = mysqli_fetch_assoc($calistir);
        $stored_password=$ilgilikayit["parola"]; // Veritabanında saklanan parolayı alır

        // Eğer girilen parola veritabanındakiyle eşleşiyorsa
        if ($password == $stored_password)
        {
            // Oturum değişkenlerini ayarlar
            $_SESSION["email"] = $ilgilikayit["email"];
            $_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
            $_SESSION["kullanici_id"] = $ilgilikayit["id"];

            // Kullanıcıyı profiline yönlendirir
            header("location:profile.php");
            exit(); // İşlemi sonlandırır

        }
        else
        {
            // Eğer parola hatalıysa hata mesajı gösterir
            echo '<div class="message-container"><div class="error-message">Şifre hatalı!</div></div>';
        }
    }
    else
    {
        // Eğer e-postaya sahip bir kullanıcı bulunamazsa veya hatalı giriş yapılırsa hata mesajı gösterir
        echo '<div class="message-container"><div class="error-message">Emaile sahip kullanıcı yok ya da hatalı girdiniz!</div></div>';
    }
}
?>
