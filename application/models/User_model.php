<?php

/**
*  Users Model
*/
class User_model extends CI_Model
{
	
	public function Update_User_Data($admin_id, $data)
	{
		$this->db->set($data);
		$this->db->where('admin_id', $admin_id);
		$this->db->update('admin');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Check_Old_Password($admin_id, $old_password){

		$this->db->where('admin_id', $admin_id);
		$this->db->where('admin_password', $old_password);
		$query = $this->db->get('admin');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
}