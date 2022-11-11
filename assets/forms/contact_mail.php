<?php
    $toEmail = "sam.tab.paz@gmail.com";
    $mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
    if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
        print "<p class='success'>Mensaje enviado.</p>";
    } else {
        print "<p class='Error'>Hubo un error al enviar el mensaje.</p>";
    }
?>