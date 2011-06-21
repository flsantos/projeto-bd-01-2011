<?php

class PessoaModel extends CI_Model {
	
	function inserir ($dados) {
		if ($this->input->post('id')) {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('pessoa', $dados);
			return $dados('id');
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
	
	function pesquisar() {
		return $this->db->get('pessoa')->result();
	}
	
		
}
