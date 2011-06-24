<?php	

class TecnicoGestorModel extends CI_Model {
	
	function inserir ($dados) {
			if ($this->input->post('id')) {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tecnico_gestor', $dados);
			return $dados['id'];
		}
		else {
			return $this->db->insert('tecnico_gestor', $dados);
		}
	}
	
	function excluir ($id) {
		$this->db->where('id', $id);
		if ($this->db->delete('tecnico_gestor'))
			return true;
		else
			return false;
	}
	
	function listar () {
		$this->db->select(' pessoa.*, tecnico_gestor.* ');
		$this->db->join('pessoa', 'pessoa.id = tecnico_gestor.pessoa_id');
		return $this->db->get('tecnico_gestor')->result();
		
	}
	
	function pesquisar($params) {
		if ($params['id']) {
			$this->db->where('tecnico_gestor.id', $params['id']);
		}
		if ($params['join_telefone']) {
			$this->db->join('telefone', 'tecnico_gestor.id = telefone.tecnico_gestor_id');
		}
		if ($params['join_email']) {
			$this->db->join('email', 'tecnico_gestor.id = email.tecnico_gestor_id');
		}
		if ($params['join_pessoa']) {
			$this->db->join('pessoa', 'pessoa.id = tecnico_gestor.pessoa_id');
		}
		if ($params['join_titulacao']) {
			$this->db->join('historico_titulacao', 'tecnico_gestor.id = historico_titulacao.tecnico_gestor_id');
			$this->db->join('titulacao', 'historico_titulacao.titulacao_id = titulacao.id');
		}
		
		return $this->db->get('tecnico_gestor')->result();
	}
	
	function pesquisarPorId($id) {
		$this->db->where('id', $id);
		return $this->db->get('tecnico_gestor')->row();
	}
	
		
}
