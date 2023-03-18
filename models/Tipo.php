<?php
  class Tipo extends Model {
    protected $tabela="tipo";
    protected $query = "SELECT tipo.* FROM tipo order by id";
    protected $ordem="id";    
  }

 ?>
