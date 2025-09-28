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
        $limit = 10; 
        $page = (int)$page; 
        if ($page < 1) $page = 1;

        $offset = ($page - 1) * $limit;

        $total_records = $this->UserModel->count_all_students();
        $total_pages = ceil($total_records / $limit);

        $data['students'] = $this->UserModel->get_paginated_students($limit, $offset);
        
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page; 

        $this->call->view('Showdata', $data);
    }

    // ... (create and update methods remain the same, but should redirect to 'user/show/1') ...

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
                redirect('user/show/1'); // Redirect to page 1 after update
            } else {
                $data['error_message'] = 'Failed to update data.';
            }
        }
        $this->call->view('Update', $data);
    }
            
    public function delete($id, $page = 1) // ✅ ACCEPTS PAGE NUMBER
    {
<<<<<<< HEAD
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
        if($this->UserModel->updggate($id, $update_data))
=======
        if($this->UserModel->delete($id))
>>>>>>> a25719e7c7e061bdd8a7b631bd12fa86ecbe7113
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