<?php
  class AdminController extends Controller {

    function listar() {
      $model = new Vaga();
      $vagas = $model->read();
      $modelType = new Tipo();
      $tipos = $modelType->read();
      $this->view('adminPanel', compact('vagas', 'tipos'));
    }

  }
     ?>
