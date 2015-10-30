<?php
class Produtos_model extends CI_Model {



	
	function getAllproducts(){

		// $this->db->select('con_id');
		// $this->db->select('DAY(con_birth) as day');

		$this->db->where("status",1);

		$this->db->order_by('nome','ASC');

		// echo $this->db->last_query();
		$q = $this->db->get('prod_produtos');

		if($q->num_rows() > 0){

			return $q->result_array();
		}else{
			return FALSE;
		}

	}


	// function getAllBirthdaysByDates($month, $day){

	// 	$this->db->select('con_id');
	// 	$this->db->select('trim(con_name) as name');
	// 	$this->db->select('pts_name');

	// 	$this->db->join('cpr_contact_position_rellationship','cpr_contact_position_rellationship.con_contact_con_id = con_contact.con_id','LEFT');
	// 	$this->db->join('pts_positions','pts_positions.pts_id = cpr_contact_position_rellationship.pts_positions_pts_id','LEFT');
		

	// 	$this->db->where("DAY(con_birth) = '$day'");
	// 	$this->db->where("MONTH(con_birth) = '$month'");
	// 	$this->db->where('con_status',1);

	// 	$this->db->group_by('con_name');
	// 	$this->db->order_by('con_id','ASC');
		
	// 	$q = $this->db->get('con_contact');
	// 	//echo $this->db->last_query();

	// 	if($q->num_rows() > 0){

	// 		return $q->result_array();
	// 	}else{
	// 		return FALSE;
	// 	}

	// }

	// function getDepartmentFromId($id){

	// 	$this->db->select('dep_name');


	// 	$this->db->join('cdr_contact_department_rellationship','cdr_contact_department_rellationship.dep_department_dep_id = dep_department.dep_id','LEFT');
	// 	$this->db->join('con_contact','con_contact.con_id = cdr_contact_department_rellationship.con_contact_con_id','LEFT');

	// 	$array = array('dep_status' => 1, 'con_contact.con_id' => $id);
		
	// 	$this->db->where($array);

	// 	$q = $this->db->get('dep_department');
		
	// 	if ( $q->num_rows() > 0){
			
	// 		return $q->result_array();
			
	// 	}else{
			
	// 		return false;
			
	// 	}


	// }


}