<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clas;
use Illuminate\Support\Facades\DB;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clas')->delete();

        $cgs = ['First year', 'Second year', 'Third year', 'Fourth year', 'Fifth year'];

        foreach($cgs as  $cg){
            Clas::create(['class_name' => $cg]);
        }
    }
}
