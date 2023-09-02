<h1 style="text-align: center;">Cadastro de categoria</h1>
<p style="text-align: center;">
  <a href="index.php?acao=register&tabela=categoria" class="btn">
    Novo Cadastro
  </a>

  <a href="index.php?acao=list&tabela=categoria" class="btn">
    Listar Cadastros
  </a>
</p>
<hr>
<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$categoria = null;

if (!empty($id)) {
  $sql = "SELECT * FROM categoria WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(1, $id, PDO::PARAM_INT);
  $stmt->execute();
  $dados = $stmt->fetch();

  $id = $dados["id"] ?? null;
  $categoria = $dados["categoria"] ?? null;
}
?>
<form name="formregister" method="post" action="index.php?acao=save&tabela=categoria">
  <label for="id">ID:</label>
  <input type="number" name="id" id="id" class="campo" value="<?= $id ?>" readonly />

  <label for="categoria">Digite a Categoria: </label>
  <input type="text" name="categoria" id="categoria" class="campo" value="<?= $categoria ?>" required />
  <br>
  <button type="submit">Gravar Dados</button>
</form>