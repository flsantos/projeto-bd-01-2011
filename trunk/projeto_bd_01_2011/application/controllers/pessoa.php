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
	
	function alterar() {
		$this->load->view('pessoa/form');
	}
	
	function alterando() {
		if ($this->input->post('id')) {
			$dados = array (
				"id" => $this->uri->segment(3),
				"nome" => $this->input->post('nome'),
				"estado_civil" => $this->input->post('estado_civil'),
				"sexo" => $this->input->post('sexo')
			);
		}
		else {
			$dados = array (
				"nome" => $this->input->post('nome'),
				"estado_civil" => $this->input->post('estado_civil'),
				"sexo" => $this->input->post('sexo')
			);
		}
		
		$this->PessoaModel->inserir($dados);
		
		redirect('pessoa/index');
		
			
			
	}
	
	function excluir() {
		$pessoa_id = $this->uri->segment(3);
		
		if ($this->PessoaModel->excluir($pessoa_id)) {
			//Mensagem de exclusao efetuada
		}
		else {
			//Mensagem de que não pode efetuar exclusão
		}
		
		redirect('pessoa/index');
	}
}