<?php

class EmailModel extends CI_Model {
	
	function inserir ($dados, $i) {
		if ($this->input->post('id_email'.$i)) {
			$this->db->where('email.id', $this->input->post('id_email'.$i));
			$this->db->update('email', $dados);
			return $dados['id'];
		}
		else {
			return $this->db->insert('email', $dados);
		}
	}
	
	function excluirTodos($id) {
		$this->db->where('tecnico_gestor_id', $id);
		if ($this->db->delete('email'))
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
