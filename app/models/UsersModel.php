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
        } else {
            $query = $this->db->table($this->table);

            if (!empty($q)) {
                $q = strtolower($q); // convert search term to lowercase

                // Case-insensitive search by converting columns to lowercase
                $query->where("LOWER(fname) LIKE '%$q%'")
                      ->or_where("LOWER(lname) LIKE '%$q%'")
                      ->or_where("LOWER(email) LIKE '%$q%'");
            }

            // count total rows
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

            // fetch paginated records
            $data['records'] = $query->pagination($records_per_page, $page)->get_all();

            return $data;
        }
    }
}
