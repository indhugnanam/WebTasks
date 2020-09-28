<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CCart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MCart');
	}
	
	public function index()
	{      
        $data['list'] = $this->MCart->getAllRecords();

		$this->load->view('upload',$data);
	}

	public function ListImage(){
        $list =$this->MCart->getAllRecords();
        if($list){
			echo json_encode(['data' =>$list]);
        }else{
			echo json_encode(['data' =>'empty']);
        }
	}

	public function deleteImage(){

		$data=array("Id"=>$this->input->post('id', true));
		$delete =$this->MCart->delete_record('UploadImage',$data);
		
        if($delete){
			echo json_encode(['data' =>'success']);
        }else{
			echo json_encode(['data' =>'error']);
        }

	}

	public function saveImage(){

			$data1 = array();

		  	$ImageCount = count($_FILES['images']['name']);

	  		for($i = 0; $i < $ImageCount; $i++){
			
				$_FILES['img']['name'] =  $_FILES['images']['name'][$i];
				$_FILES['img']['type'] = $_FILES['images']['type'][$i];
				$_FILES['img']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
				$_FILES['img']['error'] = $_FILES['images']['error'][$i];
				$_FILES['img']['size'] = $_FILES['images']['size'][$i];


            	$config['upload_path']   = 'image_uploads/';
	        	$config['allowed_types'] = 'jpg|jpeg|png';
	        	$this->load->library('upload', $config);



	            if (!empty($_FILES['images']['name'])) {
		            if (! $this->upload->do_upload('img')) { //upload agala maa enanu therila
		            	
		                $error = array('error' => $this->upload->display_errors());
		       
		            } else {
		                $data = $this->upload->data();
		                $data1['image'] = $data['file_name'];
		            }
		        }
				
				$employeResult=$this->MCart->post_data('UploadImage', $data1);
	        }
	}
	
}
?>
