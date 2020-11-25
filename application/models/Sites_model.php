<?php
class Sites_model extends CI_model 
{

    public function __construct()
	{
		parent::__construct();

		$this->table = 'Sites';
    }

    public function new($data)
	{
		$data['created_at'] = date("Y-m-d H:i:s");
		$result = $this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		$token = hash('sha256', $id.SAL);
		$this->db->set(['token' => $token]);
		$this->db->where('id', $id);
		return $this->db->update($this->table) && $result;
	}

	public function update($site_id, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $site_id);
		return $this->db->update($this->table);
	}

	public function remove($site_id)
	{
		return $this->db->delete($this->table, ['id' => $site_id]);
	}
    
    public function get($index, $by='id')
	{
		$query = $this->db->get_where($this->table, [$by => $index]);
		return (
			$query ?
				$query->row_array() : NULL
		);
	}

	public function get_sites_as_assoc($client_id, $not_in = NULL)
	{

		$sitios = $this->get_all($client_id, $not_in);

		$base = array( '' => 'Seleccione un sitio' );

		if ( $sitios ) {
			return array_reduce($sitios, function($list, $row) {
				$list[$row->id] = $row->name; 
				return $list;
			}, $base);
		}

		return NULL;
	}

	public function get_users_per_site($client_id)
	{
		$this->load->model('user_models');
		$sites = $this->get_all($client_id);
		$res = [];
		if($sites){
			foreach ($sites as $site ) {
				$res[$site->name] = $this->user_models->get_all($site->id);
			}
		}
		return $res;
	}

    /**
	 * @param string $type Type of client to query for
	 * @param array $not_in Excluding filter based on an array of associative $field => $value filters
	 * 
	 * @return mixed Array of objects containing all matching records, NULL otherwise
	 */
	public function get_all($client_id = NULL, $not_in = NULL)
	{
		if ( $client_id )
		{ 
			$query_args = array( 'client_id' => $client_id );
			$this->db->where($query_args);
		}

		$this->db->select('Sites.*');

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
