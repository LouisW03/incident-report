<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tbl_status;

class tbl_statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tbl_status::create(['status' => 'To Be Checked']);
        Tbl_status::create(['status' => 'In Progress']);
        Tbl_status::create(['status' => 'Case Solved']);
    }
}
