<?php
  class LoginController extends Controller {

    function login(){
      $this->view("frmLogin", array());
    }
    
    function entrar() {
      $user = array();
      $user['username'] = $_POST['username'];
      $user['password'] = $_POST['password'];
      $model = new Login();
      $model->logar($user);
      $this->redirect("index/index");

    }

    function cadastrar(){
      $this->view("frmUser", array());
    }

    function novo(){
      $user = array();
      $user['username'] = $_POST['username'];
      $user['password'] = $_POST['password'];
      $user['password'] = base64_encode($user['password']);
      $model = new Login();
      $model->create($user);
      $this->redirect("index/index");
    }

    function deslogar(){
      session_destroy();
      $this->redirect("index/index");
    }

  }
 ?>
