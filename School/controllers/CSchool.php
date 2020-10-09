<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CSchool extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MSchool');
	}

	public function index(){

		$data['Days']=array('Monday','Tuesday','Wednesday','Thuesday');
		$data['Period']=array('I','II','III','IV','V');
		$data['Class']=array('1A');

		$data['Language']=array('English','Tamil','Maths','Science');

		
		$data['Teachers']=$this->MSchool->get_row_array();

		$this->load->view('school',$data);
	}

	public function AssignTeacherPeriod(){

		$input=$this->input->post();

		$class=explode('_',$input['day']);

		$check=$this->MSchool->check_data($input['lang'],$input['teach'],$class[0],$class[1],$class[2]);

		if($check){

			$timetable=array(
				'Class_Name'=>$class[2],
				'Subject'=>$input['lang'],
				'Day'=>$class[0],
				'Period'=>$class[1],
				'Teacher_Id'=>$input['teach'],
			);
		
			
			if($this->MSchool->post_data('Timetable',$timetable)){
				echo json_encode(['status'=>'success','msg'=>'Successfully Added']);

			}else{
				echo json_encode(['status'=>'error','msg'=>'DB Error']);
			}
		}else{
			echo json_encode(['status'=>'error','msg'=>'Already Assigned']);
		}

	}

}

?>