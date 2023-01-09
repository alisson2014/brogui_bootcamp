<?php
//iniciar a sessão
session_start();
//incluir o arquivo do banco de dados
include "../config.php";

//recuperar os dados digitados no formulário
$login = trim($_POST["login"] ?? NULL);
$password = trim($_POST["password"] ?? NULL);
//trim retira os espaços em branco

//verificar se os campos estão preechidos
if (empty($login)) {
  mensagem("Preencha o campo login!");
} else if (empty($password)) {
  mensagem("Preencha o campo senha!");
}

//sql para selecionar o usuario e ver se ele existe
$sql = "select * from usuario where login = '{$login}'";

$consulta = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($consulta);

//verificar se o usuário existe
$id = $dados["id"] ?? NULL;

if (empty($id)) {
  mensagem("Usuário ou senha inválidos");
} else if (!password_verify($password, $dados["senha"])) {
  mensagem("Usuário ou senha inválidos");
}

//registrar o usuário e direcionar para a tela de menu
$_SESSION["brogui"] = array("id" => $id, "login" => $dados["login"]);

//direcionar para a tela de menu
echo "<script>location.href='index.php'</script>";
