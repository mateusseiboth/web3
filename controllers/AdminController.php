<?php
  class AdminController extends Controller {
    function editar($id) {
      $model = new Autor();
      $autor = $model->getById($id);
      $this->view('frmAutor', compact('autor'));
    }

    function index() {
      echo "Cheguei";
      //$model = new Autor();
      //$autores = $model->read();
      //$this->view('listagemAutor', compact('autores'));
    }

    function novo() {
      $autor = array();
      $autor['id'] = 0;
      $autor['nome'] = "";
      $autor['email'] = "";
      $this->view("frmAutor", compact('autor'));
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
