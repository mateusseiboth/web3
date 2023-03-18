<?php
  class Categoria extends Model {
    protected $tabela="categoria";
    protected $ordem="descricao";


    public function information($id) {
      $sql  = "SELECT to_char(ticket.hora_entrada at time zone 'UTF-4', 'HH24:MI:SS') as hora_entrada, 
      cliente.nome as nome_cliente, carro.placa as nome_placa, tipo.descr as tipo_vaga, tipo.preco as preco_tipo, ticket.vaga_id as id_vaga
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
