<?php
  class IndexController extends Controller {
   
    function index() { 
     
      $dados = array();
      $this->view('index', $dados);
    }

   
    function trocar(){
      if ($_SESSION['egg'] > 5){
        $_SESSION['egg'] = 0;
      }
      $_SESSION['egg']++;
      $_SESSION['tema'] == 'white' ? $_SESSION['tema'] = 'black'  : $_SESSION['tema'] = 'white';
      //var_dump($_COOKIE['tema']);
     
      $this->redirect("index/index");
    }

    

  }
 ?>
