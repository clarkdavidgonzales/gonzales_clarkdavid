<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // Get paginated data
    public function get_paginated($limit, $offset)
    {
        return $this->db->table($this->table)
                        ->limit($limit)       // limit rows
                        ->offset($offset)     // skip rows
                        ->get_all();
    }

    // Count all rows
    public function count_all()
    {
        return $this->db->table($this->table)->count();
    }
}
