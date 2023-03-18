<?php
class Cliente extends Model
{
  protected $tabela = "cliente";
  protected $query = "";
  protected $ordem = "id";

  public function listar()
  {
    $this->query = "SELECT * FROM $this->tabela ORDER BY $this->ordem";
    $resultado = $this->conexao->query($this->query);
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function inserir($nome, $email, $telefone)
  {
    $this->query = "INSERT INTO $this->tabela (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    $resultado = $this->conexao->query($this->query);
    return $resultado;
  }

  public function atualizar($id, $nome, $email, $telefone)
  {
    $this->query = "UPDATE $this->tabela SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";
    $resultado = $this->conexao->query($this->query);
    return $resultado;
  }

  public function excluir($id)
  {
    $this->query = "DELETE FROM $this->tabela WHERE id=$id";
    $resultado = $this->conexao->query($this->query);
    return $resultado;
  }
}
?>