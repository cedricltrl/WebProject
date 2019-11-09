<?php
session_unset();
session_destroy();
echo"<script type=\"text/javascript\">
            alert(\"The session has been unsetted\")
            window.location='main.php';
            </script>";
?>