<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pharmacy;

class PharmacySeeder extends Seeder
{
    public function run()
    {
        Pharmacy::create([
            'name' => 'Pharmacy 1',
            'address' => '123 Main St, Anytown USA',
            'phone' => '555-1234',
            'email' => 'pharmacy1@example.com',
        ]);

        Pharmacy::create([
            'name' => 'Pharmacy 2',
            'address' => '456 Oak St, Anytown USA',
            'phone' => '555-5678',
            'email' => 'pharmacy2@example.com',
        ]);

        // add more pharmacies as needed
    }
}
