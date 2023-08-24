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
$id = $_GET["id"] ?? NULL;
$categoria = NULL;

if (!empty($id)) {
  $id = (int)$id;
  $sql = "SELECT * FROM categoria WHERE id = ?";
  $dados = $conn->query($sql)->fetch();

  $id = $dados["id"] ?? NULL;
  $categoria = $dados["categoria"] ?? NULL;
}
?>
<form name="formregister" method="post" action="index.php?acao=save&tabela=categoria">
  <label for="id">ID:</label>
  <input type="text" name="id" id="id" class="campo" value="<?= $id ?>" readonly>

  <label for="categoria">Digite a Categoria: </label>
  <input type="text" name="categoria" id="categoria" class="campo" value="<?= $categoria ?>" required>
  <br>
  <button type="submit">Gravar Dados</button>
</form>