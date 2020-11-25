<?php
class User_models extends CI_Model
{
    public function __construct()
	{
		parent::__construct();

		$this->table = 'User_models';
	}

	public function new($data)
	{
		$data['created_at'] = date("Y-m-d H:i:s");
		return $this->db->insert($this->table, $data);
	}

	public function update($user_id, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $user_id);
		return $this->db->update($this->table);
	}

	public function remove($user_id)
	{
		return $this->db->delete($this->table, ['id' => $user_id]);
	}
     //con el user y el token buscar ID del usuario
	public function get($index, $by='id')
	{
		$query = $this->db->get_where($this->table, [$by => $index]);
		return (
			$query ?
				$query->row_array() : NULL
		);
    }
    
    public function find_user($token, $user_name)
	{
        /* $this->db->select('*');
        $this->db->from('User_models');
        $this->db->join('Sites', 'User_models.site_id = Sites.id');
        $query = $this->db->get(['User_models.username' => $user_name,
		'Sites.token' => $token]); */
		$query = $this->db->query('SELECT User_models.id, User_models.mode FROM User_models join Sites ON User_models.site_id = Sites.id WHERE User_models.username = \''.$user_name.'\' AND Sites.token = \''.$token.'\'');
		return (
			$query ?
				$query->row_array() : NULL
		);  
	}


	/**
	 * @param string $type Type of client to query for
	 * @param array $not_in Excluding filter based on an array of associative $field => $value filters
	 * 
	 * @return mixed Array of objects containing all matching records, NULL otherwise
	 */
	public function get_all($site_id = NULL, $not_in = NULL)
	{
		if ( $site_id )
		{ 
			$query_args = array( 'site_id' => $site_id );
			$this->db->where($query_args);
		}

		$this->db->select('User_models.*');

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