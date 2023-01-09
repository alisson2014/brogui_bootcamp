<?php
//iniciar a sessão
session_start();
//conectar com o banco de dados
include "../config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin do sistema</title>
  <!-- Folha de estilo: -->
  <link rel="stylesheet" href="style/container.css">
  <!-- Tipografia: -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php
    //Verificar se não está logado
    if (!isset($_SESSION["brogui"])) {
      //tela de login
      include "login.php";
    } else {
      //login do usuário registro
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
              <a href="exit.php" class="anim-link">
                Olá <?= $login ?>, Sair.
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <main>
        <?php
        //recuperar a ação e a tabela
        $acao = $_GET["acao"] ?? "paginas";
        $tabela = $_GET["tabela"] ?? "home";

        //acao = register e tabela = categoria
        //register/categoria.php
        $arquivo = "{$acao}/{$tabela}.php";



        //verificar se o arquivo existe
        if (file_exists($arquivo)) {
          include $arquivo;
        } else {
          include "pages/error.php";
        }
        ?>
      </main>
      <footer>
        <p style="text-align: center;">
          Desenvolvido por Alisson
        </p>
      </footer>
    <?php
    }
    ?>
  </div>
</body>

</html>