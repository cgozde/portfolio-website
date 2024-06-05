<?php
session_start();
include("connection.php");

if(isset($_POST["giris"]))
{
    $email=$_POST["email"];
    $password=$_POST["parola"];
}

if(!empty($email) && !empty($password))
{
    $secim = "SELECT * FROM kullanicilar WHERE email = '$email'";
    $calistir = mysqli_query($baglanti, $secim);
    $kayitsayisi = mysqli_num_rows($calistir);

    if($kayitsayisi > 0)
    {
        $ilgilikayit = mysqli_fetch_assoc($calistir);
        $stored_password=$ilgilikayit["parola"];

        if ($password == $stored_password)
        {
            $_SESSION["email"] = $ilgilikayit["email"];
            $_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
            $_SESSION["kullanici_id"] = $ilgilikayit["id"];
            header("location:profile.php");
            exit();

        }
        else
        {
            echo '<div class="message-container"><div class="error-message">Şifre hatalı!</div></div>';
        }
    }
    else
    {
        echo '<div class="message-container"><div class="error-message">Emaile sahip kullanıcı yok ya da hatalı girdiniz!</div></div>';
    }
}
?>