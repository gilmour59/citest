<?php

namespace Modules\Student\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

//php spark db:seed Modules\\Student\\Database\\Seeds\\StudentSeeder
class StudentSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            $this->db->table('students_mod')->insert($this->generateTestStudents());
        }
    }

    public function generateTestStudents()
    {
        $faker = Factory::create();

        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'mobile' => $faker->phoneNumber,
            'description' => $faker->text
        ];
    }
}
