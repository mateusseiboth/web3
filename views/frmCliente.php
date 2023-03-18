<h1>Clientes</h1>

<!-- Formulário de inserção/edição de clientes -->
<form method="POST" action="controller.php">
  <input type="hidden" name="action" value="save_cliente">
  <input type="hidden" name="cliente_id" value="">
  <label for="nome">Nome:</label>
  <input type="text" name="nome" id="nome">
  <label for="cpf">CPF:</label>
  <input type="text" name="cpf" id="cpf">
  <label for="telefone">Telefone:</label>
  <input type="text" name="telefone" id="telefone">
  <button type="submit">Salvar</button>
</form>

<?php
// Obtém os clientes do banco de dados
$clientes = $controller->listarClientes();

// Exibe cada cliente em uma linha da tabela
foreach ($clientes as $cliente) {
  echo "<tr>";
  echo "<td>{$cliente['id']}</td>";
  echo "<td>{$cliente['nome']}</td>";
  echo "<td>{$cliente['cpf']}</td>";
  echo "<td>{$cliente['telefone']}</td>";
  echo "<td>
		<a href='controller.php?action=edit_cliente&cliente_id={$cliente['id']}'>Editar</a>
		<a href='controller.php?action=delete_cliente&cliente_id={$cliente['id']}'>Excluir</a>
	</td>";
  echo "</tr>";
}
?>

<!-- Tabela de clientes -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <!-- Linhas da tabela serão preenchidas com dados do banco de dados -->
  </tbody>
</table>