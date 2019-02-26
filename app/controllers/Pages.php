<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [];
     
      $this->view('pages/index', $data);
    }
    public function contato() {
      
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Processa o Formulário
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Inicializa os Dados
        $dados = [
          'nome' => trim($_POST['nome']),
          'telefone' => trim($_POST['telefone']),
          'email' => trim($_POST['email']),
          'mensagem' => trim($_POST['mensagem'])
        ];

        $to      = 'saniteck@saniteck.com.br';
        $subject = 'Site Saniteck';
        $message = $dados['mensagem'];
        $headers = 'From: '. $dados['email'] . "\r\n" .
            'Reply-To: '. $dados['email']. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        mail($to, $subject, $message, $headers);
        redirect('pages');
    }
  }
}