<h1>Novo usuário</h1>

<div class='row'>
  <form action="<?php echo APP . 'login/novo'; ?>" method="post" id="form-user" name="form-user">
    <div class="col-md-6">
      <label for="username" class="form-label">Username</label>
      <div class="input-group col-md-1 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-bitcoin text-success"></i></span>
        <input required class='form-control col-md-1' type="text" name="username">
        <small id="msgUser" class="form-text text-danger"></small>
      </div>
    </div>

    <div class="col-md-6">
      <label for="password" class="form-label">Senha</label>
      <div class="input-group col-md-1 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-blockquote-left text-success"></i></span>
        <input required class='form-control col-md-1' type="password" name="password">
        <small id="msgPass" class="form-text text-danger"></small>
      </div>
    </div>
    <button class="btn btn-success" type="submit" name="button">Salvar</button>
  </form>
</div>