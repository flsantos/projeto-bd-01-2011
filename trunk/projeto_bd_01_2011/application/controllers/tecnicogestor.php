<?php

class TecnicoGestor extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('TecnicoGestorModel');
		$this->load->model('TitulacaoModel');
		$this->load->model('EmailModel');
		$this->load->model('TelefoneModel');
		$this->load->model('PessoaModel');
	}
	
	function index() {
		$dados['tecnicogestores'] = $this->TecnicoGestorModel->listar();
		$this->load->view('tecnicogestor/index', $dados);
	}
	
	function visualizar() {
		if ($this->uri->segment(3)) {
			$params['id'] = $this->uri->segment(3);$params['join_telefone'] = '';$params['join_email'] = '';$params['join_pessoa'] = '';$params['join_titulacao'] = '';
			$dados['tecnicogestor'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '1';
			$dados['telefones'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '';
			$params['join_email'] = '1';
			$dados['emails'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '';
			$params['join_email'] = '';
			$params['join_pessoa'] = '1'; 
			$dados['pessoas'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '';
			$params['join_email'] = '';
			$params['join_pessoa'] = '';
			$params['join_titulacao'] = '1';
			$dados['titulacoes'] = $this->TecnicoGestorModel->pesquisar($params);

			
			$this->load->view('tecnicogestor/visualizar', $dados);
		}
		else {
			redirect('tecnicogestor/index');
		}
	}
	
	
	
	function excluir() {
		$tecnicogestor_id = $this->uri->segment(3);
		
		$pessoa_id = $this->TecnicoGestorModel->pesquisarPorId($tecnicogestor_id)->pessoa_id;
		$this->EmailModel->excluirTodos($tecnicogestor_id);
		$this->TelefoneModel->excluirTodos($tecnicogestor_id);
		$this->TitulacaoModel->excluirTodos($tecnicogestor_id);
		$this->TecnicoGestorModel->excluir($tecnicogestor_id);
		$this->PessoaModel->excluir($pessoa_id);
		
		redirect('tecnicogestor/index');
	}
	
	function alterar() {
	if ($this->uri->segment(3)) {
			$params['id'] = $this->uri->segment(3);$params['join_telefone'] = '';$params['join_email'] = '';$params['join_pessoa'] = '';$params['join_titulacao'] = '';
			$dados['tecnicogestor'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '1';
			$dados['telefones'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '';
			$params['join_email'] = '1';
			$dados['emails'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '';
			$params['join_email'] = '';
			$params['join_pessoa'] = '1'; 
			$dados['pessoas'] = $this->TecnicoGestorModel->pesquisar($params);
			$params['join_telefone'] = '';
			$params['join_email'] = '';
			$params['join_pessoa'] = '';
			$params['join_titulacao'] = '1';
			$dados['titulacoes'] = $this->TecnicoGestorModel->pesquisar($params);

			
			$this->load->view('tecnicogestor/form', $dados);
		}
		else {
			$dados['tecnicogestor'] = null;
			$dados['telefones'] = null;
			$dados['emails'] = null;
			$dados['pessoas'] = null;
			$dados['titulacoes'] = null;
			$this->load->view('tecnicogestor/form', $dados);
		}
	}

	
	
	function alterando() {
		if ($this->input->post('id')) {
			$dados_pessoa = array (
				"id" => $this->input->post('id_pessoa'),
				"nome" => $this->input->post('nome'),
				"estado_civil" => $this->input->post('estado_civil'),
				"sexo" => $this->input->post('sexo')
			);
			$this->PessoaModel->inserir($dados_pessoa);
			$dados_tecnicogestor = array (
				"id" => $this->input->post('id'),
				"perfil" => $this->input->post('tipo'),
				"site" => $this->input->post('site'),
				"blog" => $this->input->post('blog'),
				"twitter" => $this->input->post('twitter'),
				"end_institucional" => $this->input->post('end_institucional'),
				"cv_lattes" => $this->input->post('cv_lates'),
				"graduacao" => $this->input->post('graduacao'),
				"data_admissao" => $this->input->post('data_admissao'),
				"data_saida" => $this->input->post('data_saida'),
				"pessoa_id" => $this->input->post('id_pessoa')
			);
			$this->TecnicoGestorModel->inserir($dados_tecnicogestor);
			
			$this->EmailModel->excluirTodos($this->input->post('id'));
			$i = 1;
			while ($this->input->post('email'.$i)) {
				$dados_email = array(
					//"id" => $this->input->post('id_email'.$i),
					"email" => $this->input->post('email'.$i),
					"tecnico_gestor_id" => $this->input->post('id')
				);
				$this->EmailModel->inserir($dados_email, 0);
				$i++;
			}
			$this->TelefoneModel->excluirTodos($this->input->post('id'));
			$j = 1;
			while ($this->input->post('telefone'.$j)) {
				$dados_telefone = array(
					//"id" => $this->input->post('id_telefone'.$j),
					"telefone" => $this->input->post('telefone'.$j),
					"tecnico_gestor_id" => $this->input->post('id'),
					"tipo" => 1
				);
				$this->TelefoneModel->inserir($dados_telefone, 0);
				$j++;
			}
			$dados_telefone = array(
					//"id" => $this->input->post('id_telefone'.$j),
					"telefone" => $this->input->post('tel_cel'),
					"tecnico_gestor_id" => $this->input->post('id'),
					"tipo" => 2
			);
			$this->TelefoneModel->inserir($dados_telefone, 0);
			
			$this->TitulacaoModel->excluirTodos($this->input->post('id'));
			$k = 1;
			while ($this->input->post('data_titulacao'.$k)) {
				$dados_titulacao = array(
					"data" => $this->input->post('data_titulacao'.$k),
					"tecnico_gestor_id" => $this->input->post('id'),
					"titulacao_id" => $this->input->post('titulacao'.$k)
				);
				$this->TitulacaoModel->inserir($dados_titulacao, 0);
				$k++;
			}
		}
		else {
			$dados_pessoa = array (
				"id" => '',
				"nome" => $this->input->post('nome'),
				"estado_civil" => $this->input->post('estado_civil'),
				"sexo" => $this->input->post('sexo')
			);
			$this->PessoaModel->inserir($dados_pessoa);
			$id_pessoa = $this->db->insert_id();
			$dados_tecnicogestor = array (
				"perfil" => $this->input->post('tipo'),
				"site" => $this->input->post('site'),
				"blog" => $this->input->post('blog'),
				"twitter" => $this->input->post('twitter'),
				"end_institucional" => $this->input->post('end_institucional'),
				"cv_lattes" => $this->input->post('cv_lates'),
				"graduacao" => $this->input->post('graduacao'),
				"data_admissao" => $this->input->post('data_admissao'),
				"data_saida" => $this->input->post('data_saida'),
				"pessoa_id" => $id_pessoa
			);
			$this->TecnicoGestorModel->inserir($dados_tecnicogestor);
			$id_tecnicogestor = $this->db->insert_id();
			
			$i = 1;
			while ($this->input->post('email'.$i)) {
				$dados_email = array(
					"email" => $this->input->post('email'.$i),
					"tecnico_gestor_id" => $id_tecnicogestor
				);
				$this->EmailModel->inserir($dados_email, 0);
				$i++;
			}
			
			$j = 1;
			while ($this->input->post('telefone'.$j)) {
				$dados_telefone = array(
					"telefone" => $this->input->post('telefone'.$j),
					"tecnico_gestor_id" => $id_tecnicogestor,
					"tipo" => 1
				);
				$this->TelefoneModel->inserir($dados_telefone, 0);
				$j++;
			}
			$dados_telefone = array(
					"telefone" => $this->input->post('tel_cel'),
					"tecnico_gestor_id" => $id_tecnicogestor,
					"tipo" => 2
			);
			$this->TelefoneModel->inserir($dados_telefone, 0);
			
			$k = 1;
			while ($this->input->post('titulacao'.$k)) {
				$dados_titulacao = array(
					"data" => $this->input->post('data_titulacao'),
					"tecnico_gestor_id" => $id_tecnicogestor,
					"titulacao_id" => $this->input->post('titulacao'.$k)
				);
				$this->TitulacaoModel->inserir($dados_titulacao, 0);
				$k++;
			}
			
		}

		
		redirect('tecnicogestor/visualizar');
	}
	
}