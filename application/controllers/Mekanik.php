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

		$this->session->set_userdata('id_kendaraan',$id_kendaraan);

		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$id = $this->session->userdata('id_user');

		$data['query'] = $this->Model_data->ambil_id_kendaraan($id_kendaraan);
		$data['kerusakan'] =$this->Model_data->tampil_kerusakan();
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('proses_diagnosa',$data);
		$this->load->view('template/footer');

}

public function mulai_diagnosa($id_kerusakan){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();
		$data['gejala'] =$this->Model_data->tampil_gejala_diagnosa($id_kerusakan);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('form_diagnosa',$data);
		$this->load->view('template/footer');

}

public function Diagnosa(){
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();

		$gejala = $this->input->post('kode_gejala');
		$jumlah_dipilih = count($gejala);
       for($x=0;$x<$jumlah_dipilih;$x++){

       	$this->db->distinct();
       $this->db->select('basis_pengetahuan.*,gejala.*,jenis_kerusakan.*,kerusakan.*');
		$this->db->from('basis_pengetahuan');
		$this->db->join('gejala','gejala.id_gejala = basis_pengetahuan.id_gejala');
		$this->db->join('jenis_kerusakan','jenis_kerusakan.id_jenis_kerusakan = basis_pengetahuan.id_jenis_kerusakan');
		$this->db->join('kerusakan','kerusakan.id_kerusakan = basis_pengetahuan.id_kerusakan');
		$this->db->where('gejala.kode_gejala',$gejala[$x]);
		$this->db->group_by('jenis_kerusakan.id_jenis_kerusakan');
		$this->db->limit('1');
		$query = $this->db->get();

		$data['jenis_kerusakan'] = $query;                 
		}

		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('hasil_diagnosa',$data);
		$this->load->view('template/footer');
}

	public function Hasil(){
		$id = $this->uri->segment(3);
		$data['user'] =  $this->db->get_where('user', ['user' => $this->session->userdata('user')])->row_array();

		$data['query'] = $this->Model_data->get_gejala($id);
		$data['jenis_kerusakan'] = $this->Model_data->get_jenis_kerusakan($id);

		$this->load->view('template/sidebar');
		$this->load->view('template/topbar',$data);
		$this->load->view('hasil',$data);
		$this->load->view('template/footer');
}

public function selesai_diagnosa(){
		$status = $this->session->userdata('id_kendaraan');
		$this->db->set('status','2');
		$this->db->where('id_kendaraan', $status);
		$this->db->update('kendaraan_masuk');

		$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('Mekanik');

}

}