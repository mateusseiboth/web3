<?php
  function autoload($classe) {
    
    if (file_exists(__DIR__."/controllers/$classe.php")) {
      require_once(__DIR__."/controllers/$classe.php");
      return;
    }
    if (file_exists(__DIR__."/models/$classe.php")) {
      require_once(__DIR__."/models/$classe.php");
      return;
    }
    if (file_exists(__DIR__."/system/$classe.php")) {
      require_once(__DIR__."/system/$classe.php");
      return;
    }
  }
  spl_autoload_register("autoload");
 
