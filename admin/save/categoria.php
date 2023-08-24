<?php

$id = trim($_POST["id"] ?? NULL);
$categoria = trim($_POST["categoria"] ?? NULL);

if (empty($categoria)) {
  mensagem("Preencha a categoria");
}

$sql = "UPDATE categoria SET categoria = :categoria WHERE id = :id";

if (empty($id)) {
  $sql = "INSERT INTO categoria VALUES (NULL, :categoria)";
}

$conn->beginTransaction();
$stmt = $conn->prepare($sql);
$stmt->bindValue(":categoria", $categoria, PDO::PARAM_STR);
if (!empty($id)) $stmt->bindValue(":id", $id, PDO::PARAM_INT);
$result = 0;

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
