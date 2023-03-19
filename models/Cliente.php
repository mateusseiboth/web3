<?php
class Cliente extends Model
{
  protected $tabela = "cliente";
  protected $query= "SELECT cliente.* FROM cliente ORDER BY id";
  protected $ordem = "id";
}
?>