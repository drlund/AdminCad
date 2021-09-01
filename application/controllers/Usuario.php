<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{

	// public function verificar_sessao()
	// {
	// 	if($this->session->userdata('logado')==false)
	// 	{
	// 		redirect('dashboard/login');
	// 	}
	// }

	public function index($indice = null)
	{
		//$this->verificar_sessao();
		

		$this->load->model('usuario_model', 'usuario');
		
		$data['usuario'] = $this->usuario->get_usuarios();
		$data['cidade_idCidade'] = $this->input->post('cidade');

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		if ($indice == 1) {
			$data['msg'] = "Usuário cadastrado com successo!";
			$this->load->view('includes/msg_sucesso', $data);
		} else if ($indice == 2) {
			$data['msg'] = "Não foi possível cadastrar o usuário!";
			$this->load->view('includes/msg_erro', $data);
		} else if ($indice == 3) {
			$data['msg'] = "Usuário excluído com successo!";
			$this->load->view('includes/msg_sucesso', $data);
		} else if ($indice == 4) {
			$data['msg'] = "Não foi possível excluir o usuário!";
			$this->load->view('includes/msg_erro', $data);
		} else if ($indice == 5) {
			$data['msg'] = "Usuário atualizado com successo!";
			$this->load->view('includes/msg_sucesso', $data);
		} else if ($indice == 6) {
			$data['msg'] = "Não foi possível atualizar o usuário!";
			$this->load->view('includes/msg_erro', $data);
		}

		$this->load->view('listar_usuario', $data);
		$this->load->view('includes/html_footer');
	}

	public function cadastro()
	{
		//$this->verificar_sessao();
		$data['cidade_idCidade'] = $this->input->post('cidade');
		$data['cidade'] = $this->db->get('cidade')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastrar_usuario', $data);
		$this->load->view('includes/html_footer');
	}

	public function cadastrar()
	{
		//$this->verificar_sessao();
		$this->load->model('usuario_model', 'usuario');

		$data['nome'] = $this->input->post('nome');
		$data['cpf'] = $this->input->post('cpf');
		$data['endereco'] = $this->input->post('endereco');
		$data['email'] = $this->input->post('email');
		$data['senha'] = md5($this->input->post('senha'));
		$data['status'] = $this->input->post('status');
		$data['nivel'] = $this->input->post('nivel');
		$data['cidade_idCidade'] = $this->input->post('cidade');
		$data['data_nascimento'] = implode('-', array_reverse(explode('/',$this->input->post('datanascimento'))));
		$data['observacoes'] = $this->input->post('observacoes');
		
		if($this->usuario->cadastrar($data)) {
			redirect('usuario/1');
		} else {
			redirect('usuario/2');
		}
	}

	public function excluir($id = null)
	{
		//$this->verificar_sessao();
		$this->db->where('idUsuario', $id);
		if ($this->db->delete('usuario')) {
			redirect('usuario/3');
		} else {
			redirect('usuario/4');
		}
	}

	public function atualizar($id = null, $indice = null)
	{

		//$this->verificar_sessao();
		$data['cidades'] = $this->db->get('cidade')->result();
		$this->db->where('idUsuario', $id);
		$data['usuario'] = $this->db->get('usuario')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		if ($indice == 1) {
			$data['msg'] = "Senha atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
		} else if ($indice == 2) {
			$data['msg'] = "Não foi possível atualizar a senha do usuário.";
			$this->load->view('includes/msg_erro', $data);
		}
		$this->load->view('editar_usuario', $data);
		$this->load->view('includes/html_footer');
	}

	public function salvar_atualizacao()
	{
		//$this->verificar_sessao();

		$id = $this->input->post('idUsuario');
		$data['nome'] = $this->input->post('nome');
		$data['cpf'] = $this->input->post('cpf');
		$data['endereco'] = $this->input->post('endereco');
		$data['email'] = $this->input->post('email');
		$data['status'] = $this->input->post('status');
		$data['nivel'] = $this->input->post('nivel');
		$data['cidade_idCidade'] = $this->input->post('cidade');
		$data['data_nascimento'] = implode('-', array_reverse(explode('/',$this->input->post('datanascimento'))));
		$data['observacoes'] = $this->input->post('observacoes');

		$this->load->model('usuario_model', 'usuario');

		if ($this->usuario->salvar_atualizacao($data,$id)) {
			redirect('usuario/5');
		} else {
			redirect('usuario/6');
		}
	}

	public function salvar_senha()
	{
		//$this->verificar_sessao();

		$id = $this->input->post('idUsuario');

		$this->load->model('usuario_model', 'usuario');
		$id = $this->input->post('idUsuario');

		$senha_antiga = md5($this->input->post('senha_antiga'));
		$senha_nova = md5($this->input->post('senha_nova'));

		if ($this->usuario->salvar_senha($id, $senha_antiga, $senha_nova)) 
		{
			redirect('usuario/atualizar/'.$id.'/1');
		}else{
			redirect('usuario/atualizar/'.$id.'/2');
		}
	}

	public function pesquisar()
	{
		//$this->verificar_sessao();

		$this->load->model('usuario_model', 'usuario');
		$data['usuario'] = $this->usuario->get_usuarios_like();	

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_usuario', $data);
		$this->load->view('includes/html_footer');
	}

	public function salvar_observacao()
	{
		//$this->verificar_sessao();

		$data['observacoes'] = $this->input->post('observacoes');

		$this->load->model('usuario_model', 'comentarios');

		if($this->comentarios->salvar_observacao($data))
		{
			redirect ('usuario');
		}

	}

	// //Código da paginação:
	// public function pagina($valor = null)
	// {
	// 	if ($valor == null) {
	// 		$valor = 1;
	// 	}
	// 	$reg_por_pagina = 10;
		
	// 	if ($valor <= $reg_por_pagina) {
	// 		$data['btnAnterior'] = 'pointer-events: none';
	// 	}else {
	// 		$data['btnAnterior'] = '';
	// 	}

	// 	$this->load->model('usuario_model', 'usuario');
	// 	$u['usuario'] = $this->usuario->get_qtd_usuarios();

	// 	if (($u[0]->total - $valor) < $reg_por_pagina) {
	// 		$data['btnProximo'] = 'pointer-events: none';
	// 	}else {
	// 		$data['btnProximo'] = '';
	// 	}

	// 	//$this->load->model('usuario_model', 'usuario');
	// 	$data['usuario'] = $this->usuario->get_usuarios_pagina($reg_por_pagina, $valor);
		
	// 	$data['valor'] = $valor;
	// 	$data['reg_por_pagina'] = $reg_por_pagina;
	// 	$data['qtd_reg'] = $u[0]->total;

	// 	$valor_inteiro = (int)$u[0]->total/$reg_por_pagina;
	// 	$valor_resto = $u[0]->total % $reg_por_pagina;

	// 	if ($valor_resto > 0) {
	// 		$valor_resto += 1;
	// 	}

	// 	$data['qtd_botoes'] = $valor_inteiro;

	// 	$this->load->view('includes/html_header');
	// 	$this->load->view('includes/menu');
	// 	$this->load->view('listar_usuario', $data);
	// 	$this->load->view('includes/html_footer');
	// }

	// public function pagina()
	// {
	// 	$this->verificar_sessao();
	// 	$this->load->library('pagination');

	// 	$this->load->model('usuario_model', 'usuario');
	// 	$data['usuario'] = $this->usuario->get_usuarios();

	// 	$config = array(
	// 		"base_url" => base_url('usuario/pagina'),
	// 		"per_page" => 2,
	// 		"num_links"=> 3,
	// 		"uri_segment"=> 3,
	// 		"total_rows" => $this->usuario->CountAll(),
	// 		"full_tag_open" => "<ul class='pagination'>",
	// 		"full_tag_close" => "</ul>",
	// 		"first_link" => FALSE,
	// 		"last_link" => FALSE,
	// 		"first_tag_open" => "<li>",
	// 		"first_tag_close" => "</li>",
	// 		"prev_link" => "Anterior",
	// 		"prev_tag_open" => "<li class='prev'>",
	// 		"prev_tag_close" => "</li>",
	// 		"next_link" => "Próximo",
	// 		"next_tag_open" => "<li class='next'>",
	// 		"next_tag_close" => "</li>",
	// 		"last_tag_open" => "<li>",
	// 		"last_tag_close" => "</li>",
	// 		"cur_tag_open" => "<li class='active'><a href='#'>",
	// 		"cur_tag_close" => "</a></li>",
	// 		"num_tag_open" => "<li>",
	// 		"num_tag_close" => "</li>"
	// 	);

	// 	$this->pagination->initialize($config);

	// 	$data['pagination'] = $this->pagination->create_links();

	// 	$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// 	$data['usuario'] = $this->usuario->GetAll('nome', 'asc', $config['per_page'],$offset);

	// 	$this->load->view('includes/html_header');
	// 	$this->load->view('includes/menu');
	// 	$this->load->view('listar_usuario', $data);
	// 	$this->load->view('includes/html_footer');
	// }

}
