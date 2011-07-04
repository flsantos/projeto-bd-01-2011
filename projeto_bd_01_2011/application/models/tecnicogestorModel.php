<?php	

class TecnicoGestorModel extends CI_Model {
	
	function inserir ($dados) {
		/*
		if ($this->input->post('id')) {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tecnico_gestor', $dados);
			return $dados['id'];
		}
		else {
			return $this->db->insert('tecnico_gestor', $dados);
		}
		*/
		if ($this->input->post('id')) {
			$query = "UPDATE tecnico_gestor SET id = ".$dados['id'].", perfil = ".$dados['perfil'].", site = '".$dados['site']."', blog = '".$dados['blog']."', twitter = '".$dados['twitter']."', end_institucional = '".$dados['end_institucional']."',  cv_lattes = '".$dados['cv_lattes']."', graduacao = '".$dados['graduacao']."', data_admissao = '".$dados['data_admissao']."', data_saida = '".$dados['data_saida']."', pessoa_id = ".$dados['pessoa_id']." WHERE tecnico_gestor.id = ".$dados['id'].";";
			$this->db->query($query);
			return $dados['id'];
		}
		else {
			$query = "INSERT INTO tecnico_gestor
					 (id, perfil, site, blog, twitter, end_institucional, cv_lattes, graduacao, data_admissao, data_saida, pessoa_id)
					  VALUES
					 (NULL, ".$dados['perfil'].", '".$dados['site']."', '".$dados['blog']."', '".$dados['twitter']."', '".$dados['end_institucional']."', '".$dados['cv_lattes']."', '".$dados['graduacao']."', '".$dados['data_admissao']."', '".$dados['data_saida']."', ".$dados['pessoa_id'].");";
			return $this->db->query($query);
		}
	}
	
	function excluir ($id) {
		/*$this->db->where('id', $id);
		if ($this->db->delete('tecnico_gestor'))
			return true;
		else
			return false;*/
		
		$query = "DELETE FROM tecnico_gestor where id =".$id;
		if ($this->db->query($query))
			return true;
		else
			return false;
		
		
	}
	
	function listar () {
		//$this->db->select(' pessoa.*, tecnico_gestor.* ');
		//$this->db->join('pessoa', 'pessoa.id = tecnico_gestor.pessoa_id');
		//return $this->db->get('tecnico_gestor')->result();
		
		$query = "select pessoa.*, tecnico_gestor.* FROM
				  pessoa JOIN tecnico_gestor ON
				  tecnico_gestor.pessoa_id = pessoa.id";
		return $this->db->query($query)->result();
		
	}
	
	function pesquisar($params) {
		/*
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
		*/

		$query = "SELECT * FROM tecnico_gestor ";
		if ($params['join_telefone']) {
			$query = $query." JOIN telefone ON tecnico_gestor.id = telefone.tecnico_gestor_id ";
		}
		if ($params['join_email']) {
			$query = $query." JOIN email ON tecnico_gestor.id = email.tecnico_gestor_id ";
		}
		if ($params['join_pessoa']) {
			$query = $query." JOIN pessoa ON tecnico_gestor.pessoa_id = pessoa.id ";
		}
		if ($params['join_titulacao']) {
			$query = $query." JOIN historico_titulacao ON tecnico_gestor.id = historico_titulacao.tecnico_gestor_id
							  JOIN titulacao ON historico_titulacao.titulacao_id = titulacao.id ";
		}
		if ($params['id']) {
			$query = $query." WHERE tecnico_gestor.id = ".$params['id'];
		}
		
		return $this->db->query($query)->result();
	}
	
	function pesquisarPorId($id) {
		//$this->db->where('id', $id);
		//return $this->db->get('tecnico_gestor')->row();
		
		$query = "SELECT * FROM tecnico_gestor WHERE id = ".$id;
		return $this->db->query($query)->row();
	}
	
		
}
