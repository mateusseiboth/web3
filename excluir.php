<?php
  include_once "banco.php";
  showError();
  $id = $_GET['id'];
  excluir($id);
  header('location: index.php');

 ?>
