<?php
//recuperar o id
$id = $_GET["id"] ?? NULL;

//verificar se o id esta em branco
if (empty($id)) {
  mensagem("Registro inválido");
} else {
  //transformar o ID para inteiro
  $id = (int)$id;
  //sql para excluir 
  $sql = "DELETE FROM noticia WHERE id = {$id} LIMIT 1";
  $consulta = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($consulta);

  //executar o SQL
  if (mysqli_query($con, $sql)) {
    mensagem("Registro excluido");
  } else {
    mensagem("Erro ao excluir registro");
  }
}
