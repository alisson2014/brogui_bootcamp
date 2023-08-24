<?php

$id = trim($_POST["id"] ?? NULL);
$titulo = trim($_POST["titulo"] ?? NULL);
$texto = trim($_POST["texto"] ?? NULL);
$data = trim($_POST["data"] ?? NULL);
$categoria_id = trim($_POST["categoria_id"] ?? NULL);

if (empty($titulo)) {
  mensagem("Preencha o título");
} else if (empty($texto)) {
  mensagem("Preencha o texto da notícia");
} else if (empty($data)) {
  mensagem("Preencha a data da publicação");
} else if (empty($categoria_id)) {
  mensagem("Selecione uma categoria");
}

$sql = "UPDATE noticia SET titulo = :titulo, texto = :texto, data = :data, categoria_id = :categoria_id WHERE id = :id LIMIT 1";

if (empty($id)) {
  $sql = "INSERT INTO noticia VALUES (NULL, :titulo, :texto, :data, :categoria_id)";
}

$conn->beginTransaction();
$stmt = $conn->prepare($sql);
$stmt->bindValue(":titulo", $titulo);
$stmt->bindValue(":texto", $texto);
$stmt->bindValue(":data", $data);
$stmt->bindValue(":categoria_id", $categoria_id);
if ($id) {
  $stmt->bindValue(":id", $id, PDO::PARAM_INT);
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
