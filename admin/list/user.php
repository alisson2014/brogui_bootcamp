<link rel="stylesheet" href="style/styletable.css">
<h1 style="text-align: center">Listar usuários</h1>
<table>
  <thead>
    <tr>
      <td width="11%">
        ID
      </td>
      <td width="30%">
        Nome
      </td>
      <td width="30%">
        Login
      </td>
      <td width="21%">
        Email
      </td>
      <td width="8%">
        Opções
      </td>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM usuario";
    $dados = $conn->query($sql)->fetchAll();

    foreach ($dados as $dado) {
      $id = $dado["id"];
      $nome = $dado["nome"];
      $login = $dado["login"];
      $email = $dado["email"];
    ?>
      <tr>
        <td> <?= $id ?> </td>
        <td><?= $nome ?></td>
        <td><?= $login ?></td>
        <td><?= $email ?></td>
        <td>
          <a href="index.php?acao=register&tabela=user&id=<?= $id ?>">
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
      location.href = "index.php?acao=delete&tabela=user&id=" + id;
    }
  }
</script>