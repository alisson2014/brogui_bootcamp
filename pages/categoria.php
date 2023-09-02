<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (empty($id)) {
    echo "<p>Categoria não encontrada</p>";
    exit;
}

$sql = "SELECT id, categoria FROM categoria WHERE id = ?;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch();

if (empty($data["categoria"])) {
    echo "<p>Categoria inexistente</p>";
} else {
    $categorie = $data["categoria"];

    echo "<h1>Notícias da categoria {$categorie}</h1>";
}

$sql = "SELECT *, date_format(data, '%d/%m/%Y') data 
            FROM noticia WHERE categoria_id = ?
            ORDER BY data DESC";

$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$stmt->execute();
$news = $stmt->fetchAll();

foreach ($news as $categorieNews) {
    $id = $categorieNews["id"];
    $titulo = $categorieNews["titulo"];
    $data = $categorieNews["data"];

    echo "<h2>{$titulo}</h2>
        <p>Data da postagem: {$data}</p>
        <a href='index.php?pagina=noticia&id={$id}'>Ler mais</a>
        <hr>";
}
