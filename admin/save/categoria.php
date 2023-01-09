<?php

//recuperar os dados digitados
$id = trim($_POST["id"] ?? NULL);
$categoria = trim($_POST["categoria"] ?? NULL);

//print_r($_POST);

//verificar se o campo está preenchido
if (empty($categoria)) {
  mensagem("Preencha a categoria");
}

//se o id está vazio - se estiver vazio INSERT - senao UPDATE
if (empty($id)) {
  $sql = "INSERT INTO categoria VALUES (NULL, '{$categoria}')";
} else {
  //update no banco - pois o id não está vazio
  $sql = "UPDATE categoria SET categoria = '{$categoria}' 
  WHERE id = '{$id}'
  ";
}

//executar um dos SQL para gravar ou atualizar
if (mysqli_query($con, $sql)) {
  mensagem("O registro foi salvo com sucesso!");
} else {
  mensagem("Erro ao salvar o registro");
}
