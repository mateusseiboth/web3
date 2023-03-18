<?php
  class Vaga extends Model {
    protected $tabela="vaga";
    protected $query = "SELECT vaga.* FROM vaga ORDER BY id";
    protected $ordem="id";    
  }

 ?>
