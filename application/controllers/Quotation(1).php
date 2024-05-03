<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends CI_Controller {

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
        $this->load->model('quotation_model');
  
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('incident/Incident');
	}

    public function Quotation(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['quotation'] = $this->quotation_model->Quotationfetch();
        $this->load->view('backend/quotation',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
	
    public function Add_Quotation(){ 
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $cust_name = $this->input->post('cust_name');
            $item_name = $this->input->post('item_name');
            $quantity = $this->input->post('quantity');
            $price = $this->input->post('price');
            $tax = $this->input->post('tax');
            $total = $this->input->post('total');
           
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
                    
                    'date' => $date,
                    'subtotal' => $subtotal,
                    
                );
        
     
                // Insert or update the record 
                if(empty($id)){ 
                    $success = $this->quotation_model->Add_Quotation($data); 
                    $this->session->set_flashdata('feedback','Successfully Added'); 
                    echo "Successfully Added";
                    // redirect('incident/Incident', 'refresh'); // Redirect to incident/Incident page
                } else { 
                    $success = $this->quotation_model->Update_Quotation($id,$data); 
                    echo "Successfully Updated"; 
                    // redirect('incident/Incident', 'refresh');
                } 
            } 
        } else { 
            redirect(base_url(), 'refresh'); 
        }         
    } 

    public function DeletQuotation(){ 
		if($this->session->userdata('user_login_access') != False) {   
			$id= $this->input->get('D'); 
			$success = $this->quotation_model->DeletQuotation($id); 
			echo "Successfully Deletd"; 
				redirect('quotation/Quotation'); 
			} 
		else{ 
			redirect(base_url() , 'refresh'); 
		}  
		} 

        public function QuotationByID(){ 
			if($this->session->userdata('user_login_access') != False) {   
	  $id= $this->input->get('id'); 
	  $data['quotation'] = $this->quotation_model->GetQuotationValue($id); 
	  echo json_encode($data); 
			} 
		else{ 
	  redirect(base_url() , 'refresh'); 
	 }  
			 
		}
}
