<h1>Carros</h1>

<!-- Formulário de inserção/edição de carros -->
<form method="POST" action="controller.php">
  <input type="hidden" name="action" value="save_car">
  <input type="hidden" name="car_id" value="">
  <label for="placa">Placa:</label>
  <input type="text" name="placa" id="placa">
  <label for="cliente_id">ID do cliente:</label>
  <input type="text" name="cliente_id" id="cliente_id">
  <button type="submit">Salvar</button>
</form>

<?php
// Obtém os carros do banco de dados
$carros = $controller->listarCarros();

// Exibe cada carro em uma linha da tabela
foreach ($carros as $carro) {
  echo "<tr>";
  echo "<td>{$carro['id']}</td>";
  echo "<td>{$carro['placa']}</td>";
  echo "<td>{$carro['id_cliente']}</td>";
  echo "<td>
		<a href='CarroController.php?action=edit_car&car_id={$carro['id']}'>Editar</a>
		<a href='CarroController.php?action=delete_car&car_id={$carro['id']}'>Excluir</a>
	</td>";
  echo "</tr>";
}
?>

<!-- Tabela de carros -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Placa</th>
      <th>ID do cliente</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <!-- Linhas da tabela serão preenchidas com dados do banco de dados -->
  </tbody>
</table>