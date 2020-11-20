<?php
class Clients_model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();

		$this->table = 'Datasets';
	}

	public function new($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($datasets, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $datasets);
		return $this->db->update($this->table);
	}

	public function remove($datasets)
	{
		return $this->db->delete($this->table, ['site_id' => $datasets]);
	}

	public function get($index, $by='target')
	{
		$query = $this->db->get_where($this->table, [$by => $index]);
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
	public function get_all()
	{
		$this->db->select('Datasets.*');

		$this->db->from($this->table);
		$query = $this->db->get();
		$result = $query->result();

		return ( $result ? $result : NULL );
    }
    
    public function data_count($id_user)
    {
        $query = $this->db->get_where('target', $id_user);
        return count($query->result());
    }
}