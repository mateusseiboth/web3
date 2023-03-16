<?php
  class Noticia extends Model {
    protected $tabela="noticia";
    protected $query = "SELECT noticia.*, categoria.descricao AS categoria_descricao, autor.nome AS autor_nome FROM noticia JOIN categoria ON categoria.id = noticia.categoria_id JOIN autor ON autor.id = noticia.autor_id ORDER BY data, titulo";
    protected $ordem="data, titulo";
  }
 ?>
