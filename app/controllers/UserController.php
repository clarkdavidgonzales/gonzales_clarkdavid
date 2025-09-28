<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel'); // ✅ load model here
    }

    public function profile($username, $name) {
        $data['username'] = $username;
        $data['name'] = $name;
        $this->call->view('ViewProfile', $data);
    }

    public function show($page = 1)
    {
        $limit = 5; // records per page
        $offset = ($page - 1) * $limit;

        // fetch records
        $data['students'] = $this->UserModel->get_paginated($limit, $offset);

        // pagination data
        $total_rows = $this->UserModel->count_all();
        $data['total_pages'] = ceil($total_rows / $limit);
        $data['current_page'] = $page;

        $this->call->view('Showdata', $data);
    }

    public function create()
    {
        if($this->io->method() == 'post')
        {
            $last_name  = $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email      = $this->io->post('email');

            $data = array(
                'last_name'  => $last_name,
                'first_name' => $first_name,
                'email'      => $email
            );

            if($this->UserModel->insert($data))
            {
                redirect('user/show');
            } else {
                echo 'Failed to insert data.';
            }
        } else {
            $this->call->view('Create');
        }
    }

    public function update($id)
    {
        $data['student'] = $this->UserModel->find($id);

        if($this->io->method() == 'post')
        {
            $last_name  = $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email      = $this->io->post('email');

            $update_data = array(
                'last_name'  => $last_name,
                'first_name' => $first_name,
                'email'      => $email
            );

            if($this->UserModel->update($id, $update_data))
            {
                redirect('user/show');
            } else {
                $data['error_message'] = 'Failed to update data.';
            }
        }

        $this->call->view('Update', $data);
    }

    public function delete($id)
    {
        if($this->UserModel->delete($id))
        {
            redirect('user/show');
        } else {
            echo 'Failed to delete data.';
        }
    }

    public function soft_delete($id)
    {
        if($this->UserModel->soft_delete($id))
        {
            redirect('user/show');
        } else {
            echo 'Failed to delete data.';
        }
    }

    public function restore($id)
    {
        if($this->UserModel->restore($id))
        {
            redirect('user/show');
        } else {
            echo 'Failed to restore data.';
        }
    }
}
