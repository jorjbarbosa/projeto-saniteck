<?php
  class Cliente {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    public function getDepoimentos() {
      $this->db->query("SELECT * FROM `depoimentos` ORDER BY data DESC LIMIT 3");
      $depoimentos = $this->db->resultSet();
      return $depoimentos;
    }
    public function novoDepoimento($dados) {
      $this->db->query("INSERT INTO depoimentos (nome, cargo, email, mensagem) VALUES (:nome, :cargo,:email,:mensagem);");
      $this->db->bind(':nome', $dados['nome']);
      $this->db->bind(':email', $dados['email']);
      $this->db->bind(':mensagem', $dados['mensagem']);
      $this->db->bind(':cargo', $dados['cargo']);
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }