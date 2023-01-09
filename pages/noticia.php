<?php
//recuperar o id enviado por get
$id = $_GET["id"] ?? NULL;

//echo $id;
//verificar se o id está em branco
if (empty($id)) {
    echo "<p>Notícia inválida</p>";
} else {
    //sql para consultar a noticia
    $sql = "SELECT *, date_format(data, '%d/%m/%Y') data 
            FROM noticia WHERE id = {$id}";
    //executar o comando sql
    $consulta = mysqli_query($con, $sql);
    //separar os dados para mostrar na tela
    $dados = mysqli_fetch_array($consulta);

    //separar os dados
    $id = $dados["id"];
    $titulo = $dados["titulo"];
    $data = $dados["data"];
    $texto = $dados["texto"];

    echo "<h1 style='
        font-size: 2rem;
        font-weight: bold;
        '>{$titulo}</h1>";

    echo "<p style='
    margin-bottom: 1rem;
    font-size: 1.2rem;
    font-weight: 30;
    font-style: italic;
    '>Data da Postagem: {$data}</p>";
    echo nl2br($texto);
}
