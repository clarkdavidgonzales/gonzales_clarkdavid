<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
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

    /**
     * Shows paginated list of students.
     * @param int $page The current page number (defaults to 1).
     */
    public function show($page = 1)
    {
        $limit = 10; // ✅ LIMIT IS SET TO 10
        $page = (int)$page; 
        if ($page < 1) $page = 1;

        $offset = ($page - 1) * $limit;

        $total_records = $this->UserModel->count_all_students();
        $total_pages = ceil($total_records / $limit);

        $data['students'] = $this->UserModel->get_paginated_students($limit, $offset);
        
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page; // Pass current page for links/redirects

        $this->call->view('Showdata', $data);
    }

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
                // Redirect to page 1 after creation
                redirect('user/show/1');
            }else{
                echo 'Failed to insert data.';
            }
            }else{
                $this->call->view('Create');
            }
        }

        public function update($id)
        {
            $data ['student'] = $this->UserModel->find($id);

            if($this->io->method() == 'post')
            {
                $last_name = $this->io->post('last_name');
                $first_name = $this->io->post('first_name');
                $email = $this->io->post('email');

                $update_data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'email' => $email
                );

                if($this->UserModel->update($id, $update_data))
                {
                    // Redirect to the beginning of the list after update
                    redirect('user/show/1'); 
                } else {
                    $data['error_message'] = 'Failed to update data.';
                }
            }
            $this->call->view('Update', $data);
        }
            
        public function delete($id, $page = 1) // ✅ ACCEPTS PAGE NUMBER
        {
            if($this->UserModel->delete($id))
            {
                // FIX: Redirect back to the current page after deletion
                redirect('user/show/' . $page); 
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function soft_delete($id, $page = 1) // ✅ ACCEPTS PAGE NUMBER
        {
            if($this->UserModel->soft_delete($id))
            {
                // FIX: Redirect back to the current page after deletion
                redirect('user/show/' . $page);
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function restore($id)
        {
            if($this->UserModel->restore($id))
            {
                redirect('user/show/1');
            }else{
                echo 'Failed to restore data.';
            }
        }
    }