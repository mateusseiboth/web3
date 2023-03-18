<?php
  class TicketController extends Controller {
    function editar($id) {
      $model = new Ticket();
      $ticket = $model->getById($id);
      $this->view("frmTicket", compact('ticket'));
    }

    function informacao($id) {
      $model = new Vaga();
      $vaga = $model->information($id);
      $this->view('frmVaga', compact('vaga'));
    }

    function listar() {
      $model = new Ticket();
      $tickets = $model->read();
      $this->view("listarTicket", compact('tickets'));
    }

    function novo() {
      $categoria = array();
      $categoria['id'] = 0;
      $categoria['descricao'] = "";
      $this->view("frmTicket", compact('ticket'));
    }

    function salvar() {
      $categoria = array();
      $categoria['id'] = $_POST['id'];
      $categoria['descricao'] = $_POST['descricao'];
      $model = new Ticket();
      if ($ticket['id'] == 0) {
        $model->create($ticket);
      } else {
        $model->update($ticket);
      }
      $this->redirect('ticket/listar');
    }

    function excluir($id) {
      $model = new Ticket();
      $model->delete($id);
      $this->redirect('ticket/listar');
    }
  }
 ?>
