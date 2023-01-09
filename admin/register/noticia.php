<h1 style="text-align: center;">Cadastro de Notícias</h1>
<p style="text-align: center;">
  <a href="index.php?acao=register&tabela=noticia" class="btn">
    Novo cadastro
  </a>
  <a href="index.php?acao=list&tabela=noticia" class="btn">
    Listar cadastros
  </a>
</p>
<hr>
<?php
//verificar se existe id sendo enviado
if (isset($_GET["id"])) {
  //recuperar a variavel
  $id = (int)$_GET["id"];
  //selecionar o registro do banco
  $sqlNoticia = "SELECT * FROM noticia WHERE id = {$id}";
  //executar o sql
  $consulta = mysqli_query($con, $sqlNoticia);
  //separar os dados
  $dados = mysqli_fetch_array($consulta);
}

$id = $dados["id"] ?? NULL;
$titulo = $dados["titulo"] ?? NULL;
$texto = $dados["texto"] ?? NULL;
$data = $dados["data"] ?? NULL;
$categoria_id = $dados["categoria_id"] ?? NULL;
?>

<form name="formCadastro" method="post" action="index.php?acao=save&tabela=noticia">
  <!-- Campo id: -->
  <label for="id">ID: </label>
  <input type="text" readonly name="id" id="id" class="campo" value="<?= $id ?>">
  <!-- Campo titulo -->
  <label for="titulo">Titulo da notícia: </label>
  <input type="text" name="titulo" id="titulo" class="campo" value="<?= $titulo ?>" required>
  <!--Campo texto-->
  <label for="texto">Texto da notícia:</label>
  <textarea name="texto" id="texto" rows="6" required>
    <?= $texto ?>
  </textarea>
  <!-- Campo data -->
  <label for="data">Data da publicação:</label>
  <input type="date" name="data" id="data" required class="campo" value="<?= $data ?>">
  <!-- Campo categoria -->
  <label for="categoria_id">Selecione uma categoria</label>
  <select name="categoria_id" id="categoria_id" required class="campo">
    <option value=""></option>
    <?php
    //selecionar todas as categorias
    $sql = "SELECT * FROM categoria ORDER BY categoria";
    //executar o sql
    $consulta = mysqli_query($con, $sql);
    while ($dados = mysqli_fetch_array($consulta)) {
      //recuperar os valores 
      $id = $dados["id"];
      $categoria = $dados["categoria"];

      echo "<option value='{$id}'>{$categoria}</option>";
    }
    ?>
  </select>
  <button type="submit">Gravar dados:</button>
</form>
<script>
  document.querySelector("#categoria_id").value = "<?= $categoria_id ?>";
</script>