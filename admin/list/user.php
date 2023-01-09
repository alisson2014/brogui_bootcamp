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
    //selecionar as categorias
    $sql = "SELECT * FROM usuario";
    //executar o sql
    $consulta = mysqli_query($con, $sql);
    //laço de repetição para retirar os resultados
    while ($dados = mysqli_fetch_array($consulta)) {
      $id = $dados["id"];
      $nome = $dados["nome"];
      $login = $dados["login"];
      $email = $dados["email"];
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
      //chamar a tela de excluir
      location.href = "index.php?acao=delete&tabela=user&id=" + id;
    }
  }
</script>