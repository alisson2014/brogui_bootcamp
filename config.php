<?php
//criar uma conexao com banco de dados
//endereco do servidor
$servidor = "localhost";
//usuario do banco
$usuario = "root";
//senha do banco
$senha = "";
//banco de dados a ser acessado
$banco = "brogui";

$con = mysqli_connect($servidor, $usuario, $senha, $banco)
    or die("Não foi possível conectar no banco");

//força os dados a se tornarem utf8
mysqli_set_charset($con, "utf8");

//incluir uma função que mostra uma mensagem e retorna para tela anterior
function mensagem($msg)
{
    echo "<script>alert('{$msg}');history.back();</script>";
    exit;
}
