<?php

	class Invoicebill_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   //Expense report 

		public function Invoicebillfetch(){ 
      $sql = "SELECT * FROM `invoicebill`"; 
        $query=$this->db->query($sql); 
  $result = $query->result(); 
  return $result;         
    } 
    public function Add_Invoicebill($data){ 
      $this->db->insert('invoicebill',$data); 
  } 
    public function DeletInvoicebill($id){ 
      $this->db->delete('invoicebill',array('id'=> $id)); 
  } 
    public function Update_Invoicebill($id,$data){ 
      $this->db->where('id', $id); 
      $this->db->update('invoicebill',$data);         
      }    
 
    public function GetInvoicebillValue($id){ 
        $sql = "SELECT * FROM invoicebill WHERE `id`='$id'"; 
        $query = $this->db->query($sql); 
        $result = $query->row(); 
        return $result;  
    }
	}
?>
