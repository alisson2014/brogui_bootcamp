<?php
session_start();
require_once "../config.php";

$login = trim($_POST["login"] ?? NULL);
$password = trim($_POST["password"] ?? NULL);

if (empty($login)) {
  mensagem("Preencha o campo login!");
} else if (empty($password)) {
  mensagem("Preencha o campo senha!");
}

$sql = "SELECT * FROM usuario WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $id, \PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch();

$id = $data["id"] ?? NULL;
var_dump($data);

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
