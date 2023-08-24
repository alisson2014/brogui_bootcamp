<?php
$id = trim($_POST["id"] ?? NULL);
$nome = trim($_POST["nome"] ?? NULL);
$email = trim($_POST["email"] ?? NULL);
$login = trim($_POST["login"] ?? NULL);
$senha = trim($_POST["senha"] ?? NULL);
$senha2 = trim($_POST["senha2"] ?? NULL);

if (empty($nome)) {
  mensagem("Preencha o nome");
} else if (empty($login)) {
  mensagem("Preencha o login");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  mensagem("Preencha um email valido");
} else if ($senha != $senha2) {
  mensagem("A senha digitada não é igual a senha redigitada");
}

if (empty($id)) {
  if (empty($senha)) {
    mensagem("Digite uma senha");
  }

  $senha = password_hash($senha, PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuario VALUES (NULL, :nome, :email, :login, :senha)";
} else if (empty($senha)) {
  $sql = "UPDATE usuario 
    SET nome = :nome, login = :login, email = :email
    WHERE id = :id LIMIT 1";
} else {
  $senha = password_hash($senha, PASSWORD_DEFAULT);
  $sql = "UPDATE usuario 
      SET nome = :nome, login = :login, email = :email, senha = :senha 
      WHERE id = :id LIMIT 1";
}

$conn->beginTransaction();
$stmt = $conn->prepare($sql);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":login", $login);
$stmt->bindValue(":senha", $senha);

if (empty($id)) {
  $stmt->bindValue(":id", $id, PDO::PARAM_INT);
}

if (empty($senha)) {
  $stmt->bindValue(":senha", $senha, PDO::PARAM_INT);
}

try {
  $stmt->execute();

  $result = $stmt->rowCount();
  $conn->commit();
} catch (PDOException $e) {
  echo $e->getMessage();
  $conn->rollBack();
}

if ($result > 0) {
  mensagem("O registro foi salvo com sucesso!");
} else {
  mensagem("Erro ao salvar o registro");
}
