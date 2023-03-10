<?php
  class AutorController {
    function editar($id) {
      $model = new Autor();
      $autor = $model->getById($id);
      include_once "views/frmAutor.php";
    }

    function listar() {
      $model = new Autor();
      $autores = $model->read();
      include_once "views/listagemAutor.php";
    }

    function novo() {
      $autor = array();
      $autor['id'] = 0;
      $autor['nome'] = "";
      $autor['email'] = "";
      include_once "views/frmAutor.php";

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
      header('location: '.APP.'autor/listar');
    }

    function excluir($id) {
      $model = new Autor();
      $model->delete($id);
      header('location: '.APP.'autor/listar');
    }
  }
 ?>
