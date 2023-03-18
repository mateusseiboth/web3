<?php
  class TipoController extends Controller {

    function listar() {
      $model = new Vaga();
      $vagas = $model->read();
      $modelType = new Tipo();
      $tipos = $modelType->read();
      $this->view('adminPanel', compact('vagas', 'tipos'));
    }

    function novo() {
      $tipo = array();
      $tipo['id'] = "";
      $tipo['preco'] = "";
      $tipo['descr'] = "";
      $model = new Tipo();
      $this->view('frmTipo', compact('tipo'));
    }

    function salvar() {
      $tipo = array();
      $tipo['id'] = $_POST['id'];
      $tipo['preco'] = $_POST['preco'];
      $tipo['descr'] = $_POST['descr'];
      $model = new Tipo();
      if ($tipo['id'] == 0 || $tipo['id'] == "" || $tipo['id'] == null) {
        $model->create($tipo);
      } else {
        $model->update($tipo);
        
      }
      $this->redirect("admin/listar");
    }

    function editar($id) {
      $model = new Tipo();
      $tipo = $model->getById($id);
      $this->view('frmTipo', compact('tipo'));
    }

    function excluir($id) {
      $model = new Tipo();
      $model->delete($id);
      $this->redirect('admin/listar');
    }

  }
     ?>
