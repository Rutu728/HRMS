 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('organization_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    public function Department(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['department'] = $this->organization_model->depselect();
        $this->load->view('backend/department',$data); 
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Save_dep(){
    if($this->session->userdata('user_login_access') != False) { 
       $dep = $this->input->post('department');
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
       $this->form_validation->set_rules('department','department','trim|required|xss_clean');

       if ($this->form_validation->run() == FALSE) {
           echo validation_errors();
       }else{
        $data = array();
        $data = array('dep_name' => $dep);
        $success = $this->organization_model->Add_Department($data);
        $this->session->set_flashdata('feedback','Successfully Added');
           echo "Successfully Added";
       }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Delete_dep($dep_id){
        if($this->session->userdata('user_login_access') != False) { 
        $this->organization_model->department_delete($dep_id);
        $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
        redirect('organization/Department');
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Dep_edit($dep){
        if($this->session->userdata('user_login_access') != False) { 
        $data['department'] = $this->organization_model->depselect();
        $data['editdepartment']=$this->organization_model->department_edit($dep);
        $this->load->view('backend/department', $data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Update_dep(){
        if($this->session->userdata('user_login_access') != False) { 
        $id = $this->input->post('id');
        $department = $this->input->post('department');
        $data =  array('dep_name' => $department );
        $this->organization_model->Update_Department($id, $data);
        #$this->session->set_flashdata('feedback','Updated Successfully');
        echo "Successfully Added";
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Designation(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['designation'] = $this->organization_model->desselect();
        $this->load->view('backend/designation',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Save_des(){
        if($this->session->userdata('user_login_access') != False) { 
        $des = $this->input->post('designation');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('designation','designation','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }else{
            $data = array();
            $data = array('des_name' => $des);
            $success = $this->organization_model->Add_Designation($data);
            echo "Successfully Added";
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function des_delete($des_id){
        if($this->session->userdata('user_login_access') != False) {
        $this->organization_model->designation_delete($des_id);
        $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
        redirect('organization/Designation');
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Edit_des($des){
        if($this->session->userdata('user_login_access') != False) {
        $data['designation'] = $this->organization_model->desselect();
        $data['editdesignation']=$this->organization_model->designation_edit($des);
        $this->load->view('backend/designation', $data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Update_des(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $designation = $this->input->post('designation');
        $data =  array('des_name' => $designation );
        $this->organization_model->Update_Designation($id, $data);
        echo "Successfully Updated";
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    
    // for offboarding

	public function Offboarding(){
        if($this->session->userdata('user_login_access') != False) {
        $data['offboarding'] = $this->organization_model->offboardingfetch();
        $this->load->view('backend/offboarding',$data); 
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }

    public function add_Offboarding(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
		$dep_id= $this->input->post('dep_id');
		$des_id = $this->input->post('des_id');
		$em_joining_date = $this->input->post('em_joining_date');
		$date_of_termination = $this->input->post('date_of_termination');
		$termination_reason = $this->input->post('termination_reason');
        $this->load->library('form_validation');
       	$this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('date_of_termination', 'date_of_termination', 'trim|required|min_length[5]|max_length[150]|xss_clean');
		$this->form_validation->set_rules('termination_reason', 'termination_reason');
		if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect('Offboarding');
			} else {
            $data = array();
                $data = array(
                    'em_id' => $em_id,
					'dep_id' => $dep_id,
					'des_id' => $des_id,
					'em_joining_date' => $em_joining_date,
					'date_of_termination' => $date_of_termination,
					'termination_reason' => $termination_reason
                    
                );
            if(empty($id)){
                $success = $this->organization_model->Add_Offboarding($data);
                $this->session->set_flashdata('feedback','Successfully Added');
                #redirect('organization/Offboarding');
                echo "Successfully Added";
            } else {
                $success = $this->organization_model->Update_Offbaording($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("organization/view?I=" .base64_encode($em_id));
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }


	public function DeleteOffboarding() {
		if($this->session->userdata('user_login_access') != false) {  
			$id = $this->input->get('D'); // Get the resign_id from the URL parameter
			$success = $this->organization_model->Delete_Offboarding($id); // Call the model method with the correct parameter
				redirect('organization/Offboarding'); // Redirect after successful deletion
			
		} else {
			redirect(base_url(), 'refresh'); // Redirect if user is not logged in
		} 
	}

	public function OffboardingByID(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$data['offboarding'] = $this->organization_model->GetOffboardingValue($id);
		echo json_encode($data);
        }
    else{
		redirect(base_url() , 'refresh');
	} 
}
	public function getEmployeeDetails() {
		$em_id = $this->input->get('emid');
		$employee_details = $this->organization_model->getEmployeeDetailsById($em_id);
		echo json_encode($employee_details);
	}
}