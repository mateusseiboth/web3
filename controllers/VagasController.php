<?php
  class VagasController extends Controller {
    function listar() {
      $model = new Vaga();
      $vagas = $model->read();
      $this->view('listaVagas', compact('vagas'));
    }

    function informacao($id) {
      $model = new Vaga();
      $vaga = $model->information($id);
      $this->view('frmVaga', compact('vaga'));
    }

    function salvar() {
      $vaga = array();
      $vaga['estado'] = true;
      $model = new Vaga();
      $model->create($vaga);
      $this->redirect("vaga/listar");
    }

    function excluir($id) {
      $model = new Vaga();
      $model->delete($id);
      $this->redirect('vaga/listar');
    }
  }
 ?>
