<?php
  class TicketController extends Controller {

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
      $modelClient = new Cliente();
      $clientes = $modelClient->read();
      $modelCar = new Carro();
      $carros = $modelCar->read();
      $modelType = new Tipo();
      $tipos = $modelType->read();
      $modelVaga = new Vaga();
      $vagas = $modelVaga->read();
      $this->view("frmTicket", compact('clientes', 'carros', 'tipos', 'vagas'));
    }

    function create() {
      $ticket = array();
      $ticket['carro_id'] = $_POST['carro_id'];
      $ticket['vaga_id'] = $_POST['vaga_id'];
      $ticket['tipo_id'] = $_POST['tipo_id'];
      $ticket['estado'] = true;
      $model = new Ticket();
      $model->create($ticket);
      $this->redirect('ticket/listar');
    }

    function todos(){
      $todos['bol'] = false;
      $model = new Ticket();
      $tickets = $model->todos();
      $this->view("listarTicket", compact('tickets', 'todos'));
    }

    function encerrar($id) {
      $model = new Ticket();
      $model->encerrar($id);
      $this->redirect('ticket/listar');
    }
  }
 ?>
