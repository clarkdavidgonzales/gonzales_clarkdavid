<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * * Automatically generated via CLI.
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
     * @param int $limit The maximum number of records to retrieve.
     * @param int $offset The starting position (skip this many records).
     * @return array The paginated list of students.
     */
    public function get_paginated_students($limit, $offset)
    {
        // FIX: The limit() method likely returns an array (the data), 
        // which makes chaining all() fail. 
        
        // Instead, try applying the limit and offset directly to the final fetch method.
        // This is a common pattern in non-chainable query builders.
        
        // Option 1: Pass limit and offset to all() directly (Most likely fix for a simple framework)
        return $this->all($limit, $offset); 
        
        // Option 2: Use the limit() method, but ONLY if it stores the limit/offset
        // and doesn't execute the query, then call all() (Less likely given the error)
        // return $this->limit($limit, $offset)->all(); // Your original, failing code

        // Option 3: If your framework uses a method like get_by_limit_offset()
        // return $this->get_by_limit_offset($limit, $offset);
    }

    /**
     * Gets the total count of all students.
     * @return int The total number of students.
     */
    public function count_all_students()
    {
        // This should be fine assuming your framework's Model class has a 'count' method
        return $this->count();
    }
}