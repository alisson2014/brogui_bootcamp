<link rel="stylesheet" href="style/styletable.css">
<h1 style="text-align: center">Listar notícias</h1>
<table>
  <thead>
    <tr>
      <td width="12%">
        ID
      </td>
      <td width="54%">
        Titulo da noticia
      </td>
      <td width="34%">
        OPÇÕES
      </td>
    </tr>
  </thead>
  <tbody>
    <?php
    //selecionar as categorias
    $sql = "SELECT * FROM noticia";
    //executar o sql
    $consulta = mysqli_query($con, $sql);
    //laço de repetição para retirar os resultados
    while ($dados = mysqli_fetch_array($consulta)) {
      $id = $dados["id"];
      $titulo = $dados["titulo"];
    ?>
      <tr>
        <td> <?= $id ?> </td>
        <td><?= $titulo ?></td>
        <td>
          <a href="index.php?acao=register&tabela=noticia&id=<?= $id ?>">
            Editar
          </a>

          <a href="javascript:excluir(<?= $id ?>)">
            Excluir
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<script>
  function excluir(id) {
    if (confirm("Deseja realmente excluir este registro")) {
      //chamar a tela de excluir
      location.href = "index.php?acao=delete&tabela=noticia&id=" + id;
    }
  }
</script>