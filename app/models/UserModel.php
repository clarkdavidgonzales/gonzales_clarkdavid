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
        // Assuming your framework's Model class supports 'limit' and 'offset' in a chainable query
        return $this->limit($limit, $offset)->all();
    }

    /**
     * Gets the total count of all students.
     * @return int The total number of students.
     */
    public function count_all_students()
    {
        // Assuming your framework's Model class has a 'count' method
        return $this->count();
    }
}