<?php
require_once 'model/CarroModel.php';

class CarroController extends Controller
{
  // Lista todos os carros
  public function listarCarros()
  {
    $carroModel = new Carro();
    $carros = $carroModel->listar();
    return $carros;
  }

  // Insere um novo carro
  public function inserirCarro($placa, $id_cliente)
  {
    $carroModel = new Carro();
    $carroModel->inserir($placa, $id_cliente);
  }

  // Atualiza um carro existente
  public function atualizarCarro($id, $placa, $id_cliente)
  {
    $carroModel = new Carro();
    $carroModel->atualizar($id, $placa, $id_cliente);
  }

  // Exclui um carro existente
  public function excluirCarro($id)
  {
    $carroModel = new Carro();
    $carroModel->excluir($id);
  }
}
?>