<?php

class PessoaModel extends CI_Model {
	
	function inserir ($dados) {
		if ($this->input->post('id_pessoa')) {
			$this->db->where('id', $this->input->post('id_pessoa'));
			$this->db->update('pessoa', $dados);
			return $dados['id'];
		}
		else {
			return $this->db->insert('pessoa', $dados);
		}
	}
	
	function excluir ($id) {
		$this->db->where('id', $id);
		if ($this->db->delete('pessoa'))
			return true;
		else
			return false;
	}
	
	function pesquisar($params) {
		if ($params['id']) {
			$this->db->where('id', $params['id']);
		}
		return $this->db->get('pessoa')->result();
	}
	
		
}
