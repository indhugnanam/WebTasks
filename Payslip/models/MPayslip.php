<?php
class MPayslip extends CI_model
{
  
	function __construct()
	{

	}

    public function post_data($table,$postdata){
		$data=$this->db->insert($table,$postdata);
		if ($data) {
			return true;
		} else {
			return false;

		}
	}

	 public function update_data($table,$filters,$data){
		$this->db->where($filters);
		$query=$this->db->update($table, $data);
	
		if ($query > 0) {
			return true;
		} else {

			return false;
		}
	}

	public function delete_data($tbl_name, $filters) {
		$this->db->where($filters);
		$this->db->delete($tbl_name);
	    // echo $this->db->last_query();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getAllRecords($id=''){
        $this->db->select("*");
        $this->db->from("Payslip");

        if($id){
        	$this->db->where('Id',$id);
        }

        $res =$this->db->get()->result_array();
        return $res;
	}

}

?>