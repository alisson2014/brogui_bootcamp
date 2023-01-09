<?php
//recuperar os dados do formulario
$id = trim($_POST["id"] ?? NULL);
$nome = trim($_POST["nome"] ?? NULL);
$email = trim($_POST["email"] ?? NULL);
$login = trim($_POST["login"] ?? NULL);
$senha = trim($_POST["senha"] ?? NULL);
$senha2 = trim($_POST["senha2"] ?? NULL);


//verificar se os dados esao em brancos ou sao validos
if (empty($nome)) {
  mensagem("Preencha o nome");
} else if (empty($login)) {
  mensagem("Preencha o login");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  mensagem("Preencha um email valido");
} else if ($senha != $senha2) {
  mensagem("A senha digitada não é igual a senha redigitada");
}

//inserir ou atualizar
if (empty($id)) {
  //inserir
  if (empty($senha)) {
    mensagem("Digite uma senha");
  }
  //criptografar a senha
  $senha = password_hash($senha, PASSWORD_DEFAULT);

  //sql para gravar no banco
  $sql = "INSERT INTO usuario VALUES (NULL, '{$nome}', '{$email}', '{$login}', '{$senha}') ";
} else if (empty($senha)) {
  //update menos na senha
  $sql = "UPDATE usuario SET nome = '{$nome}', login = '{$login}', email = '{$email}' WHERE id = {$id} LIMIT 1";
} else {
  //update inclusive na senha
  //Criptografar a senha
  $senha = password_hash($senha, PASSWORD_DEFAULT);
  $sql = "UPDATE usuario SET nome = '{$nome}', login = '{$login}', email = '{$email}' senha = '{$senha}' WHERE id = {$id} LIMIT 1";
}

//exexcutar 
if (mysqli_query($con, $sql)) {
  mensagem("Registro salvo com sucesso");
} else {
  mensagem("Erro ao salvar registro");
}
