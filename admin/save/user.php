<?php

$id = filter_input(INPUT_POST, "id", FILTER_CALLBACK, $trim);
$nome = filter_input(INPUT_POST, "nome", FILTER_CALLBACK, $trim);
$email = filter_input(INPUT_POST, "email", FILTER_CALLBACK, $emailValidate);
$login = filter_input(INPUT_POST, "login", FILTER_CALLBACK, $trim);
$senha = filter_input(INPUT_POST, "senha", FILTER_CALLBACK, $trim);
$senha2 = filter_input(INPUT_POST, "senha2", FILTER_CALLBACK, $trim);

var_dump($email);
exit;

if (empty($nome)) {
  mensagem("Preencha o nome");
} else if (empty($login)) {
  mensagem("Preencha o login");
} else if (empty($email)) {
  mensagem("Preencha um email valido");
} else if ($senha !== $senha2) {
  mensagem("A senha digitada não é igual a senha redigitada");
}

$sql = "UPDATE usuario 
        SET nome = :nome, login = :login, email = :email, senha = :senha 
        WHERE id = :id";

if (empty($id)) {
  if (empty($senha)) mensagem("Digite uma senha");

  $sql = "INSERT INTO usuario VALUES (:id, :nome, :email, :login, :senha)";
} else if (empty($senha)) {
  $sql = "UPDATE usuario SET nome = :nome, login = :login, email = :email WHERE id = :id";
}

if (isset($senha)) $senha = password_hash($senha, PASSWORD_DEFAULT);

$conn->beginTransaction();
$stmt = $conn->prepare($sql);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":login", $login);
$stmt->bindValue(":id", $id ?? null);
$stmt->bindValue(":senha", $senha ?? null);

$result = 0;

try {
  $stmt->execute();

  $result = $stmt->rowCount();
  $conn->commit();
} catch (PDOException $e) {
  $error = $e->getMessage();
  $conn->rollBack();
}

if ($result > 0) {
  mensagem("O registro foi salvo com sucesso!");
} else {
  mensagem("Erro ao salvar o registro.\n Erro: {$error}");
}
