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
        // FIX 1 (all() on array): Use the explicit Query Builder approach.
        // FIX 2 (SQL Error): Swapping $offset and $limit is necessary because 
        // the framework's internal limit method appears to expect (offset, limit) 
        // arguments to generate the correct SQL (LIMIT offset, limit).
        
        $this->db->limit($offset, $limit); 
        
        // Execute the query on the model's defined table and return the results.
        // This execution method avoids the failed chaining.
        return $this->db->get($this->table)->result_array(); 
    }

    /**
     * Gets the total count of all students.
     * @return int The total number of students.
     */
    public function count_all_students()
    {
        // This remains correct for getting the total records.
        return $this->count();
    }
}