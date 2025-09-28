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

    /**
     * Paginated listing with case-insensitive "hint" search across fname, lname, email.
     *
     * @param string $q search query
     * @param int|null $records_per_page
     * @param int|null $page (1-based)
     * @return array ['records' => [...], 'total_rows' => int]
     */
    public function page($q = '', $records_per_page = null, $page = null)
    {
        if (is_null($page)) {
            // return all without pagination
            return [
                'total_rows' => $this->db->table($this->table)->count_all(),
                'records'    => $this->db->table($this->table)->get_all()
            ];
        }

        $query = $this->db->table($this->table);

        if (!empty($q)) {
            // normalize search term and build wildcard
            $like = '%' . mb_strtolower($q, 'UTF-8') . '%';

            // cross-db case-insensitive search
            $sql = "(LOWER(fname) LIKE ? OR LOWER(lname) LIKE ? OR LOWER(email) LIKE ?)";
            $query->where($sql, [$like, $like, $like]);
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
