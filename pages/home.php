<h1>Últimas Notícias</h1>
<?php
$sql = "SELECT id, titulo, date_format(data, '%d/%m/%Y') data
        FROM noticia ORDER BY data DESC LIMIT 5";
$latestNews = $conn->query($sql)->fetchAll();

foreach ($latestNews as $lastNews) {
    $id = $lastNews["id"];
    $titulo = $lastNews["titulo"];
    $data = $lastNews["data"];

    echo "<div class='noticia'>
            <div>
                <h2>{$titulo}</h2>
                <p>Postado em: {$data}</p>
            </div>
            <a href='index.php?pagina=noticia&id={$id}'>Ler Notícia</a>
        </div>
        <hr>";
}
?>