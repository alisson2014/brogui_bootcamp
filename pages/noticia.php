<?php
$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    echo "<p>Notícia inválida</p>";
} else {
    $sql = "SELECT *, date_format(data, '%d/%m/%Y') data 
            FROM noticia WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $dataNews = $stmt->fetch();

    $id = $dataNews["id"];
    $titulo = $dataNews["titulo"];
    $data = $dataNews["data"];
    $texto = $dataNews["texto"];

    echo "<h1 style='
        font-size: 2rem;
        font-weight: bold;
        '>{$titulo}</h1>";

    echo "<p style='
    margin-bottom: 1rem;
    font-size: 1.2rem;
    font-weight: 100;
    font-style: italic;
    '>Data da Postagem: {$data}</p>";
    echo nl2br($texto);
}
