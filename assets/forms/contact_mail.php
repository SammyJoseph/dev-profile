<?php
    $toEmail = "sam.tab.paz@gmail.com";
    $mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
    if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
        // print "<p class='success'>Mensaje enviado.</p>";
        ?>
        <script>
            $('#success-message').show();
            $('#userName, #userEmail, #subject, #message').prop('disabled', true);
            $('#btn-send-message').hide();
        </script>
        <?php
    } else {
        ?>
        <script>
            $('#error-message').show();
        </script>
        <?php
    }
?>