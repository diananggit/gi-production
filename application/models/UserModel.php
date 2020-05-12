<?php
defined('BASEPATH') or exit('No direct access allowed!');

class UserModel extends CI_Model
{
	var $table = "user";

	function validate($userName, $password)
	{
		$this->db->where("user_name", $userName);
		$this->db->where("password", $password);
		$rst = $this->db->get("user", 1);

		return $rst;
	}

	function update_active($user)
	{
		$this->db->where('user_name', $user);
		$this->db->update('user', array('active' => 1));

		return $this->db->affected_rows();
	}

	function update_inactive($user)
	{
		$this->db->where('user_name', $user);
		$this->db->update('user', array('active' => 0));

		return $this->db->affected_rows();
	}

	function get_by_name($name)
	{
		$rst = $this->db->get_where('user', array('user_name' => $name));

		return $rst->row(0);
	}
}
