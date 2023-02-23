<?php

namespace Modules\Device\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

//php spark db:seed Modules\Device\Database\Seeds\DeviceSeeder
class DeviceSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 10; $i++)
        {
            $this->db->table('devices')->insert($this->getTestDevices());
        }        
    }

    public function getTestDevices()
    {
        $faker = Factory::create();

        return [
            'name' => $faker->name,
            'type' => $faker->randomElement(['mobile', 'laptop', 'desktop', 'tablet']),            
        ];
    }
}
