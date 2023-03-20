<?php
  class Login extends Model {
    protected $tabela="usuario";
    protected $query = "";
  
    function logar($user){
      $username = $user['username'];
      $password = $user['password'];
      $sql = "SELECT * FROM $this->tabela WHERE username = :username and password = :password";
      $sentenca = $this->conexao->prepare($sql);
      $sentenca->bindParam(":username", $username);
      $prepared_password = base64_encode($password);
      $sentenca->bindParam(":password", $prepared_password);
      $sentenca->execute();
      $dados = $sentenca->fetch();
        $_SESSION['username'] = $dados['username'];
        $_SESSION['id'] = $dados['id'];
        $_SESSION['logado'] = true;
    }

    

  }

 ?>
