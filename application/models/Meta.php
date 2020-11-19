<?php

class Meta extends CI_Model
{
    public function __construct()
	{
		parent::__construct();

		$this->table = 'Meta';
    }

    public function get($index, $by='slug')
	{
		$query = $this->db->get_where($this->table, [$by => $index]);
		return (
			$query ?
				$query->row_array() : NULL
		);
    }
    
    public function id($slug)
	{
		$query = $this->db->get_where($this->table, ['slug' => $slug]);
        if ($query) {
            $res = $query->row_array();
            $res = $res['id'];
        }else{
            $res = NULL;
        }
        return($res);
	}
	


}
