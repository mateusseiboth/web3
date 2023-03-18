<?php
require_once 'model/ClienteModel.php';

class ClienteController extends Controller
{
  // Lista todos os clientes
  public function listarClientes()
  {
    $clienteModel = new Cliente();
    $clientes = $clienteModel->listar();
    return $clientes;
  }

  // Insere um novo cliente
  public function inserirCliente($nome, $cpf, $telefone)
  {
    $clienteModel = new Cliente();
    $clienteModel->inserir($nome, $cpf, $telefone);
  }

  // Atualiza um cliente existente
  public function atualizarCliente($id, $nome, $cpf, $telefone)
  {
    $clienteModel = new Cliente();
    $clienteModel->atualizar($id, $nome, $cpf, $telefone);
  }

  // Exclui um cliente existente
  public function excluirCliente($id)
  {
    $clienteModel = new Cliente();
    $clienteModel->excluir($id);
  }
}
?>