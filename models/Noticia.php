<?php
  class Noticia extends Model {
    protected $tabela="noticia";
    protected $query = "SELECT noticia.*, categoria.descricao AS categoria_descricao FROM noticia JOIN categoria ON categoria.id = noticia.categoria_id ORDER BY data, titulo";
    protected $ordem="data, titulo";
  }
 ?>
