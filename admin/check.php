<?php

session_start();
require_once "../config.php";

$login = filter_input(INPUT_POST, "login", FILTER_CALLBACK, $trim);
$password = filter_input(INPUT_POST, "password", FILTER_CALLBACK, $trim);

if (empty($login)) {
  mensagem("Preencha o campo login!");
} else if (empty($password)) {
  mensagem("Preencha o campo senha!");
}

$sql = "SELECT * FROM usuario WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $login);
$stmt->execute();
$data = $stmt->fetch();

$id = $data["id"] ?? NULL;

if (empty($id)) {
  mensagem("Usuário ou senha inválidos");
} else if (!password_verify($password, $data["senha"])) {
  mensagem("Usuário ou senha inválidos");
}

$_SESSION["brogui"] = [
  "id" => $id,
  "login" => $data["login"]
];

echo "<script>location.href='index.php'</script>";
