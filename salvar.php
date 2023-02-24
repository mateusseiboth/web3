<?php
  include "banco.php";
  showError();
  $noticia = array();
  $noticia['id'] = $_POST['id'];
  $noticia['titulo'] = $_POST['titulo'];
  $noticia['descricao'] = $_POST['descricao'];
  $noticia['categoria'] = $_POST['categoria'];
  $noticia['data'] = $_POST['data'];
  $noticia['autor'] = $_POST['autor'];
  if ($noticia['id'] == 0) {
    save($noticia);
  } else {
    update($noticia);
  }
  header("location: index.php");

 ?>
