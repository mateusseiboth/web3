<?php
class ClienteController extends Controller
{
  // Lista todos os clientes
  public function listar()
  {
    $clienteModel = new Cliente();
    $clientes = $clienteModel->read();
    $this->view('frmCliente', compact('clientes'));
  }

  // Insere um novo cliente
  public function salvar()
  {
    $cliente = array();
    $cliente['id'] = $_POST['id'];
    $cliente['nome'] = $_POST['nome'];
    $cliente['cpf'] = $_POST['cpf'];
    $cliente['telefone'] = $_POST['telefone'];
    $clienteModel = new Cliente();
    if ($cliente['id'] == 0 || $cliente['id'] == "" || $cliente['id'] == null) {
      $clienteModel->create($cliente);
    } else {
      $clienteModel->update($cliente);
    }
    $this->redirect('cliente/listar');
  }
  
  // Exclui um cliente existente
  public function excluir($id)
  {
    $clienteModel = new Cliente();
    $clienteModel->delete($id);
    $this->redirect('cliente/listar');
  }
}
?>