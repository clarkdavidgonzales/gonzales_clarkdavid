<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Usersmodel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';
    protected $allowed_fields = ['fname', 'lname', 'email'];
    protected $validation_rules = [
        'lname' => 'required|min_length[2]|max_length[255]',
        'fname' => 'required|min_length[2]|max_length[255]',
        'email' => 'required|valid_email|max_length[255]'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q = '', $records_per_page = null, $page = null)
    {
        if (is_null($page)) {
            return [
                'total_rows' => $this->db->table($this->table)->count_all(),
                'records'    => $this->db->table($this->table)->get_all()
            ];
        }

        $query = $this->db->table($this->table);

        if (!empty($q)) {
            $like = '%' . strtolower($q) . '%';

            // Case-insensitive search on fname, lname, email
            $query->where("LOWER(fname) LIKE", $like)
                  ->or_where("LOWER(lname) LIKE", $like)
                  ->or_where("LOWER(email) LIKE", $like);
        }

        // count total rows
        $countQuery = clone $query;
        $countRow = $countQuery->select_count('*', 'count')->get();
        $data['total_rows'] = isset($countRow['count']) ? (int)$countRow['count'] : 0;

        // fetch paginated records
        $data['records'] = $query->pagination($records_per_page, $page)->get_all();

        return $data;
    }
}
