<link rel="stylesheet" href="css/stylepages.css">
<h1>Todas as Notícias</h1>
<?php
$sql = "SELECT id, titulo, date_format(data, '%d/%m/%Y') data
        FROM noticia ORDER BY DATA DESC";
$news = $conn->query($sql)->fetchAll();

foreach ($news as $new) {
    $id = $new["id"];
    $titulo = $new["titulo"];
    $data = $new["data"];

    echo "
            <div class='noticia'>
                <div>
                    <h2>{$titulo}</h2>
                    <p>Postado em: {$data}</p>
                </div>
                <a href='index.php?pagina=noticia&id={$id}'>Ler Notícia</a>
            </div>
            <hr>
    ";
}
?>