<link rel="stylesheet" href="css/stylepages.css">
<?php
//recuperar o id da categoria
$id = (int)($_GET["id"] ?? NULL);

//verificar se esta em branco
if (empty($id)) {
    echo "<p>Categoria não encontrada</p>";
} else {

    //pegar a categoria
    $sql = "select * from categoria
        where id = {$id}";
    //executar a consulta
    $consulta = mysqli_query($con, $sql);
    //separar os resultados
    $dados = mysqli_fetch_array($consulta);

    if (empty($dados["categoria"])) {
        echo "<p>Categoria inexistente</p>";
    } else {
        $categoria = $dados["categoria"];

        echo "<h1>Notícias da categoria {$categoria}</h1>";
    }

    $sql = "SELECT *, date_format(data, '%d/%m/%Y') data FROM noticia WHERE categoria_id = {$id} ORDER BY data DESC";

    $consulta = mysqli_query($con, $sql);

    while ($dados = mysqli_fetch_array($consulta)) {
        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $data = $dados["data"];

        echo "
            <h2>{$titulo}</h2>
            <p>Data da postagem: {$data}</p>
            <a href='index.php?pagina=noticia&id={$id}'>Ler mais</a>
            <hr>
            ";
    }
}
