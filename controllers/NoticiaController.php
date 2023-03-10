<?php
  class NoticiaController extends Controller {

    function editar($id) {
      $model = new Noticia();
      $noticia = $model->getById($id);
      $modelCategoria = new Categoria();
      $categorias = $modelCategoria->read();
      $this->view('frmNoticia', compact('noticia', 'categorias'));
    }

    function listar() {
      $model = new Noticia();
      $noticias = $model->read();
      $this->view('listagemNoticia', compact('noticias'));
    }

    function novo() {
      $noticia = array();
      $noticia['id'] = 0;
      $noticia['titulo'] = "";
      $noticia['descricao'] = "";
      $noticia['autor'] = "";
      $noticia['data'] = "";
      $noticia['categoria_id'] = 0;
      $modelCategoria = new Categoria();
      $categorias = $modelCategoria->read();
      $this->view('frmNoticia', compact('noticia', 'categorias'));
    }

    function salvar() {
      $noticia = array();
      $noticia['id'] = $_POST['id'];
      $noticia['titulo'] = $_POST['titulo'];
      $noticia['descricao'] = $_POST['descricao'];
      $noticia['autor'] = $_POST['autor'];
      $noticia['data'] = $_POST['data'];
      $noticia['categoria_id'] = $_POST['categoria_id'];
      $model = new Noticia();
      if ($noticia['id'] == 0) {
        $model->create($noticia);
      } else {
        $model->update($noticia);
      }
      $this->redirect("noticia/listar");
    }

    function excluir($id) {
      $model = new Noticia();
      $model->delete($id);
      $this->view('noticia/listar');
    }
  }
 ?>
