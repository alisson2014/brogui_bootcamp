<?php
session_start();
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Tipografia: -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin do sistema</title>
  <!-- Folha de estilo: -->
  <link rel="stylesheet" href="style/container.css">
</head>

<body>
  <div class="container">
    <?php
    if (!isset($_SESSION["brogui"])) :
      require_once "login.php";
    else :
      $login = $_SESSION["brogui"]["login"];
    ?>
      <header>
        <a href="index.php" class="logo">
          Administrador
        </a>

        <nav>
          <ul>
            <li>
              <a href="index.php?acao=register&tabela=categoria" class="anim-link">
                Categoria
              </a>
            </li>
            <li>
              <a href="index.php?acao=register&tabela=noticia" class="anim-link">
                Notícia
              </a>
            </li>
            <li>
              <a href="index.php?acao=register&tabela=user" class="anim-link">
                Usuário
              </a>
            </li>
            <li>
              <a href="exit.php" class="anim-link">Olá <?= $login ?>, Sair.</a>
            </li>
          </ul>
        </nav>
      </header>
      <main>
        <?php
        $acao = $_GET["acao"] ?? "paginas";
        $tabela = $_GET["tabela"] ?? "home";

        $arquivo = "{$acao}/{$tabela}.php";

        if (file_exists($arquivo)) {
          require_once $arquivo;
        } else {
          require_once "pages/error.php";
        }
        ?>
      </main>
      <footer>
        <p style="text-align: center;">Desenvolvido por Alisson</p>
      </footer>
    <?php endif; ?>
  </div>
</body>

</html>