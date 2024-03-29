<link rel="stylesheet" href="style/styletable.css">
<h1 style="text-align: center">Listar Categorias</h1>
<table>
  <thead>
    <tr>
      <td width="12%">ID</td>
      <td width="54%">CATEGORIA</td>
      <td width="34%">OPÇÕES</td>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT id, categoria FROM categoria ORDER BY categoria";
    $dados = $conn->query($sql)->fetchAll();
    foreach ($dados as $dado) :
      $id = $dado["id"];
      $categoria = $dado["categoria"];
    ?>
      <tr>
        <td> <?= $id ?> </td>
        <td><?= $categoria ?></td>
        <td>
          <a href="index.php?acao=register&tabela=categoria&id=<?= $id ?>">
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
      location.href = "index.php?acao=delete&tabela=categoria&id=" + id;
    }
  }
</script>