<?php
  class Usuario {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    public function getDepoimentos() {
      $this->db->query("SELECT * FROM depoimentos WHERE");
      $depoimentos = $this->db->resultSet();
      return $depoimentos;
    }
    public function mostrarDepoimento($idDepoimento, $valor) {
      $this->db->query("UPDATE depoimentos SET mostrar = :valor WHERE id = :id_depoimento");
      $this->db->bind(':id_depoimento', $idDepoimento);
      $this->db->bind(':valor', $valor);
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }