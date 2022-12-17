<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();

        $cgs = ['Male', 'Female'];

        foreach($cgs as  $cg){
            Gender::create(['genders_name' => $cg]);
        }
    }
}
