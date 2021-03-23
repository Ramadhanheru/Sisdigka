<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mekanik extends CI_Controller {

public function index()
	{
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$id = $this->session->userdata('id_user');
		$data['query'] = $this->Model_data->tampil_kendaraan_role($id);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('diagnosa',$data);
		$this->load->view('template/footer');
	}

public function proses_diagnosa($id_kendaraan){
	$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$id = $this->session->userdata('id_user');
		$data['query'] = $this->Model_data->ambil_id_kendaraan($id_kendaraan);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('proses_diagnosa',$data);
		$this->load->view('template/footer');

}

}