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

        $cgs = ['First Class', 'Second Class', 'Third Class', 'Fourth Class', 'Fifth Class', 'Sixth Class'];

        foreach($cgs as  $cg){
            Clas::create(['class_name' => $cg]);
        }
    }
}
