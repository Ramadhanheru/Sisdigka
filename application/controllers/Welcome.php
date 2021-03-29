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

	public function __construct()
	{
		parent::__construct();

			if($this->session->userdata('role')!= '1')
				redirect ('login');
	}

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


	public function kendaraan_masuk(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_kendaraan();

		$this->load->view('template/sidebar');
		$this->load->view('template/topbar' ,$data);
		$this->load->view('kendaraan',$data);
		$this->load->view('template/footer');
	}

	public function tambah_kendaraan(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_user_2();

		$this->load->view('template/sidebar');
		$this->load->view('template/topbar' ,$data);
		$this->load->view('tambah_kendaraan',$data);
		$this->load->view('template/footer');

	}
	public function t_kendaraan(){

		$this->form_validation->set_rules('mekanik','mekanik','required|trim');
		$this->form_validation->set_rules('nama_stnk','nama_stnk','required|trim');
		$this->form_validation->set_rules('nama_pembawa','nama_pembawa','required|trim');
		$this->form_validation->set_rules('tanggal','tanggal','required|trim');
		$this->form_validation->set_rules('alamat','alamat','required|trim');
		$this->form_validation->set_rules('no_hp','no_hp','required|trim');
		$this->form_validation->set_rules('no_polisi','no_polisi','required|trim');
		$this->form_validation->set_rules('no_mesin','no_mesin','required|trim');
		$this->form_validation->set_rules('tipe','tipe','required|trim');
		$this->form_validation->set_rules('km','km','required|trim');

		if( $this->form_validation->run()==false){
			$this->tambah_kendaraan();

		}else{

			
			 $data = [
			 	'id_user' => $this->input->post('mekanik', true),
                'nama_stnk' => $this->input->post('nama_stnk', true),
                'nama_pembawa' => $this->input->post('nama_pembawa', true),
                'tanggal' => $this->input->post('tanggal', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'no_polisi' => $this->input->post('no_polisi', true),
                'no_mesin' => $this->input->post('no_mesin', true),
                'tipe' => $this->input->post('tipe', true),
                'km' => $this->input->post('km', true),
                'status' => 0
            ];

				$proses = $this->Model_data->tambah_kendaraan($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/kendaraan_masuk');
				
			

		}
	}

	public function edit_kendaraan($id){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->ambil_id_kendaraan($id);
		$data['q'] = $this->Model_data->tampil_user_2();
		$this->form_validation->set_rules('mekanik','mekanik','required|trim');
		$this->form_validation->set_rules('nama_stnk','nama_stnk','required|trim');
		$this->form_validation->set_rules('nama_pembawa','nama_pembawa','required|trim');
		$this->form_validation->set_rules('tanggal','tanggal','required|trim');
		$this->form_validation->set_rules('alamat','alamat','required|trim');
		$this->form_validation->set_rules('no_hp','no_hp','required|trim');
		$this->form_validation->set_rules('no_polisi','no_polisi','required|trim');
		$this->form_validation->set_rules('no_mesin','no_mesin','required|trim');
		$this->form_validation->set_rules('tipe','tipe','required|trim');
		$this->form_validation->set_rules('km','km','required|trim');

		 if($this->form_validation->run()==false){
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar' ,$data);
		$this->load->view('e_kendaraan',$data);
		$this->load->view('template/footer');

		}else{
		
		$proses = $this->Model_data->edit_kendaraan($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome/kendaraan_masuk');
		}
	}

	public function hapus_kendaraan($id){
		$id = $this->uri->segment(3);
		$data = $this->Model_data->hapus_kendaraan($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome/kendaraan_masuk'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->index();
			
		}
	}

	public function kerusakan(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_kerusakan();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('kerusakan',$data);
		$this->load->view('template/footer');
	}
	public function tambah_kerusakan(){
		$this->form_validation->set_rules('kerusakan','kerusakan','required|trim');
		if( $this->form_validation->run()==false){
			$this->kerusakan();
		}else{			
			 $data = [
			 	'kerusakan' => $this->input->post('kerusakan', true)
            ];
				$proses = $this->Model_data->tambah_kerusakan($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/kerusakan');						
		}
	}
	public function edit_kerusakan(){
		$id = $this->input->post('id_kerusakan');
		$this->form_validation->set_rules('kerusakan','kerusakan','required|trim');
		if( $this->form_validation->run()==false){
			$this->kerusakan();
		}else{
			$proses = $this->Model_data->edit_kerusakan($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome/kerusakan');
		}
	}
	public function hapus_kerusakan(){
		$id = $this->input->post('id_kerusakan');
		$data = $this->Model_data->hapus_kerusakan($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome/kerusakan'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->kerusakan();
		}
	}


	public function jenis_kerusakan(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_jenis_kerusakan();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('jenis_kerusakan',$data);
		$this->load->view('template/footer');
	}
	public function tambah_jenis_kerusakan(){
		$this->form_validation->set_rules('kode_kerusakan','kode_kerusakan','required|trim');
		$this->form_validation->set_rules('jenis_kerusakan','jenis_kerusakan','required|trim');
		$this->form_validation->set_rules('solusi','solusi','required|trim');
		if( $this->form_validation->run()==false){
			$this->jenis_kerusakan();
		}else{			
			 $data = [
			 	'kode_kerusakan' => $this->input->post('kode_kerusakan', true),
			 	'jenis_kerusakan' => $this->input->post('jenis_kerusakan', true),
			 	'solusi' => $this->input->post('solusi', true)
            ];
				$proses = $this->Model_data->tambah_jenis_kerusakan($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/jenis_kerusakan');						
		}
	}
	public function edit_jenis_kerusakan(){
		$id = $this->input->post('id_jenis_kerusakan');
		$this->form_validation->set_rules('kode_kerusakan','kode_kerusakan','required|trim');
		$this->form_validation->set_rules('jenis_kerusakan','jenis_kerusakan','required|trim');
		$this->form_validation->set_rules('solusi','solusi','required|trim');
		if( $this->form_validation->run()==false){
			$this->jenis_kerusakan();
		}else{
			$proses = $this->Model_data->edit_jenis_kerusakan($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome/jenis_kerusakan');
		}
	}
	public function hapus_jenis_kerusakan(){
		$id = $this->input->post('id_jenis_kerusakan');
		$data = $this->Model_data->hapus_jenis_kerusakan($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome/jenis_kerusakan'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->jenis_kerusakan();
		}
	}



	public function gejala(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_gejala();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('gejala',$data);
		$this->load->view('template/footer');
	}
	public function tambah_gejala(){
		$this->form_validation->set_rules('kode_gejala','kode_gejala','required|trim');
		$this->form_validation->set_rules('gejala','gejala','required|trim');
		if( $this->form_validation->run()==false){
			$this->gejala();
		}else{			
			 $data = [
			 	'kode_gejala' => $this->input->post('kode_gejala', true),
			 	'gejala' => $this->input->post('gejala', true)
            ];
				$proses = $this->Model_data->tambah_gejala($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/gejala');						
		}
	}
	public function edit_gejala(){
		$id = $this->input->post('id_gejala');
		$this->form_validation->set_rules('kode_gejala','kode_gejala','required|trim');
		$this->form_validation->set_rules('gejala','gejala','required|trim');
		if( $this->form_validation->run()==false){
			$this->gejala();
		}else{
			$proses = $this->Model_data->edit_gejala($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome/gejala');
		}
	}
	public function hapus_gejala(){
		$id = $this->input->post('id_gejala');
		$data = $this->Model_data->hapus_gejala($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome/gejala'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->gejala();
		}
	}

	public function basis_pengetahuan(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->tampil_basis_pengetahuan();
		$data['query2'] = $this->Model_data->tampil_kerusakan();
		$data['query3'] = $this->Model_data->tampil_jenis_kerusakan();
		$data['query4'] = $this->Model_data->tampil_gejala();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('basis_pengetahuan',$data);
		$this->load->view('template/footer');
	}

	public function tambah_basis_pengetahuan(){
		$this->form_validation->set_rules('id_kerusakan','id_kerusakan','required|trim');
		$this->form_validation->set_rules('id_jenis_kerusakan','id_jenis_kerusakan','required|trim');
		$this->form_validation->set_rules('id_gejala','id_gejala','required|trim');
		if( $this->form_validation->run()==false){
			$this->gejala();
		}else{			
			 $data = [
			 	'id_kerusakan' => $this->input->post('id_kerusakan', true),
			 	'id_jenis_kerusakan' => $this->input->post('id_jenis_kerusakan', true),
			 	'id_gejala' => $this->input->post('id_gejala',true)
            ];
				$proses = $this->Model_data->tambah_basis_pengetahuan($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/basis_pengetahuan');						
		}
	}
	public function edit_basis_pengetahuan(){
		$id = $this->input->post('id');
		$this->form_validation->set_rules('id_kerusakan','id_kerusakan','required|trim');
		$this->form_validation->set_rules('id_jenis_kerusakan','id_jenis_kerusakan','required|trim');
		$this->form_validation->set_rules('id_gejala','id_gejala','required|trim');
		if( $this->form_validation->run()==false){
			$this->basis_pengetahuan();
		}else{
			$proses = $this->Model_data->edit_basis_pengetahuan($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome/basis_pengetahuan');
		}
	}
	public function hapus_basis_pengetahuan(){
		$id = $this->input->post('id');
		$data = $this->Model_data->hapus_basis_pengetahuan($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome/basis_pengetahuan'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->basis_pengetahuan();
		}
	}
}
