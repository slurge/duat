<?php
class Clients_model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();

		$this->table = 'Clients';
	}

	public function new($data)
	{
		$data['created_at'] = date("Y-m-d H:i:s");
		return $this->db->insert($this->table, $data);
	}
}
