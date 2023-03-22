<?php
class Carro extends Model
{
  protected $tabela = "carro";
  protected $query = "SELECT carro.*, cliente.id as cliente_id FROM carro JOIN cliente ON carro.cliente_id = cliente.id ORDER BY id";
  protected $ordem = "id";
}

?>