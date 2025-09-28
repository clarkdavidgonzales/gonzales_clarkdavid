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
        // This is the most reliable way to enforce the limit when chaining fails.
        $this->db->limit($limit, $offset);
        
        // Execute the query on the model's defined table and return the results as an array.
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
    
    // NOTE: If you are using a separate file for the CodeIgniter-style model 
    // (with namespaces), ensure 'use CodeIgniter\Model;' is used (capital 'I').
}