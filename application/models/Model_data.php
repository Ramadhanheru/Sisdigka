<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model
{

	
	// public function pdf_laporan_pegawai($id)
	// {

	// 	$this->db->select('laporan.*, pegawai.id_pegawai as id_pegawai, pegawai.nip as nip, pegawai.nama as nama,
	// 		pegawai.gol as gol,pegawai.jabatan as jabatan,');
	// 	$this->db->from('laporan');
	// 	$this->db->join('pegawai','pegawai.id_pegawai = laporan.id_pegawai');
	// 	$this->db->where('id', $id);
	// 	return $this->db->get()->row_array();
	// }
	// //
	// public function tampil_laporan_pegawai($id_pegawai)
	// {

	// 	$this->db->select('laporan.*, pegawai.nip as nip, pegawai.nama as nama,
	// 		pegawai.gol as gol,pegawai.jabatan as jabatan,');
	// 	$this->db->from('laporan');
	// 	$this->db->join('pegawai','pegawai.id_pegawai = laporan.id_pegawai');
	// 	$this->db->where('laporan.id_pegawai', $id_pegawai);
	// 	$this->db->order_by('id', 'DESC');
	// 	return $this->db->get();
	// }
	// //
	// public function tampil_laporan()
	// {

	// 	$this->db->select('laporan.*, pegawai.id_pegawai as id_pegawai, pegawai.nip as nip, pegawai.nama as nama,
	// 		pegawai.gol as gol,pegawai.jabatan as jabatan,');
	// 	$this->db->from('laporan');
	// 	$this->db->join('pegawai','pegawai.id_pegawai = laporan.id_pegawai');
	// 	$this->db->order_by('id', 'DESC');
	// 	return $this->db->get();
	// }
	// public function tambah_laporan($data)
	// {
	// 	$this->db->insert('laporan', $data);

	// }
	// public function edit_laporan($id)
	// {
	// 	$data = [
	// 		'id_pegawai' => $this->input->post('id_pegawai', true),
	// 						  'k1' => $this->input->post('k1', true),
	// 						  'k2' => $this->input->post('k2', true),
	// 						  'k3' => $this->input->post('k3', true),
	// 						  'k4' => $this->input->post('k4', true),
	// 						  'k5' => $this->input->post('k5', true),
	// 						  'k6' => $this->input->post('k6', true),
	// 						  'k7' => $this->input->post('k7', true),
	// 						  'k8' => $this->input->post('k8', true),
	// 						  'k9' => $this->input->post('k9', true),
	// 						  'k10' => $this->input->post('k10', true),
	// 						  'k11' => $this->input->post('k11', true),
	// 						  'k12' => $this->input->post('k12', true),
	// 						  'k13' => $this->input->post('k13', true),
	// 						  'k14' => $this->input->post('k14', true), 
	// 				  		  'tanggal' => $this->input->post('tanggal', true),
	// 				  		  'waktu1' => $this->input->post('waktu1', true),
	// 				  	      'waktu2' => $this->input->post('waktu2', true),
	// 				  		  'tempat' => $this->input->post('tempat', true),
	// 				  		  'uraian' => $this->input->post('uraian', true),
	// 				  		  'hasil' => $this->input->post('hasil', true)
	// 	];
		
	// 	$this->db->where('id', $id);
	// 	$this->db->update('laporan', $data);
	// }
	// public function edit_laporan1($id)
	// {
	// 	$data = [
	// 		'id_pegawai' => $this->input->post('id_pegawai', true),
	// 						  'k1' => $this->input->post('k1', true),
	// 						  'k2' => $this->input->post('k2', true),
	// 						  'k3' => $this->input->post('k3', true),
	// 						  'k4' => $this->input->post('k4', true),
	// 						  'k5' => $this->input->post('k5', true),
	// 						  'k6' => $this->input->post('k6', true),
	// 						  'k7' => $this->input->post('k7', true),
	// 						  'k8' => $this->input->post('k8', true),
	// 						  'k9' => $this->input->post('k9', true),
	// 						  'k10' => $this->input->post('k10', true),
	// 						  'k11' => $this->input->post('k11', true),
	// 						  'k12' => $this->input->post('k12', true),
	// 						  'k13' => $this->input->post('k13', true),
	// 						  'k14' => $this->input->post('k14', true), 
	// 				  		  'tanggal' => $this->input->post('tanggal', true),
	// 				  		  'waktu1' => $this->input->post('waktu1', true),
	// 				  	      'waktu2' => $this->input->post('waktu2', true),
	// 				  		  'tempat' => $this->input->post('tempat', true),
	// 				  		  'uraian' => $this->input->post('uraian', true),
	// 				  		  'hasil' => $this->input->post('hasil', true),
	// 				  		  'gambar1' => $this->upload1(),
	// 				  		  'gambar2' => $this->upload2(),
	// 				  		  'gambar3' => $this->upload3()
	// 	];
		
	// 	$this->db->where('id', $id);
	// 	$this->db->update('laporan', $data);
	// }
	// 	public function ambil_id_laporan($id){
	// 	$this->db->select('laporan.*, pegawai.id_pegawai as id_pegawai, pegawai.nip as nip, pegawai.nama as nama,
	// 		pegawai.gol as gol,pegawai.jabatan as jabatan,');
	// 	$this->db->from('laporan');
	// 	$this->db->join('pegawai','pegawai.id_pegawai = laporan.id_pegawai');
	// 	$this->db->where('id', $id);
	// 	 $query = $this->db->get()->row_array();
	// 	 return $query;
	// }
	// public function hapus_laporan($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$query = $this->db->delete('laporan');

	// }

	// //
	// public function tampil_pegawai()
	// {

	// 	 $this->db->where_not_in('nama', 'adminn');
	// 	$query = $this->db->get('pegawai');

	// 	return $query;
	// }
	// public function tambah_pegawai($data)
	// {
	// 	$this->db->insert('pegawai', $data);

	// }
	// public function edit_pegawai($id)
	// {
	// 	$data = [
	// 		'nama' => $this->input->post('nama', true), 
	// 		'nip' => $this->input->post('nip', true),
	// 		'gol' => $this->input->post('gol', true),
	// 		'jabatan' => $this->input->post('jabatan', true),
	// 		'jenis' => $this->input->post('jenis_jabatan', true)


	// 	];
		
	// 	$this->db->where('id_pegawai', $id);
	// 	$this->db->update('pegawai', $data);
	// }
	// 	public function ambil_id_pegawai($id){
	// 	return $this->db->get_where('pegawai',['id_pegawai'=> $id])->row_array();
	// }

	// public function hapus_pegawai($id)
	// {
	// 	$this->db->where('id_pegawai', $id);
	// 	$query = $this->db->delete('pegawai');

	// }
	//
////////////////////////////////////////////////////////////


	//

	public function login($user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user', $user);
		return $this->db->get()->row_array();
		
		
	}
	
	public function tampil_user()
	{

		$query = $this->db->get('user');

		return $query;
	}
	
	public function tambah_user($data)
	{
		$this->db->insert('user', $data);

	}
	public function edit_user($id)
	{
		$data = [
			
			"role" => 0
		];
		
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
	public function edit_userr($id)
	{
		$data = [
			
			"role" => 2
		];
		
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
	public function e_user($id)
	{
		$data = [
			'nama' => $this->input->post('nama', true)
					];
		
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
		public function ambil_id_user($id){
		return $this->db->get_where('user',['id_user'=> $id])->row_array();
	}
	public function hapus_user($id)
	{
		$this->db->where('id_user', $id);
		$query = $this->db->delete('user');

	}

}