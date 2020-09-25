<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MAdmin');
	}


	public function index()
	{

		$data['remain_order']=$this->MAdmin->get_order_details($this->session->userdata('User_Role'),$this->session->userdata('User_Id'),'all');

		$data['order_title']='All Orders';

		$data['script']="";
		$data['vw']="Order/OrdersList";
		$this->load->view('vDetails',$data);
	}


	//category add page
	public function AddCategory()
	{
		$data['script']="Category/add_categoryScript";
		$data['vw']="Category/Add_Category";
		$this->load->view('vDetails',$data);
	}

    //category list page
	public function CategoryList()
	{

		$table="Category";
		$selection ="*";
		$criteria =array("*");
	 	//get all category list
		$data['category_list']=$this->MAdmin->getAllRecords($table,$selection,$criteria);

		$data['script']="";
		$data['vw']="Category/CategoryList";
		$this->load->view('vDetails',$data);
	}

	//submit category
	public function Submit_Category()
	{
		$input =$this->input->post();//post data
		
		$table ="Category";
		$post_data =array(
			'Category_Name'=>$input['cat_name'],
			"Status"=>isset($input['Status'])?'A':"I"
      	);

		$add_category =$this->MAdmin->insert_data($table,$post_data);//insert data

		if($add_category)
		{
         	echo json_encode(['msg'=>'Succusfully Added!']);
		}
		else
		{
           echo json_encode(['msg'=>'UnAble To Add']);
		}

	}
	//edit category
	public function edit_category($id="")
	{
		//get records by cat_id
		$table ="Category";
		$selection ="*";
		$criteria =array('Category_Id'=>$id);
		$data['cat_data'] =$this->MAdmin->get_record_by_id($table,$selection,$criteria);
        
		$data['script']="Category/add_categoryScript";
		$data['vw']="Category/edit_category";
		$this->load->view('vDetails',$data);
	}

	//delete category
	public function delete_category($id="")
	{
		//get records by cat_id
		$table ="Category";
		$filter =array('Category_Id'=>$id);
		$delete =$this->MAdmin->delete_data($table,$filter);
        redirect('CAdmin/CategoryList','refresh');

	}

	//update category
	public function update_Category()
	{
		//post data
		$input =$this->input->post();
				
		$table ="Category";
		$update_data =array(
			'Category_Name'=>$input['cat_name'],
			"Status"=>isset($input['Status'])?'A':"I"
      	);

	    $filter=array('Category_Id'=>$input['cat_id']);
		//update data to db
		$res =$this->MAdmin->update_data($table,$filter,$update_data);
		if($res)
		{
     		echo json_encode(['msg'=>'Succusfully Updated!']);
		}
		else
		{
           echo json_encode(['msg'=>'UnAble To Update']);
		}
	}

}

?>