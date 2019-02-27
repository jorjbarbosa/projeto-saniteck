<?php
  class Cliente {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    public function getDepoimentos() {
      $this->db->query("SELECT * FROM depoimentos");
      $depoimentos = $this->db->resultSet();
      return $depoimentos;
    }
    public function novoDepoimento($dados) {
      $this->db->query("INSERT INTO depoimentos (nome, email, mensagem) VALUES (:nome, :email, :mensagem);");
      $this->db->bind(':nome', $dados['nome']);
      $this->db->bind(':email', $dados['email']);
      $this->db->bind(':mensagem', $dados['mensagem']);

      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }