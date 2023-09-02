<h1>Categorias de Notícias</h1>
<ul>
    <?php
    $sql = "SELECT id, categoria FROM categoria ORDER BY categoria";
    $categories = $conn->query($sql)->fetchAll();

    foreach ($categories as $categorie) {
        $id = $categorie["id"];
        $categoria = $categorie["categoria"];

        echo "<li>
                <a href='index.php?pagina=categoria&id={$id}'>{$categoria}</a>
            </li>";
    }
    ?>
</ul>