<?php

$id = $_GET["id"] ?? NULL;

if (empty($id)) mensagem("Registro inválido");

$id = (int)$id;
$sql = "DELETE FROM categoria WHERE id = ?";
$conn->beginTransaction();
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$result = 0;

try {
  $stmt->execute();

  $result = $stmt->rowCount();
  $conn->commit();
} catch (PDOException $e) {
  $erro = $e->getMessage();
  $conn->rollBack();
}

if ($result > 0) {
  mensagem("Registro excluido");
} else {
  mensagem("Erro ao excluir registro.\n Erro: {$erro}");
}
