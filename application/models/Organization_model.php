<?php

class Organization_model extends CI_Model{


    	function __consturct(){
    	   parent::__construct();
    	
    	}
    public function depselect(){
        $query = $this->db->get('department');
        $result = $query->result();
        return $result;
        }
      public function Add_Department($data){
        $this->db->insert('department',$data);
      }

      public function department_delete($dep_id){
        $this->db->delete('department',array('id' => $dep_id ));
      }

      public function department_edit($dep){
          $sql    = "SELECT * FROM `department` WHERE `id`='$dep'";
          $query  = $this->db->query($sql);
          $result = $query->row();
          return $result;
      }
      public function Update_Department($id, $data){
        $this->db->where('id',$id);
        $this->db->update('department',$data);
      }

      public function Add_Designation($data){
        $this->db->insert('designation',$data);
      }
    public function designation_delete($des_id){
        $this->db->delete('designation',array('id'=> $des_id));
    }

      public function designation_edit($des){
          $sql    = "SELECT * FROM `designation` WHERE `id`='$des'";
          $query  = $this->db->query($sql);
          $result = $query->row();
          return $result;
      }
      public function Update_Designation($id, $data){
        $this->db->where('id',$id);
        $this->db->update('designation',$data);
      }
    public function desselect(){
        $query = $this->db->get('designation');
        $result = $query->result();
        return $result;
    }   
    
    // offboarding

		public function offboardingfetch(){
      // $sql = "SELECT `offboarding`.*, `employee`.`em_id`, `first_name`, `last_name`, `em_code`
			// FROM `offboarding`
			// LEFT JOIN `employee` ON `offboarding`.`em_id` = `employee`.`em_id`";

			$sql = "SELECT 
			offboarding.*, 
			employee.em_id, 
			employee.first_name, 
			employee.last_name, 
			employee.em_code, 
			department.dep_name, 
			designation.des_name, 
			employee.em_joining_date
	FROM 
			offboarding
	LEFT JOIN 
			employee ON offboarding.em_id = employee.em_code
	LEFT JOIN 
			department ON employee.dep_id = department.id
	LEFT JOIN 
			designation ON employee.des_id = designation.id";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;        
    }

		public function GetOffboardingValue($id){
			$sql = "SELECT * FROM `offboarding` WHERE `id`='$id'";
			$query = $this->db->query($sql);
			$result = $query->row();
			return $result; 
	} 

	public function Add_Offboarding($data){
		$this->db->insert('offboarding',$data);
}

	public function Delete_Offboarding($id){
		$this->db->delete('offboarding',array('id'=> $id));
	}

	public function Update_Offbaording($id,$data){
		$this->db->where('id', $id);
		$this->db->update('offboarding',$data);        
		}
		public function getEmployeeDetailsById($em_id) {
			$query = $this->db->select('department.id as dep_id, department.dep_name, designation.id as des_id, designation.des_name, employee.em_joining_date')
													->from('employee')
													->join('department', 'department.id = employee.dep_id')
													->join('designation', 'designation.id = employee.des_id')
													->where('employee.em_code', $em_id)
													->get();
			return $query->row_array();
	}
}
?>