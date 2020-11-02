<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CPayslip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPayslip');
	}

	public function index(){
		$this->load->view('payslip');
	}

	public function AddPaySlip(){

		$input = $this->input->post(null, 'true');
		$id = $this->input->post('id', 'true');
		
		$all_input=array();

		$details = array(
		    'Basic' => $input['basic'],
		    'HRA' => $input['hra'],
		    'Special_Allowance' => $input['special_allowance'],
		    'PF' => $input['pf'],
		    'Total' => $input['total'],
		);
		

		if($id){
	    	$filter=array('Id'=>$id);
			$result = $this->MPayslip->update_data('Payslip',$filter, $details);
			// vdebug($result);

		}else{
			$datas=array( 'Name' => $input['name'],
		    'Mobile' => $input['mobile'],
		    'Email' => $input['email']);

			$all_input=array_merge($details,$datas);
			// vdebug($all_input);
			$result = $this->MPayslip->post_data('Payslip', $all_input);
		}
		//  save data

		if ($result) {
			echo json_encode(['msg'=>'success']);
		} else {
			echo json_encode(['msg'=>'db error']);
		}
	}

	public function ListPaySlip(){

        $data['pay_list'] = $this->MPayslip->getAllRecords();

		$this->load->view('listpayslip', $data);   

	}

	public function EditPaySlip($id=''){
        $data['edit_pay'] = $this->MPayslip->getAllRecords($id);

		$this->load->view('payslip', $data);   

	}


	public function DeletePaySlip(){
		$id = $this->input->post('$id', 'true');

    	$filter=array('Id'=>$id);
        $result = $this->MPayslip->delete_data('Payslip',$filter);

        if ($result) {
			echo json_encode(['msg'=>'success']);
		} else {
			echo json_encode(['msg'=>'db error']);
		}

	}

}

?>