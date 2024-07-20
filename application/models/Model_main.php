<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function viewId($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
        return $query->row_array();
	}
	public function insert($table,$info)
	{
		$result = $this->db->insert($table, $info);
		return $this->db->insert_id();
	}
	public function update($table,$info,$id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table, $info);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'chỉnh sửa nội dung thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được chỉnh sửa vào cơ sở dữ liệu vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
	public function delete($table,$id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete($table);
		if($result){
				$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa nội dung thành công!',);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
			}
			$this->session->set_flashdata($dataresult);
	}
	public function delete_posts($table,$id_posts)
	{
		$this->db->where('id_posts', $id_posts);
		$result = $this->db->delete($table);
	}

}

/* End of file Model_backend.php */
/* Location: ./application/models/Model_backend.php */