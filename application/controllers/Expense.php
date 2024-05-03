<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct() {
        
        parent::__construct();
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('login_model');
        $this->load->model('payroll_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('incident_model');
        $this->load->model('expense_model');
  
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('expense/Expense');
	}

    public function Expense(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['expense'] = $this->expense_model->Expensefetch();
        $this->load->view('backend/expense',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
	
    public function Add_Expense(){ 
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $item_name = $this->input->post('item_name');
            $quantity = $this->input->post('quantity');
            $price = $this->input->post('price');
            $tax = $this->input->post('tax');
            $total = $this->input->post('total');
            $type = $this->input->post('type');
            $date = $this->input->post('date');
            $subtotal = $this->input->post('subtotal');
            // $cust_name = $this->input->post('cust_name');
        
            // Validate input fields 
            $this->load->library('form_validation'); 
            $this->form_validation->set_error_delimiters(); 
            $this->form_validation->set_rules('item_name', 'item_name', 'trim|required|min_length[1]|max_length[150]|xss_clean'); 
            $this->form_validation->set_rules('quantity', 'quantity', 'trim|required|min_length[1]|max_length[150]|xss_clean'); 
            $this->form_validation->set_rules('price', 'price', 'trim|required|min_length[1]|max_length[150]|xss_clean'); 
            
     
            if ($this->form_validation->run() == FALSE) { 
                echo validation_errors(); 
            } else { 
                // Prepare data array 
                $data = array(
                    'item_name' => $item_name,
                    'quantity' => $quantity,
                    'price' => $price,
                    'tax' => $tax,
                    'total' => $total,
                    'type' => $type,
                    'date' => $date,
                    // 'cust_name' => $cust_name,
                    'subtotal' => $subtotal,
                    
                );
        
     
                // Insert or update the record 
                if(empty($id)){ 
                    $success = $this->expense_model->Add_Expense($data); 
                    $this->session->set_flashdata('feedback','Successfully Added'); 
                    echo "Successfully Added";
                    // redirect('incident/Incident', 'refresh'); // Redirect to incident/Incident page
                } else { 
                    $success = $this->expense_model->Update_Expense($id,$data); 
                    echo "Successfully Updated"; 
                    // redirect('incident/Incident', 'refresh');
                } 
            } 
        } else { 
            redirect(base_url(), 'refresh'); 
        }         
    } 

    public function DeletExpense(){ 
		if($this->session->userdata('user_login_access') != False) {   
			$id= $this->input->get('D'); 
			$success = $this->expense_model->DeletExpense($id); 
			echo "Successfully Deletd"; 
				redirect('expense/Expense'); 
			} 
		else{ 
			redirect(base_url() , 'refresh'); 
		}  
		} 

        public function ExpenseByID(){ 
			if($this->session->userdata('user_login_access') != False) {   
	  $id= $this->input->get('id'); 
	  $data['expense'] = $this->expense_model->GetExpenseValue($id); 
	  echo json_encode($data); 
			} 
		else{ 
	  redirect(base_url() , 'refresh'); 
	 }  
			 
		}
}
