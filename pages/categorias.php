<h1 style="
margin-bottom: 2rem;
font-size: 2.4rem;
font-weight: bold;
">Categorias de Notícias</h1>
<ul>
    <?php
    //selecionar as categorias
    $sql = "SELECT * FROM categoria ORDER BY
        categoria";
    //executar a consulta
    $consulta = mysqli_query($con, $sql);

    //separar os resultados
    while ($dados = mysqli_fetch_array($consulta)) {
        $id = $dados["id"];
        $categoria = $dados["categoria"];

        echo "
            <li>
                <a href='index.php?pagina=categoria&id={$id}' class='anim-link'>
                    {$categoria}
                </a>
            </li>
            ";
    }
    ?>
</ul>