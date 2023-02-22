<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class SiteController extends BaseController
{
    public function index()
    {
        return view('index', [
            'test' => 'test'
        ]);
    }

    public function insertStudent()
    {
        $students_model = new StudentModel();

        $students_model->insert([
            'name' => 'test',
            'email' => 'test5@gmail.com',
            'mobile' => '090909090',
            'description' => 'asdasdasdasd'
        ]);

        print_r($students_model->orderBy('id', 'desc')->first()['id']);
    }

    public function updateStudent()
    {
        $students_model = new StudentModel();

        $updated_data = [
            'name' => 'lol',
            'email' => 'lol@gmail.com',
            'description' => 'lolol',
            'mobile' => 'lol123'
        ];

        //pass ID and data
        echo $students_model->update(2, $updated_data);
    }

    public function deleteStudent()
    {
        $students_model = new StudentModel();

        echo $students_model->delete(1);
    }

    public function listStudents()
    {
        $students_model = new StudentModel();

        $students = $students_model->findAll();

        echo "<pre>";

        print_r($students);
    }
}
