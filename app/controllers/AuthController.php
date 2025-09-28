<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('UsersModel');
        session_start();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UsersModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                redirect('students'); // go to student directory
            } else {
                $data['error'] = "Invalid username or password";
                $this->call->view('auth/login', $data);
                return;
            }
        }

        $this->call->view('auth/login');
    }

    public function logout() {
        session_destroy();
        redirect('auth/login');
    }
}
