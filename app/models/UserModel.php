<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 */
class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Fetches students with limit and offset for pagination.
     * @param int $limit The maximum number of records to retrieve (10).
     * @param int $offset The starting position (skip this many records).
     * @return array The paginated list of students.
     */
    public function get_paginated_students($limit, $offset)
    {
        // ✅ FIX 1: Resolves "all() on array" by using explicit Query Builder.
        // ✅ FIX 2: Resolves "SQLSTATE[42000] LIMIT 10, 0" by swapping arguments.
        // The framework's internal limit method expects (offset, limit) for SQL: LIMIT offset, limit.
        $this->db->limit($offset, $limit); 
        
        // Execute the query
        return $this->db->get($this->table)->result_array(); 
    }

    /**
     * Gets the total count of all students.
     * @return int The total number of students.
     */
    public function count_all_students()
    {
        return $this->count();
    }
}

// NOTE: If you are encountering the 'Class "CodeIgniter\Model" not found' error 
// in a separate file, you must correct the casing to 'use CodeIgniter\Model;' (capital 'I')
// in that specific file. This code is for the LavaLust context.