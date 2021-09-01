<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();

	// 	$logado = $this->session->userdata("logado");

	// 	if ($logado != 1) {
	// 		redirect('dashboard/login');
	// 	}

	// }

	// public function verificar_sessao()
	// {
	// 	if($this->session->userdata('logado')==false)
	// 	{
	// 		//redirect('dashboard/login');
	// 		redirect('dashboard');
	// 	}
	// }

	public function index()
	{
		//$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('dashboard');
		$this->load->view('includes/html_footer');
	}

	// public function login()
	// {
	// 	$this->load->view('includes/html_header');
	// 	$this->load->view('login');
	// 	$this->load->view('includes/html_footer');
	// }

	// public function _logar()
	// {
	// 	$this->load->model('usuario_model', 'usuario');
	// 	$email = $this->input->post('email');
	// 	$senha = md5($this->input->post('senha'));
	// 	$usuario = $this->usuario_model->logarUsuario($email, $senha);

	// 	if('usuario'){
	// 		$this->session->set_userdata("usuario_logado", 'usuario');
	// 		$this->session->set_flashdata("success","Logado com sucesso!");
	// 	}else{
	// 		$this->session->set_flashdata("danger","Usuario ou senha inválidos!");
	// 	}

	// 	redirect('dashboard');
	// }


	// public function logar()
	// {
	// 	$this->verificar_sessao();
	// 	$email = $this->input->post('email');
	// 	$senha = md5($this->input->post('senha'));

	// 	$this->db->where('email', $email);
	// 	$this->db->where('senha', $senha);
	// 	$this->db->where('status', 1);

	// 	$data['usuario'] = $this->db->get('usuario')->result();

	// 	if (count($data['usuario'])==1) 
	// 	{
	// 		$dados['nome'] = $data['usuario'][0]->nome;
	// 		$dados['id'] = $data['usuario'][0]->idUsuario;
	// 		$dados['logado'] = true;

	// 		$this->session->set_userdata($dados);

	// 		//redirect('dashboard');
	// 		header("Location: dashboard.php");
	// 	}else {
	// 		redirect('dashboard/login');
	// 	}
	// }

	public function logout()
	{
		$this->session->session_destroy();
		redirect('dashboard');
	}
}
