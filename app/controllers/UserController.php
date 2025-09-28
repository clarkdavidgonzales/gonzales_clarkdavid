<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel; // Ensure you have this model created

class UserController extends BaseController
{
    public function showdata()
    {
        $studentModel = new StudentModel();
        
        // Use the paginate() method to fetch records for the current page
        $data = [
            'students' => $studentModel->paginate(10), // Show 10 records per page
            'pager'    => $studentModel->pager,      // The object to generate pagination links
        ];
        
        return view('showdata', $data);
    }
    
    // Add other methods like create, update, softDelete here...
    // public function create() { ... }
    // public function update($id) { ... }
    // public function softDelete($id) { ... }
}