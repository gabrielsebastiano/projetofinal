<!DOCTYPE html>
<?php
require_once '../autentica.php';
?>
<html>
    <head>
        <title>Redireciona</title>
    </head>
    <body>
        <?php
        session_start();
        if ($_SESSION['adm'] = NULL) {
            echo '<script language="javascript">
            window.location.href = "../../index.php"
        </script>';
        } else {
            echo '<script language = "javascript">
        window.location.href = "/pages/index.php"
        </script>  ';
        }
        ?>
        Go to <a href="pages/index.php">/pages/index.php</a>
    </body>
</html>
