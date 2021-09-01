<?php


class Usuario_model extends CI_Model {

	// var $table = "usuario";

    function __construct() {
        parent::__construct();
    }

	// public function logarUsuario($email, $senha){
	// 	$this->db->where("email", $email);
	// 	$this->db->where("senha", $senha);
	// 	$usuario = $this->db->get("usuario")->row_array();
	// 	return $usuario;
	// }

	public function cadastrar($data)
	{
		$this->db->select('*');
		$this->db->join('cidade','cidade_idCidade = idCidade', 'inner');
		return $this->db->insert('usuario', $data);
	}
    

	public function salvar_atualizacao($data,$id)
	{
		$this->db->where('idUsuario', $id);
		return $this->db->update('usuario', $data);
	}

    public function salvar_senha($id, $senha_antiga, $senha_nova)
	{

		$this->db->select('senha');
		$this->db->where('idUsuario', $id);
		$data['senha'] = $this->db->get('usuario')->result();
		$dados['senha'] = $senha_nova;


		if ($data['senha'][0]->senha==$senha_antiga) 
		{
			$this->db->where('idUsuario', $id);
			$this->db->update('usuario', $dados);
			return true;
		}else{
			return false;
		}
	}

	public function get_usuarios()
	{
		$this->db->select('*');
		$this->db->join('cidade','cidade_idCidade = idCidade', 'inner');
		return $this->db->get('usuario')->result();
	}

	public function get_usuarios_like()
	{
		$termo = $this->input->post('pesquisar');
		$this->db->select('*');
		$this->db->like('nome',$termo);
		$this->db->join('cidade','cidade_idCidade = idCidade', 'inner');
		return $this->db->get('usuario')->result();
	}

	function get_cidades()
	{
		$this->db->select('*');
		return $this->db->get('cidade')->result();
	}

	function get_qtd_usuarios()
	{
		$this->db->select('count(*) as total');
		return $this->db->get('usuario')->result();
	}

	public function get_usuarios_pagina($valor, $reg_por_pagina)
	{
		$this->db->select('*');
		$this->db->limit($reg_por_pagina, $valor);
		$this->db->join('cidade','cidade_idCidade = idCidade', 'inner');
		return $this->db->get('usuario')->result();
	}

	public function salvar_observacao($data)
	{
		return $this->db->insert('comentarios', $data);
	}

}