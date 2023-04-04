<h1>Realizar login</h1>

<div class='row'>
  <form action="<?php echo APP . 'login/entrar'; ?>" method="post" name="login" id="login">
    <div class="col-md-3 mb-1">
      <label for="id" class="form-label">Username</label>
      <input class='form-control' type="text" name="username" value="">
    </div>
    <div class="col-md-3 mb-1">
      <label for="titulo" class="form-label">Senha</label>
      <input class='form-control' type="password" name="password" value="">
    </div>
    <button class="btn btn-success" type="submit" name="button">Entrar</button>
  </form>
</div>