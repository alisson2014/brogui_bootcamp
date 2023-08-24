<?php

$id = $_GET["id"] ?? NULL;

if (empty($id)) {
  mensagem("Registro inválido");
} else {
  $id = (int)$id;
  $sql = "DELETE FROM categoria WHERE id = ? LIMIT 1";
  $conn->begginTransaction();
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(1, $id, PDO::PARAM_INT);

  try {
    $stmt->execute();

    $result = $stmt->rowCount();
    $conn->commit();
  } catch (PDOException $e) {
    echo $e;
    $conn->rollBack();
  }

  if ($result > 0) {
    mensagem("Registro excluido");
  } else {
    mensagem("Erro ao excluir registro");
  }
}
