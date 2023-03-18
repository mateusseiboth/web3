<?php
  class VagasController extends Controller {
    function editar($id) {
      $model = new Autor();
      $autor = $model->getById($id);
      $this->view('frmAutor', compact('autor'));
    }

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
      $autor = array();
      $autor['id'] = $_POST['id'];
      $autor['nome'] = $_POST['nome'];
      $autor['email'] = $_POST['email'];
      $model = new Autor();
      if ($autor['id'] == 0) {
        $model->create($autor);
      } else {
        $model->update($autor);
      }
      $this->redirect("autor/listar");
    }

    function excluir($id) {
      $model = new Autor();
      $model->delete($id);
      $this->redirect('autor/listar');
    }
  }
 ?>
