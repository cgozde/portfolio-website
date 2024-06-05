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
    } else {
        echo '<div class="message-container"><div class="error-message">Oturum açmış bir kullanıcı bulunamadı!</div></div>';
    }

?>
