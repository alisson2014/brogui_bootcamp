<?php
//recuperar o id
$id = $_GET["id"] ?? NULL;

//verificar se o id esta em branco
if (empty($id)) {
  mensagem("Registro inválido");
} else {
  //transformar o ID para inteiro
  $id = (int)$id;
  //verificar se existe uma noticia cadastrada com essa categoria
  $sql = "SELECT id FROM noticia WHERE categoria_id = {$id} LIMMIT 1";
  //sql para excluir 
  $sql = "DELETE FROM categoria WHERE id = {$id} LIMIT 1";
  $consulta = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($consulta);

  if (!empty($dados["id"])) {
    mensagem("Você não pode excluir este registro, pois existe uma notícia cadastrada com ele.");
  }
  //executar o SQL
  if (mysqli_query($con, $sql)) {
    mensagem("Registro excluido");
  } else {
    mensagem("Erro ao excluir registro");
  }
}
