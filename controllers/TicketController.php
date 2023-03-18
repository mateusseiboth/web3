<?php
  class TicketController extends Controller {
    function editar($id) {
      $model = new Ticket();
      $ticket = $model->getById($id);
      $this->view("frmTicket", compact('ticket'));
    }

    function informacao($id) {
      $model = new Ticket();
      $ticket = $model->information($id);
      $this->view('frmVaga', compact('ticket'));
    }

    function listar() {
      $model = new Ticket();
      $tickets = $model->read();
      $this->view("listarTicket", compact('tickets'));
    }

    function novo() {
      $modelClient = new Client();
      $clients = $modelClient->read();
      $modelCar = new Car();
      $cars = $modelCar->getCarClient($clients['id']);
      $modelType = new Type();
      $types = $modelType->read();
      $this->view("frmTicket", compact('ticket, clients, cars, types'));
    }

    function salvar() {
      $ticket = array();
      $ticket['carro_id'] = $_POST['carro_id'];
      $ticket['vaga_id'] = $_POST['vaga_id'];
      $ticket['tipo_id'] = $_POST['tipo_id'];
      $ticket['estado'] = true;
      $model = new Ticket();
      $model->create($ticket);
      $this->redirect('ticket/listar');
    }

    function excluir($id) {
      $model = new Ticket();
      $model->delete($id);
      $this->redirect('ticket/listar');
    }
  }
 ?>
