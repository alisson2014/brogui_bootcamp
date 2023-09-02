<link rel="stylesheet" href="style/styletable.css">
<h1 style="text-align: center">Listar notícias</h1>
<table>
  <thead>
    <tr>
      <td width="12%">ID</td>
      <td width="54%">Titulo da noticia</td>
      <td width="34%">OPÇÕES</td>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT id, titulo FROM noticia";
    $dados = $conn->query($sql)->fetchAll();
    foreach ($dados as $dado) :
      $id = $dado["id"];
      $titulo = $dado["titulo"];
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
    <?php endforeach; ?>
  </tbody>
</table>
<script>
  function excluir(id) {
    if (confirm("Deseja realmente excluir este registro")) {
      location.href = "index.php?acao=delete&tabela=noticia&id=" + id;
    }
  }
</script>