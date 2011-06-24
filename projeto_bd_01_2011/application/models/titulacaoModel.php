<?php

class TitulacaoModel extends CI_Model {
	
	function inserir ($dados, $k) {
		if ($this->input->post('id_titulacao'.$k)) {
			$this->db->where('titulacao_id', $this->input->post('id_titulacao'.$k));
			$this->db->update('historico_titulacao', $dados);
			return $dados['titulacao_id'];
		}
		else {
			return $this->db->insert('historico_titulacao', $dados);
		}
	}
	
	function excluirTodos($id) {
		$this->db->where('tecnico_gestor_id', $id);
		if ($this->db->delete('historico_titulacao'))
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
