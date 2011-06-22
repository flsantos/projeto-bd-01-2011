<?php

class Pessoa extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('PessoaModel');
	}
	
	function index() {
		$params['id'] = '';
		$dados['pessoas'] = $this->PessoaModel->pesquisar($params);
		
		$this->load->view('pessoa/index', $dados);
	}
	
	function alterar() {
		if ($this->uri->segment(3)) {
			$params['id'] = $this->uri->segment(3);
			$dados['pessoas'] = $this->PessoaModel->pesquisar($params);
			$this->load->view('pessoa/form', $dados);
		}
		else {
			$dados['pessoas'] = null;
			$this->load->view('pessoa/form', $dados);
		}
	}
	
	function alterando() {
		if ($this->input->post('id')) {
			$dados = array (
				"id" => $this->input->post('id'),
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
			$this->session->set_userdata('mensagem', 'Pessoa excluída com sucesso');
		}
		else {
			$this->session->set_userdata('erro', 'Erro ao excluir essa Pessoa');
		}
		
		redirect('pessoa/index');
	}
}