<?php
  class Ticket extends Model {
    protected $tabela="ticket";
    protected $query = "SELECT to_char(ticket.hora_entrada at time zone 'UTF-4', 'HH24:MI:SS') as hora_entrada,
    cliente.nome as nome_cliente, carro.placa as nome_placa, tipo.descr as tipo_vaga,
    tipo.preco as preco_tipo, ticket.vaga_id as id_vaga, ticket.id as ticket_id,
    to_char(ticket.hora_saida at time zone 'UTF-4', 'HH24:MI:SS') as hora_saida
    FROM ticket 
    join tipo on tipo.id = ticket.tipo_id
    join carro on carro.id = ticket.carro_id
    join cliente on cliente.id = carro.cliente_id
    where ticket.estado != false";

    protected $ordem="id";

    public function encerrar($id){
      $sql = "select encerrar_ticket(:id)";
      $sentenca = $this->conexao->prepare($sql);
      $sentenca->bindParam(":id", $id);
      $sentenca->execute();
      
    }

    public function create($dados){
      $chaves = array_keys($dados);
      $campos = implode(", ", $chaves);
      $valores = ":".implode(", :", $chaves);
      $sql = "select inserir_ticket($valores)";
      $sentenca = $this->conexao->prepare($sql);
      foreach ($chaves as $chave) {
        $sentenca->bindParam(":$chave", $dados[$chave]);
      }
      $sentenca->execute();
    }

    public function information($id) {
      $sql  = "SELECT to_char(ticket.hora_entrada at time zone 'UTF-4', 'HH24:MI:SS') as hora_entrada, 
      cliente.nome as nome_cliente, carro.placa as nome_placa, tipo.descr as tipo_vaga,
      tipo.preco as preco_tipo, ticket.vaga_id as id_vaga, ticket.id as ticket_id
      FROM ticket 
      join tipo on tipo.id = ticket.tipo_id
	    join carro on carro.id = ticket.carro_id
	    join cliente on cliente.id = carro.cliente_id
      where ticket.estado != false and ticket.vaga_id = :id";
      $this->ordem="id";    
      $sentenca = $this->conexao->prepare($sql);
      $sentenca->bindParam(":id", $id);
      $sentenca->execute();
      $dados = $sentenca->fetch();
      return $dados;
    }
  }
 ?>
