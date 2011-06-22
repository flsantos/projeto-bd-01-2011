<?php

class TecnicoGestorModel extends CI_Model {
	
	function inserir ($dados) {
	}
	
	function excluir ($id) {
	}
	
	function pesquisar($params) {
		$this->db->select('pessoa.nome as pessoa_nome, email.*, telefone.*, historico_titulacao.*, titulacao.*');
		$this->db->distinct();
		$this->db->join('pessoa', 'pessoa.id = tecnico_gestor.pessoa_id');
		$this->db->join('email', 'tecnico_gestor.id = email.tecnico_gestor_id');
		$this->db->join('telefone', 'tecnico_gestor.id = telefone.tecnico_gestor_id');
		$this->db->join('historico_titulacao', 'tecnico_gestor.id = historico_titulacao.tecnico_gestor_id');
		$this->db->join('titulacao', 'historico_titulacao.titulacao_id = titulacao.id');
		
		if ($params['id']) {
			$this->db->where('id', $params['id']);
		}
		
		return $this->db->get('tecnico_gestor')->result();
	}
	
		
}
