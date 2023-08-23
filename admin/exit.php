<?php
session_start();
unset($_SESSION["brogui"]);

echo "<script>location.href='index.php'</script>";
