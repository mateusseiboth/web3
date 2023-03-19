<?php
class ClienteController extends Controller
{
  // Lista todos os clientes
  public function listarClientes()
  {
    $clienteModel = new Cliente();
    $clientes = $clienteModel->read();
    $this->view('frmCliente', compact('clientes'));
  }

  // Insere um novo cliente
  public function inserirCliente()
  {
    $cliente = array();

    $cliente['id'] = $_POST['id'];
    $cliente['nome'] = $_POST['nome'];
    $cliente['cpf'] = $_POST['cpf'];
    $cliente['telefone'] = $_POST['telefone'];

    $clienteModel = new Cliente();
    $clienteModel->create($cliente);
    $this->redirect('clientes/listar');
  }

  // Atualiza um cliente existente
  public function atualizarCliente()
  {
    $cliente = array();

    $cliente['id'] = $_POST['id'];
    $cliente['nome'] = $_POST['nome'];
    $cliente['cpf'] = $_POST['cpf'];
    $cliente['telefone'] = $_POST['telefone'];

    $clienteModel = new Cliente();
    $clienteModel->update($cliente);
    $this->redirect('clientes/listar');
  }

  // Exclui um cliente existente
  public function excluirCliente($id)
  {
    $clienteModel = new Cliente();
    $clienteModel->delete($id);
    $this->redirect('clientes/listar');
  }
}
?>