<?php
class MSchool extends CI_model
{
  
	function __construct()
	{

	}
	public function get_row_array(){
		
		$query=$this->db->query("SELECT * FROM Teacher");
		return $query->result();
	}

	public function check_data($lang,$teach,$day,$period,$class){

		$teach=$this->db->query("SELECT Teacher_Id,Subject,Day FROM TimeTable WHERE `Subject`='".$lang."' AND `Teacher_Id`='".$teach."' AND `Day`='".$day."' AND `Period`='".$period."' AND `Class_Name`='".$class."' ");

		if ($teach->num_rows() > 0) {
			return false;
		} else {
			$class=$this->db->query("SELECT Teacher_Id,Subject,Day FROM TimeTable WHERE `Subject`='".$lang."'AND `Day`='".$day."' AND `Period`='".$period."' AND `Class_Name`='".$class."' ");

			if ($class->num_rows() > 0) {
				return false;
			}else{
				return true;
			}
		}

	}

	 public function post_data($table,$postdata) {

		$data=$this->db->insert($table,$postdata);
		if ($data) {
			return true;
		} else {
			return false;

		}
	}

}?>