<?php
    namespace App\Libraries;

use App\Models\StudentModel;

    class MyLibrary
    {
        public function allStudents()
        {
            $students_model = new StudentModel();

            return $students_model->findAll();
        }

        public function getStudent($id)
        {
            $students_model = new StudentModel();

            return $students_model->where('id', $id)->first();
        }

        public function convertToSlug($string)
        {
            $lower_string = strtolower($string);

            return str_replace(' ', '-', $lower_string);
        }
    }
?>