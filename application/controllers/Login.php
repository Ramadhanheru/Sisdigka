<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	public function loginn(){
		//login admin
			$this->form_validation->set_rules('user','user','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			if($this->form_validation->run()==false){
				$this->index();
			
			}else{

				$userr = $this->input->post('user');
				$password = $this->input->post('password');
				
				$user = $this->Model_data->login($userr);
				//jika data benar
				if($user['role'] == '1'){
					if (password_verify($password, $user['password'])) {
                   
                   $this->session->set_userdata(array('user'=>$userr,'password'=>$password,'role' => $user['role']));
					$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert">Welcome '.$userr.' ! </div>');
					redirect('Welcome/');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Salah Password!</div>');
                   $this->index();
                }
					
				}else if($user['role'] == '2'){
					if (password_verify($password, $user['password'])) {
                   
                   $this->session->set_userdata(array('user'=>$userr,'password'=>$password,'role' => $user['role']));
					$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert">Welcome '.$userr.' ! </div>');
					redirect('Welcome/');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Salah Password!</div>');
                   $this->index();
                }
					
				}else {
					$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"> Anda belum terdaftar ! </div>');
					$this->index();
				}
				

			}
	}
	public function logout(){
		unset($role);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message','<div class ="alert alert-warning" roles="alert"> Log out berhasil </div>');
		 $this->index();
	}
}