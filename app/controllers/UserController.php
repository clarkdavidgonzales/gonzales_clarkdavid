<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        
    }

    public function profile($username, $name) {
        $data['username'] = $username;
        $data['name'] = $name;
        $this->call->view('ViewProfile', $data);
    }

    // --- MODIFIED 'show' FUNCTION FOR PAGINATION ---
    public function show($page = 1)
    {
        $limit = 10; // Records per page
        $page = (int)$page; // Ensure $page is an integer
        if ($page < 1) $page = 1;

        // Calculate offset (e.g., page 1: (1-1)*10 = 0; page 2: (2-1)*10 = 10)
        $offset = ($page - 1) * $limit;

        // Get total number of records
        $total_records = $this->UserModel->count_all_students();
        
        // Calculate total pages
        $total_pages = ceil($total_records / $limit);

        // Fetch paginated data
        $data['students'] = $this->UserModel->get_paginated_students($limit, $offset);
        
        // Pass pagination variables to the view
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;

        $this->call->view('Showdata', $data);
    }
    // ------------------------------------------------

    public function create()
    {
        if($this->io->method() == 'post')
        {
            $last_name = $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email = $this->io->post('email');

            $data = array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email

            );
            if($this->UserModel->insert($data))
            {
                redirect('user/show');
            }else{
                echo 'Failed to insert data.';
            }
            }else{
                $this->call->view('Create');
            }
        }

        public function update($id)
        {
            // Fetch the student data before processing the form submission.
            // This ensures $data['student'] is always available for the view.
            $data ['student'] = $this->UserModel->find($id);

            // Check if the request method is POST (i.e., the form has been submitted).
            if($this->io->method() == 'post')
            {
                $last_name = $this->io->post('last_name');
                $first_name = $this->io->post('first_name');
                $email = $this->io->post('email');

                // Create a new array for the update data to avoid overwriting the student data.
                $update_data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'email' => $email
                );

                // Call the model's update function and check the result.
                if($this->UserModel->update($id, $update_data))
                {
                    redirect('user/show'); // Redirect on success.
                } else {
                    // On failure, display an error message and then the form again.
                    $data['error_message'] = 'Failed to update data.';
                    // Fall through to display the form below.
                }
            }

            // This line will be reached for both GET and POST requests.
            // For a GET request, it's the only logic.
            // For a failed POST, it re-displays the form with the error message.
            $this->call->view('Update', $data);
        }
            
        public function delete($id)
        {
            if($this->UserModel->delete($id))
            {
                redirect('user/show');
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function soft_delete($id)
        {
            if($this->UserModel->soft_delete($id))
            {
                redirect('user/show');
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function restore($id)
        {
            if($this->UserModel->restore($id))
            {
                redirect('user/show');
            }else{
                echo 'Failed to restore data.';
            }
        }
    }