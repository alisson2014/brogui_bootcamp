<?php
//iniciar a sessão
session_start();
//desintegrar a sessão brogui
unset($_SESSION["brogui"]);
//enviar para a página index
echo "<script>location.href='index.php'</script>";
