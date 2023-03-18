<?php
require_once 'model/CarroModel.php';

class CarroController extends Controller
{
  // Lista todos os carros
  public function listarCarros()
  {
    $carroModel = new Carro();
    $carros = $carroModel->read();
    $this->view('frmCarro', compact('carros'));
  }

  // Insere um novo carro
  public function inserirCarro()
  {
    $carro = array();

    $carro['id'] = $_POST['id'];
    $carro['placa'] = $_POST['placa'];
    $carro['id_cliente'] = $_POST['id_cliente'];

    $carroModel = new Carro();
    $carroModel->create($carro);
    $this->redirect('carro/listar');
  }

  // Atualiza um carro existente
  public function atualizarCarro()
  {
    $carro = array();

    $carro['id'] = $_POST['id'];
    $carro['placa'] = $_POST['placa'];
    $carro['id_cliente'] = $_POST['id_cliente'];
    
    $carroModel = new Carro();
    $carroModel->update($carro);
    $this->redirect('carro/listar');
  }

  // Exclui um carro existente
  public function excluirCarro($id)
  {
    $carroModel = new Carro();
    $carroModel->delete($id);
    $this->redirect('carro/listar');
  }
}
?>