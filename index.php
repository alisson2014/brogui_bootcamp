<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Tipografia Fonte Roboto 500-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brogui</title>
    <!-- CSS + Favicon -->
    <link rel="shortcut icon" href="imagens/icone.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/stylepages.css" />
</head>

<body>
    <header>
        <a href="index.php" title="Home - Brogui">
            <img src="images/logo.png" alt="Brogui">
        </a>
        <nav id="nav">
            <button aria-label="Abrir menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span id="hamburguer"></span>
            </button>
            <ul id="menu" role="menu">
                <li>
                    <a href="index.php?pagina=home" class="anim-link">Home</a>
                </li>
                <li>
                    <a href="index.php?pagina=noticias" class="anim-link">Notícias</a>
                </li>
                <li>
                    <a href="index.php?pagina=categorias" class="anim-link">Categorias</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="grid">
            <div class="coluna">
                <?php
                $pagina = $_GET["pagina"] ?? "home";
                $pagina = "pages/{$pagina}.php";

                if (file_exists($pagina)) {
                    include $pagina;
                } else {
                    include "pages/erro.php";
                }
                ?>
            </div>
            <div class="coluna" id="aside">
                <aside>
                    <h2>Últimas Notícias:</h2>

                    <ul>
                        <?php
                        $sql = "SELECT * FROM noticia ORDER BY data DESC LIMIT 3";
                        $newsList = $conn->query($sql)->fetchAll();
                        foreach ($newsList as $news) {
                            $titulo = $news["titulo"];
                            $id = $news["id"];

                            $titulo = strtoupper($titulo);

                            echo "
                                    <li>
                                        <a href='index.php?pagina=noticia&id={$id}'>{$titulo}<a>
                                    </li>
                                ";
                        }
                        ?>
                    </ul>
                </aside>
            </div>
        </div>
    </main>

    <footer>
        <img src="images/logo.png" alt="Brogui">
        <p>Desenvolvido por Alisson</p>
    </footer>
    <script src="javascript/menu.js"></script>
</body>

</html>