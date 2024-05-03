<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policies extends CI_Controller {

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
    
	

    public function Policies(){
        if($this->session->userdata('user_login_access') != False) { 
        
        $this->load->view('backend/policies');
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
	

}
