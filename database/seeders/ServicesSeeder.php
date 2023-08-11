<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Service 1', 'price' => 10],
            ['name' => 'Service 2', 'price' => 20],
            ['name' => 'Service 3', 'price' => 30],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
