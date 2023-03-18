<?php
  class AdminController extends Controller {

    function listar() {
      $model = new Vaga();
      $vagas = $model->read();
      $modelType = new Tipo();
      $tipos = $modelType->read();
      $this->view('adminPanel', compact('vagas', 'tipos'));
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
