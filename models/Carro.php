<?php
class Carro extends Model
{
  protected $tabela = "carro";
  protected $query = "SELECT carro.* FROM carro ORDER BY id";
  protected $ordem = "id";
}

?>