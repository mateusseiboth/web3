<?php
class Cliente extends Model
{
  protected $tabela = "cliente";
  protected $query="select cliente.* from cliente order by id";
  protected $ordem = "id";
}
?>