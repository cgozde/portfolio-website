<?php
session_start();
include("connection.php");

if (isset($_POST['id'])) {
    $proje_id = $_POST['id'];

    if (is_numeric($proje_id)) {
        $stmt = $baglanti->prepare("DELETE FROM projeler WHERE id = ?");
        $stmt->bind_param("i", $proje_id);

        if ($stmt->execute()) {
            // Silme işlemi başarılı
            echo '<div class="message-container"><div class="success-message">Proje başarıyla silindi!</div></div>';
        } else {
            // Silme işlemi başarısız
            echo '<div class="message-container"><div class="error-message">Proje silinirken hata oluştu!</div></div>' . $stmt->error;
        }

        $stmt->close();
    } else {
        // Geçerli bir proje kimliği belirtilmedi
        echo '<div class="message-container"><div class="error-message">Geçerli bir proje kimliği belirtilmedi.</div></div>';
    }
} else {
    // POST isteğinde proje kimliği yoksa hata mesajı göster
    echo '<div class="message-container"><div class="error-message">Proje kimliği belirtilmedi.</div></div>';
}
?>
