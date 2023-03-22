<?php
class CarroController extends Controller
{
  // Lista todos os carros
  public function listar()
  {
    $carroModel = new Carro();
    $carros = $carroModel->read();
    $this->view('frmCarro', compact('carros'));
  }

  // Insere um novo carro
  public function inserir()
  {
    $carro = array();
    $carro['id'] = $_POST['id'];
    $carro['placa'] = $_POST['placa'];
    $carro['cliente_id'] = $_POST['cliente_id'];
    $carroModel = new Carro();
    $carroModel->create($carro);
    $this->redirect('carros/listar');
  }

  // Atualiza um carro existente
  public function atualizar()
  {
    $carro = array();
    $carro['id'] = $_POST['id'];
    $carro['placa'] = $_POST['placa'];
    $carro['cliente_id'] = $_POST['cliente_id'];
    $carroModel = new Carro();
    $carroModel->update($carro);
    $this->redirect('carros/listar');
  }

  // Exclui um carro existente
  public function excluir($id)
  {
    $carroModel = new Carro();
    $carroModel->delete($id);
    $this->redirect('carros/listar');
  }
}
?>