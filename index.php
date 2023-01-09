<?php
//Incluir o arquivo do banco de dados
include "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brogui</title>
    <!-- CSS + Favicon -->
    <link rel="shortcut icon" href="imagens/icone.png">
    <link rel="stylesheet" href="css/style.css">
    <!-- JavaScript -->
    <script type="text/javascript" src='javascript/menu-bottom.js'></script>
    <!-- Tipografia: -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="index.php" title="Home - Brogui">
            <img src="images/logo.png" alt="Brogui">
        </a>
        <a href="javascript:;" id="menu" onclick="mostrarMenu()">
            <img src="images/menu.webp" alt="Menu">
        </a>
        <nav class="menu">
            <ul>
                <li>
                    <a href="index.php?pagina=home" class="anim-link">
                        Home
                    </a>
                </li>
                <li>
                    <a href="index.php?pagina=noticias" class="anim-link">
                        Notícias
                    </a>
                </li>
                <li>
                    <a href="index.php?pagina=categorias" class="anim-link">
                        Categorias
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="grid">
            <div class="coluna">
                <?php
                //recuperar a pagina para abrir
                $pagina = $_GET["pagina"] ?? "home";
                // home -> pages/home.php
                $pagina = "pages/{$pagina}.php";

                //verificar se a página existe
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
                        //sql para buscar os dados
                        $sql = "select * from noticia
                        order by data desc limit 3";
                        //executar o SQL
                        $consulta = mysqli_query($con, $sql);
                        //mostrar noticia por noticia
                        while ($dados = mysqli_fetch_array($consulta)) {
                            //recuperar as variaveis
                            $titulo = $dados["titulo"];
                            $id = $dados["id"];

                            //titulo maiusculo
                            $titulo = strtoupper($titulo);

                            echo
                            "
                                    <li>
                                        <a href='index.php?pagina=noticia&id={$id}'>
                                            {$titulo}
                                        <a>
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


</body>

</html>