<?php

	class Quotation_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   //Expense report 

		public function Quotationfetch(){ 
      $sql = "SELECT * FROM `quotation`"; 
        $query=$this->db->query($sql); 
  $result = $query->result(); 
  return $result;         
    } 
    public function Add_Quotation($data){ 
      $this->db->insert('quotation',$data); 
  } 
    public function DeletQuotation($id){ 
      $this->db->delete('quotation',array('id'=> $id)); 
  } 
    public function Update_Quotation($id,$data){ 
      $this->db->where('id', $id); 
      $this->db->update('quotation',$data);         
      }    
 
    public function GetQuotationValue($id){ 
        $sql = "SELECT * FROM quotation WHERE `id`='$id'"; 
        $query = $this->db->query($sql); 
        $result = $query->row(); 
        return $result;  
    }
	}
?>
