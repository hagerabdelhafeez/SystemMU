<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Religon;

class ReligonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religons')->delete();

        $cgs = ['Muslim', 'Christian','Other'];

        foreach($cgs as  $cg){
            Religon::create(['religons_name' => $cg]);
        }
    }
}
