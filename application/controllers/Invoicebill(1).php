<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicebill extends CI_Controller {

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
        $this->load->model('invoicebill_model');
  
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('incident/Incident');
	}

    public function Invoicebill(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['invoicebill'] = $this->invoicebill_model->Invoicebillfetch();
        $this->load->view('backend/invoicebill',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
	
    public function Add_Invoicebill(){ 
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $cust_name = $this->input->post('cust_name');
            $item_name = $this->input->post('item_name');
            $quantity = $this->input->post('quantity');
            $price = $this->input->post('price');
            $tax = $this->input->post('tax');
            $total = $this->input->post('total');
            $type = $this->input->post('type');
            $date = $this->input->post('date');
            $subtotal = $this->input->post('subtotal');
        
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
                    'cust_name' => $cust_name,
                    'item_name' => $item_name,
                    'quantity' => $quantity,
                    'price' => $price,
                    'tax' => $tax,
                    'total' => $total,
                    'type' => $type,
                    'date' => $date,
                    'subtotal' => $subtotal,
                    
                );
        
     
                // Insert or update the record 
                if(empty($id)){ 
                    $success = $this->invoicebill_model->Add_Invoicebill($data); 
                    $this->session->set_flashdata('feedback','Successfully Added'); 
                    echo "Successfully Added";
                    // redirect('incident/Incident', 'refresh'); // Redirect to incident/Incident page
                } else { 
                    $success = $this->invoicebill_model->Update_Invoicebill($id,$data); 
                    echo "Successfully Updated"; 
                    // redirect('incident/Incident', 'refresh');
                } 
            } 
        } else { 
            redirect(base_url(), 'refresh'); 
        }         
    } 

    public function DeletInvoicebill(){ 
		if($this->session->userdata('user_login_access') != False) {   
			$id= $this->input->get('D'); 
			$success = $this->invoicebill_model->DeletInvoicebill($id); 
			echo "Successfully Deletd"; 
				redirect('invoicebill/Invoicebill'); 
			} 
		else{ 
			redirect(base_url() , 'refresh'); 
		}  
		} 

        public function InvoicebillByID(){ 
			if($this->session->userdata('user_login_access') != False) {   
	  $id= $this->input->get('id'); 
	  $data['invoicebill'] = $this->invoicebill_model->GetInvoicebillValue($id); 
	  echo json_encode($data); 
			} 
		else{ 
	  redirect(base_url() , 'refresh'); 
	 }  
			 
		}
}
