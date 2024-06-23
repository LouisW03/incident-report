<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tbl_type;

class tbl_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tbl_type::create(['type' => 'Slot Gacor']);
        tbl_type::create(['type' => 'Web Deface']);
        tbl_type::create(['type' => 'Temuan']);
        tbl_type::create(['type' => 'Bug Bounty']);
    }
}
