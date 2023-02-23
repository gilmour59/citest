<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use Modules\Student\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $student_model = new StudentModel();

        $students = $student_model->findAll();

        return view('\Modules\Student\Views\student_index', [
            'students' => $students
        ]);
    }

    public function create()
    {
        return view("\Modules\Student\Views\student_add");
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ];

        // messsages
        $message = [
            "name" => [
                "required" => "Name field is needed"
            ],
            "email" => [
                "required" => "Email field is needed"
            ],
            "mobile" => [
                "required" => "Phone number needed"
            ]
        ];

        if(!$this->validate($rules, $message)){

            return view("\Modules\Student\Views\student_add", [
                "validation" => $this->validator
            ]);
        }

        // save data
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $phone_number = $this->request->getVar("mobile");

        $image = $this->request->getFile("profile_image");

        $profile_image = "";

        if (isset($image) && !empty($image->getPath())) {

            $file_name = $image->getName();

            if ($image->move("images", $file_name)) {

                $profile_image = "/images/" . $file_name;
            }
        }

        //dd($profile_image);

        $data = [
            "name" => $name,
            "email" => $email,
            "mobile" => $phone_number,
            "profile_image" => $profile_image
        ];

        $student_model = new StudentModel();

        $session = session();

        if($student_model->insert($data)){
            // data has been saved
            $session->setFlashdata("success", "Student has been created successfully");
        } else {
            // some error
            $session->setFlashdata("error", "Failed to create student");
        }

        return redirect('student');
    }

    public function edit($id)
    {
        $student_model = new StudentModel();
        $student = $student_model->find($id);

        return view("\Modules\Student\Views\student_edit", [
            'student' => $student
        ]);
    }

    public function update()
    {
        $student_model = new StudentModel();
        $id = $this->request->getVar("id");
        $student = $student_model->find($id);
        
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $mobile = $this->request->getVar("mobile");

        $image = $this->request->getFile("profile_image");

        $profile_image = $student['profile_image'];

        if (isset($image) && !empty($image->getPath())) {

            $file_name = $image->getName();

            if ($image->move("images", $file_name)) {
                $profile_image = "/images/" . $file_name;
            }
        }

        $data = [
            "name" => $name,
            "email" => $email,
            "mobile" => $mobile,
            "profile_image" => $profile_image
        ];

        $session = session();

        if($student_model->update($id, $data)){
            // data saved
            $session->setFlashdata("success", "Student data has been updated");
        }else{
            // error 
            $session->setFlashdata("error", "Failed to update student");
        }

        return redirect("student");
    }

    public function delete()
    {
        // delete operation of student
        $student_model = new StudentModel();

        $id = $this->request->getVar('id');

        $student_model->delete($id);

        $session = session();

        $session->setFlashdata("success", "Student has been deleted");

        return redirect("student");
    }
}
