<?php

class Pessoa extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('PessoaModel');
	}
	
	function index() {
		
		$dados['pessoas'] = $this->PessoaModel->pesquisar();
		
		$this->load->view('pessoa/index', $dados);
	}
}