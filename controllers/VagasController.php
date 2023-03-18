<?php
  class VagasController extends Controller {
    function listar() {
      $model = new Vaga();
      $vagas = $model->read();
      $this->view('listaVagas', compact('vagas'));
    }


    function salvar() {
      $vaga = array();
      $vaga['estado'] = true;
      $model = new Vaga();
      $model->create($vaga);
      $this->redirect("vagas/listar");
    }

    function excluir($id) {
      $model = new Vaga();
      $model->delete($id);
      $this->redirect('vagas/listar');
    }
  }
 ?>
