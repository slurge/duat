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

	public function update($client_id, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $client_id);
		return $this->db->update($this->table);
	}

	public function remove($client_id)
	{
		return $this->db->delete($this->table, ['id' => $client_id]);
	}

	public function find_by_mail($mail)
	{
		$query = $this->db->get_where($this->table, ['mail' => $mail]);
		return (
			$query ?
				$query->row_array() : NULL
		);
	}

	public function get($index, $by='mail')
	{
		$query = $this->db->get_where($this->table, [$by => $index]);
		return (
			$query ?
				$query->row_array() : NULL
		);
	}

	public function get_login($mail, $pass)
	{
		$query = $this->db->get_where($this->table, ['mail' => $mail]);
		if ($user = $query->row_array()) {
			if (password_verify($pass, $user['pass'])) {
				return $user;
			}
		}
		return NULL;
	}

	/**
	 * @param string $type Type of client to query for
	 * @param array $not_in Excluding filter based on an array of associative $field => $value filters
	 * 
	 * @return mixed Array of objects containing all matching records, NULL otherwise
	 */
	public function get_all($type = NULL, $not_in = NULL)
	{
		if ( $type )
		{ 
			$query_args = array( 'type' => $type );
			$this->db->where($query_args);
		}

		$this->db->select('Clients.*');

		if ( $not_in && is_array($not_in) )
		{
			$this->db->where_not_in('status', $not_in);
		}

		$this->db->from($this->table);
		$query = $this->db->get();
		$result = $query->result();

		return ( $result ? $result : NULL );
	}
}
