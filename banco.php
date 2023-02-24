<?php
  function connection() {
    return new PDO("pgsql:host=postgres;dbname=web3","postgres","postgres");
  }
  function showError() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  }

  function getNoticias() {
    $conexao = connection();
    $sql = "SELECT * FROM noticia ORDER BY categoria, data";
    $sentenca = $conexao->query($sql);
    $dados = $sentenca->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  function save($noticia) {
    $conexao = connection();
    $sql = "INSERT INTO noticia (titulo, descricao, autor, data, categoria) VALUES (?,?,?,?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $noticia['titulo']);
    $sentenca->bindParam(2, $noticia['descricao']);
    $sentenca->bindParam(3, $noticia['autor']);
    $sentenca->bindParam(4, $noticia['data']);
    $sentenca->bindParam(5, $noticia['categoria']);
    $sentenca->execute();
  }

  function update($noticia) {
    $conexao = connection();
    $sql = "UPDATE noticia SET titulo=?, descricao=?, autor=?, data=?, categoria=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $noticia['titulo']);
    $sentenca->bindParam(2, $noticia['descricao']);
    $sentenca->bindParam(3, $noticia['autor']);
    $sentenca->bindParam(4, $noticia['data']);
    $sentenca->bindParam(5, $noticia['categoria']);
    $sentenca->bindParam(6, $noticia['id']);
    $sentenca->execute();
  }

  function getNoticiaById($id) {
    $conexao = connection();
    $sql = "SELECT * FROM noticia WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $dados = $sentenca->fetch(PDO::FETCH_ASSOC);
    return $dados;
  }

  function excluir($id) {
    $conexao = connection();
    $sql = "DELETE FROM noticia WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
  }
 ?>
