<?php

	class Expense_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   //Expense report 

		public function Expensefetch(){ 
      $sql = "SELECT * FROM `expense`"; 
        $query=$this->db->query($sql); 
  $result = $query->result(); 
  return $result;         
    } 
    public function Add_Expense($data){ 
      $this->db->insert('expense',$data); 
  } 
    public function DeletExpense($id){ 
      $this->db->delete('expense',array('id'=> $id)); 
  } 
    public function Update_Expense($id,$data){ 
      $this->db->where('id', $id); 
      $this->db->update('expense',$data);         
      }    
 
    public function GetexpenseValue($id){ 
        $sql = "SELECT * FROM expense WHERE `id`='$id'"; 
        $query = $this->db->query($sql); 
        $result = $query->row(); 
        return $result;  
    }
	}
?>
