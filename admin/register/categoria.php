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
//recuperar o ID
$id = $_GET["id"] ?? NULL;
$categoria = NULL;
//verificar se existe um id sendo enviado
if (!empty($id)) {
  $id = (int)$id;
  //echo "O ID é: {$id}";

  //sql para trazer os dados do id
  $sql = "SELECT * FROM categoria WHERE id = {$id}";
  //executar o sql
  $consulta = mysqli_query($con, $sql);
  //separar os dados
  $dados = mysqli_fetch_array($consulta);

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