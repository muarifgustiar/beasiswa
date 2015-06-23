<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kandidat_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

		$this->db->select('id_siswa, id_beasiswa, nama_lengkap, jenis_rek, nama_preferensi, nama_kanwil, status');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->join('provinsi pv', 'pv.id_provinsi = kandidat.id_provinsi');
		$this->db->join('preferensi pf', 'pf.id_preferensi = kandidat.id_preferensi');
		$this->db->like('nama_lengkap', $search,'both');
		$this->db->or_like('nama_preferensi', $search,'both');
		
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('kandidat');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	
	function add($post){
		if($post['id_preferensi']== ''){
			$pref = array(
					'nama_preferensi'	=>	$post['nama_preferensi'],
					'nama_lembaga'	=>	$post['nama_lembaga'],
					'alamat_preferensi'	=>	$post['alamat_preferensi'],
					'jabatan'	=>	$post['jabatan'],
					'telepon_preferensi'	=>	$post['telepon_preferensi'],
					'email_preferensi'	=>	$post['email_preferensi'],
				);
			$post['id_preferensi'] = $this->insert_preferensi($pref);
		}

		unset($post['nama_preferensi']);
		unset($post['nama_lembaga']);
		unset($post['alamat_preferensi']);
		unset($post['jabatan']);
		unset($post['telepon_preferensi']);
		unset($post['email_preferensi']);

		$result = $this->db->insert('kandidat', $post); 
		return $result;
	}
	

	function get_provinsi(){
		$query = $this->db->query('SELECT * FROM provinsi');
			
		$rq = $query->result_array();
		$result =array();
		foreach($rq as $value){
			$result[$value['id_provinsi']] = $value['nama_provinsi'];
		}
		return $result;
	}

	function get_kanwil(){
		$query = $this->db->query('SELECT * FROM kanwil');
			
		$rq = $query->result_array();
		$result =array();
		foreach($rq as $value){
			$result[$value['id_kanwil']] = $value['nama_kanwil'];
		}
		return $result;
	}

	function get_kelas(){
		$kelas = $this->db->query('SELECT *, kelas.label as labels FROM kelas JOIN tingkatan ON kelas.id_tingkat = tingkatan.id_tingkatan');
		$kelasr = $kelas->result_array();

		$result =array();
		$i = 0;
		foreach($kelasr as $value){

			$result[$value['tingkatan']][$i]['id_kelas'] = $value['id_kelas'];
			$result[$value['tingkatan']][$i]['label'] = $value['labels'];
			$i++;
		}
		
		return $result;
	}

	function get_kandidat_data($id){
		$query = $this->db->query('SELECT *,kelas.label as labelk,tingkatan.label as labelt FROM kandidat JOIN preferensi ON kandidat.id_preferensi = preferensi.id_preferensi JOIN provinsi ON kandidat.id_provinsi = provinsi.id_provinsi JOIN kanwil ON kandidat.id_kanwil = kanwil.id_kanwil JOIN kelas ON kelas.id_kelas = kandidat.id_kelas JOIN tingkatan ON tingkatan.id_tingkatan = kelas.id_tingkat WHERE id_siswa = '.$id);
			
		return $query->result_array();
	}
	function update($post,$id){
		if($post['id_preferensi']== ''){
			$pref = array(
					'nama_preferensi'	=>	$post['nama_preferensi'],
					'nama_lembaga'	=>	$post['nama_lembaga'],
					'alamat_preferensi'	=>	$post['alamat_preferensi'],
					'jabatan'	=>	$post['jabatan'],
					'telepon_preferensi'	=>	$post['telepon_preferensi'],
					'email_preferensi'	=>	$post['email_preferensi'],
				);
			$post['id_preferensi'] = $this->insert_preferensi($pref);
		}else{
			$pref = array(
					'nama_preferensi'	=>	$post['nama_preferensi'],
					'nama_lembaga'	=>	$post['nama_lembaga'],
					'alamat_preferensi'	=>	$post['alamat_preferensi'],
					'jabatan'	=>	$post['jabatan'],
					'telepon_preferensi'	=>	$post['telepon_preferensi'],
					'email_preferensi'	=>	$post['email_preferensi'],
				);
			$re = $this->update_preferensi($pref,$post['id_preferensi']);
			if(!$re){
				$this->session->set_flashdata('warning', '<div class="alert alert-warning" role="alert">Gagal Update Pereferensi</div>');
			}
		}

		unset($post['nama_preferensi']);
		unset($post['nama_lembaga']);
		unset($post['alamat_preferensi']);
		unset($post['jabatan']);
		unset($post['telepon_preferensi']);
		unset($post['email_preferensi']);


		$this->db->where('id_siswa', $id);
		$result = $this->db->update('kandidat', $post); 
		return $result;
	}

	function insert_preferensi($pref){
		$this->db->insert('preferensi', $pref); 
		return $this->db->insert_id();
	}

	function update_preferensi($pref,$id){
		$this->db->where('id_preferensi', $id);
		$a = $this->db->update('preferensi', $pref); 
		return $a;
	}

	function delete($id){
		$result = $this->db->delete('kandidat', array('id_siswa' => $id)); 
		return $result;
	}
}