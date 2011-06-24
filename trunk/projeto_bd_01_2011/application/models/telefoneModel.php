<?php

class TelefoneModel extends CI_Model {
	
	function inserir ($dados, $j) {
		if ($this->input->post('id_telefone'.$j)) {
			$this->db->where('telefone.id', $this->input->post('id_telefone'.$j));
			$this->db->update('telefone', $dados);
			return $dados['id'];
		}
		else {
			return $this->db->insert('telefone', $dados);
		}
	}
	
	function excluirTodos($id) {
		$this->db->where('tecnico_gestor_id', $id);
		if ($this->db->delete('telefone'))
			return true;
		else
			return false;
	}
/*	
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
	
*/	
}
