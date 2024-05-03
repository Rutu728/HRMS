<?php

	class Incident_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

	public function getename(){
	$query = $this->db->get('employee');
	$result = $query->result();
	return $result;
	}
    public function getdepartment(){
	$query = $this->db->get('department');
	$result = $query->result();
	return $result;
	}
   //incident report 

		public function incidentfetch(){ 
      $sql = "SELECT incident.*, employee.em_code, first_name, last_name, em_code 
			FROM incident 
			LEFT JOIN employee ON incident.em_id = employee.em_code;
			"; 
        $query=$this->db->query($sql); 
  $result = $query->result(); 
  return $result;         
    } 
    public function Add_Incident($data){ 
      $this->db->insert('incident',$data); 
  } 
    public function DeletIncident($id){ 
      $this->db->delete('incident',array('id'=> $id)); 
  } 
    public function Update_Incident($id,$data){ 
      $this->db->where('id', $id); 
      $this->db->update('incident',$data);         
      }    
 
    public function GetincidentValue($id){ 
        $sql = "SELECT * FROM incident WHERE `id`='$id'"; 
        $query = $this->db->query($sql); 
        $result = $query->row(); 
        return $result;  
    }

	public function  getEmployees(){
		$sql = "SELECT * FROM `employee`";
			$query=$this->db->query($sql);
	$result = $query->result();
	return $result;          
	}
    public function emselectByID($emid){
    $sql = "SELECT * FROM `employee`
      WHERE `em_id`='$emid'";
    $query=$this->db->query($sql);
	$result = $query->row();
	return $result;
	}
    public function emselectByCode($emid){
    $sql = "SELECT * FROM `employee`
      WHERE `em_code`='$emid'";
    $query=$this->db->query($sql);
	$result = $query->row();
	return $result;
	}
    public function getInvalidUser(){
      $sql = "SELECT * FROM `employee`
      WHERE `status`='INACTIVE'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;
	}
    public function Does_email_exists($email) {
		$user = $this->db->dbprefix('employee');
        $sql = "SELECT `em_email` FROM $user
		WHERE `em_email`='$email'";
		$result=$this->db->query($sql);
        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function Add($data){
			$this->db->insert('incident', $data);
			return $this->db->insert_id(); // Return the inserted row ID
	}
    public function GetBasic($id){
      $sql = "SELECT `employee`.*,
      `designation`.*,
      `department`.*
      FROM `employee`
      LEFT JOIN `designation` ON `employee`.`des_id`=`designation`.`id`
      LEFT JOIN `department` ON `employee`.`dep_id`=`department`.`id`
      WHERE `em_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;          
    }
    public function ProjectEmployee($id){
      $sql = "SELECT `assign_task`.`assign_user`,
      `employee`.`em_id`,`first_name`,`last_name`
      FROM `assign_task`
      LEFT JOIN `employee` ON `assign_task`.`assign_user`=`employee`.`em_id`
      WHERE `assign_task`.`project_id`='$id' AND `user_type`='Team Head'";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;          
    }
    public function GetperAddress($id){
      $sql = "SELECT * FROM `address`
      WHERE `emp_id`='$id' AND `type`='Permanent'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;          
    }
    public function GetpreAddress($id){
      $sql = "SELECT * FROM `address`
      WHERE `emp_id`='$id' AND `type`='Present'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;          
    }
    public function GetEducation($id){
      $sql = "SELECT * FROM `education`
      WHERE `emp_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;          
    }
    public function GetExperience($id){
      $sql = "SELECT * FROM `emp_experience`
      WHERE `emp_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;          
    }
    public function GetBankInfo($id){
      $sql = "SELECT * FROM `bank_info`
      WHERE `em_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;          
    }
    public function GetAllIncident(){
      $sql = "SELECT * FROM `incident`";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;          
    }
    public function desciplinaryfetch(){
      $sql = "SELECT `desciplinary`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`
      FROM `desciplinary`
      LEFT JOIN `employee` ON `desciplinary`.`em_id`=`employee`.`em_id`";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;        
    }
    public function GetLeaveiNfo($id,$year){
      $sql = "SELECT `assign_leave`.*,
      `leave_types`.`name`
      FROM `assign_leave`
      LEFT JOIN `leave_types` ON `assign_leave`.`type_id`=`leave_types`.`type_id`
      WHERE `assign_leave`.`emp_id`='$id' AND `dateyear`='$year'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;        
    }
    public function GetsalaryValue($id){
      $sql = "SELECT `emp_salary`.*,
      `addition`.*,
      `deduction`.*,
      `salary_type`.*
      FROM `emp_salary`
      LEFT JOIN `addition` ON `emp_salary`.`id`=`addition`.`salary_id`
      LEFT JOIN `deduction` ON `emp_salary`.`id`=`deduction`.`salary_id`
      LEFT JOIN `salary_type` ON `emp_salary`.`type_id`=`salary_type`.`id`
      WHERE `emp_salary`.`emp_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;        
    }
    public function Update($data,$id){
		$this->db->where('em_id', $id);
		$this->db->update('employee',$data);        
    }
    public function Update_Education($id,$data){
		$this->db->where('id', $id);
		$this->db->update('education',$data);        
    }
  
    public function GetEmployeeId($id){
        $sql = "SELECT `em_password` FROM `employee` WHERE `em_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }

	public function depselect(){
  	$query = $this->db->get('department');
  	$result = $query->result();
  	return $result;
	}
    public function Add_Salary($data){
    $this->db->insert('emp_salary',$data);
  }

    public function desselect(){
  	$query = $this->db->get('designation');
  	$result = $query->result();
  	return $result;
	}
    public function DeletEdu($id){
      $this->db->delete('education',array('id'=> $id));
  }
	}
?>
