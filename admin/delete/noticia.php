<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (empty($id)) mensagem("Registro inválido");

$sql = "DELETE FROM noticia WHERE id = ?";

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
