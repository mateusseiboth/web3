<?php
class CarroController extends Controller
{
  // Lista todos os carros
  public function listar()
  {
    $carroModel = new Carro();
    $carros = $carroModel->read();
    $clientModel = new Cliente();
    $clientes = $clientModel->read();
    $this->view('frmCarro', compact('carros', 'clientes'));
  }

  // Insere um novo carro
  public function salvar()
  {
    $carro = array();
    $carro['id'] = $_POST['id'];
    $carro['placa'] = $_POST['placa'];
    

    if ($_POST['cliente_id'] == '-1'){
      $carro['cliente_id'] = 0;
    } else {
      $carro['cliente_id'] = $_POST['cliente_id'];
    }

    $carroModel = new Carro();
    if ($carro['id'] == 0 || $carro['id'] == "" || $carro['id'] == null) {
      $carroModel->create($carro);
    } else {
      $carroModel->update($carro);        
    }
    $this->redirect('carro/listar');
  }

  // Exclui um carro existente
  public function excluir($id)
  {
    $carroModel = new Carro();
    $carroModel->delete($id);
    $this->redirect('carro/listar');
  }
}
?>