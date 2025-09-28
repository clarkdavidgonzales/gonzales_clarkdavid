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
        // ✅ FIX: Use the explicit Query Builder approach to enforce LIMIT/OFFSET.
        // The SQL error (LIMIT 10, 0) indicates the framework expects (offset, limit) 
        // arguments for its internal limit() method, NOT (limit, offset) as defined.
        
        // 1. Tell the underlying database query to use the limit and offset in the correct order for the framework
        // $this->db->limit($limit, $offset); // Original (and wrong for the framework's internal method)
        $this->db->limit($offset, $limit); // 👈 Corrected order to get LIMIT 0, 10
        
        // 2. Execute the query on the model's defined table and return the results as an array.
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