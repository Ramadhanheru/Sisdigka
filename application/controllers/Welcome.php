<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_user();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('welcome_message',$data);
		$this->load->view('template/footer');
	}
	public function user(){
		 $data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_user();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('welcome_message',$data);
		$this->load->view('template/footer');
	}
	public function t_user(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('tambah_user');
		$this->load->view('template/footer');
	}
	public function tambah_user(){
		$this->form_validation->set_rules('nama','nama','required|trim');
		$this->form_validation->set_rules('user', 'User', 'required|trim|is_unique[user.user]', ['is_unique' => 'This username has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', ['min_length' => 'Kata sandi terlalu pendek!']);
		if( $this->form_validation->run()==false){
			$this->t_user();

		}else{

			
			 $data = [
			 	'nama' => htmlspecialchars($this->input->post('nama', true)),
                'user' => htmlspecialchars($this->input->post('user', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 2
            ];

				$proses = $this->Model_data->tambah_user($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome');
				
			

		}

	}
	public function hapus_user(){
		$id = $this->uri->segment(3);
		$data = $this->Model_data->hapus_user($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->index();
			
		}
	}

		public function edit_user(){
		$id = $this->uri->segment(3);
		$data = $this->Model_data->edit_user($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->index();
			
		}
	}
	public function edit_userr(){
		$id = $this->uri->segment(3);
		$data = $this->Model_data->edit_userr($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->index();
			
		}
	}
	public function e_user($id){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data ['query']= $this->Model_data->ambil_id_user($id);
		$this->form_validation->set_rules('nama','nama','required|trim');

        if($this->form_validation->run()==false){
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar' ,$data);
		$this->load->view('e_user',$data);
		$this->load->view('template/footer');

		}else{
			$this->Model_data->e_user($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome');
		}

	}

	public function e_profile($id){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data ['query']= $this->Model_data->ambil_id_user($id);

		$this->form_validation->set_rules('user','user','required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', ['min_length' => 'Kata sandi terlalu pendek!']);

        if($this->form_validation->run()==false){
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar' ,$data);
		$this->load->view('e_profile',$data);
		$this->load->view('template/footer');

		}else{
		
		$this->db->set('user', $this->input->post('user'));
		$this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
		$this->db->where('id_user', $id);
		$this->db->update('user');
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome');
		}
	}
}
