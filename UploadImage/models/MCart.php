<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class MCart extends CI_model {

	public function __construct()
	{
		$this->load->database();
	}
	
	function post_data($table,$postdata) {

		$data=$this->db->insert($table,$postdata);
		if ($data) {
			return true;
		} else {
			return false;

		}
	}

	function getAllRecords(){
        return $this->db->query("SELECT * FROM UploadImage")->result();

	}

	public function delete_record($tbl_name, $filters) {
		$this->db->where($filters);
		$this->db->delete($tbl_name);
	    // echo $this->db->last_query();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}
?>