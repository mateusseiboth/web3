<?php
  include_once "banco.php";
  showError();
  $id = $_GET['id'];
  $noticia = getNoticiaById($id);
  include_once "formulario.php";
?>
