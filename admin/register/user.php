<h1 style="text-align: center;">Cadastro de Usuários</h1>
<p style="text-align: center;">
  <a href="index.php?acao=register&tabela=user" class="btn">
    Novo cadastro
  </a>
  <a href="index.php?acao=list&tabela=user" class="btn">
    Listar cadastros
  </a>
</p>
<hr>
<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!empty($id)) {
  $sqlUser = "SELECT * FROM usuario WHERE id = ?";
  $stmt = $conn->prepare($sqlUser);
  $stmt->bindValue(1, $id, PDO::PARAM_INT);
  $stmt->execute();
  $dados = $stmt->fetch();
}

$id = $dados["id"] ?? null;
$nome  = $dados["nome"] ?? null;
$login = $dados["login"] ?? null;
$email = $dados["email"] ?? null;

?>
<form name="formCadastro" method="post" action="index.php?acao=save&tabela=user">
  <label for="id">ID:</label>
  <input type="number" name="id" id="id" class="campo" value="<?= $id ?>" readonly />
  <label for="nome">Nome:</label>
  <input type="text" name="nome" id="nome" class="campo" value="<?= $nome ?>" />
  <label for="email">Email</label>
  <input type="email" name="email" id="email" class="campo" value="<?= $email ?>" required />
  <label for="login">Login</label>
  <input type="text" name="login" id="login" class="campo" value="<?= $login ?>" required />

  <label for="senha">Digite sua senha: </label>
  <input type="password" name="senha" id="senha" class="campo" />

  <label for="senha2">Redigite a senha:</label>
  <input type="password" name="senha2" id="senha2" class="campo" />

  <br>
  <button type="submit">Gravar dados: </button>
</form>