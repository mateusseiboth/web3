<?php
session_start();
    include_once "autoload.php";

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  define("APP", "http://localhost/web3/");

  if (!isset($_SESSION['logado']) && $_GET['url'] != 'login/entrar') {
    $url = 'login/login';
  } else {
  if (isset($_GET['url'])) {
    $url = $_GET['url'];
  } else {
    $url = 'index/index';
  }
}
  $parametros = explode("/", $url);
  $nomeControlador = ucfirst($parametros[0]).'Controller';
  
  $acao = $parametros[1];
  $controlador = new $nomeControlador();

  if (count($parametros) == 2) {
    $controlador->$acao();
  
  } else {
    $id = $parametros[2];
    $controlador->$acao($id);
  }
